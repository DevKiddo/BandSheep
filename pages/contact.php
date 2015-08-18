<div class="main">

	<div class="mainContent">

		<div class="contactColumn" align="center">

			<h1><?php echo $this->getLanguage()->getLine('contact-form');?></h1>

			<div class="form">

				<form method="post" action="<?php echo $PHP_SELF;?>"
					name="Formulario">

					<table>
						<tr>
							<td><?php echo $this->getLanguage()->getLine('name-form');?></td>
							<td><input type="text" size="12" maxlength="12" name="Fname"><br />
							</td>
							<td><?php echo $this->getLanguage()->getLine('purpose-form');?></td>
						</tr>
						<tr>
							<td><?php echo $this->getLanguage()->getLine('lastname-form');?></td>
							<td><input type="text" size="12" maxlength="36" name="Lname"><br />
							</td>
							<td><?php echo $this->getLanguage()->getLine('report-abuse-form');?><input type="checkbox" value="Abuso"
								name="reason[]"><br /><?php echo $this->getLanguage()->getLine('claim-form');?><input type="checkbox"
								value="Reclamación" name="reason[]"><br /> <?php echo $this->getLanguage()->getLine('other-form');?><input
								type="checkbox" value="Otro" name="reason[]">
							</td>
						</tr>
						<tr>
							<td><?php echo $this->getLanguage()->getLine('email-form');?></td>
							<td><input type="text" size="12" maxlength="50" name="correo"><br />
							</td>
							<td><textarea rows="10" cols="50" name="quote" wrap="physical"><?php echo $this->getLanguage()->getLine('message-form');?></textarea>
								<br /> <input type="submit" value="<?php echo $this->getLanguage()->getLine('send-form');?>" name="enviar"><br />
							</td>
						</tr>
						<tr>
							<td><?php echo $this->getLanguage()->getLine('sex-form');?></td>
							<td><?php echo $this->getLanguage()->getLine('male-form');?><input type="radio" value="Hombre" name="gender"><br />
								<?php echo $this->getLanguage()->getLine('female-form');?><input type="radio" value="Mujer" name="gender">
							</td>
						</tr>
					</table>
				</form>
				<br />
			</div>
		</div>
	</div>
</div>

<?php 
if($_POST){
	$Fname = $_POST["Fname"];
	$Lname = $_POST["Lname"];
	$gender = $_POST["gender"];
	$reason = $_POST["reason"];
	$quote = $_POST["quote"];
	$correo = $_POST["correo"];
	$email = "bandsheepmail@gmail.com";
	$subject = "Contacto";
	$headers = "From: ".$correo;
	$body="Nos lo manda ".$Fname." ".$Lname."\n\n Es un ".$gender."\n\n Su motivo para escribir: ".$reason."\n\n Ha escrito: \n\n".$quote."";

	if (!bsMail($email,$subject,$body,$from)){
		echo $this->getLanguage()->getLine('email-not-sent-form');
	}

	else {
		echo $this->getLanguage()->getLine('email-sent-form');
	}
}

?>
