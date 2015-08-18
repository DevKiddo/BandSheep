<?php

class bsPage {

	// Allowed values for each var...
	private static $pages = array(
			// Name						Type	N login	 	N member	Title
			'profile'=>			array(	0,		false,		false,	'profile'),
			'bands'=>			array(	0,		false,		false,	'bands'),
			'band'=>			array(	0,		false,		false,	'band'),
			'messages'=>		array(	0,		true,		false,	'messages'),
			'settings'=>		array(	0,		true,		false,	'settings'),
			'search'=>			array(	0,		false,		false,	'search'),
			'tos'=>				array( 	0,		false,		false,	'terms'),
			'contact'=>			array( 	0,		false,		false,	'contact'),
			'resetPassword'=> 	array(	0,		false,		false,	'change-password'),
			'activateUser'=>	array( 	0,		false,		false,	'activate-user'),
			'404' =>			array(	0,		false,		false,	'404-error'),
			'musicians'=>		array(	0,		false,		false,	'musicians'),
			'privacy'=>			array(	0,		false,		false,	'privacy-policy'),
			'aboutUs'=>			array(	0,		false,		false,	'about-us'),
			'counter'=>			array(	0,		false,		false,	'counter'),
			// Fancyboxes
			'login'=>			array(	1,		false,		false,	''),
			'sendMessage'=>		array(	1,		true,		true,	''),
			'imageUpload'=>		array(	1,		true,		true,	''),
			'register'=>		array(	1,		false,		false,	''),
			'becomeFan'=>		array(	1,		true,		false,	''),
			'newPost'=>			array(	1,		true,		false,	''),
			'editPost'=>		array(	1,		true,		false,	''),
			'setLocation'=>		array(	1,		true,		true,	''),
			'locationDefault'=>	array(	1,		false,		false,	''),
			'newVideo'=>		array(	1,		true,		true,	''),
			'deleteInstrument'=>array(	1,		true,		false,	''),
			'connect'=>			array(	1,		false,		false,	''), //Popup
			'newBand'=>			array(	1,		true,		false,	''),
			'forgot'=>			array(	1,		false,		false,	''),
			'newMember'=>		array(	1,		true,		true,	''),
			'newSound'=>		array(	1,		true,		true,	''),
			'deleteVideo'=>		array(	1,		true,		true,	''),
			'deleteSound'=>		array(	1,		true,		true,	''),
			'sendValidation'=>	array(	1,		false,		false,	''),
			'newMessage'=>		array(	1,		true,		false,	''),
			'feedBack'=>		array(	1,		false,		false,	''),
			'setGenres'=>		array(	1,		true,		true,	''),
			'acceptBand'=>		array(	1,		true,		false,	''),
			'setBio'=>			array(	1,		true,		true,	''),
			'setAvailable'=>	array(	1,		true,		true,	''),
			// Modules
			'mFans'=>			array(	2,		false,		false,	''),
			'mFanOf'=>			array(	2,		false,		false,	''),
			'mBlog'=>			array(	2,		false,		false,	''),
			'mImage'=>			array(	2,		false,		false,	''),
			'mVideos'=>			array(	2,		false,		false,	''),
			'smInstruments'=>	array(	2,		true,		false,	''),
			'mBands'=>			array(	2,		false,		false,	''),
			'mMusicians'=>		array(	2,		false,		false,	''),
			'mSearch'=>			array(	2,		false,		false,	''),
			'mSearchBands'=>	array(	2,		false,		false,	''),
			'mSounds'=>			array(	2,		false,		false,	''),
			'mMessages'=>		array(	2,		true,		false,	''),
			'mConver'=>			array(	2,		true,		false,	''),
			'mBio'=>			array(	2,		false,		false,	''),
	);


	//Logged user.
	private $user;
	//Target element, page wildcard.
	private $target;
	//
	private $isTargetOwner;

	//Static general language.
	private static $language;

	//Concrete page atributes.
	private $name = 'default';
	private $type = 0;
	private $needsLogin = false;
	private $needsMember = false;
	private $title = 'Inicio';

	function __construct($name, $user, $target=null){
		
		//Language
		if( !bsPage::$language ){
			bsPage::$language = new bsLanguage( $_SESSION['lang'] );
		}

		if( self::$pages[$name] ){
			$this->name = $name;
			$this->type = self::$pages[$name][0];
			$this->needsLogin = self::$pages[$name][1];
			$this->needsMember = self::$pages[$name][2];
			$this->title = self::getLanguage()->getLine( self::$pages[$name][3] );
		}
		// Page user.
		$this->user = $user;
		$this->target = $target;


		$this->autoTarget();
	}

