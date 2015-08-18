<?php


//Funcs configs.
define("MAX_BANDS_PER_USER",10);
define("MAX_MEMBERS_PER_BAND",10);
define("MAX_INSTRUMENTS_PER_USER",8);
define("MAX_GENRES_PER_ENTITY",8);
define("MAX_SEARCH_KEYWORDS",10);
define("MAX_SEARCH_INSTRUMENTS",4);
define("GENERATED_CODES_LENGTH",8);
define("VIDEOS_PER_PAGE",6);
define("SOUNDS_PER_PAGE",4);
define("POSTS_PER_PAGE",5);
define("CONVERS_PER_PAGE",10);
define("RESULTS_PER_SEARCH_PAGE",20);
define("DEFAULT_SITE_LANGUAGE",'es');
define("SIMILAR_BANDS_AMOUNT",8);

//	Classes
require_once('classes/bsEntity.php');
require_once('classes/bsUser.php');
require_once('classes/bsBand.php');
require_once('classes/bsPage.php');
require_once('classes/bsImage.php');
require_once('classes/bsVideo.php');
require_once('classes/bsPost.php');
require_once('classes/bsList.php');
require_once('classes/bsInstrument.php');
require_once('classes/bsSearchResult.php');
require_once('classes/bsGenre.php');
require_once('classes/bsSound.php');
require_once('classes/bsLanguage.php');
require_once('classes/bsConver.php');
require_once('classes/bsMessage.php');

// Libs
require_once('EmailAddressValidator.php');


/**
 * function bsMail
 * Sends an email using bandsheep's SMTP server (actually amazon SES)
 *
 * @param String $email
 * 	Where to send the email.
 * @param string $subject
 * 	Email's subject.
 * @param string $body
 * 	Email's body.
 * @param string $name
 * 	Receivers name, eg: Morgan Freeman.
 * @param string $from
 * 	BandSheep's sender account. eg 'twogallants' -> twogallants@bandsheep.com as sender.
 *
 * @return boolean (true=sent, false=error)
*/
function bsMail( $email, $subject, $body, $name='',  $from = 'noreply' ){
	require_once "Mail.php";

	$from = "BandSheep <".$from."@bandsheep.com>";
	$to = $name." <".$email.">";

	$host = "email-smtp.us-east-1.amazonaws.com";
	$username = "AKIAIJKLL7PG2SJONGIQ";
	$password = "Anei9iAqWrBQ7Rd+bk0NvAcdFPBPwq2hhA0n86SlHKv6";

	$headers = array ('From' => $from,'To' => $to,'Subject' => $subject);
	$smtp = Mail::factory('smtp',array ('host' => $host,'auth' => true,'username' => $username,'password' => $password));

	$mail = $smtp->send($to, $headers, $body);
	return !(PEAR::isError($mail));

}

function logInId($userID){
	$_SESSION['user_id'] = $userID;
}

function getLocData($lat, $lon){
	
	$api = "AIzaSyDolbadbiICWra1DHTA59nr-JySxqJQXMA";
	
	$returnValue = NULL;
	$ch = curl_init();
	$url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lon&sensor=false&api=".$api;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$result = curl_exec($ch);
	$json = json_decode($result, TRUE);


	if (isset($json['results'])) {
		foreach($json['results'] as $result) {
			foreach($result['address_components'] as $address_component) {
				$types = $address_component['types'];
				if (in_array('postal_code', $types) && sizeof($types) == 1) {
					$postal_code = $address_component['short_name'];
				} elseif(in_array('country', $types)){
					$country = $address_component['long_name'];
				} elseif(in_array('locality', $types)){
					$ciudad = $address_component['short_name'];
				} else for($i=1; !isset($ciudad) && $i<=3; $i++){
					if(in_array('administrative_area_level_'.i, $types))
						$ciudad = $address_component['short_name'];
				}
			}
		}
	}
	
// 	$mapapis_call ="http://maps.googleapis.com/maps/api/geocode/xml?latlng=" . $lat . "," . $lon . "&sensor=false";
// 	$output = file_get_contents( $mapapis_call );
// 	// Status of the call
// 	preg_match("/<status>(.*?)<\/status>/ims",$output, $matches);
// 	// Formatted address
// 	preg_match("/<formatted_address>(.*?)<\/formatted_address>/ims",$output, $matches);
// 	$address = $matches[1];
// 	// Address components with all information of the address
// 	preg_match_all( "/<address_component>(.*?)<\/address_component>/ims", $output, $components, PREG_SPLIT_NO_EMPTY );

// 	// For every component
// 	foreach( $components as $component ){
// 		//  Loop for each address component
// 		//
// 		foreach( $component as $element ){
// 			preg_match( "/<type>(.*?)<\/type>/ims", $element, $matches );
// 			$type = $matches[1];

// 			preg_match( "/<long_name>(.*?)<\/long_name>/ims", $element, $matches );
// 			$long_name = $matches[1];

// 			preg_match( "/<short_name>(.*?)<\/short_name>/ims", $element, $matches );
// 			$short_name = $matches[1];

// 			switch( $type )	{
// 				case "locality":
// 					$ciudad = $long_name;
// 					break;
// 				case "country":
// 					$country = $short_name;
// 					break;
// 				case "postal_code":
// 					$postal_code = $long_name;
// 					break;
// 			}
// 		}
// 	}
	
	return array( 'city'=>$ciudad, 'country'=>$country, 'postal_code'=>$postal_code );
}

