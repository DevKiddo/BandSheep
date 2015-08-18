<?php
$email = $_GET['email'];
$code = $_GET['code'];

if(!$this->getUser() && $_GET['code'] && $_GET['email']){
	if ($userID = emailActivation($email, $code)){
		logInId($userID);
		$p = new bsPage();
		$p->redirect();
	}
	else{
		echo $this->getLanguage()->getLine('url-code-error');
	}
}
else{
	echo $this->getLanguage()->getLine('login-error');
}
?>