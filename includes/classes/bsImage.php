<?php

define('UNKNOWN_IMAGE_USER_NORMAL', 'images/t_user.png');
define('UNKNOWN_IMAGE_USER_SMALL', 'images/s_user.png');
define('UNKNOWN_IMAGE_USER_XSMALL', 'images/x_user.png');

define('UNKNOWN_IMAGE_BAND_NORMAL', 'images/t_band.png');
define('UNKNOWN_IMAGE_BAND_SMALL', 'images/s_band.png');
define('UNKNOWN_IMAGE_BAND_XSMALL', 'images/x_band.png');

class bsImage {
	
	private $xsmall;
	private $small;
	private $normal;
	private $large;
	
	private $parent;
	
	public function __construct($small=null, $normal=null, $large=null, $xsmall=null, $parent=null){
		$this->small = $small;
		$this->normal = $normal;
		$this->large = $large;
		$this->xsmall = $xsmall;
		
		$this->parent = $parent;
	}
	
	public function showProfileImage(){
		
		if($this->getLarge())
			echo '<a class="image" href="'.$this->getLarge().'">';
		
		echo '<img src="'.$this->getMedium().'" width="240" height="240" />';

		if($this->getLarge())
			echo '</a>';
		
	}
	
	/**
	 * @param int $width
	 * 		optional
	 * @param int $height
	 * 		optional.
	 */
	public function showThumbnail($width=null, $height=null, $extra=null){
		
		echo '<img src="'.$this->getThumbnail().'"';
		
		if(isset($width))
			echo ' width="'.$width.'"';
		if(isset($height))			
			echo ' height="'.$height.'"';
		if(isset($extra))
			echo ' '.$extra;
				
		echo '/>';
	}
	
	
	// Get fixed stuff
	
	public function getMedium(){
		if($this->normal)
			return $this->normal;
		else
			if( get_class($this->parent) === 'bsBand' )
				return UNKNOWN_IMAGE_BAND_NORMAL;
			else
				return UNKNOWN_IMAGE_USER_NORMAL;
	}
	
	public function getThumbnail(){
		if($this->small)
			return $this->small;
		else
			if( get_class($this->parent) === 'bsBand' )
				return UNKNOWN_IMAGE_BAND_SMALL;
			else
				return UNKNOWN_IMAGE_USER_SMALL;
	}
	
	public function getIcon(){
		if($this->xsmall)
			return $this->xsmall;
		else
			if( get_class($this->parent) === 'bsBand' )
				return UNKNOWN_IMAGE_BAND_XSMALL;
			else
				return UNKNOWN_IMAGE_USER_XSMALL;
	}
	
	
	//get literal stuff
	
	public function getXSmall(){
		return $this->xsmall;
	}
	
	public function getSmall(){
		return $this->small;
	}
	
	public function getNormal(){
		return $this->normal;
	}
	
	public function getLarge(){
		return $this->large;
	}
	
}

?>