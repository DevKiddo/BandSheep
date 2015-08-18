<?php

//Setting...
if($_GET['limit'] < RESULTS_PER_SEARCH_PAGE && $_GET['limit'] > 0)
	$resultsPerPage = $_GET['limit'];
else
	$resultsPerPage = RESULTS_PER_SEARCH_PAGE;

// Sets the index
if($_GET['index'] > 0)
	$index = $_GET['index'];

//Fiter by name.
$filter = explode(" ", str_replace( ",", "", trim( $_GET['search'] ) ) );

//Location thing
if($_GET['lat'] && $_GET['lon'] && $_GET['radius']){
	$lat = $_GET['lat'];
	$lon = $_GET['lon'];
	$radius = $_GET['radius'];
}

// Get the actual users.
$result = searchBand($filter,$index,$resultsPerPage+1,2,$lat,$lon,$radius);
//If empty, show message;
if(empty($result))
	echo $this->getLanguage()->getLine('no-result');
else {
	// For each existing band:
	$res = 0;
	while($res<count($result) && $res<$resultsPerPage){
		$result[$res]->show();
		$res++;
	}

	// Menu nav
	$this->showPaginator( $resultsPerPage, count($result) > $resultsPerPage );

}
?>