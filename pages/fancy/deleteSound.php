<?php

if( $this->getTarget()->deleteSound($_GET['sid']) ){
	$this->reloadParentModule('mSounds');
} else {
	die($this->getLanguage()->getLine('error-ocurred'));
}

?>