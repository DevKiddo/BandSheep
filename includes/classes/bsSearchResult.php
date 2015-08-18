<?php

class bsSearchResult {

	private $obj;
	private $isSpecial;
	
	public function __construct( $obj, $isSpecial=false ){
		$this->obj = $obj;
		$this->isSpecial = $isSpecial;
	}

	public function show(){
		if( get_class($this->obj) === 'bsUser' )
			$this->showUser();
		elseif( get_class($this->obj) === 'bsBand' )
			$this->showBand();
	}
	
	public function showUser( $pageLink='profile' ){
		
		//div del user
		echo '<div class="searchResult';
		
		if($this->isSpecial())
			echo ' searchNear';
		
		echo '" onclick="window.location=\'?page='.$pageLink.'&id='.$this->getUser()->getId().'\'">';
		//Imagen
		$this->getUser()->getImage()->showThumbnail(60,60);
		//Nombre
		echo '<div class="name"><a href="?page='.$pageLink.'&id='.$this->getUser()->getId().'">'.$this->getUser()->getName().'</a></div>';
		//Instruments.
		$l = new bsList($this->getUser()->getInstruments(), 'getName', bsPage::getLanguage()->getLine('no-instrument-bssearchresult'));
		echo '<div class="instrumentsList" style="margin-right:30px;">';
		$l->show();
		echo '</div>';
		
		//Ubicación
		if( $this->getUser()->getCity() ){
			echo '<div class="cityResult">';
			echo bsPage::getLanguage()->getLine('lives-in-bssearchresult'). '<b>'.$this->getUser()->getCity().'</b>. ';
			echo '</div>';
		} else
			echo  bsPage::getLanguage()->getLine('unknown-location-bssearchresult');
		
		//Número de Fans
		echo '<br><span><b>'.$this->getUser()->getNumberFans().'</b>';
		if(($this->getUser()->getNumberFans()) == 1)
			echo ' Fan';
		else
			echo ' Fans';
		echo '</span>';
		echo '</div>';
		
	}
	
	public function showBand( $pageLink='band' ){
	
		//div del user
		echo '<div class="searchResult';
	
		if($this->isSpecial())
			echo ' searchNear';
	
		echo '" onclick="window.location=\'?page='.$pageLink.'&bid='.$this->getObj()->getId().'\'">';
		//Imagen
		$this->getObj()->getImage()->showThumbnail(60,60);
		//Nombre
		echo '<div class="name"><a href="?page='.$pageLink.'&bid='.$this->getObj()->getId().'">'.$this->getObj()->getName().'</a></div>';
	
		//Ubicación
		if( $this->getUser()->getCity() ){
			echo '<div class="cityResult">';
			echo '<b>'.$this->getUser()->getCity().'</b>. ';
			echo '</div>';
		} else {
			echo '<div class="cityResult">';
			echo  bsPage::getLanguage()->getLine('unknown-location-bssearchresult');
			echo '</div>';
		}
		
		//Número de Fans
		echo '<br><span><b>'.$this->getUser()->getNumberFans().'</b>';
		if(($this->getUser()->getNumberFans()) == 1)
			echo ' Fan';
		else
			echo ' Fans';
		echo '</span>';
		echo '</div>';
	}

	public function getObj(){
		return $this->obj;
	}
	
	public function getUser(){
		return $this->getObj();
	}
	
	public function isSpecial(){
		return $this->isSpecial;
	}
	
}

?>