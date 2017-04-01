<?php
require_once('../../core/ac_boot.php');

if(!$currmodule -> is_system())
{
	exit();
}

switch($_GET['action'])
{
case "is_frame_exec_exist":
	if(isset($_GET['mid']) && intval($_GET['mid']) > 0 && isset($_GET['frame_exec']) && $_GET['frame_exec'] != "")
	{
		$count = $currdb -> sql_fetch_array($currdb -> sql_query("SELECT count(*) FROM `ac_block` WHERE `mid` = '".intval($_GET['mid'])."' AND `frame_exec` = '".$_GET['frame_exec']."'"));
		echo (intval($count['count(*)']) > 0 ? "1" : "0");
	}
	else
	{
		echo "0";
	}
	break;
case "is_u_g_exist":
	echo (isset($_GET['u_g_name']) && $_GET['u_g_name'] != "" && isset($_GET['u_g_type']) && ($_GET['u_g_type'] == "user" || $_GET['u_g_type'] == "group")) ? ($_GET['u_g_type'] == "user" ? (ac_user::is_user_exist_by_name($_GET['u_g_name']) ? "1" : "0"):(ac_group::is_group_exist_by_name($_GET['u_g_name']) ? "1" : "0")) : "0";
	break;
case "isUserExist":
	echo (isset($_GET['username']) && $_GET['username'] != "") ? (ac_user::is_user_exist_by_name($_GET['username']) ? "1" : "0") : "0";
	break;
case "isGroupExist":
	echo (isset($_GET['group_name']) && $_GET['group_name'] != "") ? (ac_group::is_group_exist_by_name($_GET['group_name']) ? "1" : "0") : "0";
	break;
}
?>