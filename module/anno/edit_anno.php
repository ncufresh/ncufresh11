<?php
require_once('../../core/ac_boot.php');

define('GUI_UPLOAD_TEXT', "新增附檔");
define('GUI_ADD_LINK_TEXT', "新增連結");

$currtpl -> add_js('tiny_mce/jquery.tinymce.js');

// Step1. Check the basic permission and paramater '$_GET['action']'
if(!$currmodule -> is_admin() || !isset($_GET['action']))
{
	redirect(URL_ROOT_PATH."/login.php?redirect_path=".URL_ROOT_PATH."/module/anno/");
}

// Step2. Check the new relative link
if(isset($_POST['submit']) && $_POST['submit'] == GUI_ADD_LINK_TEXT)
{
	// Step2.1. Update/Insert announcement information first
	$curr_tid;
	
	if($_GET['action'] == "op_edit")
	{
		$currdb -> sql_query("UPDATE `anno_topics` SET `title`='".$_POST['title']."', `uid`='".($curruser->uid)."', `datetime`='".time()."', `contents`='".$_POST['contents']."', `ip_addr`='".get_client_ip_addr()."' WHERE `tid`='".intval($_POST['tid'])."'");
		$curr_tid = intval($_POST['tid']);
	}
	else
	if($_GET['action'] == "op_new")
	{
		$currdb -> sql_query("INSERT INTO `anno_topics` (`title`, `uid`, `datetime`, `contents`, `ip_addr`, `is_display`) VALUES ('".$_POST['title']."', '".($curruser->uid)."', '".time()."', '".$_POST['contents']."', '".get_client_ip_addr()."', '0')");
		$curr_tid = $currdb -> sql_insert_id();
	}
	
	
	// Step2.2. Insert the relative link
	$currdb -> sql_query("INSERT INTO `anno_rel_links` (`tid`, `title`, `path`) VALUES ('".$curr_tid."', '".(trim($_POST['rel_link_title']) == "" ? $_POST['rel_link_path'] : $_POST['rel_link_title'] )."', '".$_POST['rel_link_path']."')");
	
	
	// Step2.3. Display/Assign the corresponded template and announcement data
	$_GET['action'] = "edit";
	$_GET['tid']	= $curr_tid;
}

// Step3. Check the upload file
if(isset($_POST['submit']) && $_POST['submit'] == GUI_UPLOAD_TEXT)
{
	// Step3.1. Update/Insert announcement information first
	$curr_tid;
	if($_GET['action'] == "op_edit")
	{
		$currdb -> sql_query("UPDATE `anno_topics` SET `title`='".$_POST['title']."', `uid`='".($curruser->uid)."', `datetime`='".time()."', `contents`='".$_POST['contents']."', `ip_addr`='".get_client_ip_addr()."' WHERE `tid`='".intval($_POST['tid'])."'");
		$curr_tid = intval($_POST['tid']);
	}
	else
	if($_GET['action'] == "op_new")
	{
		$currdb -> sql_query("INSERT INTO `anno_topics` (`title`, `uid`, `datetime`, `contents`, `ip_addr`, `is_display`) VALUES ('".$_POST['title']."', '".($curruser->uid)."', '".time()."', '".$_POST['contents']."', '".get_client_ip_addr()."', '0')");
		$curr_tid = $currdb -> sql_insert_id();
	}
	
	// Step2.2. upload the attachment file
	$date_prefix = date("Ymd_His", time());
	$currdb -> sql_query("INSERT INTO `anno_attachment` (`tid`, `title`, `path`) VALUES ('".$curr_tid."', '".(trim($_POST['attach_title']) == "" ? $_FILES['attach_file']['name'] : $_POST['attach_title'] )."', '".URL_ROOT_PATH."/module/anno/attachment/".$date_prefix."_".$_FILES['attach_file']['name']."')");
	move_uploaded_file($_FILES['attach_file']['tmp_name'], (ROOT_PATH."/module/anno/attachment/".$date_prefix."_".$_FILES['attach_file']['name']));
	
	
	// Step2.3. Display/Assign the corresponded template and announcement data
	$_GET['action'] = "edit";
	$_GET['tid']	= $curr_tid;
}


