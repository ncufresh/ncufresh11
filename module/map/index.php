<?php
// Initialize ArmoredCore
require_once('../../core/ac_boot.php');


$currtpl -> add_js("jquery-ui-1.8.13.custom.min.js", true);
$currtpl -> add_js("mapview.js");

$currtpl -> add_css("index.css");

//AJAX Load Content

// Display with template file compiled
$currtpl -> display("index.tpl.htm");
?>