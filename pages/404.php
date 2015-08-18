<style>
#error404 {
	width: 900px;
	height: 600px;
	background-image: url('/dev/live/BS_dev/images/bg_error_404.jpg');
	background-size: cover;
	margin: auto;
	color:white;
	font-size:xx-large;
	align:center;
}
</style>

<div class="main">
	<div class="mainContent">
			<div id="error404">
					<br /><h1>Ups !</h1>
					<br /><br />
					<br /><br /><?php echo $this->getLanguage()->getLine('sorry-exist'); ?>.
					<br /><br /><?php echo $this->getLanguage()->getLine('sheep-ashamed'); ?>.
					<br /><br />Comprueba que tu direccion no este mal escrita.
			</div>
	</div>
</div>