/**
 * Devuelve el ID del usuario logueado si lo ha hecho con Ã©xito.
 *
 * @param string $email
 * @param string $pass
 * @return multitype:
 */
function userIDFromLogin($email, $pass){
	//The query for user and passw
	$query = "SELECT * FROM `users` WHERE `email` = :email AND `password` = :pass";
	if ($stmt = $GLOBALS["con"]->prepare($query)) {
		//Binding of parameters.
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':pass', md5($pass));
		//The statement is executed.
		$stmt->execute();
		$row = $stmt->fetch();
		
		if( empty($row) )
			return 0;
		
		elseif( $row['active'] != 1)
			return "-".$row['entity_id'];
		
		else
			return $row['entity_id'];
		
	} else {
		die('Error de conexion a DB');
	}

}

/**
 * Devuelve el ID de un usuario dado el email.
 *
 * @param string $email
 * @return multitype:
 */
function userIDFromEmail($email){
	//The query for user and passw
	$query = "SELECT `entity_id` FROM `users` WHERE `email` = :email";
	if ($stmt = $GLOBALS["con"]->prepare($query)) {
		//Binding of parameters.
		$stmt->bindParam(':email', $email);
		//The statement is executed.
		$stmt->execute();
		//If there's a user like that, there should be 1 row.
		$usrRows = $stmt->fetchAll();
		return ( count( $usrRows ) == 1 ) ? $usrRows[0]['entity_id'] : false;
	} else {
		die('Error de conexion a DB');
	}

}


/**
 * Funcion para generar codigo de validaciom
 * Si no especifica longitud, toma el valor por defecto GENERATED_CODES_LENGTH.
 *
 * @param int $longitud
 * 	Longitud del cÃ³digo a generar.
 * @return string code
 * 	CÃ³digo generado.
 */
function generateCode($longitud = GENERATED_CODES_LENGTH)
{
	$caracteres = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$code = '';

	for($i=0;$i<$longitud;$i++) {
		$code .= $caracteres[rand(0,62)];
	}
	return $code;
}


