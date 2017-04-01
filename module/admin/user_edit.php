<?php
require_once('../../core/ac_boot.php');

if(!$currmodule -> is_system())
{
	exit();
}


switch($_GET['action'])
{
case "new":
	if(isset($_POST['form_user_new_username']) && $_POST['form_user_new_username'] != "" && isset($_POST['form_user_new_password']) && $_POST['form_user_new_password'] != "")
	{
		$currdb -> sql_query("INSERT INTO `ac_user` (`username`, `password`) VALUES ('".$_POST['form_user_new_username']."', '".ac_user_db_password_en_alg($_POST['form_user_new_password'])."')");

		redirect("index.php#admin_main-5");
	}
	break;
case "delete":
	if(isset($_GET['uid']) && intval($_GET['uid']) > 0)
	{
		$currdb -> sql_query("DELETE FROM `ac_user` WHERE `uid` = '".intval($_GET['uid'])."'");
		$currdb -> sql_query("DELETE FROM `ac_group_list` WHERE `uid` = '".intval($_GET['uid'])."'");
		$currdb -> sql_query("DELETE FROM `ac_perm` WHERE `u_g_type` = 'user' AND `u_g_id` = '".intval($_GET['uid'])."'");
		
		redirect("index.php#admin_main-5");
	}
	break;
}
?>