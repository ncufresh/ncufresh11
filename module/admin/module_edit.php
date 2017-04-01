<?php
require_once('../../core/ac_boot.php');

if(!$currmodule -> is_system())
{
	exit();
}


switch($_GET['action'])
{
case "info_edit":
	if(isset($_POST['mid']) && intval($_POST['mid']) > 0)
	{		
		$currdb -> sql_query("UPDATE `ac_module` SET `module_desc` = '".$_POST['module_desc']."' WHERE `mid` = '".intval($_POST['mid'])."'");
		redirect("index.php#admin_main-2");
	}
	break;
case "info_delete":
	if(isset($_GET['mid']) && intval($_GET['mid']) > 0)
	{
		$currdb -> sql_query("DELETE FROM `ac_module` WHERE `mid` = '".intval($_GET['mid'])."'");
		
		$currdb -> sql_query("DELETE FROM `ac_perm` WHERE `mid` = '".intval($_GET['mid'])."'");
		
		redirect("index.php#admin_main-2");
	}
	break;
case "info_add":
	if(isset($_POST['new_module_name']) && preg_match("/^[_0-9a-zA-Z]{1,32}$/", $_POST['new_module_name']))
	{
		$count = $currdb -> sql_query("SELECT * FROM `ac_module` WHERE `module_name` = '".$_POST['new_module_name']."'");
		if($currdb -> sql_num_rows($count) == 0)
		{
			$currdb -> sql_query("INSERT INTO `ac_module` (`module_name`, `module_desc`) VALUES ('".$_POST['new_module_name']."', '".$_POST['new_module_desc']."')");
		}
		redirect("index.php#admin_main-2");
	}
	break;

case "adm_perm_delete":
	if(isset($_GET['ma_id']) && intval($_GET['ma_id']) > 0)
	{
		$currdb -> sql_query("DELETE FROM `ac_perm` WHERE `ma_id` = '".intval($_GET['ma_id'])."'");
		redirect("index.php#admin_main-2");
	}
	break;
case "adm_perm_add":
	if(isset($_POST['form_adm_manage_u_g_type'])
		&& ($_POST['form_adm_manage_u_g_type'] =="user" || $_POST['form_adm_manage_u_g_type'] == "group")
		&& isset($_POST['form_adm_manage_u_g_name'])
		&& $_POST['form_adm_manage_u_g_name'] != ""
		&& isset($_POST['form_adm_manage_mid'])
		&& intval($_POST['form_adm_manage_mid']) > 0)
	{
		if((($_POST['form_adm_manage_u_g_type'] == "group" && ac_group::is_group_exist_by_name($_POST['form_adm_manage_u_g_name'])) || ($_POST['form_adm_manage_u_g_type'] == "user" && ac_user::is_user_exist_by_name($_POST['form_adm_manage_u_g_name']))) && ac_module::is_module_exist_by_mid($_POST['form_adm_manage_mid']))
		{
			$id = $currdb -> sql_fetch_array($currdb -> sql_query("SELECT * FROM `ac_".($_POST['form_adm_manage_u_g_type'] == "group" ? "group" : "user")."` WHERE `".($_POST['form_adm_manage_u_g_type'] == "group" ? "group_name" : "username")."` = '".$_POST['form_adm_manage_u_g_name']."'"));
			$u_g_id = ($_POST['form_adm_manage_u_g_type'] == "group" ? $id['gid'] : $id['uid']);
			
			$currdb -> sql_query("INSERT INTO `ac_perm` (`u_g_type`, `u_g_id`, `mid`, `is_valid`, `is_admin`, `is_system`) VALUES ('".$_POST['form_adm_manage_u_g_type']."', '".$u_g_id."', '".$_POST['form_adm_manage_mid']."', '1','1','". (intval($_POST['form_adm_manage_mid']) == 1 ? "1" : "0")  ."')");
			redirect("index.php#admin_main-2");
		}
	}
	break;
}
?>