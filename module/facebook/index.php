<?php
// Initialize ArmoredCore
require_once('../../core/ac_boot.php');
require '../../core/lib_3rd/Facebook/facebook.php';
//$currtpl -> add_css('colorbox.css');
$currtpl -> add_js('jquery-colorbox-min.js', true);

$currtpl -> add_css("jquery-ui-css/smoothness/jquery-ui-1.8.13.custom.css", true);

$currtpl -> add_js("jquery-ui-1.8.13.custom.min.js", true);
$currtpl -> add_js("ui/jquery.ui.core.js", true);
$currtpl -> add_js("ui/jquery.ui.widget.js", true);

$currtpl -> add_js("ui/jquery.ui.tabs.js", true);
$currtpl -> add_js("ui/jquery.ui.draggable.js",true);
$currtpl -> add_js("ui/jquery.ui.position.js",true);
$currtpl -> add_js("ui/jquery.ui.resizable.js",true);
$currtpl -> add_js("ui/jquery.ui.dialog.js",true);

// Create our Application instance
$facebook = new Facebook(array(
	'appId'  => '212816292085069',
	'secret' => '79fb04f0903464c9133e2e017ff90597',
	'cookie' => 'true',
	//勿改！FB應用程式ID
));

$user = $facebook->getUser();
$isLogin = false;

if ($user) {
	try {
		// 已登入並且有授權
		$user_profile = $facebook->api('/me');
		$logoutUrl = $facebook->getLogoutUrl();
		
		$currtpl -> assign('fburl',$logoutUrl);
		$currtpl -> assign('fbuser', $user_profile);
		$isLogin = true;
		
		if (isset($_POST['action']) && $_POST['action']=='updateFB')
		{
			$text = $_POST['fbtext'];
			$status = $facebook->api('/me/feed', 'POST', array('message' => $text));
			if ($status)
				$currtpl -> assign('fbupdate',true);
			else 
				$currtpl -> assign('fbupdate',false);
		}
		
		//取得多少人按讚
		//$result = $facebook->api(array(
    	//	'method' => 'fql.query',
    	//	'query' => 'select like_count, total_count, share_count, click_count from link_stat where 	url="http://dorm.snowtec.org/ncufresh11/module/facebook/";'
		//));
		//$currtpl -> assign('fblikenum',$result[0]['total_count']);
		
	} catch (FacebookApiException $e) {
		$user = null;
	}
}
else
{
	$loginUrl = $facebook->getLoginUrl(array(
		'scope' => 'email,read_stream,user_website,publish_stream'
	));
	$currtpl -> assign('fburl',$loginUrl);
}

//取得多少人按讚
$result = $facebook->api(array(
	'method' => 'fql.query',
	'query' => 'select like_count, total_count, share_count, click_count from link_stat where 	url="http://dorm.snowtec.org/ncufresh11/module/facebook/";'
));
$currtpl -> assign('fblikenum',$result[0]['total_count']);

$currtpl -> assign("isLogin",$isLogin);
$currtpl -> display("index.tpl.htm");
?>