<?php

if($_POST){

	switch($_GET['option']){

		//Account settings
		default:
			if(isset($_POST['name'])){
				$this->getUser()->updateName($_POST['name']);
			}
			if(isset($_POST['email']) && false){
				$this->getUser()->updateEmail($_POST['email']);
			}
			if(isset($_POST['DateOfBirth_Month']) && isset($_POST['DateOfBirth_Day']) && isset($_POST['DateOfBirth_Year'])){
				switch($_POST['DateOfBirth_Month']){
					case "January":
						$month2 = 1;
						break;
					case "Febuary":
						$month2 = 2;
						break;
					case "March":
						$month2 = 3;
						break;
					case "April":
						$month2 = 4;
						break;
					case "May":
						$month2 = 5;
						break;
					case "June":
						$month2 = 6;
						break;
					case "July":
						$month2 = 7;
						break;
					case "August":
						$month2 = 8;
						break;
					case "September":
						$month2 = 9;
						break;
					case "October":
						$month2 = 10;
						break;
					case "November":
						$month2 = 11;
						break;
					case "December":
						$month2 = 12;
						break;
					default:
						$error = 'Mes incorrecto';
				}
				$this->getUser()->updateBirthDay($_POST['DateOfBirth_Year'], $month2, $_POST['DateOfBirth_Day']);
			}
			if($_POST['password'] != ''){
				$this->getUser()->updatePassword($_POST['password']);
			}
			
			break;
	}

}
?>


