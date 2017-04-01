<?php
require_once('../../core/ac_boot.php');

if(!$currmodule -> is_system())
{
	exit();
}


switch($_GET['action'])
{
case "add":
	if(isset($_POST['form_block_new_block_name'])
		&& $_POST['form_block_new_block_name'] != ""
		&& isset($_POST['form_block_new_mid'])
		&& intval($_POST['form_block_new_mid']) > 0
		&& isset($_POST['form_block_new_frame_exec'])
		&& preg_match("/^[._0-9a-zA-Z]+(\.php)$/", $_POST['form_block_new_frame_exec'])
		&& isset($_POST['form_block_new_frame_tpl'])
		&& preg_match("/^[._0-9a-zA-Z]+(\.htm)$/", $_POST['form_block_new_frame_tpl']))
	{
		$count = $currdb -> sql_fetch_array($currdb -> sql_query("SELECT count(*) FROM `ac_block` WHERE `mid` = '".intval($_POST['form_block_new_mid'])."' AND `frame_exec` = '".$_POST['form_block_new_frame_exec']."'"));
		if(intval($count['count(*)']) == 0)
		{
			$currdb -> sql_query("INSERT INTO `ac_block` (`block_name`, `mid`, `frame_exec`, `frame_tpl`, `block_desc`) VALUES ('".$_POST['form_block_new_block_name']."', '".intval($_POST['form_block_new_mid'])."', '".$_POST['form_block_new_frame_exec']."', '".$_POST['form_block_new_frame_tpl']."', '".$_POST['form_block_new_block_desc']."')");
			redirect("index.php#admin_main-3");
		}
	}
	break;
case "edit":
	if(isset($_POST['form_block_edit_block_name'])
		&& $_POST['form_block_edit_block_name'] != ""
		&& isset($_POST['form_block_edit_mid'])
		&& intval($_POST['form_block_edit_mid']) > 0
		&& isset($_POST['form_block_edit_frame_exec'])
		&& preg_match("/^[._0-9a-zA-Z]+(\.php)$/", $_POST['form_block_edit_frame_exec'])
		&& isset($_POST['form_block_edit_frame_tpl'])
		&& preg_match("/^[._0-9a-zA-Z]+(\.htm)$/", $_POST['form_block_edit_frame_tpl'])
		&& isset($_POST['form_block_edit_bid'])
		&& intval($_POST['form_block_edit_bid']) > 0)
	{
		$currdb -> sql_query("UPDATE `ac_block` SET `block_name` = '".$_POST['form_block_edit_block_name']."', `mid` = '".intval($_POST['form_block_edit_mid'])."', `frame_exec` = '".$_POST['form_block_edit_frame_exec']."', `frame_tpl` = '".$_POST['form_block_edit_frame_tpl']."', `block_desc` = '".$_POST['form_block_edit_block_desc']."' WHERE `bid` = '".$_POST['form_block_edit_bid']."'");
		redirect("index.php#admin_main-3");
	}
	break;
case "delete":
	if(isset($_GET['bid']) && intval($_GET['bid']) > 0)
	{
		$currdb -> sql_query("DELETE FROM `ac_block` WHERE `bid` = '".intval($_GET['bid'])."'");
		redirect("index.php#admin_main-3");
	}
	break;
}
?>