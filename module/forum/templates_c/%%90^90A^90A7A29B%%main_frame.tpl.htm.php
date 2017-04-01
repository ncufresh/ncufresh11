<?php /* Smarty version 2.6.26, created on 2011-08-08 14:30:16
         compiled from /FRESH_WWW/ncufresh11/templates/zh_tw/main_frame.tpl.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="2011 國立中央大學 大一生活知訊網">
	<meta name="keywords" content="中央大學, 知訓網, 大一生活知訊網, NCU, ncufresh, 2011">
    <title>2011 大一生活知訊網</title>
    <title>2011 國立中央大學 大一生活知訊網</title>
	<?php echo $this->_tpl_vars['currcfg']['CSS_HEADER']; ?>

	<?php echo $this->_tpl_vars['currcfg']['JS_HEADER']; ?>

	
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-24999371-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
</head>
<body>
	<!--[if lte IE 6]>
<div id="ie6_warning">
	 <img src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/templates/zh_tw/images/ie6_alert.png" alt="IE6" id="ie6_warning"/>
	 注意：<strong>瀏覽器版本為Microsoft Internet Explorer 6.0或以下</strong> - 目前使用的瀏覽器已不被本站支援。使用過時的瀏覽器會造成許多安全性與效能上的問題，也使您<strong>非常容易</strong>成為網路攻擊的目標。<br />救救在世界各處受苦受難的網頁開發者，誠心建議您更換為：
 	<a target="_blank" href="http://www.microsoft.com/taiwan/windows/internet-explorer/worldwide-sites.aspx"><u>Microsoft Internet Explorer 9.0</u></a>、
	<a target="_blank" href="http://moztw.org/"><u>Mozilla Firefox</u></a>或
	<a target="_blank" href="http://www.google.com/chrome"><u>Google瀏覽器</u></a>等更安全、性能更好的現代瀏覽器。
	</div>
	<![endif]-->
    <div id="header">
        <div id="logo">
			<a id="home_link" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
" style="width:500px; height:181px; position:absolute; display:block;"></a>
        	<div id="top">
				<span id="online"><?php echo $this->_tpl_vars['main_block_var']['online_counter']; ?>
</span>
				<span id="count"><?php echo $this->_tpl_vars['main_block_var']['accu_counter']; ?>
</span>
				<form action="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/search/result.php" method="get" id="search_form" >
<input id="search_content" name="q" type="text" maxlength="50" onblur="if (this.value == '') {this.value = '搜尋...';}" onfocus="if (this.value == '搜尋...') {this.value = '';}" value="搜尋..." />

<input id="search" type="submit" value="" />
</form>
			</div>
			<div id="navi">
				<iframe src="http://www.facebook.com/plugins/like.php?app_id=228242770546811&amp;href=http%3A%2F%2Fncufresh.ncu.edu.tw%2Fncufresh11%2F&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
				<a id="index" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/index.php">回首頁</a>
				<a id="web_map" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/sitemap/">網站地圖</a>
				<a id="contact" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/personal/newmail.php?rid=NCUFresh">聯絡我們</a>
				<a id="ncu" target="_blank" href="http://www.ncu.edu.tw/">中大首頁</a>
			</div>
        </div>
    </div>
    <div id="body">
		<div id="sidebar_left">
			<div id="must">
				<div class="button_top">
					<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/readme/?bar=must" class="word"></a>
				</div>
				<div class="button_mid">
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/readme/schedule_menu.php?bar=must">行事曆</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/readme/menu.php?cid=1&bar=must">大一新生區</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/readme/menu.php?cid=2&bar=must">大一復學區</a></div>
					
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/readme/menu.php?cid=3&bar=must">相關須知</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/readme/menu.php?cid=4&bar=must">文件下載</a></div>
				</div>
				<div class="button_end"></div>
			</div>
			<div id="nculife">
				<div class="button_top">
					<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/life/?bar=nculife" class="word"></a>
				</div>
				<div class="button_mid">
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/life/life_display.php?c1id=1&bar=nculife">食在中大</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/life/life_display.php?c1id=2&bar=nculife">住在中大</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/life/life_display.php?c1id=3&bar=nculife">行車中大</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/life/life_display.php?c1id=4&bar=nculife">健康中大</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/life/life_display.php?c1id=5&bar=nculife">活在中大</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/life/life_display.php?c1id=7&bar=nculife">中大校外</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/life/life_display.php?c1id=6&bar=nculife">中大運動</a></div>
				</div>
				<div class="button_end"></div>
			</div>
			<div id="map">
				<div class="button_top">
					<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/map/?bar=map" class="word"></a>
				</div>
				<div class="button_mid">
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/map/overview.php?bar=map">綜觀圖</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/map/building.php?bar=map">建築物介紹</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/map/department.php?bar=map">系館介紹</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/map/view.php?bar=map">景點介紹</a></div>
				</div>
				<div class="button_end"></div>
			</div>
			<div id="forum">
				<div class="button_top">
					<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/forum/?bar=forum" class="word"></a>
				</div>
				<div class="button_mid">
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/forum/threads.php?fid=2&bar=forum&bar=forum">綜合討論區</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/forum/threads.php?fid=5&bar=forum&bar=forum">系所討論區</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/forum/threads.php?fid=3&bar=forum&bar=forum">社團討論區</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/forum/threads.php?fid=4&bar=forum&bar=forum">精華討論區</a></div>
				</div>
				<div class="button_end"></div>
			</div>
			<div id="club">
				<div class="button_top">
					<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/club/?bar=club" class="word"></a>
				</div>
				
				<div class="button_mid">
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/club/club_academic.php?bar=club">學術性社團</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/club/club_leisure.php?bar=club">康樂性社團</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/club/club_service.php?bar=club">服務性社團</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/club/club_friendship.php?bar=club">聯誼性社團</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/club/club_student.php?bar=club">學生組織</a></div>
					<div><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/club/club_department.php?bar=club">系學會</a></div>
				</div>
				<div class="button_end"></div>
			</div>
			<div id="film">
				<div class="button_top">
					<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/video/" class="word"></a>
				</div>
				<div class="button_end"></div>
			</div>
			<div id="about">
				<div class="button_top">
					<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/about/" class="word"></a>
				</div>
				<div class="button_end"></div>
			</div>
		</div>
    	<div id="main">
			<?php echo $this->_tpl_vars['MAIN_CONTENTS_BLOCK']; ?>

    	</div>
		<div id="sidebar_right">
    		<?php echo $this->_tpl_vars['main_block_var']['login_block']; ?>

    	</div>
    </div>
    <div style="clear:both"></div>
    <div id="footer">
		<div id="footer_text">
		主辦單位：國立中央大學 學務處；承辦單位：<a href="http://love.adm.ncu.edu.tw/">諮商中心</a>；執行單位：2011 大一生活知訊網工作團隊<br />
		地址：320-01 桃園縣中壢市五權里2鄰中大路300號 | 電話：(03) 422-7151 #57261 | 版權所有：2011 大一生活知訊網工作團隊
		</div>
   	</div>
</body>
</html>