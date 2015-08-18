<?php

if($_GET['index'] > 0)
	$index = $_GET['index'];

$convs = $this->getTarget()->getConversations($index, CONVERS_PER_PAGE);

if(empty($convs))
	echo $this->getLanguage()->getLine('no-messages').'.';

foreach($convs as $i=>$c){
	
	$c->show($i);
	$c->read();
	
}

$this->showPaginator( CONVERS_PER_PAGE, count($convs)>CONVERS_PER_PAGE );

?>