<?php

if($_POST['title']){

	if( $this->getUser()->newBand($_POST["title"]) )
		$this->reloadParentModule('mBands');
	else
		echo $this->getLanguage()->getLine('error-ocurred');


} else {

	?>


<!DOCTYPE form PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
</head>
<body>
	<form method="post" action=""
		enctype="application/x-www-form-urlencoded">
		<input type="text" title="title" name="title" maxlength="40"
			value= <?php echo $this->getLanguage()->getLine('new-band-name')?>
			onfocus="if(this.value == <?php echo $this->getLanguage()->getLine('new-band-name')?>){this.value = '';}"
			type="text"
			onblur="if(this.value == ''){this.value= <?php echo $this->getLanguage()->getLine('new-band-name')?>';}" /> <input
			type='submit' name='Submit' value='Submit' />
	</form>
	<br>
</body>
</html>
<?php } ?>