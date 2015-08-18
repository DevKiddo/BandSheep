<?php

// session to $_POST
if($_SESSION['connect']){

	if($_SESSION['connect']["displayName"])
		$_POST['name'] = $_SESSION['connect']["displayName"];
	if($_SESSION['connect']["emailVerified"])
		$_POST['email'] = $_SESSION['connect']["emailVerified"];
	if($_SESSION['connect']["birthDay"])
		$_POST['DateOfBirth_Day'] = $_SESSION['connect']["birthDay"];
	if($_SESSION['connect']["birthMonth"])
		$_POST['DateOfBirth_Month'] = $_SESSION['connect']["birthMonth"];
	if($_SESSION['connect']["birthYear"])
		$_POST['DateOfBirth_Year'] = $_SESSION['connect']["birthYear"];
}

if( ($_POST['name']) && ($_POST['email']) && ($_POST['password']) && ($_POST['password2']) && ($_POST['DateOfBirth_Month']) && ($_POST['DateOfBirth_Day']) && ($_POST['DateOfBirth_Year']) ){

	if($_POST['DateOfBirth_Month']>=1 && $_POST['DateOfBirth_Month'] < 13)
		$month2 = $_POST['DateOfBirth_Month'];
	$date = $_POST['DateOfBirth_Year'].'-'.$month2.'-'.$_POST['DateOfBirth_Day'];
	if( $_POST['password'] !== $_POST['password2'] )
		echo bsPage::getLanguage()->getLine('register-error/passwords');
	else
	switch( bsUser::createUser($_POST['name'], $_POST['password'], $date, $_POST['email'], isset($_SESSION['connect']) ) ){
	
		case 1:
			if(!$_SESSION['connect']){
				//Normal user, notify.
				die( $this->getLanguage()->getLine('confirmation-email') . $_POST['email'].'.' );
			} elseif( $_SESSION['connect']['image_small'] && $_SESSION['connect']['image_normal'] ){
				//Facebook User, take image and send back to login with facebook.
				$u = new bsUser( userIDFromEmail( $_POST['email'] ) );
				$u->updateImage( new bsImage( $_SESSION['connect']['image_small'],  $_SESSION['connect']['image_normal'], '',$_SESSION['connect']['image_xsmall']) );
				die('<script>window.location=\'?page=connect&s=facebook\'</script>');
			} else {
				//Google user, send to login with google.
				die('<script>window.location=\'?page=connect&s=google\'</script>');
			}
			break; //superfluo?	
		case -1:
			echo bsPage::getLanguage()->getLine('register-error/emailused');
			break;
		case -2:
			echo bsPage::getLanguage()->getLine('register-error/emailnotvalid');
			break;
		case -3:
			die( bsPage::getLanguage()->getLine('register-error/database') );
			break;
		default:
			die( bsPage::getLanguage()->getLine('register-error/unexpected') );
	}

} // else {
	?>

