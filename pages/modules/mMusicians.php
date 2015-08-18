<?php

$filter = array();
$insFilter = array();

$insArray = bsInstrument::getInstruments();

if($_GET['limit'] < RESULTS_PER_SEARCH_PAGE && $_GET['limit'] > 0)
	$resultsPerPage = $_GET['limit'];
else
	$resultsPerPage = RESULTS_PER_SEARCH_PAGE;

// Sets the index
if($_GET['index'] > 0)
	$index = $_GET['index'];

//userID
if($this->getUser())
	$userID = $this->getUser()->getId();

//Fiter by name.
$search = strtolower( trim( $_GET['search'] ) );

foreach($insArray as $in=>$instrument){
	$pos = strpos( removeTildes($search), strtolower( removeTildes($instrument) ) );
	//Add to the instruments array if it's different.
	if($pos !== FALSE){
		$insFilter[] = $in;
		$search = trim( str_replace( substr($search, $pos, strlen($instrument)),'', $search) );
	}
}

$filter = explode(" ", str_replace( ",", "", $search ) );

//Location thing
if($_GET['lat'] && $_GET['lon']){
	$lat = $_GET['lat'];
	$lon = $_GET['lon'];
	$radius = $_GET['radius'];
}

$order = 2;
if( $_GET['order'] )
	$order = $_GET['order'];

//Show actual instruments filter.
echo '<div class="instrumentTags">';
if(!empty($insFilter))
	echo $this->getLanguage()->getLine('instruments-mmusicians');
foreach($insFilter as $ins){
	echo '<span>'.$insArray[$ins].'</span>';
}
echo '</div>';

// Get the actual users.
$result = searchUser($filter,$index,$resultsPerPage+1,$order,$insFilter,$userID,$lat,$lon,$radius);
//If empty, show message;
if(empty($result))
	echo $this->getLanguage()->getLine('no-result');
else {
	// For each existing user:
	$res = 0;
	while($res<count($result) && $res<$resultsPerPage){
		$result[$res]->show();
		$res++;
	}

	// Menu nav
	$this->showPaginator( $resultsPerPage , count($result) > $resultsPerPage);
}
?>