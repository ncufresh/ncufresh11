<?php
if(!defined('AC_INCLUDED'))
{
	exit();
}

$block_var = array();

global $currdb, $currmodule;

// Step1. Announcement data source
$anno_src = $currdb -> sql_query("SELECT * FROM `forum_threads` WHERE `parent_id` = 0 AND `visible` = 1 ORDER BY `updated` DESC LIMIT 0,5");
$block_var['forum_array'] = array();
while($anno_processing = $currdb -> sql_fetch_array($anno_src) )
{
	$anno_processing['datetime'] = date("Y-m-d", $anno_processing['updated']);
	if (mb_strlen($anno_processing['title'],'UTF-8') >= 15) //標題過長的情況
	{
		$anno_processing['title'] = mb_substr($anno_processing['title'],0,15,'UTF-8');
		$anno_processing['title'] = $anno_processing['title'].'…';
	}
	
	
	array_push($block_var['forum_array'], $anno_processing);
}

?>
