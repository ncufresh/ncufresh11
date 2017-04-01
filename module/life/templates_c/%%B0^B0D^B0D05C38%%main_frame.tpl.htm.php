<?php /* Smarty version 2.6.26, created on 2011-07-29 18:08:22
         compiled from /Users/life/Sites/ncufresh11/templates/zh_tw/main_frame.tpl.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>2011 大一生活知訊網</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>[測試版] 2011 國立中央大學 大一生活知訊網</title>
	<?php echo $this->_tpl_vars['currcfg']['CSS_HEADER']; ?>

	<?php echo $this->_tpl_vars['currcfg']['JS_HEADER']; ?>

	<script src="module/video/youTubeEmbed/youTubeEmbed_jquery_1.0.js"></script>
	<script src="module/video/jquery.swfobject.1-1-1.min.js"></script>
	<script type="text/javascript" src="konamiCode_index.js"></script>
	<link rel="stylesheet" href="konamiCode.css" type="text/css" />
	<link rel="stylesheet" href="module/video/youTubeEmbed/youTubeEmbed_jquery_1.0.css" type="text/css" />
</head>
<body>
	<!--[if lte IE 6]>
	 <div style="background:#DDECFF; padding:10px; border:#FFFFFF solid 5px; font-size: 12px; margin: auto;">
 	<strong>瀏覽器版本為Microsoft Internet Explorer 6.0或以下</strong> - 目前使用的瀏覽器已不被本站支援，建議更換為：
 	<a target="_blank" href="http://www.microsoft.com/taiwan/windows/internet-explorer/worldwide-sites.aspx"><u>Microsoft Internet Explorer 8.0</u></a>、
	<a target="_blank" href="http://moztw.org/"><u>Mozilla Firefox</u></a>或
	<a target="_blank" href="http://www.google.com/chrome"><u>Google瀏覽器</u></a>
	</div>
	<![endif]-->
    <div id="header">
        <div id="logo">
        	<div id="top">
				<form action="indexddd.php" method="post">
					<span id="online"><?php echo $this->_tpl_vars['main_block_var']['online_counter']; ?>
</span>
					<span id="count"><?php echo $this->_tpl_vars['main_block_var']['accu_counter']; ?>
</span>
					<input id="search_content" name="search" type="text" />
					<input id="search" type="submit" value="" />
				</form>
			</div>
			<div id="navi">
				<a id="index" href="index.php">回首頁</a>
				<a id="web_map" href="index.php">網站地圖</a>
				<a id="contact" href="index.php">聯絡我們</a>
				<a id="ncu" href="index.php">中大首頁</a>
			</div>
        </div>
    </div>
    <div id="body">
		<div id="sidebar_left">
			<div id="must">
				<div class="button_top">
					<div class="word"></div>
				</div>
				<div class="shadow"></div>
				<div class="button_mid">
					<div><a href="index.php">大一新生區</a></div>
					<div><a href="index.php">大一復學區</a></div>
					<div><a href="index.php">註冊精靈</a></div>
					<div><a href="index.php">相關須知</a></div>
					<div><a href="index.php">文件下載</a></div>
				</div>
				<div class="button_end"></div>
			</div>
			<div id="nculife">
				<div class="button_top">
					<div class="word"></div>
				</div>
				<div class="shadow"></div>
				<div class="button_mid">
					<div><a href="index.php">食在中大</a></div>
					<div><a href="index.php">住在中大</a></div>
					<div><a href="index.php">行車中大</a></div>
					<div><a href="index.php">健康中大</a></div>
					<div><a href="index.php">活在中大</a></div>
					<div><a href="index.php">中大校外</a></div>
					<div><a href="index.php">中大運動</a></div>
				</div>
				<div class="button_end"></div>
			</div>
			<div id="map">
				<div class="button_top">
					<div class="word"></div>
				</div>
				<div class="shadow"></div>
				<div class="button_mid">
					<div><a href="index.php">綜觀圖</a></div>
					<div><a href="index.php">建築物介紹</a></div>
					<div><a href="index.php">系館介紹</a></div>
					<div><a href="index.php">景點介紹</a></div>
				</div>
				<div class="button_end"></div>
			</div>
			<div id="forum">
				<div class="button_top">
					<div class="word"></div>
				</div>
				<div class="shadow"></div>
				<div class="button_mid">
					<div><a href="index.php">綜合討論區</a></div>
					<div><a href="index.php">系所討論區</a></div>
					<div><a href="index.php">社團討論區</a></div>
					<div><a href="index.php">精華討論區</a></div>
				</div>
				<div class="button_end"></div>
			</div>
			<div id="club">
				<div class="button_top">
					<div class="word"></div>
				</div>
				<div class="shadow"></div>
				<div class="button_mid">
					<div><a href="index.php">學術性社團</a></div>
					<div><a href="index.php">康樂性社團</a></div>
					<div><a href="index.php">服務性社團</a></div>
					<div><a href="index.php">聯誼性社團</a></div>
					<div><a href="index.php">學生組織與其他</a></div>
					<div><a href="index.php">系學會</a></div>
				</div>
				<div class="button_end"></div>
			</div>
			<div id="film">
				<div class="button_top">
					<div class="word"></div>
				</div>
				<div class="button_end"></div>
			</div>
			<div id="about">
				<div class="button_top">
					<div class="word"></div>
				</div>
				<div class="button_end"></div>
			</div>
		</div>
    	<div id="main">
			<?php echo $this->_tpl_vars['MAIN_CONTENTS_BLOCK']; ?>

    	</div>
    	<?php if (! $this->_tpl_vars['curruser']->is_login()): ?>
    		<div id="sidebar_right">
				<div id="rightbox_top">
					登入區
					<div id="rightbox_button_top"></div>
						<div id="link">
							<form action="login.php?action=login" method="post">
								<p>帳號 :<input type="text" name="username" id="account"/></p>
								<p>密碼 :<input type="password" name="password" id="password"/></p>
								<input id="loginbutton" type="submit" value="登入"/>
								<input id="registerbutton" type="button" value="註冊"/>
							</form>
						</div>
					<div id="rightbox_button_end"></div>
				</div>
				<div id="rightbox_mid_top">
					影片區
				</div>
				<div id="rightbox_mid_background">
					<div id="videobox">
						<div id="<?php echo $this->_tpl_vars['videoId']; ?>
">
							<br />
						</div>
					</div>
				</div>
				<div id="rightbox_mid_end"></div>
				<div id="rightbox_end_bac">
					<div id="play">
						<div id="videobox_end">
							<div></div>
						</div>
					</div>
				</div>
				<div id="rightbox_end"></div>
    			<div style="clear:both;"></div>
    		</div>		
    	<?php else: ?>
    		<div id="sidebar_right">
				<div id="rightbox_top">
					個人區
					<div id="rightbox_button_top"></div>
						<div id="link"><a href="個人專區連結">個人專區</a></div>
					<div id="rightbox_button_end"></div>
					<div id="rightbox_button_top" style="margin-top:0px;"></div>
						<div id="link"><a href="個人信箱連結">個人信箱</a></div>
					<div id="rightbox_button_end"></div>
				</div>
				<div id="rightbox_mid_top">
					寵物區
				</div>
				<div id="rightbox_mid_background">
					<br />
				</div>
				<div id="rightbox_mid_end"></div>
				<div id="rightbox_end_bac">
					<a id="logout" href="login.php?action=logout"></a>
				</div>
				<div id="rightbox_end"></div>
    			<div style="clear:both;"></div>
    		</div>		
		<?php endif; ?>
    </div>
    <div id="footer">
   		<div id="footer_left"></div>
   		<div id="footer_center"></div>
   		<div id="footer_right"></div>
   	</div>
</body>
</html>