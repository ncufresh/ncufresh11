<?php
if(!defined('AC_INCLUDED'))
{
	exit();
}

global $currdb;
global $currcfg;

$block_var = array();
$videoId = array() ;
array_push($videoId, 'M0GvhMxZynw') ;
array_push($videoId, 'y58mEsArFGI') ;
array_push($videoId, 'YFpGMYaciag') ;
array_push($videoId, 'NKpBveRopkk') ;
array_push($videoId, 'PbDx2HPrpPk') ;
shuffle($videoId) ;
$block_var['videoId'] = $videoId[0];

if (isset($_GET['redirect_path']))
	$block_var['redirect_path'] = $_GET['redirect_path'];
else
	$block_var['redirect_path'] = $_SERVER['REQUEST_URI'];
	
if(isset($_SESSION['uid'])){
	$pet_pic_encode_function = function($type, $level){
		$filename = $type . '-' . $level;
		return md5(substr(md5($filename), 0, 15) . substr(md5($filename), 16, 16)) . '.png';
	};

	$_pet_src = $currdb -> sql_query("SELECT `type`, `level` FROM `pets` WHERE `uid` = '" . (int)$_SESSION['uid'] . "';") ;

	$_pet = $currdb -> sql_fetch_assoc($_pet_src);
	$block_var['img_src'] = $pet_pic_encode_function($_pet['type'], $_pet['level']);
}
?>