function searchUser($keys, $index=0, $limit=0, $order=0, $instruments=null, $userID=null, $lat=null, $lon=null, $radius=null){

	//General query.
	$query = 'SELECT users.entity_id, users.name, location.city, ( SELECT COUNT(*) FROM fans WHERE fans.fanned_id = users.entity_id) as fans, images.small, GROUP_CONCAT(DISTINCT instruments.instrument_id) as instruments';

	//Distance select, optional.
	if($lat && $lon)
		$query.= ', ( 6371 * acos( cos( radians( :lat ) ) * cos( radians( X(location.point) ) ) * cos( radians( Y(location.point) ) - radians( :lon ) ) + sin( radians( :lat ) ) * sin( radians( X(location.point) ) ) ) ) as distance';

	//Joins.
	$query.= ' FROM users LEFT OUTER JOIN images ON images.entity_id = users.entity_id LEFT OUTER JOIN fans ON fans.fanned_id = users.entity_id LEFT OUTER JOIN location ON users.entity_id = location.entity_id LEFT OUTER JOIN instruments ON users.entity_id = instruments.user_id';

	//Instrument filtering thing.
	if($keys){
		foreach($keys as $i=>$k){
			$query.= ($i==0) ? ' WHERE (' : ' OR ';
			$query.= 'name LIKE :keyw'.$i;
		}
	}

	if($userID){
		$query.= (empty($keys)) ? ' WHERE' : ') AND';
		$query.= ' users.entity_id != :userID';
	} elseif ( !empty($keys) ){
		$query.= ')';
	}

	//General Query.
	$query.= ' GROUP BY entity_id';

	//Instrument filtering thing.
	if($instruments){
		foreach($instruments as $i=>$ins){
			$query.= ($i==0) ? ' HAVING ' : ' AND ';
			$query.= 'find_in_set( :instrument'.$i.' , instruments )';
		}
	}

	//Order.
	$query.= ' ORDER BY';
	if(!empty($keys))
		$query.= ' users.name NOT LIKE :keys,';
	//other order.
	switch($order){

		case 2:
			//Location order
			if( $lat && $lon ) {
				$query.= ' ISNULL(distance) ASC, distance ASC';
				break;
			}
				
		case 1:
			// Fans order.
			$query.= ' fans DESC';
			break;
				
		default:
			//Norma, id order.
			$query.= ' entity_id';
	}

	//Set the limit
	if($limit != 0)
		$query.= " LIMIT :index , :limit";

	if ($stmt = $GLOBALS["con"]->prepare($query)) {
		//Binding of parameters.

		for($i=0; $i < count($keys) && $i < MAX_SEARCH_KEYWORDS; $i++){
			$keyAct = '%'.$keys[$i].'%';
			$stmt->bindValue(':keyw'.$i, $keyAct, PDO::PARAM_STR);
		}

		if($limit != 0){
			$stmt->bindParam(':index', intval( $index ), PDO::PARAM_INT);
			$stmt->bindParam(':limit', intval( $limit ), PDO::PARAM_INT);
		}

		if($userID)
			$stmt->bindParam(':userID', $userID) ;

		if($lat && $lon){
			$stmt->bindParam(':lat', $lat);
			$stmt->bindParam(':lon', $lon);
		}


		if($instruments){
			foreach($instruments as $i=>$ins){
				$stmt->bindValue(':instrument'.$i, $ins);
			}
		}

		if(!empty($keys))
			$stmt->bindValue( ':keys' , '%'.implode(' ',$keys).'%' );

		//The statement is executed.
		$stmt->execute();
		$result = $stmt->fetchAll();

		foreach($result as $i=>$r){
				
			$u = new bsUser($r['entity_id'], false);
			$u->setName( $r['name'] );
			$u->setCity( $r['city'] );
			$u->setNumberFans( $r['fans'] );
			$u->setImage( new bsImage( $r['small'] ) );
				
			if($r['instruments']){
				$ins = explode(',', $r['instruments']);
				foreach($ins as $i2=>$in){
					$ins[$i2] = new bsInstrument($in);
				}
				$u->setInstruments($ins);
			}
				
			$result[$i] = new bsSearchResult( $u , $r['distance'] != 0 && $r['distance']<$radius/1000 );
		}

		return $result;

	} else {
		die('Error de conexion a DB');
	}
}



