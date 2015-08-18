<?php

if($_POST && $this->getTarget()->isMember($this->getUser())){

	switch( $this->getTarget()->newSound($_POST["link"]) ){
		case 1:
			$this->reloadParentModule('mSounds');
			break;
		case 0:
			die ($this->getLanguage()->getLine('newsound-error'));
			break;
		case -2:
			die ($this->getLanguage()->getLine('newsound-nonvalidurl'));
	}


} else {

	?>


<!DOCTYPE form PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
</head>
<body>
	<form method="post" action=""
		enctype="application/x-www-form-urlencoded">

		<input type="text" title="link" name="link" maxlength="70" value="SoundCloud URL" onfocus="if(this.value == 'SoundCloud URL'){this.value = '';}" type="text"
			onblur="if(this.value == ''){this.value='SoundCloud URL';}" /> <br> <input
			type='submit' name='Submit' value='<?php echo $this->getLanguage()->getLine('submit-video/sound/post/feedback')?>' />
	</form>
	<br>
</body>
</html>
<?php } ?>