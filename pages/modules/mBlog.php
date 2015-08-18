<?php

// Sets the index
if($_GET['index'] > 0)
	$index = $_GET['index'];
// Gets the user's posts
$posts = $this->getTarget()->getPosts($index,POSTS_PER_PAGE+1);

if(count($posts) == 0)
	// If there are no posts:
	echo '<img class="noData" title="'.$this->getLanguage()->getLine('no-post-message').'" src="images/noblog.png" />';
else {
	// For each existing post:
	$post = 0;
	while($post<count($posts) && $post<POSTS_PER_PAGE){
		//Divider.
		if($post)
			echo '<div class="divider"></div>';
		
		if($this->getTarget()->isMember($this->getUser()))
			$posts[$post]->setEditable(true);
			
		$posts[$post]->show();

		$post++;
	}

	$this->showPaginator( POSTS_PER_PAGE, count($posts)>POSTS_PER_PAGE);
}

?>