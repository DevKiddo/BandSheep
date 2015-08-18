<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="google" value="notranslate">
<meta http-equiv="Content-Language" content="es" />
<?php if( $this->getTarget() && $this->getName() === 'profile' || $this->getName() === 'band' ) { ?>
<meta property="og:image" content="http://www.bandsheep.com/<?php echo $this->getTarget()->getImage()->getMedium(); ?>" />
<meta itemprop="name" content="<?php echo $this->getTarget()->getName(); ?>" />
<?php //TODO BIO with <meta property="og:description" content="SHORT DESCRIPTION OF ARTICLE" /> ?>
<title>BandSheep - <?php echo $this->getTarget()->getName(); ?>
<?php } else { ?>
<title>BandSheep - <?php echo $this->getTitle();?>
<?php } ?>
</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"
	type="text/javascript"></script>
<script type="text/javascript" src="scripts.js"></script>
<script type="text/javascript"
	src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<link rel="stylesheet"
	href="fancybox/source/jquery.fancybox.css?v=2.0.6" type="text/css"
	media="screen" />
<script type="text/javascript"
	src="fancybox/source/jquery.fancybox.pack.js?v=2.0.6"></script>
<link rel="stylesheet"
	href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.2"
	type="text/css" media="screen" />
<script type="text/javascript"
	src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.2"></script>
<script type="text/javascript"
	src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.0"></script>
<link rel="stylesheet"
	href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=2.0.6"
	type="text/css" media="screen" />
<script type="text/javascript"
	src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=2.0.6"></script>
<script type="text/javascript" src="overlib/overlib.js"></script>
<script language="JavaScript" type="text/javascript"
	src="contentflow/contentflow.js" load="gallery"></script>

<!--[if lt IE 7]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js">IE7_PNG_SUFFIX=".png";</script>
<![endif]-->
	
<!--[if lt IE 8]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js">IE7_PNG_SUFFIX=".png";</script>
<![endif]-->
	
<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js">IE7_PNG_SUFFIX=".png";</script>
<![endif]-->
	

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39854237-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	
</head>
<body>