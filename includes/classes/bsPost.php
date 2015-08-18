<?php

class bsPost {
	
	private $id;
	private $title;
	private $body;
	private $date;
	private $editable;
	
	public function __construct( $title, $body, $date, $id=null, $editable=false ){
		
		$this->id = $id;
		$this->title = $title;
		$this->body = $body;
		$this->date = $date;
		$this->editable = $editable;
		
	}
	
	public function show(){
		
		$body = sanitizePost($this->getBody());
		$title = sanitizePost($this->getTitle());
		
		$body = $this->linksReplace( $body );
		$body = $this->youtubeReplace( $body );
		
		echo '<div class="post">';
		echo '<div class="postTitle">';
		//Fecha
		echo '<span>'.$this->getDate().'</span>';
		//Titulo
		if(!$this->isEditable())
			//Not editable
			echo '<b>'.$title.'</b></div>';
		else {
			//Editable
			echo '<a class="iframe2" href="?page=editPost&postID='.$this->getId();
			if($_GET['bid'])
				echo '&bid='.$_GET['bid'];
			echo '">'.$title.'</a></div>';
		}
		//Post per se~
		echo $body;
		echo '</div>';
		
	}
	
	public function youtubeReplace($body){
		
		preg_match_all('#(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?#x', $body, $match);
		for($j=0; $j<count($match[0]); $j++){
			$match[0][$j] = str_replace('<br','',$match[0][$j]);
			$rep = '<div class="vplayer"><iframe title="Reproducir video" width="418" height="237" src="http://www.youtube.com/embed/'.$match[1][$j].'?autoplay=false&wmode=transparent" frameborder="0" allowfullscreen></iframe></div>';
			$body = str_replace($match[0][$j], $rep, $body);
		}
		
		return $body;
	}
	
	public function linksReplace($body){
		return preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank">$1</a>', $body);
	}
	
	public function setEditable( $editable ){
		$this->editable = $editable;
	}
	
	public function isEditable(){
		return $this->editable;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function setBody($body){
		$this->body = $body;
	}
	
	public function getBody(){
		return $this->body;
	}
	
	public function getDate(){
		return $this->date;
	}
	
	public function getId(){
		return $this->id;
	}
	
}

?>
