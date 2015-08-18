<div class="main">

	<div class="mainContent">
		
		<div class="leftColumn">
			
			<div class="fixedColumn" style="margin-top:20px;">
	
				<?php 
				if($this->getUser()){?>
				<div class="personal" style="margin-bottom: 20px;">
	
					<a href="?page=profile"><?php $this->getUser()->getImage()->showThumbnail(60, 60);	?></a> <a href="?page=profile"><?php echo $this->getUser()->getName(); ?>
					</a>
					<div class="subName">
						<?php
						$l = new bsList($this->getUser()->getInstruments(), 'getName', $this->getLanguage()->getLine('no-instrument-musicians'));
						$l->show();
						?>
					</div>
				</div>
				<div class="personalDecorBot" style="margin-top: -20px;"></div>
	
				<div class="module" id="mBands">
					<?php
					$p = new bsPage('mBands', $this->getUser());
					$p->show();
					?>
				</div>
				
				<?php } ?>
	
			</div>
	
		</div>

		<div class="rightColumn">

			<div class="fixedColumn" style="margin-top:20px;">

			<?php if($this->getUser() && !$this->getUser()->getLocationCoords())
					echo $this->getLanguage()->getLine('put-location-musicians').' <a class="iframe3" href="?page=setLocation">'.$this->getLanguage()->getLine('here-location-musicians').'</a>'; ?>
			
				<div id="mapCanvas"></div>

				<div class="block">
					<div class="bar"><?php echo $this->getLanguage()->getLine('bands-on-fire-musicians'); ?></div>
					<div class="blockContent">
						<?php
						echo '<div class="fansBlock">';
						foreach(bsBand::getBandsOnFire(0, 4) as $band){
							echo '<a href="?page=band&bid='.$band->getId().'"><img src="'.$band->getImage()->getThumbnail().'" width="60" height="60" onmouseover="return overlib(\''.addslashes($band->getName()).'\');" onmouseout="return nd();"></a>';
						}
						echo '</div>';
						?>
					</div>
				</div>

			</div>

		</div>

		<div class="centerColumn">

			<input class="searchDefault" id="searchInput" name="searchInput"
				type="text" placeholder= "<?php echo $this->getLanguage()->getLine('main-search-musicians');?>"/>
			
			<div class="moduleCon">

				<div class="module" id="mMusicians"></div>

			</div>

		</div>

		<div style="clear: both;"></div>

	</div>
</div>
