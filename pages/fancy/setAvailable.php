<?php

if( $this->getTarget()->updateAvailable( !$this->getTarget()->isAvailable() ) ){
	
	echo
	'
	<script>
		parent.$("#availableSwitch").prop("checked",'. ( $this->getTarget()->isAvailable() ? 'true':'false' ) .');
	</script>
	';
	$this->closeFancy();
	
} else
	die($this->getLanguage()->getLine('error-ocurred'));

?>