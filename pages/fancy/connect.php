<?php

//Social connect libs
require_once( "includes/hybridauth/Hybrid/Auth.php" );


//Retrieve data
$config =  '/var/www/BS_dev/includes/hybridauth/config.php'; //dirname(__FILE__) . '/../includes/hybridauth/config.php';

try{
	$hybridauth = new Hybrid_Auth( $config );

	switch($_GET["s"]){

		case "google":
			$service = "Google";
			break;

		case "facebook":
			$service = "Facebook";
			break;
	}

	$hybridAuth = $hybridauth->authenticate( $service );

	$connect = $hybridAuth->getUserProfile();

	if( $usrID = userIDFromEmail( $connect->emailVerified ) ){
		//There's one account with that email.
		logInId($usrID);
		echo '<script>
		opener.parent.location.reload(true);
		self.close();
		</script>
		'.$this->getLanguage()->getLine('logged-in').'</a>'.'.';

	} else {
		//Register the user.
		$_SESSION['connect'] = array(
				"displayName"=>$connect->displayName,
				"emailVerified"=>$connect->emailVerified,
				"birthDay"=>$connect->birthDay,
				"birthMonth"=>$connect->birthMonth,
				"birthYear"=>$connect->birthYear
		);
		if( $_GET['s'] === 'facebook' ){
			$photo = str_replace('type=square', '', $connect->photoURL);
			$_SESSION['connect']['image_small'] = $photo.'width=60&height=60';
			$_SESSION['connect']['image_normal'] = $photo.'width=240&height=240';
			$_SESSION['connect']['image_xsmall'] = $photo.'width=30&height=30';
		}
		
		header('Location: ?page=register');
	}

} catch(Exception $e){

	if($_GET["debug"]==1){
		// Display the recived error,
		// to know more please refer to Exceptions handling section on the userguide
		switch( $e->getCode() ){
			case 0 : echo "Unspecified error."; break;
			case 1 : echo "Hybriauth configuration error."; break;
			case 2 : echo "Provider not properly configured."; break;
			case 3 : echo "Unknown or disabled provider."; break;
			case 4 : echo "Missing provider application credentials."; break;
			case 5 : echo "Authentification failed. "
			. "The user has canceled the authentication or the provider refused the connection.";
			break;
			case 6 : echo "User profile request failed. Most likely the user is not connected "
			. "to the provider and he should authenticate again.";
			$hybridAuth->logout();
			break;
			case 7 : echo "User not connected to the provider.";
			$hybridAuth->logout();
			break;
			case 8 : echo "Provider does not support this feature."; break;
		}

		// well, basically your should not display this to the end user, just give him a hint and move on..
		echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();

	} else {
		echo $this->getLanguage()->getLine('error-ocurred');
	}

	//Retry
	echo '<a href="?page=connect&s="'.$_GET['s'].'>'.$this->getLanguage()->getLine('retry').'</a>';
}
?>