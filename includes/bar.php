<div class="top">
	<div class="topBar" id="topBar">
		<div class="topBarContent">

			<ul class="menu alignRight">

				<?php if($this->getUser()) { ?>
				
				<li class="logged">
					
					<div class="uMenu">
						<div><a href="?page=messages" title="<?php echo $this->getLanguage()->getLine('inbox-menu');?>"><img style="margin-top: -7px; margin-bottom: 6px;" src="images/icon/mm.png"></a></div>
						<div><a href="?page=settings" title="<?php echo $this->getLanguage()->getLine('settings-menu');?>"><img style="margin-top: -8px; margin-bottom: 6px;" src="images/icon/gm.png"></a></div>
						<div><a href="?session=logOut" title="<?php echo $this->getLanguage()->getLine('logout-menu');?>"><img style="margin-top: -8px; margin-bottom: 6px;" src="images/icon/dm.png"></a></div>
					</div>
			
				<?php } else { ?>
				<li>
				<?php } ?>
					
				<?php
				if(!$this->getUser())
					echo '<a class="iframe2" href="?page=login">Log In / Sign Up</a>';
				else {
					if( $this->getUser()->unreadMessagesRecursively() )
						echo '<div class="notNumber">'.$this->getUser()->unreadMessagesRecursively().'</div>';
					
					$n = $this->getUser()->getName();
					
					$n = explode(" ", $n);
					foreach($n as $p){
						if( strlen($name.$p) < 14 )
							$name.= ' '.$p;
					}
					
					if( !$name )
						$name = substr($n[0], 0, 19);
					
					echo '<img src="'.$this->getUser()->getImage()->getXSmall().'" /><a href="?page=profile" title="'.$this->getLanguage()->getLine('profile-menu').'">'.$name.'</a>';
				}
				?>
				</li>

			</ul>


			<ul class="menu">
				<li onclick="window.location='?page='" class="logo"></li>

				<li class="menuOptions" onclick="window.location='?page=musicians'"><a
				<? if($this->getName() == 'musicians') echo ' class="secActual"' ?>
					href="?page=musicians"><?php echo $this->getLanguage()->getLine('musicians-bar');?></a></li>
				
				<li class="menuOptions" onclick="window.location='?page=bands'"><a
				<? if($this->getName() == 'bands') echo ' class="secActual"' ?>
					href="?page=bands"><?php echo $this->getLanguage()->getLine('bands-bar');?></a></li>

				<?php if($this->getName() != 'search') { ?>
				<li class="search">
					<form id='search' action='?page=search' method='get'
						accept-charset='UTF-8'>
						<input type='hidden' name='page' id='page' value='search' />
						<input name="search" id="search" type="text" placeholder= "<?php echo $this->getLanguage()->getLine('search-bar');?>" />
					</form>
				</li>
				<?php } ?>
					
			</ul>
		</div>
	</div>
</div>

	<div class="feedback">
		<a class="iframe2" href="?page=feedBack">
				<img src="http://i.imgur.com/VT9sBEf.png">
		</a>
	</div>


