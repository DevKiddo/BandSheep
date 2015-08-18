<link href="style.css" rel="stylesheet" type="text/css">
<div class="instruments">
	<?php
	
	if( isset($_POST['genre']) )
		$this->getTarget()->newGenre(new bsGenre($_POST['genre']));
	elseif( isset($_GET['genre']) )
		$this->getTarget()->deleteGenre(new bsGenre($_GET['genre']));
	

	foreach($this->getTarget()->getGenres() as $genre){
		/* @var $instrument bsGenre */
		echo '<div class="instrument">';
		//TODO: our image.
		echo '<a class="iframe2" href="?page=setGenres&genre='.$genre->getId().'"><img style="width:25px;height:25px;" src="http://icongal.com/gallery/image/12634/remove_delete_stop_green.png" /></a>';
		echo $genre->getName();
		echo '</div>';
			
		$cont++;
	}
	?>
</div>
<form id='settings' action='' method='post' accept-charset='UTF-8'>
	<h2><?php echo $this->getLanguage()->getLine('add-genres'); ?></h2>
	<input type='hidden' name='submitted' id='submitted' value='1' /> <select
		name="genre">
		<option value="-1"><?php echo $this->getLanguage()->getLine('genres'); ?></option>
		<?php 
		foreach(bsGenre::getPre() as $i=>$genre){
			echo '<option value="'.$i.'"';
			echo '>'.$genre[0].'</option>';
		}
		
		echo '<option value="-1"> </option>';
		
		foreach(bsGenre::getPost() as $i=>$genre){
			echo '<option value="'.$i.'"';
			echo '>'.$genre[0].'</option>';
		}
		?>
	</select> <input type='submit' name='Submit' value='Submit'
	<?php if($cont>=MAX_INSTRUMENTS_PER_USER) echo 'disabled="disabled"'; ?> />

</form>
