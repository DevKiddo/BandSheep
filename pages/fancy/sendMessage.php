<?php

if( $_GET['tid'] ){
	$target = new bsUser( $_GET['tid'] );
} elseif( $_GET['tbid'] ) {
	$target = new bsBand( $_GET['tbid'] );
} elseif( !$_GET['r'] ) {
	$p = new bsPage('default');
	$p->redirect();
}

if(get_class($this->getTarget())==='bsUser' && !$this->isTargetOwner()){
	$p = new bsPage('default');
	$p->redirect();
}

if( !$_GET['r'] && $target->isMember( $this->getTarget() ) ) {
	die ($this->getLanguage()->getLine('send-message-yourself'));
}

if(isset($_POST["limitedtextarea"])){
	if($this->getTarget()->sendMessageTo($target, $_POST["limitedtextarea"], $_GET['r'])){
		
		if( $target )
			echo $this->getLanguage()->getLine('send-message').$target->getName();
		else
			$this->reloadParentModule('mMessages');
		
	} else {
		echo $this->getLanguage()->getLine('send-message-error');
	}
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
		<textarea name="limitedtextarea" id="post" cols="60" rows="7"
			onKeyDown="limitText(this.form.limitedtextarea,this.form.countdown,1000);"
			onKeyUp="limitText(this.form.limitedtextarea,this.form.countdown,1000);"></textarea>
		<?php echo $this->getLanguage()->getLine('characters-remaining');?><font size="1"> <input readonly type="text" name="countdown" size="3"
			value="1000"> 
		</font> <input type='submit' name='Submit' value='Submit' />
	</form>
	<br>
</body>
</html>
<?php } ?>