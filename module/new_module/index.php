<?php
// Initialize ArmoredCore
require_once('../../core/ac_boot.php');

// Example of item 5
$module_list_src = $currdb -> sql_query("SELECT `module_name`, `module_desc` FROM `ac_module` ORDER BY `mid` ASC");
$array_2D = array();
while($array_1D = $currdb -> sql_fetch_array($module_list_src))
{
	array_push($array_2D, $array_1D);
}
$currtpl -> assign('array_2D', $array_2D);

// Example of item 6
$is_admin = ($currmodule -> is_admin()) ? "O" : "X";
$currtpl -> assign('is_admin', $is_admin);

// Display with template file compiled
$currtpl -> display("index.tpl.htm");
?>