<?php

//Puede que tenga errores, corregidlo por si las moscas xD
class bsConver {

	protected $id;
	protected $from;
	protected $to;
	protected $date;
	protected $unread;

	public function __construct($id, $from, $to, $date, $unread){

		$this->id = $id;

		$this->from = $from;
		$this->to = $to;
		
		$this->date = $date;
		$this->unread = $unread;

	}

	public function show( $i ){
		
		echo '<div class="conv"';
		
		if($this->getUnread())
			echo ' style="border:2px solid #33CC33"';
		
		echo '><div class="convTitle" id="convTitle'.$i.'" onclick="$(\'#convTitle'.$i.'\').hide(); $(\'#convBody'.$i.'\').load(\'?page=mConver&bid='.$_GET['bid'].'&cid='.$this->getId().'\').show()">';
		
		echo '<img class="profile-photo-messages" src="'.$this->getFrom()->getImage()->getIcon().'" />';
		
		echo $this->getFrom()->getName();
		
		echo '<span>'.$this->getDate().'</span>';
		
		echo '</div>';
		
		echo '<div id="convBody'.$i.'" onclick="$(\'#convBody'.$i.'\').hide(); $(\'#convTitle'.$i.'\').show()"></div>';
		
		echo '</div>';
	}
	
	public function read(){
		if($this->unread){
			$query = "UPDATE `conversations` SET `unread` = 0 WHERE `id` = :mesID ;";
			$stmt = $GLOBALS["con"]->prepare($query);
			$stmt->bindParam(':mesID', $this->getId());
			return $stmt->execute();
		}
	}

	public function getUnread(){
		return $this->unread;
	}
	
	public function getId(){
		return $this->id;
	}

	public function getFrom(){
		return $this->from;
	}

	public function getTo(){
		return $this->to;
	}

	public function getDate(){
		return $this->date;
	}

}

?>