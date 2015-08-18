<?php
function getNumUsers() {
	$query = "SELECT * FROM `users`";
	if ($stmt = $GLOBALS["con"]->prepare($query)) {
		//The statement is executed.
		$stmt->execute();
		$usrRows = $stmt->fetchAll();
		return (count( $usrRows ));
	}
}
function getNumBands() {
	$query = "SELECT * FROM `bands`";
	if ($stmt = $GLOBALS["con"]->prepare($query)) {
		//The statement is executed.
		$stmt->execute();
		$usrRows = $stmt->fetchAll();
		return (count( $usrRows ));
	}
}

function getUsersFromToday() {
	$today = date("Y-m-d");
	//  SELECT * FROM fans WHERE fans.fanned_id = bands.entity_id
	$query = "SELECT * FROM entities a, users b WHERE a.id = b.entity_id AND `timestamp` LIKE '%" . $today . "%'";
	if ($stmt = $GLOBALS["con"]->prepare($query)) {
		//Binding of parameters.
		//$stmt->bindParam(':today', $today);
		//The statement is executed.
		$stmt->execute();
		$usrRows = $stmt->fetchAll();
		return (count( $usrRows ));
	}
	
}

function getBandsFromToday() {
	$today = date("Y-m-d");
	//  SELECT * FROM fans WHERE fans.fanned_id = bands.entity_id
	$query = "SELECT * FROM entities a, bands b WHERE a.id = b.entity_id AND `timestamp` LIKE '%" . $today . "%'";
	if ($stmt = $GLOBALS["con"]->prepare($query)) {
		//Binding of parameters.
		//$stmt->bindParam(':today', $today);
		//The statement is executed.
		$stmt->execute();
		$usrRows = $stmt->fetchAll();
		return (count( $usrRows ));
	}
}
?>

<style>
	.bigFont {
		font-size:80px;
	}
	.counter-style {
		margin-top: 50px;
		width: 1000px;
		height: 250px;
		margin-bottom: 20px;
		margin-left:auto;
		margin-right:auto;
	}
</style>

<html>
	<body>
		<div class="counter-style">
			<br><br>
			<font style="font-size: 20px;text-align: center;margin-bottom: 50px;display: block;">Today: <font style="font-size:20px;"><?php echo date("Y-m-d");?></font></font>
			<b><font style="font-size:20px;float:left;">Users Now: <font class="bigFont"><?php echo getNumUsers();?></font></font></b>
			<b><font style="font-size:20px;float:right;">Bands Now: <font class="bigFont"><?php echo getNumBands();?></font></font></b>
			
			<div style="margin-top:100px;">
				<font style="font-size:20px;float:left;">Users Registered Today: <font style="font-size:40px;"><?php echo getUsersFromToday();?></font></font>
				<font style="font-size:20px;float:right;">Bands Registered Today: <font style="font-size:40px;"><?php echo getBandsFromToday();?></font></font>
				<br><br>
			</div>
		</div>
	</body>
</html>