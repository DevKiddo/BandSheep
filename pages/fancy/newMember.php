<?php

if( $_GET['id'] ){

	if( $this->getTarget()->addMember( new bsUser( $_GET['id'] ) ) )
		 echo $this->getLanguage()->getLine('invitation-sent');
	else
		echo $this->getLanguage()->getLine('error-ocurred');
	
} elseif( $_GET['search']){
	
	$keys = explode(" ", str_replace( ",", "", trim( $_GET['search'] ) ) );
	foreach( searchUser($keys, 0, 5) as $bsResult ){
		$bsResult->showUser($this->getName().'&bid='.$_GET['bid']);
	}

} else {
	?>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"
	type="text/javascript"></script>
</head>

<input class="search" style="width: 100%" autocomplete="off"
	id="search" name="search" type="text" placeholder="<?php echo $this->getLanguage()->getLine('name-lastname');?>" onkeyup="$(document.getElementById('container')).load('?page=newMember&bid=<?php echo $_GET['bid']; ?>&search='+encodeURIComponent($(document.getElementById('search')).attr('value')))" />

	<div id="container" style="min-height: 400px"></div>
	 
<?php

}

?>