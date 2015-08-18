<?php 

if($_GET['lat'] >= -90 && $_GET['lat'] <= 90 && $_GET['lon'] >= -180 && $_GET['lon'] <= 180 && $_GET['radius'] > 0){
	switch($this->getTarget()->setLocation($_GET['lat'], $_GET['lon'], $_GET['radius'])){
		case 1:
			echo $this->getLanguage()->getLine('location-updated');
			break;
		case 0:
			echo $this->getLanguage()->getLine('location-error');
			break;
		case -1:
			echo $this->getLanguage()->getLine('location-not-available');
	}
} else {
	$coords = $this->getTarget()->getLocationCoords();
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
	xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title></title>
<script type="text/javascript"
	src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="scripts/downloadxml.js"></script>
<style type="text/css">
html,body {
	height: 100%;
}
</style>
<script type="text/javascript"> 
//<![CDATA[
           
      var circle = null;
      var map = null;

      function createCookie(name, value, days) {
    	    if (days) {
    	        var date = new Date();
    	        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    	        var expires = "; expires=" + date.toGMTString();
    	    }
    	    else var expires = "";
    	    document.cookie = name + "=" + value + expires + "; path=/";
    	}
    	function getCookie(c_name) {
    	    if (document.cookie.length > 0) {
    	        c_start = document.cookie.indexOf(c_name + "=");
    	        if (c_start != -1) {
    	            c_start = c_start + c_name.length + 1;
    	            c_end = document.cookie.indexOf(";", c_start);
    	            if (c_end == -1) {
    	                c_end = document.cookie.length;
    	            }
    	            return unescape(document.cookie.substring(c_start, c_end));
    	        }
    	    }
    	    return "";
    	}

function sendLoc() { //  + " " + 
		window.location=document.URL+'&lat='+circle.getCenter().lat()+'&lon='+circle.getCenter().lng()+'&radius='+circle.getRadius();
}

function initialize() {

	var oldPos = new google.maps.LatLng(40.35880816796166, -3.7191722667846534);
	
	<?php if($coords) echo 'oldPos = new google.maps.LatLng('.$coords[0].', '.$coords[1].');'; ?>
 
 var myOptions = {
   zoom: 6,
   center: oldPos,
   mapTypeControl: true,
   mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
   navigationControl: true,
   mapTypeId: google.maps.MapTypeId.ROADMAP
 }
 map = new google.maps.Map(document.getElementById("mapCanvas"),
                               myOptions);

 circle = new google.maps.Circle({
     center: oldPos,
     radius: <?php if($coords) echo $coords[2]; else echo '50000'; ?>,
     strokeColor: "#009900",
     strokeOpacity: 0.8,
     strokeWeight: 2,
     fillColor: "#33CC33",
     fillOpacity: 0.25,
     map: map
 });

<?php  if(!$coords) { ?>
if( getCookie('lat') && getCookie('lon') ){
	oldPos = new google.maps.LatLng(getCookie('lat'), getCookie('lon'));
} else if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
    	function(position) {

    		createCookie( 'lat',position.coords.latitude,1 );
    		createCookie( 'lon',position.coords.longitude,1 );
    		oldPos = new google.maps.LatLng(getCookie('lat'), getCookie('lon'));
    		circle.setCenter( oldPos );
	    },
		function() {}
	);
}

circle.setCenter( oldPos );
map.fitBounds(circle.getBounds());
<?php } ?>

 circle.setEditable(true);

}

//]]>
</script>

</head>
<body style="margin: 0px; padding: 0px;" onload="initialize()">

	<div id="mapCanvas" style="width: 550px; height: 450px"></div>
	<div style="text-align: center; margin-top: 20px;">
		<button onclick="sendLoc()" style="margin: auto"><?php echo $this->getLanguage()->getLine('update-settings-location'); ?></button>
	</div>
	<noscript>
		<p>
			<b>JavaScript must be enabled in order for you to use Google Maps.</b>
			However, it seems JavaScript is either disabled or not supported by
			your browser. To view Google Maps, enable JavaScript by changing your
			browser options, and then try again.
		</p>
	</noscript>
</body>
</html>
<?php } ?>