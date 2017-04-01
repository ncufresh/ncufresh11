<?php
require_once('../../core/ac_boot.php');
$check=0;
if(!isset($_GET['cid'])or!isset($_GET['Cid']))
{
    header("Location: index.php");
	/*$testid=1;
	$testaid=0;*/
}
else
{
    if(!(is_numeric($_GET['cid']) AND is_numeric($_GET['Cid'])))
	{
	
	header("Location: index.php");

	}
	else
	{
	
	$testcid = $_GET['cid'];
	$testCid = $_GET['Cid'];
	}
} 

$content_src1 = $currdb -> sql_query("SELECT * FROM `readme` WHERE `category_id`=$testcid AND `content_id`=$testCid ");

$array_2D = array();


while($array_1D = $currdb -> sql_fetch_assoc($content_src1))
{
    $imgc=$array_1D["category_id"];
   
	array_push($array_2D, $array_1D);
}


//if($check==0){header("Location: menu.php");}

$currtpl -> assign('array_2D', $array_2D);
$currtpl -> assign('imgc', $imgc);

















$currtpl -> add_css("readme.css");
$currtpl -> display("content.html");
?>