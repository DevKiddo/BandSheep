<?php

if($_POST){

	if(!$_POST['title'] && !$_POST['limitedtextarea']){
		if( $this->getTarget()->deletePost($_GET['postID']) )
			//Reloads module.
			$this->reloadParentModule('mBlog');
		else
			echo $this->getLanguage()->getLine('error-message');
	} else {
		if( $this->getTarget()->editPost($_GET['postID'], $_POST['title'], $_POST['limitedtextarea']) )
			//Reloads module.
			$this->reloadParentModule('mBlog');
		else
			die($this->getLanguage()->getLine('error-ocurred'));
	}

} else {

	$post = $this->getTarget()->getPostByID($_GET['postID']);
	
	if(!$post)
		die($this->getLanguage()->getLine('post-not-found'));

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
			value="<?php echo $post->getTitle(); ?>" />
		<textarea name="limitedtextarea" id="post" cols="60" rows="7"
			onKeyDown="limitText(this.form.limitedtextarea,this.form.countdown,1000);"
			onKeyUp="limitText(this.form.limitedtextarea,this.form.countdown,1000);"><?php echo $post->getBody(); ?></textarea>
		<?php echo $this->getLanguage()->getLine('characters-remaining');?><font size="1"> <input readonly type="text" name="countdown" size="3"
			value="<?php echo 1000-strlen($post->getBody()); ?>">
		</font> <input type='submit' name='Submit' value='Submit' />
	</form>
	<form method="post" action=""
		enctype="application/x-www-form-urlencoded">
		<input type='submit' name='Delete' value='Borrar' />
	</form>
	<br>
</body>
</html>

<?php } ?>