<div class="fansBlock">
<?php

// Show bands.
foreach($this->getTarget()->getBands() as $band){
	/* @var $band bsBand */
	echo '<a href="?page=band'.$band->targetURL().'"><img src="'.$band->getImage()->getThumbnail().'" onmouseover="return overlib(\''.addslashes($band->getName()).'\');" onmouseout="return nd();"></a>';
}


// Add band if owner.
if( $this->isTargetOwner() ){
	echo
'<a class="iframe2" href="?page=newBand" title="'.$this->getLanguage()->getLine('new-band').'">
	<img src="images/icon/add.png" alt="'.$this->getLanguage()->getLine('new-band').'" />
</a>';
}

?>
</div>
