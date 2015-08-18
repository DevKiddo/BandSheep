<?php 

if( $_GET['lat'] && $_GET['lon'] && $_GET['radius'] ){
	$coords = array( $_GET['lat'], $_GET['lon'], $_GET['radius'] );
}

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

     // global "map" variable
      var map = null;


function initialize() {

	<?php
	if(empty($coords)){
	?>
	
    if (google.loader.ClientLocation){        
        var oldPos = new google.maps.LatLng(
            google.loader.ClientLocation.latitude,
            google.loader.ClientLocation.longitude
        );
    } else {
    	var oldPos = new google.maps.LatLng(40.35880816796166, -3.7191722667846534);
    }
    <?php 
	} else
    	echo 'var oldPos = new google.maps.LatLng('.$coords[0].', '.$coords[1].');';
    ?>
  
  var myOptions = {
    zoom: 6,
    center: oldPos,
    mapTypeControl: true,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById("map_canvas"),
                                myOptions);

  circle = new google.maps.Circle({
      center: oldPos,
      radius: <?php if($coords) echo $coords[2]; else echo '50000'; ?>,
      strokeColor: "#FF0000",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "#FF0000",
      fillOpacity: 0.35,
      map: map
  });

  circle.setEditable(true);
  map.fitBounds(circle.getBounds());

  google.maps.event.addListener(circle, 'center_changed', function()   
  {
      parent.$lat = circle.getCenter().lat();
      parent.$lon = circle.getCenter().lng();
      parent.$radius = circle.getRadius();

      parent.updateSearch();
  });  

  google.maps.event.addListener(circle, 'radius_changed', function()   
  {
	  parent.$lat = circle.getCenter().lat();
      parent.$lon = circle.getCenter().lng();
      parent.$radius = circle.getRadius();
      
      parent.updateSearch();  
  }); 

}
    

//]]>
</script>

</head>
<body style="margin: 0px; padding: 0px;" onload="initialize()">

	<div id="map_canvas" style="width: 550px; height: 450px"></div>
	
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