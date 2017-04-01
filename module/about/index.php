<?php
// Initialize ArmoredCore
require_once('../../core/ac_boot.php');

// Display with template file compiled

$currtpl -> add_js('slimbox2.js', true);
$currtpl -> display("index.tpl.htm");
?>