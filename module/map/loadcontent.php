<?php
require_once('../../core/ac_boot.php');
/*loadcontent.php
**Load Content /w AJAX
*/
$mapid = $_GET['id'];

$sql = "SELECT `name`,`content`,`pic` FROM `map_data` WHERE `id` = '".mysql_real_escape_string($mapid)."';";
$data = $currdb -> sql_query($sql);
$row_data = $currdb -> sql_fetch_assoc($data);

if (!is_null($row_data['content']) or !$data) {
	$currtpl -> assign('content', $row_data['content']);
	$currtpl -> assign('pic', $row_data['pic']);
	$currtpl -> assign('poi_name', $row_data['name']);
	
	$currtpl -> set_display(false);
	$currtpl -> display('loadcontent.tpl.htm');
}
else
{
	//header("location: index.php");
	$currtpl -> assign('poi_name', "ERROR");
	$currtpl -> assign('content', "ERROR Loading content!");
}
?>