function searchBand($keys, $index=0, $limit=0, $order=0, $lat=null, $lon=null, $radius=null){

	//General query.
	$query = 'SELECT bands.entity_id, bands.name, COUNT(*), ( SELECT COUNT(*) FROM fans WHERE fans.fanned_id = bands.entity_id) as fans';

	if($lat && $lon)
		$query.= ', ( 6371 * acos( cos( radians( :lat ) ) * cos( radians( X(location.point) ) ) * cos( radians( Y(location.point) ) - radians( :lon ) ) + sin( radians( :lat ) ) * sin( radians( X(location.point) ) ) ) ) as distance';
	
	
	 $query.= ' FROM bands LEFT OUTER JOIN members ON bands.entity_id = members.band_id LEFT OUTER JOIN location ON bands.entity_id = location.entity_id';


	//Instrument filtering thing.
	if($keys){
		foreach($keys as $i=>$k){
			$query.= ($i==0) ? ' WHERE (' : ' OR ';
			$query.= 'name LIKE :keyw'.$i;
		}
		$query.= ')';
	}

	//General Query.
	$query.= ' GROUP BY entity_id';

	//Order.
	$query.= ' ORDER BY';
	if(!empty($keys))
		$query.= ' bands.name NOT LIKE :keys,';
	//other order.
	switch($order){
	
		case 2:
			//Location order
			if( $lat && $lon ) {
				$query.= ' ISNULL(distance) ASC, distance ASC';
				break;
			}
	
		case 1:
			// Fans order.
			$query.= ' fans DESC';
			break;
	
		default:
			//Norma, id order.
			$query.= ' entity_id';
	}
	
	//Set the limit
	if($limit != 0)
		$query.= " LIMIT :index , :limit";

	if ($stmt = $GLOBALS["con"]->prepare($query)) {
		//Binding of parameters.

		for($i=0; $i < count($keys) && $i < MAX_SEARCH_KEYWORDS; $i++){
			$keyAct = '%'.$keys[$i].'%';
			$stmt->bindValue(':keyw'.$i, $keyAct, PDO::PARAM_STR);
		}
		
		if($lat && $lon){
			$stmt->bindParam(':lat', $lat);
			$stmt->bindParam(':lon', $lon);
		}

		if($limit != 0){
			$stmt->bindParam(':index', intval( $index ), PDO::PARAM_INT);
			$stmt->bindParam(':limit', intval( $limit ), PDO::PARAM_INT);
		}

		if(!empty($keys))
			$stmt->bindValue( ':keys' , '%'.implode(' ',$keys).'%' );

		//The statement is executed.
		$stmt->execute();
		$result = $stmt->fetchAll();

		foreach($result as $i=>$r){

			$b = new bsBand( $r['entity_id'], $r['name'] );
			$b->setNumberFans( $r['fans'] );

			$result[$i] = new bsSearchResult( $b , $r['distance'] != 0 && $r['distance']<$radius/1000 );
		}

		return $result;

	} else {
		die('Error de conexion a DB');
	}
}


//Sanitizing Posts.
function sanitizePost($string){
	//Sanitizing
	$string = nl2br($string);
	$string = strip_tags($string, '<p><br>');
	$string = str_replace("<br>", " <br> ", $string);
	$string = str_replace("<br />", " <br> ", $string);
	return $string;
}

function removeTildes($str){
	$tildes = array( 'á','Á','é','É','í','Í','ó','Ó','ú','Ú' );
	$normales = array( 'a','A','e','E','i','I','o','O','u','U' );
	return str_replace($tildes, $normales, $str);
}

/**
 * Devuelve 1 si hay una cuenta con ese email.
 *
 * @param string $email
 * @param PDO $GLOBALS["con"]
 */
function checkEmail($email){
	$query = "SELECT COUNT(*) FROM `users` WHERE `email` = :email";

	if ($stmt = $GLOBALS["con"]->prepare($query)) {
		//Binding of parameters.
		$stmt->bindParam(':email', $email);
		//The statement is executed.
		$stmt->execute();
		$count = $stmt->fetch();
		return $count[0] > 0;

	} else {
		die('Error de conexion a DB');
	}
}
/**
 * Devuelve true si coincide el email con el user_code_reset
 *
 * @param unknown $email
 * @param unknown $code_reset
 */
function checkCodeEmail($email, $code)
{
	$query = "SELECT `code` FROM `users` WHERE `email` = :email";

	if ($stmt = $GLOBALS["con"]->prepare($query)) {
		//Binding of parameters.
		$stmt->bindParam(':email', $email);
		//The statement is executed.
		$stmt->execute();
		$count = $stmt->fetchAll();
		if ($count[0][0] == $code){
			return true;
		}
		else{
			return false;
		}

	} else {
		die('Error de conexion a DB');
	}

}
/**
 * Funcion para ver si la cuenta ha sido activada
 * 
 * @param unknown $email
 * @return boolean
 */
function checkEmailValidation($email) {
	$query = "SELECT `active` FROM `users` WHERE `email` = :email";
	
	if ($stmt = $GLOBALS["con"]->prepare($query)) {
		//Binding of parameters.
		$stmt->bindParam(':email', $email);
		//The statement is executed.
		$stmt->execute();
		$count = $stmt->fetchAll();
		if ($count[0][0] == 1)
			return true;
		else
			return false;
	} else {
		die('Error de conexion a DB');
	}
}
/**
 * Funcion para resetear el user_code a 0
 * @param unknown $email
 */
function updateUserCode($email)
{
	$code = generateCode(8);
	$query = "UPDATE `users` SET `code`= :code WHERE `email`= :email";

	if ($stmt = $GLOBALS["con"]->prepare($query)) {
		//Binding of parameters.
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':code', $code);
		//The statement is executed.
		return $stmt->execute();
	}
	else
	{
		die('Error de conexion a DB');
	}
}
/**
 * Funcion para enviar la activacion de la cuenta
 *
 * @param unknown $user
 * @param unknown $email
 * @param unknown $code
 * @return bolean
 */