<html>
<body style="margin:0px;padding:0px;">
	<form id='registration' action='' method='post' accept-charset='UTF-8'>
		<table>
			<tr>
				<td>
					<input type='hidden' name='submitted' id='submitted' value='1' />
					<?php if(!$_SESSION['connect']["displayName"]) { ?>
					<div class="line" style="width:220px;">
						<label for='name'><?php echo $this->getLanguage()->getLine('register-name');?></label>
						<br><input type='text' name='name' id='name' maxlength="70"/>
					</div>
				</td>
				<td>
					<?php } if(!$_SESSION['connect']["emailVerified"]) {?>
					<div class="line" style="width:260px;">
						<label for='email'>Email:</label>
						<br><input type='text' name='email' id='email' maxlength="70" />
					</div>
				</td>
				<?php } ?>
			</tr>
			<tr>
				<td>
					<div class="line" style="width:220px;">
						<label for='password'><?php echo $this->getLanguage()->getLine('register-password');?></label>
						<br><input type='password' name='password' id='password' maxlength="50"/>
					</div>
				</td>
				<td>
					<div class="line" style="width:260px;">
						<label for='password'><?php echo $this->getLanguage()->getLine('register-password-repeat');?></label>
						<br><input type='password' name='password2' id='password2' maxlength="50" />
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<?php if(!$_SESSION['connect']["birthDay"] || !$_SESSION['connect']["birthMonth"] || !$_SESSION['connect']["birthYear"]){ ?>
						<div class="line" style="width: 250px;">
							<?php //$date = $user->getuserDate(); ?>
							<label><?php echo $this->getLanguage()->getLine('register-dateofbirth');?></label><br>
							<select name="DateOfBirth_Month">
								<option>- Month -</option>
								<option value="1">January</option>
								<option value="2">Febuary</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select> <select name="DateOfBirth_Day">
								<option>- Day -</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
							</select> <select name="DateOfBirth_Year">
								<option>- Year -</option>
								<option value="2004">2004</option>
								<option value="2003">2003</option>
								<option value="2002">2002</option>
								<option value="2001">2001</option>
								<option value="2000">2000</option>
								<option value="1999">1999</option>
								<option value="1998">1998</option>
								<option value="1997">1997</option>
								<option value="1996">1996</option>
								<option value="1995">1995</option>
								<option value="1994">1994</option>
								<option value="1993">1993</option>
								<option value="1992">1992</option>
								<option value="1991">1991</option>
								<option value="1990">1990</option>
								<option value="1989">1989</option>
								<option value="1988">1988</option>
								<option value="1987">1987</option>
								<option value="1986">1986</option>
								<option value="1985">1985</option>
								<option value="1984">1984</option>
								<option value="1983">1983</option>
								<option value="1982">1982</option>
								<option value="1981">1981</option>
								<option value="1980">1980</option>
								<option value="1979">1979</option>
								<option value="1978">1978</option>
								<option value="1977">1977</option>
								<option value="1976">1976</option>
								<option value="1975">1975</option>
								<option value="1974">1974</option>
								<option value="1973">1973</option>
								<option value="1972">1972</option>
								<option value="1971">1971</option>
								<option value="1970">1970</option>
								<option value="1969">1969</option>
								<option value="1968">1968</option>
								<option value="1967">1967</option>
								<option value="1966">1966</option>
								<option value="1965">1965</option>
								<option value="1964">1964</option>
								<option value="1963">1963</option>
								<option value="1962">1962</option>
								<option value="1961">1961</option>
								<option value="1960">1960</option>
								<option value="1959">1959</option>
								<option value="1958">1958</option>
								<option value="1957">1957</option>
								<option value="1956">1956</option>
								<option value="1955">1955</option>
								<option value="1954">1954</option>
								<option value="1953">1953</option>
								<option value="1952">1952</option>
								<option value="1951">1951</option>
								<option value="1950">1950</option>
								<option value="1949">1949</option>
								<option value="1948">1948</option>
								<option value="1947">1947</option>
								<option value="1946">1946</option>
								<option value="1945">1945</option>
								<option value="1944">1944</option>
								<option value="1943">1943</option>
								<option value="1942">1942</option>
								<option value="1941">1941</option>
								<option value="1940">1940</option>
								<option value="1939">1939</option>
								<option value="1938">1938</option>
								<option value="1937">1937</option>
								<option value="1936">1936</option>
								<option value="1935">1935</option>
								<option value="1934">1934</option>
								<option value="1933">1933</option>
								<option value="1932">1932</option>
								<option value="1931">1931</option>
								<option value="1930">1930</option>
								<option value="1929">1929</option>
								<option value="1928">1928</option>
								<option value="1927">1927</option>
								<option value="1926">1926</option>
								<option value="1925">1925</option>
								<option value="1924">1924</option>
								<option value="1923">1923</option>
								<option value="1922">1922</option>
								<option value="1921">1921</option>
								<option value="1920">1920</option>
								<option value="1919">1919</option>
								<option value="1918">1918</option>
								<option value="1917">1917</option>
								<option value="1916">1916</option>
								<option value="1915">1915</option>
								<option value="1914">1914</option>
								<option value="1913">1913</option>
								<option value="1912">1912</option>
								<option value="1911">1911</option>
								<option value="1910">1910</option>
								<option value="1909">1909</option>
								<option value="1908">1908</option>
								<option value="1907">1907</option>
								<option value="1906">1906</option>
								<option value="1905">1905</option>
								<option value="1904">1904</option>
								<option value="1903">1903</option>
								<option value="1902">1902</option>
								<option value="1901">1901</option>
								<option value="1900">1900</option>
							</select>
						</div>
						<?php } ?>
					</td>
				<td>
					<div class="line" align="center" style="margin-top: -20px;width:260px;">
						<input type='submit' name='Submit' value='Submit' />
					</div>
				</td>
			</tr>
		</table>
	</form>
	
	<?php if(isset($error)) { ?>
	<div class="errorMessage" style="color: red;" align="center">
		<?php echo $error; ?>
	</div>
	<?php } ?>
	
	<div style="clear: both;"></div>
	<br>

</body>
</html>
<?php // } ?>