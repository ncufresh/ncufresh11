<?php
require_once('../../core/ac_boot.php');
$check=0;
if(!isset($_GET['cid']))
{
    header("Location: index.php");
	/*$testid=1;
	$testaid=0;*/
}
else
{
    if(!is_numeric($_GET['cid'])) 
	{
	
	header("Location: index.php");

	}
	else
	{
	
	$testcid = $_GET['cid'];
	
	}
} 
if(($testcid!=4)and($testcid!=3))
{
$content_src1 = $currdb -> sql_query("SELECT `name`,`category_id`,`content_id` FROM `readme` WHERE `category_id`=$testcid ORDER BY `content_id` ASC");
}

else
{
$content_src1 = $currdb -> sql_query("SELECT `name`,`category_id`,`content` FROM `readme` WHERE `category_id`=$testcid ORDER BY `content_id` ASC");
}
$array_2D = array();

$i=0;
while($array_1D = $currdb -> sql_fetch_assoc($content_src1))
{
   //if(is_null($array_1D)){header("Location: menu.php");}
    $img=$array_1D["category_id"];
	array_push($array_2D, $array_1D);$check=1;
	$i++;
}
						if($i%2==0)
						{
						$i=(int)$i/2-1;
						}
						else
						{
                        $i=(int)$i/2;
						}
if($check==0){header("Location: index.php");}
$currtpl -> assign('array_2D', $array_2D);
$currtpl -> assign('img', $img);
$currtpl -> assign('i', $i);


$currtpl -> add_css("readme.css");
$currtpl -> display("menu.html");
?>