// Step5. Check the action and select the corresponded operations
switch($_GET['action'])
{
	case "edit":
		if(isset($_GET['tid']) && intval($_GET['tid']) > 0)
		{
			// Step2.1. Select the annocement corresponded to the request 'tid'
			$anno = $currdb -> sql_fetch_array($currdb -> sql_query("SELECT `anno_topics`.*, `ac_user`.* FROM `anno_topics` LEFT JOIN `ac_user` ON `anno_topics`.`uid` = `ac_user`.`uid`  WHERE `tid`='".intval($_GET['tid'])."'"));
			$anno['datetime'] = date("Y-m-d H:i:s", $anno['datetime']);
			$currtpl -> assign('anno', $anno);
			
			
			// Step2.2. Assign the corresponded variables
			$currtpl -> assign('post_title', $anno['title']);
			$currtpl -> assign('post_contents', $anno['contents']);
			$currtpl -> assign('post_is_display', $anno['is_display']);
			
			$currtpl -> assign('post_tid', $anno['tid']);
			$currtpl -> assign('next_action', "op_edit");
			
			
			
			// Step2.3. List the relative links
			$rel_link_src = $currdb -> sql_query("SELECT * FROM `anno_rel_links` WHERE `tid` = '".$anno['tid']."'");
			$rel_link_array = array();
			while($rel_link_processing = $currdb -> sql_fetch_array($rel_link_src))
			{
				array_push($rel_link_array, $rel_link_processing);
			}
			$currtpl -> assign('rel_link_array', $rel_link_array);
			
			
			// Step2.4. List the attachment files
			$attach_file_src = $currdb -> sql_query("SELECT * FROM `anno_attachment` WHERE `tid` = '".$anno['tid']."'");
			$attach_file_array = array();
			while($attach_file_processing = $currdb -> sql_fetch_array($attach_file_src))
			{
				array_push($attach_file_array, $attach_file_processing);
			}
			$currtpl -> assign('attach_file_array', $attach_file_array);
			
			// Step2.5. Output to the corresponded template
			$currtpl -> display('edit_anno.tpl.htm');
		}
		else
		{
			exit();
		}
		break;
	case "delete":
		if(isset($_GET['tid']) && intval($_GET['tid']) > 0)
		{
			// Step2.1. Select the annocement corresponded to the request 'tid'
			$anno = $currdb -> sql_fetch_array($currdb -> sql_query("SELECT `anno_topics`.*, `ac_user`.* FROM `anno_topics` LEFT JOIN `ac_user` ON `anno_topics`.`uid` = `ac_user`.`uid`  WHERE `tid`='".intval($_GET['tid'])."'"));
			$anno['datetime'] = date("Y-m-d H:i:s", $anno['datetime']);
			$currtpl -> assign('anno', $anno);
			
			// Step2.2. Output to the corresponded template
			// --------------------------------------------
		}
		else
		{
			exit();
		}
		break;
	case "new":
		// Step2.1. Assign the corresponded variables
		$currtpl -> assign('post_title', NULL);
		$currtpl -> assign('post_contents', NULL);
		$currtpl -> assign('post_is_display', "1");
		
		$currtpl -> assign('post_tid', NULL);
		$currtpl -> assign('next_action', "op_new");
		
		// Step2.2. Output the template
		$currtpl -> display('edit_anno.tpl.htm');
		break;
		
	case "op_edit":
	case "op_new":
		// Step2.1. Check if all columns has been filled
		$is_form_checked = true;
		$error_message = "<ol>\n";
		
		if(mb_strlen($_POST['title'],'UTF-8') > 25)
		{
			$is_form_checked = false;
			$error_message .= "<li>標題超過28個字元</li>\n";
		}
		
		if(trim($_POST['title']) == "")
		{
			$is_form_checked = false;
			$error_message .= "<li>標題尚未正確填寫</li>\n";
		}
		
		if(trim($_POST['contents']) == "")
		{
			$is_form_checked = false;
			$error_message .= "<li>內容尚未正確填寫</li>\n";
		}
		
		if($_GET['action']=="op_edit" && (!isset($_POST['tid']) || intval($_POST['tid']) <= 0))
		{
			$is_form_checked = false;
			$error_message .= "<li>發生嚴重錯誤，請重新填寫</li>\n";
		}
		
		$error_message .= "</ol>\n";
		
		// Step2. Stop processing if there exist some columns which hasn't been filled correctly
		if(!$is_form_checked)
		{
			// Step2.1. If the format of form is invalid
			$currtpl -> assign('post_title', $_POST['title']);
			$currtpl -> assign('post_contents', $_POST['contents']);
			$currtpl -> assign('post_is_display', $_POST['is_display']);
			
			$currtpl -> assign('post_tid', isset($anno['tid'])?$anno['tid']:'');
			$currtpl -> assign('next_action', ($_GET['action'] == "op_edit") ? "op_edit" : "op_new");
			
			$currtpl -> assign('error_message', $error_message);
			
			
			if($_GET['action'] == "op_edit")
			{
				// Step2.2. List the relative links
				$rel_link_src = $currdb -> sql_query("SELECT * FROM `anno_rel_links` WHERE `tid` = '".intval($_POST['tid'])."'");
				$rel_link_array = array();
				while($rel_link_processing = $currdb -> sql_fetch_array($rel_link_src))
				{
					array_push($rel_link_array, $rel_link_processing);
				}
				$currtpl -> assign('rel_link_array', $rel_link_array);
				
				
				// Step2.3. List the attachment files
				$attach_file_src = $currdb -> sql_query("SELECT * FROM `anno_attachment` WHERE `tid` = '".intval($_POST['tid'])."'");
				$attach_file_array = array();
				while($attach_file_processing = $currdb -> sql_fetch_array($attach_file_src))
				{
					array_push($attach_file_array, $attach_file_processing);
				}
				$currtpl -> assign('attach_file_array', $attach_file_array);
			}
			
			// Step2.4. Output the corresponded template
			$currtpl -> display('edit_anno.tpl.htm');
		}
		
		// Step3. Write into database if all columns has been filled correctly
		else
		{
			if($_GET['action'] == "op_edit")
			{
				$currdb -> sql_query("UPDATE `anno_topics` SET `title`='".$_POST['title']."', `uid`='".($curruser -> uid)."', `datetime`='".time()."', `contents`='".$_POST['contents']."', `ip_addr`='".get_client_ip_addr()."', `is_display`='".$_POST['is_display']."' WHERE `tid`='".intval($_POST['tid'])."'");
				
				redirect("list_anno.php?action=update_success");
			}
			else
			{
				$currdb -> sql_query("INSERT INTO `anno_topics` (`title`, `uid`, `datetime`, `contents`, `ip_addr`, `is_display`) VALUES ('".$_POST['title']."', '".($curruser -> uid)."', '".time()."', '".$_POST['contents']."', '".get_client_ip_addr()."', '".$_POST['is_display']."')");
				//echo "This is INSERT T________T";
				redirect("list_anno.php?action=insert_success");
			}	
				
			
		}
		break;
	case "op_delete":
		// --------------------------------------------
		break;
}
?>