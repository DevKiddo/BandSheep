<?php 

class bsBand extends bsEntity {

	// Attributes.
	protected $members;
	protected $similarbands;


	/**
	 * Creates a new band in the database.
	 *
	 * @param unknown $user
	 * @param unknown $pass
	 * @param unknown $date
	 * @param unknown $email
	 * @param string $validEmail
	 * @return number|boolean
	 */
	public static function createBand($name){

		$entityId = bsEntity::createEntity();

		$query = "INSERT INTO `bands` (`entity_id`, `name`) VALUES (:entity,:name)";
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':entity', $entityId);
			$stmt->bindParam(':name', $name);
			//The statement is executed.
			if( $stmt->execute() ){
				return $entityId;
			} else {
				return false;
			}

		} else {
			die('Error de conexion a DB');
		}
	}

	//TODO
	public static function getRandomBands($limit){

		$query = 'SELECT entity_id, name FROM `bands` ORDER BY rand() LIMIT :limit';

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':limit', intval( $limit ), PDO::PARAM_INT);
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetchAll();

			foreach($result as $i=>$r){
				$result[$i] = new bsBand( $r['entity_id'], $r['name'] );
			}

			return $result;

		} else {
			die($this->getLanguage()->getLine('conection-error-bsBand'));
		}
	}

	public static function getBandsOnFire($index, $limit, $days=1){
		//Query
		$query = 'SELECT fans.fanned_id, bands.name, images.normal, COUNT(*) as count FROM fans LEFT OUTER JOIN images ON images.entity_id = fans.fanned_id RIGHT OUTER JOIN bands ON bands.entity_id = fans.fanned_id WHERE images.normal IS NOT NULL AND (date > DATE_SUB(now(), INTERVAL :day DAY)) GROUP BY fanned_id ORDER BY count DESC LIMIT :index, :limit';

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindValue(':day', intval( $days ), PDO::PARAM_INT);
			$stmt->bindParam(':index', intval( $index ), PDO::PARAM_INT);
			$stmt->bindParam(':limit', intval( $limit ), PDO::PARAM_INT);
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetchAll();

			//Recursivity for empty results.
			if( count($result) < 8 && $days < 10)
				$result = bsBand::getBandsOnFire($index, $limit, $days+$days);
			else

				foreach($result as $i=>$r){
				$result[$i] = new bsBand( $r['fanned_id'] );
			}

			return $result;

		} else {
			die($this->getLanguage()->getLine('conection-error-bsBand'));
		}
	}






	public function __construct($bandID, $name=null){

		if(!$name){
				
			$query = "SELECT * FROM `bands` WHERE `entity_id` = :bandID";
			if ($stmt = $GLOBALS["con"]->prepare($query)) {
				//Binding of parameters.
				$stmt->bindParam(':bandID', $bandID);
				//The statement is executed.
				$stmt->execute();
				$result = $stmt->fetch();
					
				if( empty( $result ) )
					throw new BandNotFoundException( $bandID );

				$this->id = $result['entity_id'];
				$this->name = $result['name'];

			} else {
				die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
			}
				
		} else {
			$this->id = $bandID;
			$this->name = $name;
		}

	}

	public function getName(){
		return $this->name;
	}

	public function getNameWithLink(){
		return '<a href="?page=band'.$this->targetURL().'">'.$this->getName().'</a>';
	}

	public function getId(){
		return $this->id;
	}


	function isMember( $user ){
		if($user)
			foreach( $this->getMembers() as $u)
			if($u->getId() === $user->getId())
			return true;

		return false;
	}

	public function targetURL(){
		return '&bid='.$this->getId();
	}


	public function getMembers(){

		if(!$this->members){
			//Members data not retrieved yet.
			$query = "SELECT `user_id` FROM `members` WHERE `band_id` = :bandID AND `valid` = 1 ";

			if ($stmt = $GLOBALS["con"]->prepare($query)) {
				//Binding of parameters.
				$stmt->bindParam(':bandID', $this->getId());
				//The statement is executed.
				$stmt->execute();
				$result = $stmt->fetchAll();

				foreach($result as $i=>$r){
					$this->members[$i] = new bsUser( $r['user_id'] );
				}

			} else {
				die($this->getLanguage()->getLine('conection-error-bsBand'));
			}
		}

		return $this->members;
	}

	function addMember( $newMember, $valid=0 ){

		if( count( $this->getMembers() ) >= MAX_MEMBERS_PER_BAND )
			return -1;

		if( $this->isMember( $newMember ) )
			return -2;

		//Query
		$query = "INSERT INTO `members` (`band_id`,`user_id`,`valid`) VALUES ( :bandID , :userID , :valid )";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':bandID', intval( $this->getId() ), PDO::PARAM_INT);
			$stmt->bindParam(':userID', intval( $newMember->getId() ), PDO::PARAM_INT);
			$stmt->bindParam(':valid', intval( $valid ), PDO::PARAM_INT);
			//The statement is executed.
			return $stmt->execute() && ( $valid == 1 || 
					$this->sendMessageTo($newMember,
					bsPage::getLanguage()->getLine('band-invitation').' <a href="?page=acceptBand&bid='.$this->getId().'">'.bsPage::getLanguage()->getLine('band-accept').'</a>', null, 0) );

		} else {
			die($this->getLanguage()->getLine('conection-error-bsBand'));
		}
	}


	//TODO
	public function getSimilarBands() {

		if(!$this->similarbands){
				
			$query = "SELECT
					fans.fanned_id, bands.name, COUNT(*) as count
					FROM
					fans
					RIGHT OUTER JOIN
					bands ON bands.entity_id = fans.fanned_id
					WHERE
					fans.fanned_id <> :bandID AND fan_id IN (SELECT
					fan_id
					FROM
					fans
					WHERE
					fanned_id = :bandID)
					GROUP BY fanned_id
					ORDER BY count DESC , fanned_id DESC LIMIT :limit";

			if ($stmt = $GLOBALS["con"]->prepare($query)) {
				//Binding of parameters.
				$stmt->bindParam(':bandID', $this->getId());
				$stmt->bindValue(':limit', intval( SIMILAR_BANDS_AMOUNT ), PDO::PARAM_INT);
				//The statement is executed.
				$stmt->execute();
				$result = $stmt->fetchAll();
					
				foreach($result as $i=>$r){
					$result[$i] = new bsBand($r['fanned_id'],$r['name']);
				}
					
				$this->similarbands = $result;
					
			} else {
				die($this->getLanguage()->getLine('conection-error-bsBand'));
			}
		}

		return $this->similarbands;
	}


}

class BandNotFoundException extends EntityNotFoundException {}

?>
