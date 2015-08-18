<?php

if( !$this->getTarget() ){
	$r = new bsPage();
	$r->redirect();
}

?>

<div class="main">

	<div class="mainContent">

		<div class="leftColumn">

			<div class="profTop">
				<?php
				echo $this->getTarget()->getName();
				?>
			</div>
			<div class="personalProf">

				<div class="moduleCon">
					<div class="module" id="mImage">
						<?php
							$p = new bsPage('mImage',$this->getTarget());
							$p->show();
						?>
					</div>
				</div>

				<div class="buttons">
					<?php
					/* Zona de botones */
					if( !$this->isTargetOwner() ){
						// Boton de mensaje.
						echo '<div class="button"><a class="iframe2" title="'.$this->getLanguage()->getLine('send-message-profile').'" href="?page=sendMessage&tid='.$this->getTarget()->getId().'"><img src="images/icon/message.png" /></a></div>';
						// Boton de fan.
						echo '<div class="button"><a class="iframe2" href="?page=becomeFan&id='.$this->getTarget()->getId().'">
						<img src="images/icon/fan'.((!$this->getUser())?'':$this->getUser()->isFanOf($this->getTarget())).'.png" />
						</a></div>';
					} else {
						//Botón de cambio de imagen.
						echo '<div class="button"><a class="iframeImage" href="?page=imageUpload"><img src="images/icon/pic.png" /></a></div>';
					}
					?>
				</div>
			</div>
			<div class="personalDecorBot"></div>

			<div class="profInfo">
	                <?php
	                if( $this->getTarget()->isAvailable() && !$this->isTargetOwner() ) {
	                	echo '<div class="isAvailable">';
		               	echo $this->getLanguage()->getLine('is-available');
	                	echo '</div>';
	                }
					?>
					
				<div class="profInfoSec">
					<?php echo $this->getLanguage()->getLine('is-old');?>
					<?php echo '<b>'.$this->getTarget()->getAge().'</b>';?>
					<?php echo $this->getLanguage()->getLine('years-old');?>
				</div>
				<div class="profInfoSec">
					<?php
					
					if($this->isTargetOwner())
						echo '<a class="iframe3" href="?page=setLocation">'.$this->getLanguage()->getLine('edit').'</a>';
					
					if( $this->getTarget()->getCity() )
						echo $this->getLanguage()->getLine('lives-in-profile').'<b>'.$this->getTarget()->getCity().'</b>';
					else {
						echo $this->getLanguage()->getLine('location-not-specified');
					}
					?>.
				</div>
				<div class="profInfoSec">
					<?php
					if( $this->isTargetOwner() )
						echo '<a href="?page=settings&option=2">'.$this->getLanguage()->getLine('edit').'</a>';
					
					$l = new bsList( $this->getTarget()->getInstruments(), 'getName', $this->getLanguage()->getLine('no-instrument-profile') );
					$l->show();
					?>
				</div>
				<div class="profInfoSec">
					<?php

					if( $this->isTargetOwner() )
						echo '<a class="iframe2" href="?page=setGenres">'.$this->getLanguage()->getLine('edit').'</a>';
					
					if( count( $this->getTarget()->getGenres() ) > 0 ){
						foreach ( $this->getTarget()->getGenres() as $i=>$g ){
							if($i==0)
								echo '<b>';
							else
								echo ', ';
							
							echo $g->getName();
						}
						echo '</b>.';
						
					} else
						echo $this->getLanguage()->getLine('no-genre-profile');
					?>
				</div>
				<div class="profInfoSec">
					<div id="mBio">
					<?php
						$p = new bsPage('mBio', $this->getUser(), $this->getTarget());
						$p->show();
					?>
					</div>
				</div>
			</div>
			
			<div class="align">
			<?php
			if($this->isTargetOwner()){
			?>
				<div class="iframe2" href="?page=setAvailable" style="float: right;" onmouseover="return overlib('<?php echo $this->getLanguage()->getLine('profile-switch-expl') ?>');" onmouseout="return nd();">
					<div class="onoffswitch">
					<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="availableSwitch" <?php if($this->getTarget()->isAvailable()) echo 'checked'; ?>>
						<label class="onoffswitch-label" for="myonoffswitch">
							<div class="onoffswitch-inner"></div>
							<div class="onoffswitch-switch"></div>
						</label>
					</div>
				</div>
			<?php }
				if($this->isTargetOwner() || $this->getTarget()->getBands())
					echo '<h2>'.bsPage::getLanguage()->getLine("search-bands").'</h2>';
			?>
			</div>
			<div class="module" id="mBands" style="margin-top:10px">
			<?php 
			$p = new bsPage('mBands', $this->getUser(), $this->getTarget());
			$p->show();			
			?>
			</div>

		</div>
		<div class="rightColumn">

			<div class="moduleCon">
				<div class="module" id="mFans">
					<?php
						$p = new bsPage('mFans', $this->getUser(), $this->getTarget());
						$p->show();
					?>
				</div>
			</div>

			<div class="moduleCon">
				<div class="module" id="mFanOf">
					<?php
						$p = new bsPage('mFanOf', $this->getTarget());
						$p->show();
					?>
				</div>
			</div>
			
			<div class="fb-like" data-send="false" data-width="250" data-show-faces="true"></div>

		</div>

		<div class="centerColumn">

			<div class="profVideosTop">
				<b><?php echo $this->getLanguage()->getLine('profile-pre-videos');?><?php echo $this->getTarget()->getName();?><?php echo $this->getLanguage()->getLine('profile-pos-videos');?></b>
				<?php
				if($this->isTargetOwner()) {
				?>
				<div class="newPost">
					<a class="iframe2" href="?page=newVideo"><?php echo $this->getLanguage()->getLine ('new-video-profile');?></a>
				</div>
				<?php } ?>

			</div>
			<div class="moduleCon">
				<div class="module" id="mVideos">
					<?php
						$p = new bsPage('mVideos', $this->getUser(), $this->getTarget());
						$p->show();
					?>
				</div>
			</div>
			
			<div class="profVideosTop" style="margin-top: 15px">
				<b><?php echo $this->getLanguage()->getLine('profile-pre-sounds');?><?php echo $this->getTarget()->getName();?><?php echo $this->getLanguage()->getLine('profile-pos-sounds');?></b>
				<?php
				if($this->isTargetOwner()) {
				?>
				<div class="newPost" id="newSound">
					<a class="iframe2" href="?page=newSound"><?php echo $this->getLanguage()->getLine('new-sound-profile');?></a>
				</div>
				<?php } ?>

			</div>
			<div class="moduleCon">
				<div class="module" id="mSounds">
				<?php 
					$p = new bsPage('mSounds', $this->getUser(), $this->getTarget());
					$p->show();
				?>
				</div>
			</div>

			<div class="profileBlog">
				<div class="profileBlogTop">
					<b><?php echo $this->getLanguage()->getLine('profile-pre-blog');?><?php echo $this->getTarget()->getName();?><?php echo $this->getLanguage()->getLine('profile-pos-blog');?>
					</b>
					<?php
					if($this->isTargetOwner()) {
						?>
					<div class="newPost">
						<a class="iframe2" href="?page=newPost"><?php echo $this->getLanguage()->getLine('new-post-profile');?></a>
					</div>
					<?php } ?>

				</div>

				<div class="moduleCon">
					<div class="module" id="mBlog">
						<?php
							$p = new bsPage('mBlog', $this->getUser(), $this->getTarget());
							$p->show();
						?>
					</div>
				</div>

			</div>

		</div>
		
		<div style="clear: both;"></div>

	</div>
</div>
