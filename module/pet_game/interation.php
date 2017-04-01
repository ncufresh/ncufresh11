<?php
require('common.php');

$uid = $_SESSION['uid'];
$logs = load_log($uid);
$currtpl -> assign('logs', $logs);

$currtpl -> set_display(false);
$currtpl -> display('interation.tpl.html');
?>
