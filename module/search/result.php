<?php
// Initialize ArmoredCore
require_once('../../core/ac_boot.php');


if (isset($_GET['q']) and $_GET['q']!='')
	$currtpl -> assign('not_found', false);
else
	$currtpl -> assign('not_found', true);

$currtpl -> assign('header_img','templates/zh_tw/images/'.rand(1,12).'.png');

// Display with template file compiled
$currtpl -> add_css("style.css");
$currtpl -> display("result.tpl.htm");

?>