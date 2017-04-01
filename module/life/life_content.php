<?php

require_once('../../core/ac_boot.php');

$check=0;
if((!isset($_GET['c1id'])or!isset($_GET['scid']))or!isset($_GET['c2id']))
{
    header("Location: index.php");
	/*$testid=1;
	$testaid=0;*/
}
else
{
    if((!is_numeric($_GET['c1id']) or !is_numeric($_GET['scid']) )or !is_numeric($_GET['scid']))
	{
	
	header("Location: index.php");

	}
	else
	{
	
	$tmpc1id = $_GET['c1id'];
	$tmpscid = $_GET['scid'];
	$tmpc2id = $_GET['c2id'];
	}
} 

	
$content_src1 = $currdb -> sql_query("SELECT `sc_name` , `content_name` , `sc_category_id` , `category_id`   FROM `life` WHERE `category_id`=$tmpc1id AND `sc_category_id`=$tmpscid ORDER BY `content_id` ASC");

$content_src2 = $currdb -> sql_query("SELECT * FROM `life` WHERE `category_id`=$tmpc1id AND `sc_category_id`=$tmpscid AND `content_id`=$tmpc2id");

$array_2D = array();
$array_4D = array();

while($array_1D = $currdb -> sql_fetch_assoc($content_src1))
{
   //if(is_null($array_1D)){header("Location: menu.php");}
	array_push($array_2D, $array_1D);
}

while($array_1D = $currdb -> sql_fetch_assoc($content_src2))
{
    $img1=$array_1D["category_id"];
	$img2=$array_1D["sc_category_id"];
    //if(is_null($array_3D)){header("Location: menu.php");}
	array_push($array_4D, $array_1D);
    	
	$check++;
}

if($check==0){header("Location: index.php");}
$currtpl -> assign('array_2D', $array_2D);
$currtpl -> assign('array_4D', $array_4D);
$currtpl -> assign('img1', $img1);
$currtpl -> assign('img2', $img2);


$currtpl -> set_display(false);
$currtpl -> display("life_content.html");


?>