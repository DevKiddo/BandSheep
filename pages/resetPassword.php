<div class="main">
	<div class="mainContent">
		<div align="center" style="margin-top: 20px;">
			<?php
			
			$email = $_GET['email'];
			$code_reset = $_GET['code_reset'];
			$newpassword = $_POST['newpassword'];
			$newpassword2 = $_POST['newpassword2'];
			
			if ($_POST['Submit'] && $_GET['code_reset'])
			{
				if (checkCodeEmail($email, $code_reset))
				{
					if ($_POST['newpassword'] == $_POST['newpassword2'])
					{
							echo (resetPassword($email, $newpassword)) ?
							"Tu contraseña ha sido cambiada. Ya puedes loguearte."
							:
							"Lo sentimos. Tu contraseña no ha sido cambiada."
							;
					}
					else
					{
						echo "Las contraseñas no coinciden.";
					}
				}
				else
				{
					echo 'El codigo dado no concuerda con el email.';
				}
				
			}
			else
			{
				if ($_GET['code_reset'] && $_GET['email'])
				{
					if (checkCodeEmail($email, $code_reset))
					{
			?>
				<form action='' method='post'>
					<div class="line">
						<label for='password'>Nueva Contraseña:</label> <input type='password' name='newpassword' maxlength="50" /><br>
					</div>
					<div class="line">
						<label for='password'>Repite la Contraseña:</label> <input type='password' name='newpassword2' maxlength="50" /><br>
					</div>
					<div class="line">
						<input type='submit' name='Submit' value='Submit' />
					</div>
				</form>
			<?php
					}
					else
					{
						echo 'El codigo dado no concuerda con el email.';	
					}
				}
				else
				{
					echo "Tu link esta roto.";
				}
			}
			?>
		</div>
	</div>
</div>