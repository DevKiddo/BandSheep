<?php

//Puede que tenga errores, corregidlo por si las moscas xD
class bsMessage extends bsConver {

	private $data;

	public function __construct($id, $from, $to, $date, $data, $unread, $sanitize=true){

		parent::__construct($id, $from, $to, $date, $unread);
		
		$this->data = ($sanitize) ? sanitizePost( $data ) : $data ;

	}

	public function show( $fromSelf=false ){

		echo '<div class="message"';
		
		if( $fromSelf )
			echo ' style="background-color:white"';
		elseif( $this->getUnread() )
			echo ' style="border:2px solid #33CC33"';
			
		echo '>';
		
		echo '<img class="profile-photo-messages" src="'.$this->getFrom()->getImage()->getIcon().'" />'.$this->getFrom()->getNameWithLink().'<span>'.$this->getDate().'</span><br><br><div class="content">'.$this->getData().'</div>';

		echo '</div>';
	}
	
	public function read(){
		if($this->unread){
			$query = "UPDATE `messages` SET `unread` = 0 WHERE `id` = :mesID ;";
			$stmt = $GLOBALS["con"]->prepare($query);
			$stmt->bindValue(':mesID', $this->getId());		
			return $stmt->execute();
		}
	}

	public function getData(){
		return $this->data;
	}

}

?>