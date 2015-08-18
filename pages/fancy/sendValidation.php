<?php
$uid = $_GET['uid'];
if($_GET['uid']){
	if ($return = getUserInfo($uid)) {
		$code = $return['user_code'];
		$email = $return['user_email'];
		if($return['user_active'] == 0){
			if (sendActivation($email, $code)) {
					echo '<b>Link de activación enviado !</b>';
			}
			else{
				echo $this->getLanguage()->getLine('error-ocurred');
			}
		}
		else{
			echo $this->getLanguage()->getLine('account-already-validated');
		}
	}
	else{
		echo $this->getLanguage()->getLine('url-code-error');
	}
}
else{
		echo $this->getLanguage()->getLine('url-code-error');
}
?>