<div class="main">

	<div class="mainContent">

		<div class="leftColumn">

			<br>
			<div class="messageSec" onclick="window.location='?page=settings'"><?php echo $this->getLanguage()->getLine('user-settings');?></div>
			<div class="messageSecBot"></div>

			<div class="messageSec"
				onclick="window.location='?page=settings&option=1'"><?php echo $this->getLanguage()->getLine('location-settings');?></div>
			<div class="messageSecBot"></div>

			<div class="messageSec"
				onclick="window.location='?page=settings&option=2'"><?php echo $this->getLanguage()->getLine('instrument-settings');?></div>
			<div class="messageSecBot"></div>

		</div>

		<div class="centerColumnWide">

			<?php switch($_GET['option']) {
				default:
					?>
			<div class="block">
				<div class="bar"><?php echo $this->getLanguage()->getLine('user-settings1');?></div>
				<div class="blockContent">
					<form id='settings' action='' method='post' accept-charset='UTF-8'>
						<input type='hidden' name='submitted' id='submitted' value='1' />
						<div class="line">
							<label for='name'><?php echo $this->getLanguage()->getLine('name-settings');?></label> <input type='text' name='name'
								id='name' maxlength="70" onfocus="this.value=''"
								value="<?php echo $this->getUser()->getName(); ?>" /><br> <span><?php echo $this->getLanguage()->getLine('name-description');?></span>
						</div>
						<div class="line">
							<label for='email'><?php echo $this->getLanguage()->getLine('email-settings');?></label> <input type='text' name='email'
								id='email' maxlength="70" disabled="disabled"
								value="<?php echo $this->getUser()->getEmail(); ?>" /><br> <span><?php echo $this->getLanguage()->getLine('email-description');?></span>
						</div>

						<div class="line">
							<?php $date = $this->getUser()->getBirthDay(); ?>
							<label><?php echo $this->getLanguage()->getLine('birthday-settings');?></label> <select
								name="DateOfBirth_Month">
								<option>- Month -</option>
								<option value="January"
								<?php if($date[1] == 1) echo 'selected="selected"'; ?>>January</option>
								<option value="Febuary"
								<?php if($date[1] == 2) echo 'selected="selected"'; ?>>Febuary</option>
								<option value="March"
								<?php if($date[1] == 3) echo 'selected="selected"'; ?>>March</option>
								<option value="April"
								<?php if($date[1] == 4) echo 'selected="selected"'; ?>>April</option>
								<option value="May"
								<?php if($date[1] == 5) echo 'selected="selected"'; ?>>May</option>
								<option value="June"
								<?php if($date[1] == 6) echo 'selected="selected"'; ?>>June</option>
								<option value="July"
								<?php if($date[1] == 7) echo 'selected="selected"'; ?>>July</option>
								<option value="August"
								<?php if($date[1] == 8) echo 'selected="selected"'; ?>>August</option>
								<option value="September"
								<?php if($date[1] == 9) echo 'selected="selected"'; ?>>September</option>
								<option value="October"
								<?php if($date[1] == 10) echo 'selected="selected"'; ?>>October</option>
								<option value="November"
								<?php if($date[1] == 11) echo 'selected="selected"'; ?>>November</option>
								<option value="December"
								<?php if($date[1] == 12) echo 'selected="selected"'; ?>>December</option>
							</select> <select name="DateOfBirth_Day">
								<option>- Day -</option>
								<option value="1"
								<?php if($date[2] == 1) echo 'selected="selected"'; ?>>1</option>
								<option value="2"
								<?php if($date[2] == 2) echo 'selected="selected"'; ?>>2</option>
								<option value="3"
								<?php if($date[2] == 3) echo 'selected="selected"'; ?>>3</option>
								<option value="4"
								<?php if($date[2] == 4) echo 'selected="selected"'; ?>>4</option>
								<option value="5"
								<?php if($date[2] == 5) echo 'selected="selected"'; ?>>5</option>
								<option value="6"
								<?php if($date[2] == 6) echo 'selected="selected"'; ?>>6</option>
								<option value="7"
								<?php if($date[2] == 7) echo 'selected="selected"'; ?>>7</option>
								<option value="8"
								<?php if($date[2] == 8) echo 'selected="selected"'; ?>>8</option>
								<option value="9"
								<?php if($date[2] == 9) echo 'selected="selected"'; ?>>9</option>
								<option value="10"
								<?php if($date[2] == 10) echo 'selected="selected"'; ?>>10</option>
								<option value="11"
								<?php if($date[2] == 11) echo 'selected="selected"'; ?>>11</option>
								<option value="12"
								<?php if($date[2] == 12) echo 'selected="selected"'; ?>>12</option>
								<option value="13"
								<?php if($date[2] == 13) echo 'selected="selected"'; ?>>13</option>
								<option value="14"
								<?php if($date[2] == 14) echo 'selected="selected"'; ?>>14</option>
								<option value="15"
								<?php if($date[2] == 15) echo 'selected="selected"'; ?>>15</option>
								<option value="16"
								<?php if($date[2] == 16) echo 'selected="selected"'; ?>>16</option>
								<option value="17"
								<?php if($date[2] == 17) echo 'selected="selected"'; ?>>17</option>
								<option value="18"
								<?php if($date[2] == 18) echo 'selected="selected"'; ?>>18</option>
								<option value="19"
								<?php if($date[2] == 19) echo 'selected="selected"'; ?>>19</option>
								<option value="20"
								<?php if($date[2] == 20) echo 'selected="selected"'; ?>>20</option>
								<option value="21"
								<?php if($date[2] == 21) echo 'selected="selected"'; ?>>21</option>
								<option value="22"
								<?php if($date[2] == 22) echo 'selected="selected"'; ?>>22</option>
								<option value="23"
								<?php if($date[2] == 23) echo 'selected="selected"'; ?>>23</option>
								<option value="24"
								<?php if($date[2] == 24) echo 'selected="selected"'; ?>>24</option>
								<option value="25"
								<?php if($date[2] == 25) echo 'selected="selected"'; ?>>25</option>
								<option value="26"
								<?php if($date[2] == 26) echo 'selected="selected"'; ?>>26</option>
								<option value="27"
								<?php if($date[2] == 27) echo 'selected="selected"'; ?>>27</option>
								<option value="28"
								<?php if($date[2] == 28) echo 'selected="selected"'; ?>>28</option>
								<option value="29"
								<?php if($date[2] == 29) echo 'selected="selected"'; ?>>29</option>
								<option value="30"
								<?php if($date[2] == 30) echo 'selected="selected"'; ?>>30</option>
								<option value="31"
								<?php if($date[2] == 31) echo 'selected="selected"'; ?>>31</option>
							</select> <select name="DateOfBirth_Year">
								<option>- Year -</option>
								<?php 
								for($i = 2004; $i >= 1900; $i--){
									echo '<option value="'.$i.'"';
									if($date[0] == $i)
										echo ' selected="selected"';
									echo '>'.$i.'</option>';
								}
								?>
							</select> <br> <span><?php echo $this->getLanguage()->getLine('birthday-change');?></span>
						</div>

						<div class="line">
							<label for='password'><?php echo $this->getLanguage()->getLine('password-settings');?></label> <input type='password'
								name='password' id='password' maxlength="50" /><br> <span><?php echo $this->getLanguage()->getLine('password-change');?></span>
						</div>
						<div align="center" style="margin-top: 20px;">
							<input type='submit' name='Submit' value='Submit' />
						</div>
						<?php if(isset($error)){ ?>
						<div class="error">
							<?php echo $error; ?>
						</div>
						<?php } ?>
					</form>
				</div>
			</div>

			<?php break;
case 1:
	?>
			<iframe src="?page=setLocation" frameborder="0" width="550"
				height="500" style="margin: 15px 0px 0px 50px"></iframe>
			<?php break;

case 2:
	?>

			<div class="block">
				<div class="bar"><?php echo $this->getLanguage()->getLine('user-settings-bar');?></div>
				<div class="blockContent">

					<div class="moduleCon">
						<div class="module" id="smInstruments">
							<?php 
								$p = new bsPage('smInstruments', $this->getUser());
								$p->show();
							?>
						</div>
					</div>

				</div>
			</div>

			<?php if(isset($error)){ ?>
			<div class="error">
				<?php echo $error; ?>
			</div>
			<?php } ?>

			<?php
			break;
			}
			?>
		</div>

	</div>
</div>
