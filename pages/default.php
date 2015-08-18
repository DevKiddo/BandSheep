
<div class="main">

	<div class="mainContent">

	<?php if( $bof = bsBand::getBandsOnFire(0, 20) ){ ?>
		<h2 class="bofLabel"><?php echo $this->getLanguage()->getLine('bands-on-fire-default');?></h2>

		<div class="ContentFlow">
			<div class="loadIndicator">
				<div class="indicator"></div>
			</div>
			<div class="flow">
				<?php 
				foreach($bof as $band){
                		echo '<img class="item" href="?page=band&bid='.$band->getId().'" src="'.$band->getImage()->getMedium().'" title="'.$band->getName().'"/>
					';
					}
					?>
			</div>
			<div class="globalCaption"></div>
			<!--             <div class="scrollbar"><div class="slider"><div class="position"></div></div></div> -->
		</div>
	<?php } ?>
		
		<div class="leftColumn" style="width:260px;margin-top:-10px">
			<div class="align">
				<div class="moduleCon">
					<div class="module" id="mMusicians"></div>
				</div>
			</div>
		</div>

		
		<div class="rightColumn">
			<div class="moduleCon">
				<div class="module" id="mSearchBands"></div>
			</div>
		</div>

		<div class="centerColumn" style="margin:0px 0px 0px 267px;width:410px;">
			<div id="mapCanvas" style="width:420px;height:420px;position:relative;"></div>
		</div>
		<div style="clear: both;"></div>
	</div>
</div>
