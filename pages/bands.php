
<div class="main">

	<div class="mainContent">

		<?php if( $bof = bsBand::getBandsOnFire(0, 20) ){ ?>
		<h2 class="bofLabel">
			<?php echo $this->getLanguage()->getLine('bands-on-fire-bands');?>
		</h2>

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

		<div class="leftColumn">
			<?php if($this->getUser()){ ?>
			<div class="module" id="mBands">
				<?php
				$p = new bsPage('mBands', $this->getUser());
				$p->show();
				?>
			</div>

			<?php if( $rb = $this->getUser()->getRecommendedBands() ){ ?>
			<div class="block">
				<div class="bar">
					<?php echo $this->getLanguage()->getLine('recommended-bands');?>
				</div>
				<div class="blockContent">
					<?php
					echo '<div class="fansBlock">';
					foreach( $rb as $band ){
						echo '<a href="?page=band&bid='.$band->getId().'"><img src="'.$band->getImage()->getThumbnail().'" width="60" height="60" onmouseover="return overlib(\''.addslashes($band->getName()).'\');" onmouseout="return nd();"></a>';
					}
					echo '</div>';
					//
					?>
				</div>
			</div>
			<?php } ?>

			<?php } ?>

		</div>

		<div class="rightColumn">

			<?php if($this->getUser() && !$this->getUser()->getLocationCoords())
					echo $this->getLanguage()->getLine('put-location-musicians').'<a class="iframe3" href="?page=setLocation">'.$this->getLanguage()->getLine('here-location-musicians').'</a>'; ?>

			<div id="mapCanvas"></div>

			<div class="block">
				<div class="bar">
					<?php echo $this->getLanguage()->getLine('random-bands');?>
				</div>
				<div class="blockContent" id="block">
					<div class="fansBlock">
						<?php
						foreach(bsBand::getRandomBands(8) as $band){
							echo '<a href="?page=band&bid='.$band->getId().'"><img src="'.$band->getImage()->getThumbnail().'" width="60" height="60" onmouseover="return overlib(\''.addslashes($band->getName()).'\');" onmouseout="return nd();"></a>';
						}
						?>
					</div>
				</div>
			</div>

		</div>

		<div class="centerColumn">

			<input class="searchDefault" id="searchInput" name="searchInput"
				type="text"
				placeholder="<?php echo $this->getLanguage()->getLine('band-name');?>"
				style="margin-bottom: 10px">

			<div class="moduleCon">

				<div class="module" id="mSearchBands">
					<?php
					$p = new bsPage('mSearchBands', $this->getUser());
					$p->show();
					?>
				</div>

			</div>

		</div>

		<div style="clear: both;"></div>

	</div>
</div>
