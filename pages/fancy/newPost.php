<?php

if(!(empty($_POST)) && $this->getTarget()->isMember($this->getUser())){

	if( $this->getTarget()->newPost($_POST["title"],$_POST["limitedtextarea"]) )
		$this->reloadParentModule('mBlog');
	else
		echo $this->getLanguage()->getLine('error-ocurred');
} else {

	?>


<!DOCTYPE form PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>
</head>
<body>
	<form method="post" action=""
		enctype="application/x-www-form-urlencoded">
		<input type="text" title="title" name="title" maxlength="40"
			value="<?php echo $this->getLanguage()->getLine('title-video/sound/post');?>" onfocus="if(this.value == '<?php echo $this->getLanguage()->getLine('title-video/sound/post');?>'){this.value = '';}"
			type="text" onblur="if(this.value == ''){this.value='<?php echo $this->getLanguage()->getLine('title-video/sound/post');?>';}" />
		<textarea name="limitedtextarea" id="post" cols="55" rows="5"
			onKeyDown="limitText(this.form.limitedtextarea,this.form.countdown,1000);"
			onKeyUp="limitText(this.form.limitedtextarea,this.form.countdown,1000);"></textarea>
		<?php echo $this->getLanguage()->getLine('characters-remaining');?><font size="1"> <input readonly type="text" name="countdown" size="3"
			value="1000"> 
		</font> <input type='submit' name='Submit' value='<?php echo $this->getLanguage()->getLine('submit-video/sound/post/feedback')?>' />
	</form>
	<br>
</body>
</html>
<?php } ?>