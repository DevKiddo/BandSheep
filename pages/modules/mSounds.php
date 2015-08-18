<?php

// Sets the index
if($_GET['index'] > 0)
	$index = $_GET['index'];
// Gets the user's posts
$sounds = $this->getTarget()->getSounds($index,SOUNDS_PER_PAGE+1);

if(count($sounds) == 0)
	// If there are no posts:
	echo '<img class="noData" title="'.$this->getLanguage()->getLine('no-sounds').'" src="images/nosound.png" />';
else {
	// For each existing post:
	$sound = 0;
	while($sound<count($sounds) && $sound<SOUNDS_PER_PAGE){
		echo '<div class="boxSound">';
		if ($this->isTargetOwner()){
			echo '<div class="removeSound"><a class="iframe2" href="?page=deleteSound&bid='.$_GET['bid'].'&sid='.$sounds[$sound]->getId().'">';
			echo '<img class="remove" src="images/icon/delet.png">';
			echo '</a></div>';
		}
		$sounds[$sound]->show();
		echo '</div>';
		$sound++;
	}

	$this->showPaginator( SOUNDS_PER_PAGE, count($sounds)>SOUNDS_PER_PAGE );
}

?>