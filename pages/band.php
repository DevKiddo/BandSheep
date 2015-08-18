<?php

$isMember = $this->getTarget()->isMember( $this->getUser() );

?>

<div class="main">

	<div class="mainContent">

		<div class="leftColumn">

			<div class="profTop">
				<?php echo $this->getTarget()->getName(); ?>
			</div>                  
			<div class="personalProf">

				<div class="moduleCon">
					<div class="module" id="mImage">
						<?php //
							$p = new bsPage('mImage',$this->getTarget());
							$p->show();
						?>
					</div>
				</div>

				<div class="buttons">
					<?php
					/* Zona de botones */
					if($isMember){
						//Botón de cambio de imagen.
						echo '<div style="display:none"><a class="iframeImage" href="?page=imageUpload&bid='.$this->getTarget()->getId().'"></a></div>';
						echo '<div class="button" style="cursor: pointer;" onclick=\'$("a.iframeImage").trigger("click")\'><img src="images/icon/pic.png" /></div>';
					} else {
						// Boton de mensaje.
						echo '<div class="button"><a class="iframe2" href="?page=sendMessage&tbid='.$this->getTarget()->getId().'"><img src="images/icon/message.png" alt="Enviar un mensaje"/></a></div>';
						// Boton de fan.
						echo '<div class="button">';
						echo '<a class="iframe2" href="?page=becomeFan&bid='.$this->getTarget()->getId().'">
						<img src="images/icon/fan'.((!$this->getUser())?'':$this->getUser()->isFanOf($this->getTarget())).'.png" />
						</a></div>';
					}
					?>
				</div>
			</div>
			<div class="personalDecorBot"></div>

			<div class="profInfo">
				<div class="profInfoSec">
					<?php

					if($this->isTargetOwner())
						echo '<a class="iframe3" href="?page=setLocation&bid='.$this->getTarget()->getId().'">'.$this->getLanguage()->getLine('edit').'</a>';
					
					if( $this->getTarget()->getCity() )
						echo '<b>'.$this->getTarget()->getCity().'</b>';
					else
						echo $this->getLanguage()->getLine('location-not-specified');
					?>.
				</div>
				
				<div class="profInfoSec">
					<?php

					if( $this->isTargetOwner() )
						echo ' <a class="iframe2" href="?page=setGenres&bid='.$_GET['bid'].'">'.$this->getLanguage()->getLine('edit').'</a>';
					
					if( count( $this->getTarget()->getGenres() ) > 0 ){
						foreach( $this->getTarget()->getGenres() as $i=>$g ){
							if($i==0)
								echo '<b>';
							else
								echo ' ';
							
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
				
			<div class="fansBlock">
				<?php
				foreach( $this->getTarget()->getMembers() as $m )
					echo '<a href="?page=profile&id='.$m->getId().'"><img src="'.$m->getImage()->getThumbnail().'" width="60" height="60" onmouseover="return overlib(\''.$m->getName().'\');" onmouseout="return nd();"></a>';
				
				if($isMember)
					echo '<a class="iframe2" title="'.$this->getLanguage()->getLine('invite-band').'" href="?page=newMember&bid='.$this->getTarget()->getId().'"><img src="images/icon/addUser.png" alt="'.$this->getLanguage()->getLine('invite-band').'" /></a>';
				
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
			
			<?php 
			if( $this->getTarget()->getSimilarBands() ){
			?>
			
			<div class="block">
				<div class="bar"><?php echo $this->getLanguage()->getLine('similar-bands'); ?></div>
				<div class="blockContent">
					<?php
						echo '<div class="fansBlock">';
						foreach( $this->getTarget()->getSimilarBands() as $band ){
							echo '<a href="?page=band&bid='.$band->getId().'"><img src="'.$band->getImage()->getThumbnail().'" width="60" height="60" onmouseover="return overlib(\''.addslashes($band->getName()).'\');" onmouseout="return nd();"></a>';
						}
						echo '</div>';
					?>
				</div>
			</div>
			
			<?php } ?>
			
			<div class="fb-like" data-send="false" data-width="250" data-show-faces="true"></div>
	
		</div>

		<div class="centerColumn">
			<div class="profVideosTop">
				<b><?php echo $this->getLanguage()->getLine('band-pre-videos');?><?php echo $this->getTarget()->getName();?><?php echo $this->getLanguage()->getLine('band-pos-videos'); ?></b>
				<?php
				if($isMember) {
				?>
				<div class="newPost">
					<a class="iframe2" href="?page=newVideo&bid=<?php echo $this->getTarget()->getId(); ?>"><?php echo $this->getLanguage()->getLine ('new-video-band');?></a>
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
				<b><?php echo $this->getLanguage()->getLine('band-pre-sounds');?><?php echo $this->getTarget()->getName();?><?php echo $this->getLanguage()->getLine('band-pos-sounds'); ?></b>
				<?php
				if($isMember) {
				?>
				<div class="newPost" id="newSound">
					<a class="iframe2" href="?page=newSound&bid=<?php echo $this->getTarget()->getId(); ?>"><?php echo $this->getLanguage()->getLine('new-sound-band');?></a>
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
					<b><?php echo $this->getLanguage()->getLine('band-pre-blog');?><?php echo $this->getTarget()->getName();?><?php echo $this->getLanguage()->getLine('band-pos-blog');?></b>
					<?php
					if($isMember) {
						?>
					<div class="newPost">
						<a class="iframe2" href="?page=newPost&bid=<?php echo $this->getTarget()->getId(); ?>"><?php echo $this->getLanguage()->getLine('new-post-band');?></a>
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
