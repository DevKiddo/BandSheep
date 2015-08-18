<?php

if($_POST && $this->getTarget()->isMember($this->getUser())){

	switch($this->getTarget()->newVideo($_POST['title'],$_POST["link"])){
		case 1:
			$this->reloadParentModule('mVideos');
			break;
		case -1:
			echo $this->getLanguage()->getLine('newvideo-nonvalid');
			break;
		default:
			echo $this->getLanguage()->getLine('error-ocurred');
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

		<input type="text" title="title" name="title" maxlength="70"
			value="<?php echo $this->getLanguage()->getLine('title-video/sound/post');?>" onfocus="if(this.value == '<?php echo $this->getLanguage()->getLine('title-video/sound/post');?>'){this.value = '';}"
			type="text" onblur="if(this.value == ''){this.value='<?php echo $this->getLanguage()->getLine('title-video/sound/post');?>';}" /> <input
			type="text" title="link" name="link" maxlength="70" value="You Tube URL"
			onfocus="if(this.value == 'You Tube URL'){this.value = '';}" type="text"
			onblur="if(this.value == ''){this.value='You Tube URL';}" /> <br> <input
			type='submit' name='Submit' value='<?php echo $this->getLanguage()->getLine('submit-video/sound/post/feedback')?>' />
	</form>
	<br>
</body>
</html>
<?php } ?>