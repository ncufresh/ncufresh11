<?php
	// Initialize ArmoredCore
	require_once('../../core/ac_boot.php');
	require_once('common.php');

	//зR░глHеє
	if(isset($_GET['del_id']))
	{
		$mailid = (int)$_GET['del_id'];
		$uid = $_SESSION['uid'];
		// foreach($mailids as $mailid)
		// {
			// $sql .= "DELETE FROM `personal_mails` WHERE `id`='".$mailid."';" ;
		// }
		$sql = "DELETE FROM `personal_mails` WHERE `id` = '$mailid' AND `uid` = '$uid';" ;
		$currdb -> sql_query($sql);
	}
	
	
	$mails_src = $currdb -> sql_query("SELECT `personal_mails`.*, `ac_user`.`username` FROM `personal_mails` INNER JOIN `ac_user` ON (`personal_mails`.`senderid` = `ac_user`.`uid`) WHERE `personal_mails`.`uid`='$uid' ORDER BY `personal_mails`.`id` DESC;");
	$mails = array();
	while($mail = $currdb -> sql_fetch_array($mails_src))
	{
		$mail['date'] = date('Y-m-d', $mail['date']);
		array_push($mails, $mail);
	}
	$currtpl -> assign('mails', $mails);
	
	include('mailbox.php');
	
	$currtpl -> add_js('mail.js');
	$currtpl -> add_js('jquery.min.js');
	$currtpl -> add_js('jquery.mousewheel.min.js');
	$currtpl -> add_js('slides.min.jquery.js');
	$currtpl -> add_js('loopedscroll.js');
	// Display with template file compiled
	$currtpl -> display("mail.tpl.htm");
?>