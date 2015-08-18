<div class="main">

	<div class="mainContent">

		<div class="leftColumn">
			<div class="messageSec">
				<input class="search" id="searchInput"
					value="<?php echo $_GET['search']; ?>" name="searchInput"
					type="text" onkeyup="updateSearch()" />
			</div>
			<div class="messageSecBot"></div>
			<br>
			<div class="align">

				<div class="searchOrder">
					<input type="radio" name="type" id="user" checked="checked"
						value="0" onclick="updateSearch()" /> <label for="user"><?php echo $this->getLanguage()->getLine('search-users');?></label>
				</div>
				
				<div class="searchOrder">
					<input type="radio" name="type" id="band"
						value="1" onclick="updateSearch()" /> <label for="band"><?php echo $this->getLanguage()->getLine('search-bands');?></label>
				</div>
			
			<br> <br> <b><?php echo $this->getLanguage()->getLine('user-order');?></b> <br>
				<div class="searchOrder">
					<input type="radio" name="order" id="registro" <?php if(!$this->getUser() || !$this->getUser()->getLocationCoords()) echo 'checked="checked"'; ?>
						value="0" onclick="updateSearch()" /> <label for="registro"><?php echo $this->getLanguage()->getLine('registry-order');?></label>
				</div>
				<div class="searchOrder">
					<input type="radio" name="order" id="fans" value="1"
						onclick="updateSearch()" /> <label for="fans"><?php echo $this->getLanguage()->getLine('fans-order');?></label>
				</div>
				<div class="searchOrder">
					<?php if( !$this->getUser() || !$this->getUser()->getLocationCoords() ){ ?>
					<input type="radio" name="order" id="distance" value="2"
						disabled="disabled" /> <label for="distance"><?php echo $this->getLanguage()->getLine('proximity-order');?> 
					</label><br><?php echo $this->getLanguage()->getLine('location-not-specified-mainsearch');?>
					<?php } else { ?>
					<input type="radio" name="order" id="distance" value="2" checked="checked"
						onclick="updateSearch()" /> <label for="distance"><?php echo $this->getLanguage()->getLine('proximity-order');?> </label>
					<?php } ?>
				</div>
			</div>

			<div class="align"></div>

		</div>

		<div class="centerColumnWide">
			<div class="moduleCon">
				<div class="module" id="mMusicians" style="margin-bottom:20px;">
					<?php 
					$p = new bsPage('mMusicians', $this->getUser());
					$p->show();
					?>
				</div>
				
				<div class="module" id="mSearchBands">
				</div>
			</div>
		</div>

	</div>
</div>
