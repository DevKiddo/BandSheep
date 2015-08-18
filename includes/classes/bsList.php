<?php 

class bsList {
	
	private $objs;
	private $method;
	private $emptyStr;
	
	/**
	 * 
	 * @param object[] $objs
	 * @param string $method
	 * @param string $emptyStr
	 */
	public function __construct( $objs, $method, $emptyStr ){
		$this->objs = $objs;
		$this->method = $method;
		$this->emptyStr = $emptyStr;
	}
	
	public function show(){
		if(empty($this->objs)) {
			echo $this->emptyStr;
		}
		else {	
			foreach($this->objs as $i=>$o){
				echo ' <b>'.$o->{$this->method}().'</b>';
				switch(count($this->objs)-$i){
					case 1:		echo '.';	break;
					case 2:		echo ' '.bsPage::getLanguage()->getLine('bslist-and');	break;
					default:	echo ',';
				}
			}
		}
	}
}
?>
