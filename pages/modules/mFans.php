<?php 

if( $numFans = $this->getTarget()->getNumberFans() )
	$fans = $this->getTarget()->getFans(0,20);

?>

<div class="block">
	<div class="bar">
	<?php 
	if($numFans == 1)
		echo 'Fan ('.$numFans.')';
	else
		echo 'Fans ('.$numFans.')'; 
	?>
	</div>
	<div class="blockContent">
		<?php
		if(!isset($fans))
			echo $this->getLanguage()->getLine('no-fan-message');
		else {
			echo '<div class="fansBlock">';
			foreach($fans as $f){
				//echo '<div class="fan">';
				echo '<a href="?page=profile&id='.$f->getId().'"><img src="'.$f->getImage()->getThumbnail().'" width="60" height="60" onmouseover="return overlib(\''.addslashes($f->getName()).'\');" onmouseout="return nd();"></a>';
				//echo '</div>';
			}
			echo '</div>';
		}
		?>
	</div>
</div>
