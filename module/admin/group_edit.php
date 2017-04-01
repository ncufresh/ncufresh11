<?php
require_once('../../core/ac_boot.php');

if(!$currmodule -> is_system())
{
	exit();
}


switch($_GET['action'])
{
case "group_add":
	if(isset($_POST['form_group_new_group_name']) && preg_match("/^[_0-9a-zA-Z]+$/", $_POST['form_group_new_group_name']) && !ac_group::is_group_exist_by_name($_POST['form_group_new_group_name']))
	{
		$currdb -> sql_query("INSERT INTO `ac_group` (`group_name`, `group_desc`) VALUES ('".$_POST['form_group_new_group_name']."', '".$_POST['form_group_new_group_desc']."')");
		
		redirect("index.php#admin_main-4");
	}
	break;
case "group_delete":
	if(isset($_GET['gid']) && intval($_GET['gid']) > 0)
	{
		$currdb -> sql_query("DELETE FROM `ac_group` WHERE `gid` = '".intval($_GET['gid'])."'");
		$currdb -> sql_query("DELETE FROM `ac_group_list` WHERE `gid` = '".intval($_GET['gid'])."'");
		$currdb -> sql_query("DELETE FROM `ac_perm` WHERE `u_g_type` = 'group' AND `u_g_id` = '".intval($_GET['gid'])."'");
		
		redirect("index.php#admin_main-4");
	}
	break;
case "group_edit":
	if(isset($_POST['form_group_edit_group_name']) && preg_match("/^[_0-9a-zA-Z]+$/", $_POST['form_group_edit_group_name']) && isset($_POST['form_group_edit_gid']) && intval($_POST['form_group_edit_gid']) > 0)
	{
		$currdb -> sql_query("UPDATE `ac_group` SET `group_name`='".$_POST['form_group_edit_group_name']."', `group_desc`='".$_POST['form_group_edit_group_desc']."' WHERE `gid`='".intval($_POST['form_group_edit_gid'])."'");
		
		redirect("index.php#admin_main-4");
	}
	break;
case "member_new":
	$user_info = (isset($_POST['form_group_member_new_username']) && isset($_POST['form_group_member_new_gid']) && intval($_POST['form_group_member_new_gid']) > 0) ? ac_user::get_user_by_name($_POST['form_group_member_new_username']) : false;
	if($user_info != false)
	{
		$currdb -> sql_query("INSERT INTO `ac_group_list` (`uid`, `gid`) VALUES ('".$user_info['uid']."', '".intval($_POST['form_group_member_new_gid'])."')");
		
		redirect("index.php#admin_main-4");
	}
	break;
case "member_delete":
	if(isset($_GET['gl_id']) && intval($_GET['gl_id']) > 0)
	{
		$currdb -> sql_query("DELETE FROM `ac_group_list` WHERE `gl_id` = '".intval($_GET['gl_id'])."'");
		
		redirect("index.php#admin_main-4");
	}
	break;
}
?>