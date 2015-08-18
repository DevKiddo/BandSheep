<?php

if( $numFanOf = $this->getTarget()->getNumberFanOf() )
	$fanOf = $this->getTarget()->getFanOf(0,20);

?>

<div class="block">
	<div class="bar">
		<?php echo $this->getLanguage()->getLine('is-fan-of');?> (
		<?php echo $numFanOf; ?>
		)
	</div>
	<div class="blockContent">
		<?php
		if(!isset($fanOf))
			echo $this->getLanguage()->getLine('not-following');
		else {
			echo '<div class="fansBlock">';
			foreach($fanOf as $f){
				
				echo '<a href="?page=profile&id='.$f->getId().'"><img src="'.$f->getImage()->getThumbnail().'" width="60" height="60" onmouseover="return overlib(\''.addslashes($f->getName()).'\');" onmouseout="return nd();"></a>';
				
			}
			echo '</div>';
		}
		?>
	</div>
</div>
