<?php
// Initialize ArmoredCore
require_once('../../core/ac_boot.php');

$currtpl -> add_js('jquery-colorbox-min.js', true);

$currtpl -> add_css("jquery-ui-css/smoothness/jquery-ui-1.8.13.custom.css", true);
$currtpl -> add_css("colorbox.css");
$currtpl -> add_css("overview.css");

$currtpl -> add_js("jquery-ui-1.8.13.custom.min.js", true);
$currtpl -> add_js("ui/jquery.ui.core.js", true);
$currtpl -> add_js("ui/jquery.ui.widget.js", true);
$currtpl -> add_js("mapview.js");

//AJAX Load Content

// Display with template file compiled
$currtpl -> display("overview.tpl.htm");
?>