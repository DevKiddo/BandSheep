<?php
/** ****************
 Extra scripts
 /** ****************/
?>

<script	type="text/javascript" src="js/textext.js"></script>

<?php if($this->getName() === 'musicians' || $this->getName() === 'default' || $this->getName() === 'bands' ) { ?>
<script
	type="text/javascript"
	src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script
	type="text/javascript" src="http://www.google.com/jsapi"></script>
<?php } ?>

<?php if($this->getName() === 'profile' || $this->getName() === 'band') { ?>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/<?php
	//TODO: Dirty code. Meh.
	echo bsPage::getLanguage()->getLanguage()."_".strtoupper(bsPage::getLanguage()->getLanguage());
	?>/all.js#xfbml=1&appId=172485432889920";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php } ?>

<?php
/** ****************
 Document ready
 /** ****************/
?>

<script type="text/javascript">

	$(document).ready(function() {

		$('.logged').mouseenter( function() { $('.uMenu').show( 100 ); } )
			.mouseleave( function() { $('.uMenu').hide(); } );
		$(".iframe3").fancybox({
			'width' : 550,
			'height' : 500,
			'type' : 'iframe',
			'transitionIn': 'elastic',
			'transitionOut': 'elastic',
			'autoScale' : true,
			'closeClick': true
		});
		$(".iframe2").fancybox({
			'width' : 500,
			'height' : 'auto',
			'type' : 'iframe',
			'transitionIn': 'elastic',
			'transitionOut': 'elastic',
			'autoDimensions': false,
			'autoScale' : true,
			'scrolling' : 'no',
			'closeClick': true
		});

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

<?php if($this->getName() === 
	// Script for:
	'profile'
		) { ?>

		function videoRotate($element){
			if(++$num > 3)
				$num = 1;
			$element.attr("src", $element.attr("src0") + $num + ".jpg");
		}
		
		$(".yTubeImg").live("mouseenter", function(){ $num = 0; $t = $(this); $timer = setInterval( function(){ videoRotate($t); }, 500); } );
		$(".yTubeImg").live("mouseleave", function(){ clearTimeout($timer); } );


<?php } ?>

<?php if($this->getName() === 
	'default'
		) { ?>

		function updateSearch() {
			$('#mMusicians').empty().hide()
			.load(
				'index.php?page=mMusicians&limit=5&lat='+$lat+'&lon='+$lon+'&radius='+$radius,
					function() { $('#mMusicians').fadeIn('slow'); });
			$('#mSearchBands').empty().hide()
			.load(
				'index.php?page=mSearchBands&limit=5&lat='+$lat+'&lon='+$lon+'&radius='+$radius,
					function() { $('#mSearchBands').fadeIn('slow'); });
		};

<?php } ?>

<?php if($this->getName() === 
	'musicians'
		) { ?>
		var query = '';
		function updateSearch($force) {
			val = query + " " + $('.searchDefault').attr('value');
			if( val !== $lastText || $force===true ){
				$lastText = val;
				$('#mMusicians').empty().hide()
				.load(
					'index.php?page=mMusicians&search='+encodeURIComponent(val)+'&lat='+$lat+'&lon='+$lon+'&radius='+$radius,
						function() { $('#mMusicians').fadeIn('slow'); });
			}
		};

<?php } ?>


		
<?php if($this->getName() ===
	//Script for:
	'bands'
		) {?>
		var query = '';
		function updateSearch( $force ) {
			if( $('.searchDefault').attr('value') !== $lastText || $force){
				$lastText = $('.searchDefault').attr('value');
				$('#mSearchBands').empty().hide()
				.load(
					'index.php?page=mSearchBands&search='+encodeURIComponent($lastText)+'&lat='+$lat+'&lon='+$lon+'&radius='+$radius,
						function() { $('#mSearchBands').fadeIn('slow'); });
			}
		};

<?php } ?>

<?php if($this->getName() === 'profile' || $this->getName() === 'band') { ?>
		
		$(".image").fancybox();
		$(".iframeImage").fancybox({
				'type' : 'iframe'
		});
		
		$("#mVideos").on("click", "a.youtube", function() {
			$.fancybox({
				'padding'		: 0,
				'autoScale'		: false,
				'transitionIn'	: 'none',
				'transitionOut'	: 'none',
				'title'			: this.title,
				'width'			: 680,
				'height'		: 495,
				'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
				'type'			: 'swf',
				'swf'			: {
				   	'wmode'		: 'transparent',
					'allowfullscreen'	: 'true'
				}
			});
			return false;
		});

<?php } ?>

<?php if($this->getName() === 'musicians' || $this->getName() === 'bands' || $this->getName() === 'default') {
	if($this->getUser())
		$coords = $this->getUser()->getLocationCoords();
?>
	$('#searchInput').textext({
		plugins : 'arrow tags autocomplete suggestions',
		suggestions : [ <?php foreach(bsInstrument::getInstruments() as $ins){ echo "'$ins',\n"; } ?> ]
	});

	$('#searchInput').bind('setFormData', function(e, data, isEmpty)
	{
		var textext = $(e.target).textext()[0];
		query = textext.hiddenInput().val();
		query = query.replace('[','').replace(/"/g,'').replace(']','').replace(',',' ');
		updateSearch();
	});
	
	$lat = null;
	$lon = null;
	$radius = null;
	$lastText = null;

	var circle = null;
	var map = null;

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
 map.fitBounds(circle.getBounds());

 $lat = circle.getCenter().lat();
 $lon = circle.getCenter().lng();
 $radius = circle.getRadius();

 updateSearch(true); 

 google.maps.event.addListener(circle, 'center_changed', function()   
 {
     $lat = circle.getCenter().lat();
     $lon = circle.getCenter().lng();
     $radius = circle.getRadius();

     updateSearch(true);
 });  

 google.maps.event.addListener(circle, 'radius_changed', function()   
 {
	 $lat = circle.getCenter().lat();
     $lon = circle.getCenter().lng();
     $radius = circle.getRadius();
     
     updateSearch(true);  
 });

<?php } ?>
		

	});


<?php
/** ****************
	 General scripts
/** ****************/
?>

<?php if($this->getName() ===
	//Script for:
	'search'
		) { ?>

	$('#mSearchBands').hide();
		
	function updateSearch(){

		var lat = '';
		var lon = '';
		
		<?php
		if($this->getUser() && ( $coords = $this->getUser()->getLocationCoords() )){
			echo 'lat = '.$coords[0].';
			lon = '.$coords[1].';';
		}
		?>
		
		var page = 'mMusicians';
		var y = document.getElementsByName('type');
		if( y[1].checked )
			page = 'mSearchBands';
				
		var order = 0;
		var x = document.getElementsByName('order');
		for(var k=0;k<x.length;k++)
			if(x[k].checked){
				order = x[k].value;
			}

		$('#mMusicians').hide();
		$('#mSearchBands').hide();
		
		$('#'+page).load('index.php?page='+page+'&search='+encodeURIComponent($('#searchInput').attr('value'))+'&order='+order+'&lat='+lat+'&lon='+lon,
				function() { $('#'+page).fadeIn('slow'); });
		
	}

	updateSearch();
	
<?php } ?>

</script>
