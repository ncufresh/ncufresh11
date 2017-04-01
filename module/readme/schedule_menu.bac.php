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

		
		for($i=1;$i<19;$i++)
		{

				$currtpl -> assign("event".$i,"event".$i."_red");

		}



if($curruser -> is_login()){
	$uid = $_SESSION['uid'] ;
	$user_info = $currdb -> sql_query("SELECT * FROM `schedule_user` WHERE `uid`=$uid");
	
									while($array = $currdb -> sql_fetch_assoc($user_info))
								   {
								
									$currtpl -> assign("event".$array['eve_id'],"event".$array['eve_id']."_normal");

								   }
							}
						
/*讀取帳號資料的user ID*/

                                                                     /*此資料表中的uid*/


						//$currtpl -> add_css("readme.css");
$currtpl -> add_css("schedule.bac.css");

if($getmonth==9)
{
$currtpl -> display("schedule_menu9.html.bac.html");
}
if($getmonth==8)
{
$currtpl -> display("schedule_menu8.html");
}

?>
