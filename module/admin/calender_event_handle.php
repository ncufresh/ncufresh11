<?php
// Initialize ArmoredCore
require_once('../../core/ac_boot.php');
//add
if(isset($_POST['startdate'])){
	$id = $_POST['eventid'] ;
	$title = $_POST['title'] ;
	$start = $_POST['startdate'] ;
	$end = $_POST['enddate'] ;
	$row = $_POST['row'] ;
	$link = $_POST['link'] ;
	//echo $title.'<br/>'.$start.'<br/>'.$end.'<br/>'.$row.'<br/>'.$link ;
	$sql = "INSERT INTO `calender_event`(`id`, `title`, `start`, `end`, `rows`, `link`) VALUES($id, '$title', '$start', '$end', '$row', '$link');" ;
	echo $sql ;
	$currdb -> sql_query($sql) ;
}

//delete
if(isset($_POST['event'])){
	$mailid = $_POST['event'] ;
	foreach($mailid as $id){
		$sql = "DELETE FROM `calender_event` WHERE `id`='".$id."'" ;
		$currdb -> sql_query($sql) ;
	}
}

// Example of item 5
$module_list_src = $currdb -> sql_query("SELECT `id`, `title`, `start`, `end`, `rows`, `link` FROM `calender_event` ORDER BY `start` ASC");
$calender = array();
while($array_1D = $currdb -> sql_fetch_array($module_list_src))
{
	$temp = array() ;
	$d = new DateTime($array_1D[2]) ;
	array_push($temp, date_format($d, 'm-d')) ;	//startsate
	$d = new DateTime($array_1D[3]) ;
	array_push($temp, date_format($d, 'm-d')) ;	//enddate
	array_push($temp, $array_1D[1]) ;			//title
	array_push($temp, $array_1D[4]) ;			//rows
	$link = '<a href="'.$array_1D[5].'"></a>' ;
	array_push($temp, $link) ;					//link
	array_push($temp, $array_1D[0]) ;			//event_id
	array_push($calender, $temp) ;
}
$currtpl -> assign('calender', $calender);

// Display with template file compiled
$currtpl -> display("calender_event_handle.html");
?>