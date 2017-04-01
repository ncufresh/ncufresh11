<?php
// Initialize ArmoredCore
require_once('../../core/ac_boot.php');

// Display with template file compiled
$currtpl -> add_css("ClubCSS.css");
$currtpl -> display("club_friendship.tpl.htm");
?>