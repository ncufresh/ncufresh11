<?php
require_once('core/ac_boot.php');

// Step1. Right Contents
$anno_block = new ac_block(2);
$currtpl -> assign('anno_block', $anno_block -> fetch_block());
$forum_block = new ac_block(5);
$currtpl -> assign('forum_block', $forum_block -> fetch_block());

$module_list_src = $currdb -> sql_query("SELECT `id`, `title`, `start`, `end`, `rows`, `link` FROM `calender_event` ORDER BY `start` ASC");
$calender = array();
while($array_1D = $currdb -> sql_fetch_array($module_list_src))
{
	$temp = array() ;
	$d = new DateTime($array_1D[2]) ;
	array_push($temp, date_format($d, 'z')) ;	//startsate
	$d = new DateTime($array_1D[3]) ;
	array_push($temp, date_format($d, 'z')) ;	//enddate
	array_push($temp, $array_1D[1]) ;			//title
	array_push($temp, $array_1D[4]) ;			//rows
	$url = str_replace('http://ncufresh.snowtec.org', $currcfg['URL_ROOT_PATH'], $array_1D[5]) ;
	$link = '<a href="'.$url.'"></a>' ;
	array_push($temp, $link) ;					//link
	array_push($temp, $array_1D[0]) ;			//event_id
	array_push($calender, $temp) ;
}
if($curruser -> is_login()){
	$uid = $_SESSION['uid'] ;
	$module_list_src = $currdb -> sql_query("SELECT `eve_id` FROM `schedule_user` WHERE `uid`='$uid'") ;
	$uEvent = array() ;
	while($array_1D = $currdb -> sql_fetch_array($module_list_src))
		array_push($uEvent, $array_1D[0]) ;
	$currtpl -> assign('uEvent', $uEvent);
}
if(isset($_GET['action'])&& $_GET['action']=="login_failed")
{	
    echo "<script>alert('登入失敗，請確認帳號或密碼是否正確')</script>";
}
if(isset($_GET['action'])&& $_GET['action']=="need_login")
{	
    if (!($curruser -> is_login()))
    	echo "<script>alert('請先登入！')</script>";
}
$currtpl -> assign('calender', $calender);
$currtpl -> assign('is_login', $curruser -> is_login()) ;
// Step3. Output
$currtpl -> add_js("calender.js", true);
$currtpl -> add_css("calender.css", true);
$currtpl -> display('index.tpl.htm');
?>
