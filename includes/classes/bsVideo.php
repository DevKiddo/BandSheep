<?php

class bsVideo {

	private $id;
	private $title;
	private $iden;
	private $img;

	public function __construct($iden, $title, $id=null){
		
		$this->id = $id;
		$this->iden = $iden;
		$this->title = $title;

		$this->img = new bsImage( 'http://img.youtube.com/vi/'.$iden.'/' );
	}

	public function show($removable=false){
		echo '<div class="ytube"><a class="youtube" href="http://www.youtube.com/watch?v='
		.$this->getIden().'?autoplay=1" title="'
		.$this->getTitle().'" target="_blank"><img class="yTubeImg" src="'
		.$this->getImg()->getSmall().'1.jpg" src0="'
		.$this->getImg()->getSmall().'"/></a><div class="title"><a class="youtube" href="http://www.youtube.com/watch?v='
		.$this->getIden().'?autoplay=1" title="'
		.$this->getTitle().'" target="_blank">'
		.$this->getTitle().'</a></div>';
		
		if($removable)
			echo '<div class="remove"><a class="iframe2" href="?page=deleteVideo&bid='
			.$_GET['bid'].'&vid='
			.$this->id.'"><img src="images/icon/delet.png"></a></div>';
		echo '</div>';
	}

	public function getTitle(){
		return $this->title;
	}

	public function getIden(){
		return $this->iden;
	}

	public function getImg(){
		return $this->img;
	}

}

?>