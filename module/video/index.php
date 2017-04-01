<?php
// Initialize ArmoredCore
require_once('../../core/ac_boot.php');

//url youtube videoId
if(isset($_POST['url'])){
	$url = $_POST['url'] ;
	$token = strtok($url, '/') ;
	$videoId ;
	$is_found = 1 ;
	while($token && $is_found){
		$token = strtolower($token) ;
		if(substr_count($token, "youtube.com")){
			$tok = strtok('/') ;
			$tok = strstr($tok, '?') ;	
			$tok = strtok($tok, '&') ;	
			while($tok){
				if(substr_count($tok, "v=")){
					$videoId = substr($tok, strpos($tok, '=')+1) ;
					$is_found = 0 ;
					break ;
				}
				$tok = strtok('&') ;
			}
		}
		if(substr_count($token, "youtu.be")){
			$videoId = strtok('/') ;
			break ;
		}
		$token = strtok('/') ;
	}
	//
	$sql = "INSERT INTO `video`(`id`, `account`, `videoId`) VALUES(NULL, 'testuser', '".$videoId."')" ;
	$currdb -> sql_query($sql) ;
}

//videoId
$videoSrc = array() ;
$video = array() ;
//array_push($video, 'b4r1yYzfnpQ') ;
array_push($video, 'M0GvhMxZynw') ;
array_push($video, 'VqgANfFBAKA') ;
array_push($video, 'B_NIyCbhUvU') ;
array_push($video, 'y58mEsArFGI') ;
array_push($video, 'YFpGMYaciag') ;
array_push($video, 'NKpBveRopkk') ;
array_push($video, 'PbDx2HPrpPk') ;
for($i=0 ; $i<7 ; $i++)
{
	$temp = array() ;
	array_push($temp, "http://www.youtube.com/embed/".$video[$i]) ;
	array_push($temp, "http://i.ytimg.com/vi/".$video[$i]."/0.jpg") ;
	array_push($temp, "http://www.youtube.com/watch?v=".$video[$i]) ;
	array_push($videoSrc, $temp) ;
}
$video_name = array() ;
array_push($video_name, '未知旅') ;
array_push($video_name, '靈聲 part.1') ;
array_push($video_name, '靈聲 part.2') ;
array_push($video_name, '名偵探探中央') ;
array_push($video_name, 'Special News - 中央美食特輯') ;
array_push($video_name, '宅男行不行') ;
array_push($video_name, '遇見愛情') ;

$currtpl -> assign('video_name', $video_name) ;
$currtpl -> assign('videoSrc', $videoSrc) ;

// Display with template file compiled
$currtpl -> add_js("jquery.jcarousel.min.js", true) ;
$currtpl -> add_css("../../tango/skin.css") ;
$currtpl -> add_css("index.css") ;
$currtpl -> display("index.tpl.htm");
?>