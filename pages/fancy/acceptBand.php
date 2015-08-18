<?php

if($this->getUser()->acceptBand( $this->getTarget() )) {
	header('Location: ?page=band&bid='.$_GET['bid']);
}

?>