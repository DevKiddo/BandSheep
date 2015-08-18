<?php

class bsSound {
	
	private $id;
	private $widget;
	
	function __construct($id, $widget) {
		$this->id = $id;
		$this->widget = $widget;
	}
	
	public function show(){
		echo $this->getWidget();
	}
	
	public function getWidget(){
		return $this->widget;
	}
	
	public function getId(){
		return $this->id;
	}
	
}

?>