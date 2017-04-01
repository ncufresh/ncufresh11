<?php

require_once('../../core/ac_boot.php');
if($curruser -> is_login()){
	$uid = $_SESSION['uid'] ;
	                       }



if(!isset($_GET['send_eveid']))
{
    header("Location: schedule_menu.php");

}
else
{
    if(!is_numeric($_GET['send_eveid']))
	{
	
	header("Location: schedule_menu.php");

	}
	else
	{
	$geteve_id = (int)$_GET['send_eveid'];
	}
} 


	

$connect = $currdb -> sql_query("INSERT INTO `schedule_user`(`uid`,`eve_id`)VALUES($uid,$geteve_id)");
header("Location: schedule_content.php?con=$geteve_id");

?>