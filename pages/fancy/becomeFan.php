<?php

if( $this->getUser()->becomeFanOf($this->getTarget()) ){
	echo '<script></script>';
	$this->reloadParentModule('mFans');
} else
	die($this->getLanguage()->getLine('error-ocurred'));

?>