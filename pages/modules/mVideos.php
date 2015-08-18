<?php

// Sets the index
if($_GET['index'] > 0)
	$index = $_GET['index'];
// Gets the user's posts
$videos = $this->getTarget()->getVideos($index,VIDEOS_PER_PAGE+1);

if(count($videos) == 0)
	// If there are no posts:
	echo '<img class="noData" title="'.$this->getLanguage()->getLine('no-videos').'" src="images/novideo.png" />';
else {
	echo '<div class="profVideos">';
	// For each existing post:
	$video = 0;
	while($video<count($videos) && $video<VIDEOS_PER_PAGE){
		$videos[$video]->show( $this->getTarget()->isMember( $this->getUser() ) );
		$video++;
	}
	echo '</div>';

	$this->showPaginator( VIDEOS_PER_PAGE, count($videos)>VIDEOS_PER_PAGE );
}

?>