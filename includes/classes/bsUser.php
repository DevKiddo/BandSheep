<?php

class bsUser extends bsEntity {

	protected $email;
	protected $birthDay;
	protected $unreadMessagesRecursively;
	
	/**
	 * Creates a new user in the database.
	 *
	 * @param string $user
	 * @param string $pass
	 * @param string $date
	 * @param string $email
	 * @return integer || bool
	 */
	public static function createUser($user, $pass, $date, $email, $validEmail=false){
		//Checks email
		$checker = new EmailAddressValidator();
		if(!$checker->check_email_address($email))
			return -2;
		if(checkEmail($email))
			return -1;
	
		//Generate validation code.
		$code = generateCode();
	
		//Everything's fine, inserts new row
		
		$entityId = bsEntity::createEntity();
		
		$query = "INSERT INTO `users` (`entity_id`, `name`, `password`, `birthday`, `email`, `active`, `code`) VALUES (:entity, :user, :pass, :date, :email, :valid, :code)";
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':entity', $entityId);
			$stmt->bindParam(':user', $user);
			$stmt->bindParam(':pass', md5($pass));
			$stmt->bindParam(':date', $date);
			$stmt->bindParam(':email', $email);
			$stmt->bindValue(':valid', ($validEmail)? 1 : 0 );
			$stmt->bindValue(':code', $code);
			//The statement is executed.
			if( $stmt->execute() ){
				return ($validEmail || sendActivation($email, $code) );
			} else {
				return false;
			}
	
		} else {
			die('Error de conexion a DB');
		}
	}
	
	public function __construct($userID, $checkDB = true){
	
		$query = "SELECT * FROM users WHERE entity_id = :userID";
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $userID);
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetch();
			
			if( empty( $result ) )
				throw new UserNotFoundException( $userID );

			$this->id = $result['entity_id'];
			$this->name = $result['name'];
			$this->email = $result['email'];
			$this->birthDay = $result['birthday'];
			$this->isAvailable = $result['available'];
				
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	
	}
	
	function isMember($user){
		return $user && get_class($user)==='bsUser' && $this->getId() === $user->getId();
	}

	public function getEmail(){
		return $this->email;
	}
	
	public function getNameWithLink(){
		echo '<a href="?page=profile'.$this->targetURL().'">'.$this->getName().'</a>';
	}
	
	public function getBirthDay(){
		return explode("-",$this->birthDay);
	}

	public function updateName($newName){
		//Query
		$query = "UPDATE `users` SET `name` = :newName WHERE `entity_id` = :userID";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':newName', $newName);
			$stmt->bindParam(':userID', $this->getId());
			//The statement is executed and returned.
			return ( $stmt->execute() ) ? $this->name = $newName : false;

		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	public function updatePassword($newPassword){
		//Query
		$query = "UPDATE `users` SET `password` = :newPassword WHERE `entity_id` = :userID";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':newPassword', md5($newPassword));
			$stmt->bindParam(':userID', $this->getId());
			//The statement is executed and returned.
			return $stmt->execute();

		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	public function updateBirthDay($year, $month, $day){
		//Query
		$query = "UPDATE `users` SET `birthday` = :userDate WHERE `entity_id` = :userID";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$date = $year.'-'.$month.'-'.$day;
			$stmt->bindParam(':userDate', $date);
			$stmt->bindParam(':userID', $this->getId());
			//The statement is executed and returned.
			return ( $stmt->execute() ) ? $this->bd = $date : false;

		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	public function getAge(){
		$date = $this->getBirthDay();

		$dob = implode("-", $date);

		return floor((time() - strtotime($dob)) / 31556926);
	}
	
	public function targetURL(){
		return '&id='.$this->getId();
	}
	
	
	public function getFanOf($index, $limit){
		//Query
		$query = "SELECT `fanned_id` FROM `fans` RIGHT OUTER JOIN `users` ON `users`.`entity_id` = `fans`.`fanned_id` WHERE `fan_id` = :userID ORDER BY id DESC LIMIT :index , :limit";
	
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':index', intval( $index ), PDO::PARAM_INT);
			$stmt->bindParam(':limit', intval( $limit ), PDO::PARAM_INT);
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetchAll();
	
			foreach($result as $i=>$r){
				$result[$i] = new bsUser($r['fanned_id']);
			}
	
			return $result;
	
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}
	
	public function becomeFanOf($target){
	
		if($this->isFanOf($target))
			return $this->stopBeingFanOf($target);
	
		if($target->isMember( $this ))
			return -1;
	
		//Query
		$query = "INSERT INTO `fans` (`fanned_id`, `fan_id`) VALUES (:targetID, :userID)";
	
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':targetID', $target->getId());
			$stmt->bindParam(':userID', $this->getId());
			//The statement is executed.
			return $stmt->execute();
				
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	
	}
	
	public function stopBeingFanOf($target){
	
		//Query
		$query = "DELETE FROM `fans` WHERE `fanned_id` = :targetID AND `fan_id` = :userID";
	
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':targetID', $target->getId());
			$stmt->bindParam(':userID', $this->getId());
			//The statement is executed.
			return $stmt->execute();
				
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}
	
	public function isFanOf($target){
	
		//Query
		$query = "SELECT * FROM `fans` WHERE `fanned_id` = :targetID AND `fan_id` = :userID";
	
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':targetID', $target->getId());
			$stmt->bindParam(':userID', $this->getId());
			//The statement is executed.
			$stmt->execute();
			return count($stmt->fetchAll()) > 0;
				
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}
	

	function getInstruments(){
	
		if(!$this->instruments){
			//Query
			$query = "SELECT `instrument_id` FROM `instruments` WHERE `user_id` = :userID ORDER BY `id`";
	
			if ($stmt = $GLOBALS["con"]->prepare($query)) {
				//Binding of parameters.
				$stmt->bindParam(':userID', $this->getId());
				//The statement is executed.
				$stmt->execute();
				$result = $stmt->fetchAll();
	
				foreach($result as $i=>$r){
					$result[$i] = new bsInstrument($r['instrument_id']);
				}
	
				$this->instruments = $result;
	
			} else {
				die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
			}
		}
		return $this->instruments;
	}
	
	function newInstrument($instrument){

		foreach( $this->getInstruments() as $i ){
			if( $instrument == $i )
				return -1;
		}

		//Check max instruments.
		if(count($this->getInstruments()) >= MAX_INSTRUMENTS_PER_USER)
			return -2;

		//Removes instruments list, as it will change.
		$this->instruments = null;

		//Query
		$query = "INSERT INTO `instruments` (`user_id`, `instrument_id`) VALUES ( :userID, :instrumentID )";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':instrumentID', $instrument->getId());
			//The statement is executed.
			return $stmt->execute();
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	public function setInstruments($instruments){
		$this->instruments = $instruments;
	}

	function deleteInstrument($instrument){
		//Query
		$query = 'DELETE FROM `instruments` WHERE `instrument_id`= :id AND `user_id` = :userID';

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindValue(':id', $instrument->getId());
			//The statement is executed.
			return $stmt->execute();
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	public function getBands(){

		$query = "SELECT * FROM `members` LEFT OUTER JOIN `bands` ON `members`.`band_id` = `bands`.`entity_id` WHERE `members`.`user_id` = :userID AND valid = 1";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetchAll();

			foreach($result as $i=>$r){
				$result[$i] = new bsBand($r['band_id'],$r['name']);
			}

			return $result;

		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}
	
	public function acceptBand( $band ){
		$query = "UPDATE `members` SET `valid`=1 WHERE `user_id` = :userID AND `band_id` = :bandID AND `valid` = 0 ";
		
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':bandID', $band->getId());
			//The statement is executed.
			return $stmt->execute();

		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}


	function newBand($name){

		if( count( $this->getBands() ) >= MAX_BANDS_PER_USER )
			return -2;

		if( $bandID = bsBand::createBand($name) ){
			try{
				$band = new bsBand( $bandID );
				return $band->addMember( $this, 1 );
			} catch(Exception $e){
				return -3;
			}
		} else {
			return false;
		}

	}

	public function getRecommendedBands(){

		$query = "SELECT 
				    fans.fanned_id, bands.name, COUNT(*) as count
				FROM
				    fans
				        RIGHT OUTER JOIN
				    bands ON bands.entity_id = fans.fanned_id
				WHERE
				    fans.fanned_id NOT IN (SELECT DISTINCT
				            fanned_id
				        FROM
				            fans
				                RIGHT JOIN
				            members ON members.band_id = fans.fanned_id
				        WHERE
				            fan_id = :userID OR user_id = :userID) AND fan_id IN (SELECT DISTINCT
				            fan_id
				        FROM
				            fans
				        WHERE
				            fan_id <> :userID AND fanned_id IN (SELECT 
				                    fanned_id
				                FROM
				                    fans
				                WHERE
				                    fan_id = :userID))
				GROUP BY fanned_id
				ORDER BY count DESC , fanned_id DESC";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetchAll();

			foreach($result as $i=>$r){
				$result[$i] = new bsBand($r['fanned_id'],$r['name']);
			}

			return $result;

		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}
	
	public function unreadMessagesRecursively(){
		
		if( !$this->unreadMessagesRecursively ){
			$this->unreadMessagesRecursively = $this->unreadMessages();
		
			foreach( $this->getBands() as $b )
				$this->unreadMessagesRecursively += $b->unreadMessages();
		}
		
		return $this->unreadMessagesRecursively;
	}
	
	public function isAvailable(){
		return $this->isAvailable;
	}
	
	public function updateAvailable($available){
		//$available: 0 o 1
		$query = "UPDATE `users` SET `available` = :available WHERE `entity_id` = :userID";
		
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':available', $available);
			//The statement is executed.
			if($stmt->execute()){
				$this->isAvailable = $available;
				return true;
			} else
				return false;
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}
	
}


class UserNotFoundException extends EntityNotFoundException {}

?>