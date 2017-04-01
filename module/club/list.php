<?php
// Initialize ArmoredCore
require_once('../../core/ac_boot.php');

if(isset($_GET["c_id"])&&($_GET["c_id"]!=""))
{
	$src = $currdb -> sql_query("SELECT * FROM `clubinfo` WHERE `id` ='".$_GET["c_id"]."'");
	$club_data = $currdb -> sql_fetch_array($src);
	$contents = nl2br($club_data["introduction"]);
	$currtpl -> assign('club_data', $club_data);
	$currtpl -> assign('contents', $contents);
	$currtpl -> add_js('slimbox2.js');
	$currtpl -> add_css('slimbox2.css');

}
if($club_data["category"] != "")
{
	// category
	switch($club_data["category"]){
		case "學術性社團":
			$c = "academic";
			$color = "#1f6064";
			break;
		case "康樂性社團":
			$c = "leisure";
			$color = "#2843a3";
			break;
		case "服務性社團":
			$c = "service";
			$color = "#415713";
			break;
		case "聯誼性社團":
			$c = "friendship";
			$color = "#542564";
			break;
		case "學生組織暨其他":
			$c = "student";
			$color = "#9e1c20";
			break;
		case "系學會":
			$c = "department";
			$color = "#683426";
			break;
	}
	$currtpl -> assign('c', $c);
	$currtpl -> assign('color', $color);

	// Display with template file compiled
	$currtpl -> add_css("ClubCSS.css");
	$currtpl -> display("list.tpl.htm");
}
?>