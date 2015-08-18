<?php

switch($this->getUser()->deleteInstrument(new bsInstrument($_GET['id']))){
	case 1:
		echo $this->getLanguage()->getLine('instrument-nolist');
		$this->reloadParentModule('smInstruments');
		break;
	case -1:
		break;
	default:
		echo $this->getLanguage()->getLine('error-ocurred');
}

?>