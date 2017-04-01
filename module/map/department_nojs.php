<?php
require_once('../../core/ac_boot.php');
/*loadcontent.php
**for people who doesn't have JavaScript turned on.
*/
$id = $_GET['id'];

$sql = "SELECT `name`,`content`,`pic` FROM `map_data` WHERE `id` = '".mysql_real_escape_string($id)."';";
$data = $currdb -> sql_query($sql);
$row_data = $currdb -> sql_fetch_assoc($data);
$currtpl -> add_css("nojs.css");

if (!is_null($row_data['content']) and $data) {
	$currtpl -> assign('content', $row_data['content']);
	$currtpl -> assign('pic', $row_data['pic']);
	$currtpl -> assign('poi_name', $row_data['name']);
	
	$currtpl -> set_display(true);
	$currtpl -> display('department_nojs.tpl.htm');
}
else
	header("location: 404.php");
?>