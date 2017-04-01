<?php
// Initialize ArmoredCore
require_once('../../core/ac_boot.php');

// Display with template file compiled
$currtpl -> add_css("WebMapCSS.css");
$currtpl -> display("web_map.tpl.htm");
?>