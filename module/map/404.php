<?php
require_once('../../core/ac_boot.php');
// 404 Page

$currtpl -> add_css("nojs.css");

$currtpl -> set_display(true);
$currtpl -> display('404.tpl.htm');
?>