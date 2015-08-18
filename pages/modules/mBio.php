<?php
if( $this->isTargetOwner() ) {
	if($_GET['bid']){
		echo '<a class="iframe2" href="?page=setBio&bid='.$_GET['bid'].'">'.$this->getLanguage()->getLine('edit').'</a>';
	}
	else{
		echo '<a class="iframe2" href="?page=setBio">'.$this->getLanguage()->getLine('edit').'</a>';
	}
}
if($this->getTarget()->getBio()) {
	echo "<b>Bio: </b>";
	echo sanitizePost($this->getTarget()->getBio());
} else {
	echo $this->getLanguage()->getLine('no-bio-profile');
}
?>