	function show(){

		if( ($this->needsLogin() && !$this->getUser()) ||
			($this->needsMember && (!$this->getUser() || !$this->getTarget() || !$this->getTarget()->isMember($this->getUser()))) ){
			if($this->isFancy())
				$p = new bsPage('login', $this->getUser(), $this->getTarget());
			else
				$p = new bsPage('default', $this->getUser(), $this->getTarget());
				
			$p->redirect();
				
			return false;
		}

		$this->includeHeader();

		//Including page body.
		switch($this->type){
			case 1:		include('pages/fancy/'.$this->name.'.php');		break;
			case 2:		include('pages/modules/'.$this->name.'.php');	break;
			default:	include('pages/'.$this->name.'.php');			break;
		}

		$this->includeFooter();

		return true;
	}

	public function redirect(){
		if(headers_sent())
			die('<script>window.location=\'?page='.$this->getName().'\'</script>');
		else
			header('Location: ?page='.$this->getName());
	}

	private function includeHeader(){
		if($this->isModule()){
			return false;
		} elseif($this->isFancy()){
			echo '<link href="fancy.css" rel="stylesheet" type="text/css" />';
			return true;
		} else {
			include("includes/head.php");
			include("includes/bar.php");
			return true;
		}
	}

	private function includeFooter(){
		if($this->loadHead()){
			include("includes/footer.php");
			return true;
		} else
			return false;
	}

	public function showPaginator($perPage, $showMore){

		$index = $_GET['index'];

		foreach($_GET as $i=>$v)
			if($i !== 'page' && $i !== 'index')
			$lUrl.= '&'.$i.'='.$v;

		echo '<div class="blogNav">';
		if($index != 0)
			echo '<a style="float:left" href="Javascript:void(0)" onclick="$(\'#'.$this->getName().'\').hide().load(\'?page='.$this->getName().'&index='.($index-$perPage).$lUrl.'\', function() { $(\'#'.$this->getName().'\').fadeIn(\'slow\') } )">'.$this->getLanguage()->getLine('previous-bspage').'</a>';
		if($showMore)
			echo '<a style="float:right" href="Javascript:void(0)" onclick="$(\'#'.$this->getName().'\').hide().load(\'?page='.$this->getName().'&index='.($index+$perPage).$lUrl.'\', function() { $(\'#'.$this->getName().'\').fadeIn(\'slow\') } )">'.$this->getLanguage()->getLine('next-bspage').'</a>';

		echo '</div>';
	}

	public function reloadParentModule($modName, $closeFancy=true){
		echo '<script>var $r=parent.$("#'.$modName.'");$r.hide().load( "?page='.$modName.'&id='.$_GET['id'].'&bid='.$_GET['bid'].'", function() { $r.fadeIn("slow") } );</script>';

		if($closeFancy)
			$this->closeFancy();
	}

	public function closeFancy(){
		die('<script>parent.$.fancybox.close();</script>');
	}

	function loadHead(){
		return $this->type===0;
	}

	function isFancy(){
		return $this->type===1;
	}

	function isModule(){
		return $this->type===2;
	}

	function needsLogin(){
		return $this->needsLogin;
	}

	function isTargetOwner(){
		if(!$this->isTargetOwner)
			$this->isTargetOwner = $this->getTarget()->isMember( $this->getUser() );
		return $this->isTargetOwner;
	}

	function getUser(){
		return $this->user;
	}

	function setUser($user){
		$this->user = $user;
	}

	function getTarget(){
		return $this->target;
	}

	/**
	 * Deprecated.
	 */
	function getTargetUser(){
		return $this->getTarget();
	}

	function autoTarget($override=false){
		if($override || !$this->getTarget()){
			if($_GET['bid'])
				$this->setTargetBandById($_GET['bid']);
			elseif($_GET['id'] && (!$this->getUser() || $this->getUser()->getId() != $_GET['id']))
			$this->setTargetUserById($_GET['id']);
			else
				$this->setTargetUser($this->getUser());
		}
	}


	function setTargetUserById($userID){
		try{ $this->setTargetUser( new bsUser($userID) );
		} catch(Exception $e){
		}
	}

	function setTargetUser($user){
		$this->target = $user;
	}

	function setTargetBandById($bandID){
		$this->setTargetBand( new bsBand($bandID) );
	}

	function setTargetBand($band){
		$this->target = $band;
	}

	function getTitle(){
		return $this->title;
	}

	function getName(){
		return $this->name;
	}

	static function getLanguage(){
		return bsPage::$language;
	}

}
?>
