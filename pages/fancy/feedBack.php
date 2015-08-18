<?php
require_once('/var/www/BS_dev/includes/recaptchalib.php');
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
<body style="padding-bottom:40px;">
	<div style="border-radius: 8px;border-color: green;border-style: solid;border-width: 4px;">
		<div style="width: auto;background: green;height: 30px;margin-top: 0px;color: white;text-align: center;font-family: Lucida Grande,Lucida Sans Unicode,Lucida Sans,Verdana,Tahoma,sans-serif; font-size: 18px;" class="greenTitleFeedBack">
			FeedBack
		</div>
		<font color="red">
		<?php
		if(isset($_POST["limitedtextarea"])){
			if($_POST["subject"] && $_POST["limitedtextarea"] && $_POST["name"] && $_POST["email"] && $_POST["rate"]){
				
				
				//Catpcha check.
				$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
				
				if( !$resp->is_valid )
					die( $this->getLanguage()->getLine('invalid-captcha') );
				
				$message = "\nFrom: ".$_POST["name"]."\n Email: ".$_POST["email"]."\n\n Rate: ".$_POST["rate"]."\n\n Message: ".$_POST["limitedtextarea"]."";
				
				if(bsMail('bandsheepmail@gmail.com', $_POST["subject"], $message, $_POST["name"], "feedback")) {
					echo $this->getLanguage()->getLine('send-correct-feedback');
				} else {
					echo $this->getLanguage()->getLine('error-ocurred');
				}
				
			} else {
				echo $this->getLanguage()->getLine('all-fields-required');
			}
		}
		?>
		</font><br>
		<form method="post" action="" enctype="application/x-www-form-urlencoded" style="padding: 5px;">
			<?php echo $this->getLanguage()->getLine('name-form');?> <input type="text" name="name" /><br>
			Email: <input type="text" name="email" /><br>
			<?php echo $this->getLanguage()->getLine('rate-form');?><br>
					<input type="radio" name="rate" value="1">1
					<input type="radio" name="rate" value="2">2
					<input type="radio" name="rate" value="3">3
	 				<input type="radio" name="rate" value="4">4
	 				<input type="radio" name="rate" value="5">5
	 				<input type="radio" name="rate" value="6">6
	 				<input type="radio" name="rate" value="7">7
	 				<input type="radio" name="rate" value="8">8
	 				<input type="radio" name="rate" value="9">9
	 				<input type="radio" name="rate" value="10">10<br><br>
	 				
			<?php echo $this->getLanguage()->getLine('subject-form');?><input type="text" name="subject"><br><br>
			<b><?php echo $this->getLanguage()->getLine('comments-form');?></b>
			<textarea name="limitedtextarea" id="post" cols="55" rows="4"
				onKeyDown="limitText(this.form.limitedtextarea,this.form.countdown,1000);"
				onKeyUp="limitText(this.form.limitedtextarea,this.form.countdown,1000);"></textarea>
			<?php echo $this->getLanguage()->getLine('characters-remaining');?> <font size="1"> <input readonly type="text" name="countdown" size="3"
				value="1000"> 
				
				<?php
					echo recaptcha_get_html($publickey);
		        ?>
				
				
			</font> <input type='submit' name='Submit' value= <?php echo $this->getLanguage()->getLine('submit-video/sound/post/feedback');?> />
		</form>
	</div>
	<br>
</body>
</html>