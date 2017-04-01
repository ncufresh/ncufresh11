<?php
require_once('../../core/ac_boot.php');
$has_anno = true;

/* ÀË¬d¿é¤J tid */
if(!isset($_GET['tid']) || $_GET['tid'] == '')
	$has_anno = false;

if ( intval($_GET['tid'])<=0 )
	$has_anno = false;

$tid = intval(mysql_real_escape_string($_GET['tid']));


if ($has_anno)
{
	// Step1. Select the corresponded announcement
	$anno = $currdb -> sql_fetch_array($currdb -> sql_query("SELECT `anno_topics`.*, `ac_user`.`uid`, `ac_user`.`username` FROM `anno_topics` LEFT JOIN `ac_user` ON `anno_topics`.`uid` = `ac_user`.`uid` WHERE `tid` = '".$tid."'"));
	if ($anno) 
	{
		$anno['datetime'] = date("Y-m-d H:i:s", $anno['datetime']);
		$anno['contents'] = htmlencode($anno['contents']);
		$currtpl -> assign('anno', $anno);
		
		// Step2. Select the corresponded attachment file
		$file_src = $currdb -> sql_query("SELECT * FROM `anno_attachment` WHERE `tid` = '".$anno['tid']."' ORDER BY `fid` ASC");
		$file_array = array();
		while($file_processing = $currdb -> sql_fetch_array($file_src))
		{
			array_push($file_array, $file_processing);
		}
		$currtpl -> assign('is_file_exist', ($currdb -> sql_num_rows($file_src) > 0));
		$currtpl -> assign('file_array', $file_array);
		
		// Step3. Select the corresponded relative links
		$link_src = $currdb -> sql_query("SELECT * FROM `anno_rel_links` WHERE `tid` = '".$anno['tid']."' ORDER BY `urlid` ASC");
		$link_array = array();
		while($link_processing = $currdb -> sql_fetch_array($link_src))
		{
			array_push($link_array, $link_processing);
		}
		$currtpl -> assign('is_link_exist', ($currdb -> sql_num_rows($link_src) > 0));
		$currtpl -> assign('link_array', $link_array);
		$has_anno = true;
	}
	else {
		$has_anno = false;
	}
}

// Step4. Output to the template
$currtpl -> assign('has_anno', $has_anno);
$currtpl -> add_css('style.css');
$currtpl -> display('show_anno.tpl.htm');
?>