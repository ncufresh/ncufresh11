<?php
require_once('../../core/ac_boot.php');
if(!isset($_GET['mon']))
{
$getmonth=8;
}
else
{
    if($_GET['mon']==9)
	{
	
          $getmonth=9;

	}
	else
	{
	
          $getmonth=8;
	}
}


/*讀取帳號資料的user ID*/
$content_src1 = $currdb -> sql_query("SELECT * FROM `schedule_user` WHERE `uid`=1 ");
                                                                     /*此資料表中的uid*/
$getevent=array();
										
										for($i=1;$i<19;$i++)
										{

												$currtpl -> assign("event".$i,"event".$i."_red");

										}
										 
	while($array = $currdb -> sql_fetch_assoc($content_src1))
	{
	
		$currtpl -> assign("event".$array['eve_id'],"event".$array['eve_id']."_normal");

	}







						//$currtpl -> add_css("readme.css");
						$currtpl -> add_css("schedule.css");

if($getmonth==9)
{
$currtpl -> display("schedule_menu9.html");
}
if($getmonth==8)
{
$currtpl -> display("schedule_menu8.html");
}

?>