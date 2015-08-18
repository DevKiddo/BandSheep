<?php
if( $_POST['email'] || $_POST['password'] ){

	if( !$_POST['email'] || !$_POST['password'] ){

		$error = bsPage::getLanguage()->getLine('all-fields-required');
			

	} else {
		//Get ID from user matching the data.
		switch($usrID = userIDFromLogin($_POST['email'], $_POST['password'])){
			case 0:
				$error = bsPage::getLanguage()->getLine('incorrect-login');
				break;

			case (is_int(strpos($usrID, "-"))):
				//Hacer positivo el usrID
				$usrID = str_replace('-','',$usrID);
				$error = bsPage::getLanguage()->getLine('account-not-validated').'. <a href="?page=sendValidation&uid='.$usrID.'">'.bsPage::getLanguage()->getLine('resend-email').'</a>';
				break;

			default:
				//Correct data, proceed to log in.
				logInId( $usrID );
				//Reload parent page.
				die( '<script>
						parent.location.reload(true);
						self.close();
						</script>' );
		}
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BandSheep</title>
<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$('.connect').click(function(){
		window.open(this.href, this.target, 'width=400,height=300');
		return false;
	});
});
</script>

<style type="text/css">
#login div {
	padding-bottom: 10px;
}

#login a {
	float: right;
}

.errorMessage {
	color: red;
	padding-bottom: 10px;
}
</style>

</head>

<body style="margin: 0; padding-top: 5px; padding-bottom: 10px;">
	<div class="loginForm">
		<form id='login' action='' method='post' accept-charset='UTF-8'>
			<div>
				<input type='hidden' name='submitted' id='submitted' value='1' /> <input
					type='text' name='email' id="email" class="greenInput"
					maxlength="70" placeholder="Email" /> <a class="connect"
					tabindex="-1" href="?page=connect&s=facebook"><img
					src="images/facebook_login.png"> </a>
			</div>

			<div>
				<input type='password' name='password' id="password"
					class="greenInput" maxlength="50"
					placeholder="<?php echo bsPage::getLanguage()->getLine('password-login'); ?>" />
				<a class="connect" tabindex="-2" href="?page=connect&s=google"><img
					src="images/google_login.png" width=150px> </a>
			</div>

			<div style="padding-bottom: 0; margin-top: 10px">
				<input type='submit' name='Submit' value='Log In' /> <a
					href="?page=register"
					title="<?php echo bsPage::getLanguage()->getLine('register-login'); ?>"><img
					src="images/email_login.png" /> </a> <a href="?page=forgot"
					style="float: none; margin-left: 5px"> <?php echo bsPage::getLanguage()->getLine('remember-password-login'); ?>
				</a>
			</div>

		</form>
	</div>
	<?php if(isset($error)) { ?>
	<div class="errorMessage">
		<?php echo $error; ?>
	</div>
	<?php } ?>
</body>
</html>
