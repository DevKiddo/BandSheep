<?php

if( $this->getTarget()->deleteVideo($_GET['vid']) ){
	$this->reloadParentModule('mVideos');
} else {
	die($this->getLanguage()->getLine('error-ocurred'));
}

?>