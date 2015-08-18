<?php

class bsInstrument {
	
	public static $instruments = array(
			
			//ID	//Line ID from bsLanguage
			1=>		'harmonium',
			10=>	'harmonica',
			20=>	'harp',
			30=>	'bass',
			40=>	'balalaika',
			50=>	'bandurria',
			60=>	'banjo',
			70=>	'drums',
			80=>	'saxhorn',
			90=>	'seed-bracelet',
			100=>	'bell',
			110=>	'rattles',
			120=>	'castanets',
			130=>	'charango',
			140=>	'clarinet',
			150=>	'bass-clarinet',
			160=>	'clavecin',
			170=>	'clavichord',
			180=>	'contrabass',
			190=>	'double-bassoon',
			200=>	'chorist',
			210=>	'english-horn',
			220=>	'cuatro',
			230=>	'zither',
			240=>	'espinetav',
			250=>	'bassoon',
			260=>	'flabiol',
			270=>	'flute',
			280=>	'piccolo',
			290=>	'flugelhorn',
			300=>	'bagpipes',
			310=>	'gong',
			320=>	'guitar',
			340=>	'lute',
			350=>	'lyra',
			360=>	'viola-lyra',
			370=>	'maracas',
			380=>	'marimba',
			390=>	'melodic',
			400=>	'oboe',
			410=>	'organ',
			420=>	'ocarina',
			430=>	'percussion',
			440=>	'piano',
			450=>	'qena',
			460=>	'rabel',
			470=>	'requinto',
			480=>	'saxophone',
			490=>	'sicu',
			500=>	'sitar',
			510=>	'rattles',
			520=>	'sousaphone',
			530=>	'tin-and-low-whistle',
			540=>	'triangle',
			550=>	'trombone',
			560=> 	'trumpet',
			570=>	'horn',
			580=>	'french-horn',
			590=>	'txistu',
			600=>	'ukelele',
			610=>	'viola',
			620=>	'cello',
			630=>	'violin',
			640=>	'vocalist',
// 			660=>	'vocalist-bass',
// 			670=>	'vocalist-baritone',
// 			680=>	'vocalist-contraalto',
// 			690=>	'vocalist-mezzosoprano',
// 			700=>	'vocalist-soprano',
// 			710=>	'vocalist-tenor',
			720=>	'xylophone',
			730=>   'mandolin',
		);
	
	public static function getInstruments(){
		$result = self::$instruments;
		
		foreach($result as $i=>$r){
			$result[$i] = bsPage::getLanguage()->getLine( $r );
		}
		
		asort($result);
		
		return $result;
	}
	
	private $id;
	private $name;
	
	public function __construct($id){
		if( $this->name = bsPage::getLanguage()->getLine( self::$instruments[$id] ) )
			$this->id = $id;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getId(){
		return $this->id;
	}
}

?>
