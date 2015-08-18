<html>
<body>
	<?php
	require_once ("includes/funcs.php");
	
	//Se cogen del formulario.
	$email = $_POST['email'];

	if ($_POST['Submit'])
	{
		if ($_POST['email'])
		{
			if (checkEmail($_POST['email']) == 1)
			{
				if(sendResetPassword($email))
				{
					echo $this->getLanguage()->getLine('email-instructions');
				}
				else
				{
					echo $this->getLanguage()->getLine('no-pass-sent');
				}
			}
			else
			{
				echo $this->getLanguage()->getLine('no-email-database');
			}
		}
		else
		{
			echo $this->getLanguage()->getLine('email-fill-in');
		}
	}
	else
	{

		?>
	<form id='registration' action='' method='post' accept-charset='UTF-8'>
		<div class="line">
			<label for='email'>Email:</label> <input type='text' name='email'
				maxlength="50" /><br>
		</div>

		<div class="line">
			<input type='submit' name='Submit' value='Submit' />
		</div>
	</form>
	<div class="line"></div>
	<br />
	<br />
	<?php
	} 
	?>
</body>
</html>
