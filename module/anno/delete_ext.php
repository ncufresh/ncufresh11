<?php
require_once('../../core/ac_boot.php');

// Step1. Check the permission of current user
if(!$currmodule->is_admin() || !isset($_GET['action']))
{
	exit();
}

// Step2. Determine the action by the input paramater
switch($_GET['action'])
{
	case "op_rel_link_delete":
		if(isset($_GET['urlid']) && intval($_GET['urlid']) > 0)
		{
			$currdb -> sql_query("DELETE FROM `anno_rel_links` WHERE `urlid` = '".intval($_GET['urlid'])."'");
		}
		break;
	case "op_attachfile_delete":
		if(isset($_GET['fid']) && intval($_GET['fid']) > 0)
		{
			// Step1. Fetch the corresponded data from MySQL
			$file_del = $currdb -> sql_fetch_array($currdb -> sql_query("SELECT * FROM `anno_attachment` WHERE `fid` = '".intval($_GET['fid'])."'"));
			
			// Step2. Delete the attachment file
			unlink(str_replace(URL_ROOT_PATH, ROOT_PATH, $file_del['path']));
			
			// Step3. Delete the corresponded data from MySQL
			$currdb -> sql_query("DELETE FROM `anno_attachment` WHERE `fid` = '".intval($_GET['fid'])."'");
		}
		break;
	case "op_anno_delete":
		if(isset($_GET['tid']) && intval($_GET['tid']) > 0)
		{
			// Step1. Delete the corresponded relative links from MySQL
			$rel_link_del = $currdb -> sql_query("DELETE FROM `anno_rel_links` WHERE `tid` = '".intval($_GET['tid'])."'");
			
			// Step2. Delete the corresponded attachment files from MySQL
			$file_del_src = $currdb -> sql_query("SELECT * FROM `anno_attachment` WHERE `tid` = '".intval($_GET['tid'])."'");
			while($file_del_data = $currdb -> sql_fetch_array($file_del_src))
			{
				unlink(str_replace(URL_ROOT_PATH, ROOT_PATH, $file_del_data['path']));	
			}
			$currdb -> sql_query("DELETE FROM `anno_attachment` WHERE `tid` = '".intval($_GET['tid'])."'");
			
			// Step3. Delete the announcement from MySQL
			$currdb -> sql_query("DELETE FROM `anno_topics` WHERE `tid` = '".intval($_GET['tid'])."'");
		}
		break;
}
?>

