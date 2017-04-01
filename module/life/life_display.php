<?php
require_once('../../core/ac_boot.php');
$check=0;
if(!isset($_GET['c1id']))
{
    header("Location: index.php");
	/*$testid=1;
	$testaid=0;*/
}
else
{
    if(!is_numeric($_GET['c1id']))
	{
	
	header("Location: index.php");

	}
	else
	{
	
	$tmpc1id = $_GET['c1id'];
	}
} 

$content_src1 = $currdb -> sql_query("SELECT `sc_name` , `category_id` FROM `life` WHERE `category_id`=$tmpc1id AND `content_id`=0 ORDER BY `sc_category_id` ASC");

$array_2D = array();


while($array_1D = $currdb -> sql_fetch_assoc($content_src1))
{
    $img=$array_1D["category_id"];
	array_push($array_2D, $array_1D);
	$check=1;
}



if($check==0){header("Location: index.php");}

$currtpl -> assign('array_2D', $array_2D);
$currtpl -> assign('img', $img);

$currtpl -> add_css("testmenu_dialog.css");
$currtpl -> add_css("myCSS.css");

$currtpl -> display("life_display.html");

?>
