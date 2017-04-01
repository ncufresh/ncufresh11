<?php

require_once('../../core/ac_boot.php');
$type="UNDONE";
$ifcheck=0;

if(!isset($_GET['con']))
{
    header("Location: schedule_menu.php");

}
else
{
    if(!is_numeric($_GET['con']))
	{
	
	header("Location: schedule_menu.php");

	}
	else
	{
	
	$getcon = (int)$_GET['con'];

	}
} 



if($curruser -> is_login()){
	$uid = $_SESSION['uid'] ;
	
	
								$content_src2 = $currdb -> sql_query("SELECT * FROM `schedule_user` WHERE `uid`=$uid  AND `eve_id`=$getcon");/*讀取帳戶有關該文案資料*/

									while($judge = $currdb -> sql_fetch_assoc($content_src2))
										{
										$ifcheck=1;
										$type="DONE";
										}
	
	
	
	
	
	                       }

						   
						   						   
	else{

        $ifcheck=99;
        $type="NO LOGIN"; 
		}





	
$content_src1 = $currdb -> sql_query("SELECT * FROM `schedule_display` WHERE `content_id`=$getcon ");/*讀取文案資料*/



$array_2D=array();

											while($array_1D = $currdb -> sql_fetch_assoc($content_src1))
											{
												array_push($array_2D, $array_1D);    	
												
											}

$currtpl -> assign('ifcheck', $ifcheck);											
$currtpl -> assign('type', $type);
$currtpl -> assign('array_2D', $array_2D);
$currtpl -> assign('getcon', $getcon);
$currtpl -> add_css("schedule.css");
$currtpl -> display("schedule_content.html");


?>