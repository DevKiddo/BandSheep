<?php
// Footer.
?>

<div class="footer">
<a href="?page=tos"><?php echo $this->getLanguage()->getLine('t&c'); ?></a> | <a href="?page=privacy"><?php echo $this->getLanguage()->getLine('privacy-policy');?></a> | <a href="?page=aboutUs"><?php echo $this->getLanguage()->getLine('about-us');?></a> | <a href="?page=contact"><?php echo $this->getLanguage()->getLine('contact-footer'); ?></a>
</div>

<?php

//Execution time.
// $time = microtime(true) - $GLOBALS["time"];

// $lines = explode(' ', exec('wc -l `find . -iname "*.php"`') );
// $exclude1 = explode(' ', exec('wc -l `find ./includes/hybridauth -iname "*.php"`') );
// $exclude2 = explode(' ', exec('wc -l `find ./includes/soundcloud -iname "*.php"`') );
// echo '<span class="cLines">'.($lines[1]-$exclude1[2]-$exclude2[1]).' líneas de código. '.$time.' ms</span>';
?>

<?php 
// Scripts.
include('scripts.php');
?>

</body>
</html>