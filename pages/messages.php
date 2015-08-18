
<div class="main">

	<div class="mainContent">

		<div class="leftColumn">
			<a style="margin-left: 100px;" class="iframe2" href="?page=newMessage&bid=<?php echo $_GET['bid'];?>"><?php echo $this->getLanguage()->getLine('new-message');?></a><br /> 
			<div class="messageSec" onclick="window.location='?page=messages'"> 
		    <?php
		    	if( $this->getUser()->unreadMessages() )
		    		echo '<div class="notNumber2">'.$this->getUser()->unreadMessages().'</div>';
		    	
				echo $this->getLanguage()->getLine('personal-msg');
			?>
			</div>
			<div class="messageSecBot"></div>
			
			<?php foreach($this->getUser()->getBands() as $b){
				
				echo '<div class="messageSec" onclick="window.location=\'?page=messages&bid='.$b->getId().'\'">';
					
				if( $b->unreadMessages() )
					echo '<div class="notNumber2">'.$b->unreadMessages().'</div>';
				
				echo $b->getName().'</div><div class="messageSecBot"></div>';
				
			} ?>

			<div class="align"></div>

		</div>

		<div class="centerColumnWide">
				<?php //echo $this->getLanguage()->getLine('inbox');?>
			<div class="mes_block">
			<div class="moduleCon">
				<div class="module" id="mMessages">
					<?php 
					$p = new bsPage('mMessages', $this->getUser(), $this->getTarget()); 
					$p->show();
					?> 
				</div>
			</div>
			</div>

		</div>
		
		<div style="clear: both;"></div>

	</div>
</div>