function sendActivation($email, $code)
{
	//Emails variables.
	$subject = bsPage::getLanguage()->getLine('send-activation-subject');

	$body = bsPage::getLanguage()->getLine('send-activation-body1')
	.' http://www.bandsheep.com/?page=activateUser&email='.$email.'&code='.$code." \n\n "
	.bsPage::getLanguage()->getLine('send-activation-body2');

	return bsMail($email, $subject, $body, $user);
}

/**
 * Funcion para validar la cuenta, a partir del email de validacion
 * El $code se coge fuera de la funcion
 *
 *@param unknown $email
 *@param unknown $code
 *@return bolean
 */
function emailActivation($email, $code)
{
	$query = "UPDATE `users` SET `active`='1' WHERE `code`= :code AND `email`= :email";
	//activa la cuenta
	if ($stmt = $GLOBALS["con"]->prepare($query)){
		//Binding of parameters.
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':code', $code);
		//The statement is executed.
		if ($stmt->execute()){
			//resetea el codigo
			if (updateUserCode($email)){
				//coge la id de usuario
				if($userID = userIDFromEmail($email)){
					return $userID;
				}else{
					return false;
				}

			}else{
				return false;
			}
		}else{
			return false;
		}
	}else{
		die('Error de conexion a DB');
	}
}
/**
 * Funcion para enviar el email para resetear la contraseï¿½a
 *
 * @param unknown $user_email
 * @param unknown $newpassword
 * @return boolean
 */
function sendResetPassword($email)
{
	//generar el codigo de validacion
	$code = generateCode(8);
	//designar variables para el email
	$subject = bsPage::getLanguage()->getLine('forgot-email-subject');

	$body = bsPage::getLanguage()->getLine('forgot-email-body')
	."http://www.bandsheep.com/?page=resetPassword&email=$email&code_reset=$code \n\n"
	.bsPage::getLanguage()->getLine('send-activation-body2');

	if (!bsMail( $email, $subject, $body, $name='Usuario',  $from = 'noreply' )){
		return false;
	}
	else{
		$query = "UPDATE `users` SET `code`= :code WHERE `email`= :email";

		if ($stmt = $GLOBALS["con"]->prepare($query))
		{
			//Binding of parameters.
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':code', $code);
			//The statement is executed.
			return $stmt->execute();
		}
		else
		{
			die('Error de conexion a DB');
		}
	}
}
/**
 * Funcion para resetear contraseÃ±a mediante el link
 *
 * @param unknown $code_reset
 * @param unknown $newpassword
 * @return bolean
 */
function resetPassword($email, $newpassword)
{
	//convertimos contraseÃ±a a md5
	$newpassword = md5($newpassword);

	$query = "UPDATE `users` SET `password`= :newpassword WHERE `email`= :email";

	if ($stmt = $GLOBALS["con"]->prepare($query))
	{
		//Binding of parameters.
		$stmt->bindParam(':newpassword', $newpassword);
		$stmt->bindParam(':email', $email);
		//The statement is executed.
		if ($stmt->execute())
		{
			//Poner a 0 en la base de datos el code_reset
			$query2 = "UPDATE `users` SET `code`='0' WHERE `email`= :email";
			if ($stmt = $GLOBALS["con"]->prepare($query2))
			{
				//Binding of parameters.
				$stmt->bindParam(':email', $email);
				//The statement is executed.
				return $stmt->execute();
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	else
	{
		die('Error de conexion a DB');
	}
}
/**
 * Funcion que devuelve el $email, el $username y el $code del usuario
 * 
 * @param string $uid
 * @return multitype:
 */
function getUserInfo($uid){
	//The query for user and passw
	$query = "SELECT * FROM `users` WHERE `entity_id` = :uid";
	if ($stmt = $GLOBALS["con"]->prepare($query)) {
		//Binding of parameters.
		$stmt->bindParam(':uid', $uid);
		//The statement is executed.
		$stmt->execute();
		//If there's a user like that, there should be 1 row.
		$usrRows = $stmt->fetchAll();
		return ( count( $usrRows ) == 1 ) ? $usrRows[0] : false;
	} else {
		die('Error de conexion a DB');
	}
}

?>
