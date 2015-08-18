<?php

class bsGenre {

	public static $genres = array(
			100 => array('Acid',0), 
			110 => array('Acoustic',0),
			120 => array('Afro',0),
			130 => array('Alternative',0),
			140 => array('Art',0),
			150 => array('Avant-Garde',0),
			160 => array('Barroque',0),
			170 => array('Black',0),
			180 => array('Brit',0),
			190 => array('Christian',0),
			200 => array('Classic',0),
			210 => array('Dance',0),
			220 => array('Dark',0),
			230 => array('Death',0),
			240 => array('Delta',0),
			250 => array('Doom',0),
			260 => array('Dream',0),
			270 => array('Electric',0),
			280 => array('Electro',0),
			290 => array('Free',0),
			300 => array('Fusion',0),
			310 => array('Gangsta',0),
			320 => array('Garage',0),
			330 => array('Glam',0),
			340 => array('Gothic',0),
			350 => array('Groove',0),
			360 => array('Gypsy',0),
			370 => array('Hard',0),
			380 => array('Hardcore',0),
			390 => array('Heavy',0),
			400 => array('Horror',0),
			410 => array('Indie',0),
			420 => array('Industrial',0),
			430 => array('Instrumental',0),
			440 => array('Math',0),
			450 => array('Medieval',0),
			460 => array('Melodic',0),
			470 => array('Microtonal',0),
			480 => array('Modern',0),
			490 => array('Neo',0),
			500 => array('New',0),
			510 => array('Noise',0),
			520 => array('Nu',0),
			530 => array('Old School',0),
			540 => array('Oldies',0),
			550 => array('Orchestral',0),
			560 => array('Post',0),
			570 => array('Power',0),
			580 => array('Progressive',0),
			590 => array('Psychedelic',0),
			600 => array('Religious',0),
			610 => array('Shock',0),
			620 => array('Slow',0),
			630 => array('Smooth',0),
			640 => array('Soft',0),
			650 => array('Space',0),
			660 => array('Speed',0),
			670 => array('Surf',0),
			680 => array('Symphonic',0),
			690 => array('Synth',0),
			700 => array('Thrash',0),
			710 => array('Tribal',0),
			720 => array('Viking',0),
				
				
			900 => array('Ambient',1),
			910 => array('Ars Antiqua',1),
			920 => array('Ars Nova',1),
			930 => array('Beat',1),
			940 => array('Bebop',1),
			950 => array('Blues',1),
			960 => array('Bluesgrass',1),
			970 => array('Big Band',1),
			980 => array('Bossa Nova',1),
			990 => array('Celtic',1),
			1000 => array('Chillout',1),
			1010 => array('Classical',1),
			1020 => array('Comedy/Parody',1),
			1030 => array('Country',1),
			1040 => array('Dance',1),
			1050 => array('Disco',1),
			1060 => array('Drum n’ Bass',1),
			1070 => array('Dub',1),
			1080 => array('Dubstep',1),
			1090 => array('Electronic',1),
			1100 => array('Experimental',1),
			1110 => array('Flamenco',1),
			1120 => array('Folk',1),
			1130 => array('Funk',1),
			1140 => array('Gospel',1),
			1150 => array('Grunge',1),
			1160 => array('Hardstyle',1),
			1170 => array('Hip Hop',1),
			1180 => array('House',1),
			1190 => array('Jazz',1),
			1200 => array('Metal',1),
			1210 => array('Metalcore',1),
			1220 => array('Minimalistic',1),
			1230 => array('New Age',1),
			1240 => array('Oi!',1),
			1250 => array('Opera',1),
			1260 => array('Pop',1),
			1270 => array('Punk',1),
			1280 => array('Raga',1),
			1290 => array('Ragtime',1),
			1300 => array('Rap',1),
			1310 => array('Reggae',1),
			1310 => array('Rock',1),
			1320 => array('Rockabilly',1),
			1330 => array('Rocksteady',1),
			1340 => array('Rythm and Blues',1),
			1350 => array('Salsa',1),
			1360 => array('Samba',1),
			1450 => array('Screamo',1),
			1370 => array('Ska',1),
			1380 => array('Soul',1),
			1390 => array('Swing',1),
			1400 => array('Techno',1),
			1410 => array('Traditional',1),
			1420 => array('Trance',1),
			1430 => array('Waltz',1),
			1440 => array('World',1),
			//1450 => array('Screamo',1)

				
	);
	
	public static function getPre(){
		foreach( self::$genres as $i=>$g )
			if($i < 800)
				$result[$i] = $g;
			else
				break;
		
		return $result;
	}
	public static function getPost(){
		foreach( self::$genres as $i=>$g )
			if($i > 800)
				$result[$i] = $g;
		
		return $result;
	}
	
	

	private $id;
	private $name;

	public function __construct($id){
		if( $this->name = self::$genres[$id][0] )
			$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

}

?>