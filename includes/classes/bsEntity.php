<?php

/**
 * bandSheep Entities
 */
class bsEntity {

	//Atributos.
	protected $id;
	protected $name;
	
	protected $image;
	
	protected $numberFans;
	
	protected $city;
	
	protected $genres;
	
	
	public static function createEntity(){
		
		//Query
		$query = "INSERT INTO `entities` (`timestamp`) VALUES (now())";
		
		if ($stmt = $GLOBALS["con"]->prepare($query))
			if( $stmt->execute() )
				return $stmt = $GLOBALS["con"]->lastInsertId();
		else
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));		
	}
	
	public function __construct($id){
		$this->id=$id;
	}

	
	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}
	
	public function setName($name){
		$this->name = $name;
	}



	function getImage(){
		
		if(!$this->image){
			//Query
			$query = "SELECT * FROM `images` WHERE `entity_id` = :userID ORDER BY `id`";
	
			if ($stmt = $GLOBALS["con"]->prepare($query)) {
				//Binding of parameters.
				$stmt->bindParam(':userID', $this->getId());
				//The statement is executed.
				$stmt->execute();
				$result = $stmt->fetch();
				$this->image = new bsImage($result['small'], $result['normal'], $result['large'], $result['xsmall'], $this);
	
			} else {
				die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
			}
		}
		return $this->image;
	}
	
	function setImage($image){
		$this->image = $image;
	}

	/**
	 * 
	 * @param bsImage $image 
	 * @return boolean
	 */
	function updateImage( $image ){

		//Checks if the user already had an image.
		$oldImage = $this->getImage();
		//Query
		$query = "INSERT INTO `images` (`entity_id`, `normal`, `large`, `small`, `xsmall`) VALUES (:entityID, :image_normal, :image_large, :image_small, :image_xsmall) ON DUPLICATE KEY UPDATE `normal` = :image_normal, `large` = :image_large, `small` = :image_small, `xsmall` = :image_xsmall";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':entityID', $this->getId());
			$stmt->bindValue(':image_normal', $image->getNormal());
			$stmt->bindValue(':image_large', $image->getLarge());
			$stmt->bindValue(':image_small', $image->getSmall());
			$stmt->bindValue(':image_xsmall', $image->getXSmall());
			//The statement is executed.
			if ( $stmt->execute() ){
				if($oldImage){
				
					//Deletes old images.
					$old = array( $oldImage->getXSmall(), $oldImage->getSmall(), $oldImage->getNormal(), $oldImage->getLarge() );
					
					foreach($old as $im)
						if($im[0] === 'i')
							unlink($im);
				}
				
				return true;
			} else {
				return false;
			}

		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	public function getNumberFans(){
		
		if(!$this->numberFans){
			//Query
			$query = "SELECT COUNT(*) FROM `fans` WHERE `fanned_id` = :userID";
	
			if ($stmt = $GLOBALS["con"]->prepare($query)) {
				//Binding of parameters.
				$stmt->bindParam(':userID', $this->getId());
				//The statement is executed.
				$stmt->execute();
				$result = $stmt->fetch();
				$this->numberFans = $result[0];
			} else {
				die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
			}
		}
		return $this->numberFans;
	}
	
	public function setNumberFans($numberFans){
		$this->numberFans = $numberFans;
	}

	public function getNumberFanOf(){
		//Query
		$query = "SELECT COUNT(*) FROM `fans` WHERE `fan_id` = :userID";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetch();
			return $result[0];
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	//TODO Improve
	public function getFans($index, $limit){
		//Query
		$query = "SELECT `fan_id` FROM `fans` WHERE `fanned_id` = :userID ORDER BY id DESC LIMIT :index , :limit";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':index', intval( $index ), PDO::PARAM_INT);
			$stmt->bindParam(':limit', intval( $limit ), PDO::PARAM_INT);
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetchAll();

			foreach($result as $i=>$r){
				$result[$i] = new bsUser( $r['fan_id'] );
			}
				
			return $result;

		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	
	//TODO: Use bsPost in all methods.
	function newPost($title, $string){
		
		//Query
		$query = "INSERT INTO `posts` (`entity_id`, `title`, `date`, `data`) VALUES ( :userID, :title, now() , :string)";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':title', $title);
			$stmt->bindParam(':string', $string);
			//The statement is executed.
			return $stmt->execute();
			
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	function editPost($postID, $title, $string){
		
		//Query
		$query = "UPDATE `posts` SET `title` = :title, `data` = :string WHERE `entity_id` = :userID AND `id` = :postID";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':title', $title);
			$stmt->bindParam(':string', $string);
			$stmt->bindParam(':postID', $postID);
			//The statement is executed.
			return $stmt->execute();
			
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	function deletePost($postID){
		
		//Query
		$query = 'DELETE FROM `posts` WHERE `id`= :postID AND `entity_id` = :userID';

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':postID', $postID);
			//The statement is executed.
			return $stmt->execute();
			
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	function getPostByID($postID){
		
		//Query
		$query = "SELECT `title`, `data` FROM `posts` WHERE `id` = :postID AND `entity_id` = :userID";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':postID', $postID);
			//The statement is executed.
			$stmt->execute();
			$result =  $stmt->fetch();
			return new bsPost($result['title'], $result['data']);
			
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	function getPosts($index, $limit){
		//Query
		$query = "SELECT `data`,`date`,`title`,`id` FROM `posts` WHERE `entity_id` = :userID ORDER BY `date` DESC LIMIT :index , :limit";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':index', intval( $index ), PDO::PARAM_INT);
			$stmt->bindParam(':limit', intval( $limit ), PDO::PARAM_INT);
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetchAll();

			foreach($result as $i=>$r){
				$result[$i] = new bsPost($r['title'], $r['data'], $r['date'], $r['id']);
			}

			return $result;

		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}


	function setLocation($lat, $lon, $radius){

		$loc = getLocData($lat, $lon);
		
		// Parameters -> $ciudad $country and $postal_code
		if(!$loc['city'])
			return -1;

		//Query
		$query = "INSERT INTO `location` (`entity_id`,`point`,`city`,`radius`) values ( :userID , GeomFromText(:point) , :city, :radius ) ON DUPLICATE KEY UPDATE `point` = GeomFromText(:point), `city` = :city, `radius` = :radius ";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			$point = 'POINT('.$lat.' '.$lon.')';
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':point', $point);
			$stmt->bindParam(':city', $loc['city']);
			$stmt->bindParam(':radius', $radius);
			//The statement is executed and returned.
			return $stmt->execute();
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	/**
	 * function getLocationCoords()
	 * Returns array with [x,y,radius]
	 */
	function getLocationCoords(){
		//Query
		$query = "SELECT X(point), Y(point), radius FROM `location` WHERE `entity_id` = :userID";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			//The statement is executed.
			$stmt->execute();
			return $stmt->fetch();

		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	function getCity(){
		
		if(!$this->city){
			//Query
			$query = "SELECT `city` FROM `location` WHERE `entity_id` = :userID";
	
			if ($stmt = $GLOBALS["con"]->prepare($query)) {
				//Binding of parameters.
				$stmt->bindParam(':userID', $this->getId());
				//The statement is executed.
				$stmt->execute();
				$result = $stmt->fetch();
				$this->city = $result['city'];
	
			} else {
				die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
			}
		}
		return $this->city;
	}
	
	public function setCity($city){
		$this->city = $city;
	}

	
	function getVideos($index, $limit){

		//Query
		$query = "SELECT `identifier`,`title`,`id` FROM `videos` WHERE `entity_id` = :userID ORDER BY `id` DESC LIMIT :index , :limit";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':index', intval( $index ), PDO::PARAM_INT);
			$stmt->bindParam(':limit', intval( $limit ), PDO::PARAM_INT);
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetchAll();
				
			foreach($result as $i=>$r){
				$result[$i] = new bsVideo($r['identifier'], $r['title'], $r['id']);
			}
				
			return $result;

		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}

	}

	function newVideo($title, $link){
		//Get video identifier from youtube.
		preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $iden);

		if(!isset($iden))
			return -1;

		$iden = $iden[1];

		//Query
		$query = "INSERT INTO `videos` (`entity_id`, `title`, `identifier`) VALUES ( :userID, :title, :iden)";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':title', $title);
			$stmt->bindParam(':iden', $iden);
			//The statement is executed.
			return $stmt->execute();
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	function deleteVideo($vid){
	
		//Query
		$query = "DELETE FROM `videos` WHERE `id` = :videoID AND `entity_id` = :userID";
	
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':videoID', $vid);
			$stmt->bindParam(':userID', $this->getId());
			//The statement is executed.
			return $stmt->execute();
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}
	
	function getSounds($index, $limit){
	
		//Query
		$query = "SELECT `id`, `widget` FROM `sounds` WHERE `entity_id` = :userID ORDER BY `id` DESC LIMIT :index , :limit";
	
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':index', intval( $index ), PDO::PARAM_INT);
			$stmt->bindParam(':limit', intval( $limit ), PDO::PARAM_INT);
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetchAll();
	
			foreach($result as $i=>$r){
				$result[$i] = new bsSound($r['id'], $r['widget']);
			}
	
			return $result;
	
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	
	}
	
	function newSound($url){
		
		try{
			require_once 'includes/soundcloud/Soundcloud.php';
			
			// create a client object with your app credentials
			$client = new Services_Soundcloud('9d6b1f0776dcb8492ec85bf4b65dea8c', 'ac5c0076fe1a8060def0282cfe2c5217');
			$client->setCurlOptions(array(CURLOPT_FOLLOWLOCATION => 1));
			
			// get a tracks oembed data
			$track_url = $url;
			$embed_info = json_decode($client->get('oembed', array('url' => $track_url)));
			
			// render the html for the player widget
			if($embed_info->html){
				//Query
				$query = "INSERT INTO `sounds` (`entity_id`, `title`, `description`, `widget`) VALUES ( :userID, :title, :desc, :widget)";
				
				if ($stmt = $GLOBALS["con"]->prepare($query)) {
					//Binding of parameters.
					$stmt->bindParam(':userID', $this->getId());
					$stmt->bindParam(':title', $embed_info->title);
					$stmt->bindParam(':desc', $embed_info->description);
					$stmt->bindParam(':widget', $embed_info->html);
					//The statement is executed.
					return $stmt->execute();
				} else {
					die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
				}
			}
		} catch(Exception $e){}
		
		//Something went wrong with the url.
		return -2;
	}
	
	function deleteSound($sid){
		
		//Query
		$query = "DELETE FROM `sounds` WHERE `id` = :soundID AND `entity_id` = :userID";
	
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':soundID', $sid);
			$stmt->bindParam(':userID', $this->getId());
			//The statement is executed.
			return $stmt->execute();
			
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}
	
	

	public function getConversations($index, $limit){
		//Query
		$query = "SELECT * FROM `conversations` LEFT OUTER JOIN `bands` as f ON f.entity_id = conversations.from LEFT OUTER JOIN `bands` as t ON t.entity_id = conversations.to WHERE `from` = :userID OR `to` = :userID  ORDER BY `timestamp` DESC LIMIT :index , :limit";
	
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':index', intval( $index ), PDO::PARAM_INT);
			$stmt->bindParam(':limit', intval( $limit ), PDO::PARAM_INT);
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetchAll();

			for($i=0; $i<count($result); $i++){
				$t=0;
				
				if( $result[$i]['from'] === $this->getId() )
					$result[$i]['unread'] = false;
				
				if( $result[$i]['from'] === $this->getId() ){
					$result[$i]['from'] = $result[$i]['to'];
					$t = 2;
				}
				
				if( $result[$i][6+$t] )
					$other = new bsBand($result[$i]['from'], $result[$i]['name']);
				else
					$other = new bsuser($result[$i]['from']);
					
				$output[$i] = new bsConver(
						$result[$i]['id'],
						$other,
						null,
						$result[$i]['timestamp'],
						$result[$i]['unread']
				);
			}
			return $output;
	
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}
	
	public function getConversation($convID){
		//Query
		$query = "SELECT * FROM `conversations` LEFT OUTER JOIN `bands` as f ON f.entity_id = conversations.from LEFT OUTER JOIN `bands` as t ON t.entity_id = conversations.to WHERE conversations.id = :convID AND ( `from` = :userID OR `to` = :userID )";
	
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':convID', $convID);
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetch();
				
			$output = new bsConver(
					$result['id'],
					$result['from'],
					$result['to'],
					$result['timestamp'],
					$result['unread']
			);
				
			return $output;
	
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}	
	
	//TODO Security or everybody can read any conver.
	public function getMessagesFromConversation($converID){
		//Query
		$query = "SELECT * FROM `messages` LEFT OUTER JOIN `bands` ON bands.entity_id = messages.from WHERE `reply_to` = :converID ORDER BY `timestamp`";
	
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':converID', $converID);
			//The statement is executed.
			$stmt->execute();
			$result = $stmt->fetchAll();

			for($i=0; $i<count($result); $i++){
				
				if( $result[$i]['from'] === $this->getId() )
					$result[$i]['unread'] = false;
				
				if( $result[$i]['name'] )
					$other = new bsBand($result[$i]['from'], $result[$i]['name']);
				else
					$other = new bsuser($result[$i]['from']);
				
				$output[$i] = new bsMessage(
						$result[$i]['id'],
						$other,
						null,
						$result[$i]['timestamp'],
						$result[$i]['message'],
						$result[$i]['unread'],
						$result[$i]['sanitize']
				);
			}
			return $output;
	
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}
	
	// TODO Seguridad también
	function sendMessageTo($target, $message, $replyTo=null, $sanitize=true){
	
		// CREATE or UPDATE conersation.
		if( $replyTo ){
			
			$r = $this->getConversation($replyTo);
			$target = new bsEntity( ( $r->getFrom() === $this->getId() ) ? $r->getTo() : $r->getFrom() );
			
			//Query
			$query = "UPDATE `conversations` SET `from`= :from , `to`= :to , `timestamp`=now(), `unread`=1 WHERE `id`= :cid ";
		} else
			$query = "INSERT INTO `conversations` (`from`, `to`) VALUES ( :from , :to )";
		
		
			if ($stmt = $GLOBALS["con"]->prepare($query)) {
				//Binding of parameters.
				if( $replyTo )
					$stmt->bindParam(':cid', $replyTo);
				
				$stmt->bindParam(':from', $this->getId());
				$stmt->bindParam(':to', $target->getId());
				//The statement is executed.
				$stmt->execute();					
				
				if( !$replyTo )
					$replyTo = $GLOBALS["con"]->lastInsertId();
					
			} else {
				die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
			}
	
			
		// CREATE message.
		//Query
		$query = "INSERT INTO `messages` (`reply_to`, `from`, `to`, `message`, `unread`, `sanitize`) VALUES ( :cid , :from , :to , :message , 1, :sanitize)";
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			$date = date( 'Y-m-d H:i:s');
			//Binding of parameters.
			$stmt->bindParam(':cid', $replyTo);
			$stmt->bindParam(':from', $this->getId());
			$stmt->bindValue(':to', ($target) ? $target->getId() : null);
			$stmt->bindParam(':message', $message);
			$stmt->bindParam(':sanitize', intval( $sanitize ), PDO::PARAM_INT);
			//The statement is executed.
			return $stmt->execute();
	
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	
	}
	
	public function unreadMessages(){
		//Query
		$query = "SELECT COUNT(*) FROM `messages` WHERE `unread` = 1 AND `to` = :userID";

		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			//The statement is executed.
			$stmt->execute();
			$num = $stmt->fetch();
			return $num['COUNT(*)'];
	
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}
	
	
	
	function getGenres(){
	
		if(!$this->genres){
			//Query
			$query = "SELECT `genre_id` FROM `genres` WHERE `entity_id` = :userID ORDER BY `id`";
	
			if ($stmt = $GLOBALS["con"]->prepare($query)) {
				//Binding of parameters.
				$stmt->bindParam(':userID', $this->getId());
				//The statement is executed.
				$stmt->execute();
				$result = $stmt->fetchAll();
	
				foreach($result as $i=>$r){
					$result[$i] = new bsGenre($r['genre_id']);
				}
	
				$this->genres = $result;
	
			} else {
				die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
			}
		}
		return $this->genres;
	}
	
	function newGenre($genre){
	
		foreach( $this->getGenres() as $i ){
			if( $genre == $i )
				return -1;
		}
	
		//Check max instruments.
		if(count($this->getGenres()) >= MAX_GENRES_PER_ENTITY)
			return -2;
	
		//Removes instruments list, as it will change.
		$this->genres = null;
	
		//Query
		$query = "INSERT INTO `genres` (`entity_id`, `genre_id`) VALUES ( :userID, :genreID )";
	
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindParam(':genreID', $genre->getId());
			//The statement is executed.
			return $stmt->execute();
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}
	
	public function setGenres($genres){
		$this->genres = $genres;
	}
	
	function deleteGenre($genre){
		//Query
		$query = 'DELETE FROM `genres` WHERE `genre_id`= :id AND `entity_id` = :userID';
	
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':userID', $this->getId());
			$stmt->bindValue(':id', $genre->getId());
			//The statement is executed.
			return $stmt->execute();
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}

	function getBio(){
		if(!$this->bio){
			//Query
			$query = "SELECT `bio` FROM `bio` WHERE `entity_id` = :userID";
			if ($stmt = $GLOBALS["con"]->prepare($query)) {
				//Binding of parameters.
				$stmt->bindParam(':userID', $this->getId());
				//The statement is executed.
				$stmt->execute();
				$result = $stmt->fetch();
				$this->bio = $result['bio'];
		
			} else {
				die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
			}
		}
		return $this->bio;
	}
	
	function updateBio($bio){
		$query = "INSERT INTO `bio` (`entity_id`, `bio`) VALUES (:entityID, :bio) ON DUPLICATE KEY UPDATE `bio` = :bio";
		if ($stmt = $GLOBALS["con"]->prepare($query)) {
			//Binding of parameters.
			$stmt->bindParam(':entityID', $this->getId());
			$stmt->bindValue(':bio', $bio);
			//The statement is executed.
			if ( $stmt->execute() ){
				return true;
			} else {
				return false;
			}
		
		} else {
			die(bsPage::getLanguage()->getLine('conection-error-bsUser'));
		}
	}
}

class EntityNotFoundException extends Exception {
	public function __construct( $id ){
	}
}

?>
