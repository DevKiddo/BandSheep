<div class="instruments">
	<?php
	
	if( isset($_POST['instrument']) )
		$this->getUser()->newInstrument(new bsInstrument($_POST['instrument']));
	

	foreach($this->getUser()->getInstruments() as $instrument){
		/* @var $instrument bsInstrument */
		echo '<div class="instrument">';
		//TODO: our image.
		echo '<a class="iframe2" href="?page=deleteInstrument&id='.$instrument->getId().'"><img src="http://icongal.com/gallery/image/12634/remove_delete_stop_green.png" /></a>';
		echo $instrument->getName();
		echo '</div>';
			
		$cont++;
	}
	?>
</div>
<form id='settings' action='' method='post' accept-charset='UTF-8'>
	<h2><?php echo $this->getLanguage()->getLine('add-instrument-sminstruments'); ?></h2>
	<input type='hidden' name='submitted' id='submitted' value='1' /> <select
		name="instrument">
		<option value="-1"><?php echo $this->getLanguage()->getLine('instrument-sminstruments'); ?></option>
		<?php 
		foreach(bsInstrument::getInstruments() as $i=>$instrument){
			echo '<option value="'.$i.'"';
			echo '>'.$instrument.'</option>';
		}
		?>
	</select> <input type='submit' name='Submit' value='Submit'
	<?php if($cont>=MAX_INSTRUMENTS_PER_USER) echo 'disabled="disabled"'; ?> />

</form>
<div style="clear: both;"></div>
