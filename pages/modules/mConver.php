<?php

foreach( $this->getTarget()->getMessagesFromConversation( $_GET['cid'] ) as $m ){
	
	$m->show( $m->getFrom()->getName() === $this->getTarget()->getName() );
	$m->read();
}

echo '<a class="iframe2" href="?page=sendMessage&bid='.$_GET['bid'].'&r='.$_GET['cid'].'">Responder</a>';

?>