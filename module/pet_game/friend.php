<?php
require('common.php');

$uid = $_SESSION['uid'];
$friends_src = $currdb -> sql_query("SELECT `personal_friends`.`uid`, `personal_friends`.`friendid`, `personal_data`.`name`,`personal_data`.`nickname` , `personal_data`.`nickname`, `pets`.`type`, `pets`.`level` FROM `personal_friends` INNER JOIN `personal_data` ON (`personal_friends`.`friendid` = `personal_data`.`uid` ) INNER JOIN `pets` ON (`personal_friends`.`friendid` = `pets`.`uid`) WHERE `personal_friends`.`uid` = '$uid' AND `personal_friends`.`state` = 'friend';");

$path = 'templates/zh_tw/images/pets/40/';
$friends = array();
while($friend = $currdb -> sql_fetch_assoc($friends_src)){
	$friend['img_src'] = $path . pet_pic_encode($friend['type'] , $friend['level']);
	array_push($friends, $friend);
}

$currtpl -> assign('friends', $friends);

$currtpl -> set_display(false);
$currtpl -> display('friend.tpl.html');
?>
