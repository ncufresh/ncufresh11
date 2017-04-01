<?php /* Smarty version 2.6.26, created on 2011-07-21 16:47:35
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
        <img src="templates/zh_tw/images/logo.png" />
        <p id="online"><?php echo $this->_tpl_vars['main_block_var']['online_counter']; ?>
</p>
        <p id="count"><?php echo $this->_tpl_vars['main_block_var']['accu_counter']; ?>
</p>
        <ul id="navigation">
            <li class="home">
                <a href="index.php">回首頁</a>
            </li>
            <li class="sitemap">
                <a href="index.php">網站地圖</a>
            </li>
            <li class="contact">
                <a href="index.php">聯絡我們</a>
            </li>
            <li class="ncuhome">
                <a href="index.php">中大首頁</a>
            </li>
        </ul>
        <div id="searchbox">
            <input id="search_content" name="search" type="text" />
            <input id="search" type="submit" />
        </div>
    </div>
    <div id="body">
        <ul id="sidebar_left">
            <li class="must">
                <a href="index.php">大一必讀</a>
            </li>
            <li class="life">
                <a href="index.php">中大生活</a>
            </li>
            <li class="map">
                <a href="index.php">校園導覽</a>
            </li>
            <li class="forum">
                <a href="index.php">論壇專區</a>
            </li>
            <li class="club">
                <a href="index.php">系所社團</a>
            </li>
            <li class="film">
                <a href="index.php">影音專區</a>
            </li>
            <li class="about">
                <a href="index.php">關於我們</a>
            </li>
        </ul>
        <div id="main" class="index">
            <div id="content">
                <div id="calender">
                    <a class="left" href="index.php"></a>
                    <a class="right" href="index.php"></a>
                </div>
                <div id="latest">
                    <div class="left">
                        <h4>最新消息</h4>
                        <table>
                            <tr>
                                <td>asds</td>
                                <td>asds</td>
                                <td>asds</td>
                            </tr>
                            <tr>
                                <td>asds</td>
                                <td>asds</td>
                                <td>asds</td>
                            </tr>
                            <tr>
                                <td>asds</td>
                                <td>asds</td>
                                <td>asds</td>
                            </tr>
                            <tr>
                                <td>asds</td>
                                <td>asds</td>
                                <td>asds</td>
                            </tr>
                            <tr>
                                <td>asds</td>
                                <td>asds</td>
                                <td>asds</td>
                            </tr>
                            <tr>
                                <td>asds</td>
                                <td>asds</td>
                                <td>asds</td>
                            </tr>
                        </table>
                        <a href="index.php">More...</a>
                    </div>
                    <div class="right">
                        <h4>最新論壇</h4>
                        <table>
                            <tr>
                                <td>asds</td>
                                <td>asds</td>
                                <td>asds</td>
                            </tr>
                            <tr>
                                <td>asds</td>
                                <td>asds</td>
                                <td>asds</td>
                            </tr>
                            <tr>
                                <td>asds</td>
                                <td>asds</td>
                                <td>asds</td>
                            </tr>
                            <tr>
                                <td>asds</td>
                                <td>asds</td>
                                <td>asds</td>
                            </tr>
                            <tr>
                                <td>asds</td>
                                <td>asds</td>
                                <td>asds</td>
                            </tr>
                            <tr>
                                <td>asds</td>
                                <td>asds</td>
                                <td>asds</td>
                            </tr>
                        </table>
                        <a href="index.php">More...</a>
                    </div>
                </div>
                <div id="board"></div>
            </div>
        </div>
        <div id="sidebar_right">
            <div id="loginbox">
                <div>
                    帳號：<input type="text" id="account"/><br />
                    密碼：<input type="password" id="password"/><br />
                    <input id="loginbutton" type="submit" />
                    <input id="registerbutton" type="button" />
                </div>
            </div>
            <div id="videobox">
                <div>QQ<br />QQ
                </div>
            </div>
            <div id="videobox_end">
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
    <div id="footer">
        <div id="footer_left"></div>
        <div id="footer_content">
            <div class="empty"></div>
            <p>主辦單位：國立中央大學　學務處　承辦單位：諮商中心　執行單位：２０１１大一生活知訊網工作團隊</p>
            <p>地址：３２０－０１　桃園縣中壢市五權里２鄰中大路３００號　電話：（０３）４２２－７１５１＃５７２６１　版權所有：２０１１大一生活知訊網工作團隊</p>
        </div>
        <div id="footer_right"></div>
    </div>
</body>
</html>