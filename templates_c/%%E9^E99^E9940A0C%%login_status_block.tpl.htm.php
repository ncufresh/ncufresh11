<?php /* Smarty version 2.6.26, created on 2011-08-08 05:55:06
         compiled from login_status_block.tpl.htm */ ?>
<div id="main_top_login">

<?php if ($this->_tpl_vars['curruser']->is_guest == TRUE): ?>
<div class="rightbox_top"><h3>登入區</h3>
<div class="rightbox_button_top"></div>
	<div class="link">
	<form action="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/login.php?action=login" method="post">
	<div id="login_block">
		<label for="usernameid">帳號:&nbsp;</label><input name="username" type="text" id="usernameid" /><br />
		<label for="passwordid">密碼:&nbsp;</label><input name="password" type="password" id="passwordid" /><br />
	</div>
	<div class="login_right">
		<input type="image" src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/templates/<?php echo $this->_tpl_vars['currcfg']['DEFAULT_LANG']; ?>
/images/login.png" style="border: 0px;" />
		<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/register.php">
		<img alt="註冊" src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/templates/<?php echo $this->_tpl_vars['currcfg']['DEFAULT_LANG']; ?>
/images/register.png" />
		<?php if ($this->_tpl_vars['block_var']['redirect_path'] != ''): ?>
		<input type="hidden" name="redirect_path" value="<?php echo $this->_tpl_vars['block_var']['redirect_path']; ?>
" />
		<?php else: ?>
		<input type="hidden" name="redirect_path" value="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
" />
		<?php endif; ?>
		</a>
	</div>
	</form>
</div>
<div class="rightbox_button_end"></div>
</div>

<div class="rightbox_mid_top">
<h2><span class="video_title">影片區</span></h2>
</div>
<div class="rightbox_mid_background">
	<div id="videobox" value="<?php echo $this->_tpl_vars['block_var']['videoId']; ?>
">
		<div>
			<br />
		</div>
	</div>
</div>
<div class="rightbox_mid_end"></div>
<div class="rightbox_end_bac">
	<div id="play">
		<div id="videobox_end">
			<div></div>
		</div>
	</div>
</div>

<?php else: ?>

<!-- 如果使用者已經登入 -->
<div class="rightbox_top">
<h3><?php echo $this->_tpl_vars['curruser']->username; ?>
</h3>
	<div class="rightbox_button_top">
	</div>
	<div class="link">
		<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/personal/?info_id=<?php echo $_SESSION['uid']; ?>
">個人專區</a>
	</div>
	<div class="rightbox_button_end">
	</div>
	
	<div class="rightbox_button_top">
	</div>
	<div class="link">
		<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/personal/mail.php">個人信箱</a>
	</div>
	<div class="rightbox_button_end">
	</div>
	
	<div class="rightbox_mid_top"><h3>寵物區</h3></div>
	<div class="rightbox_mid_background"><a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/pet_game/"><img src="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/pet_game/templates/zh_tw/images/pets/120/<?php echo $this->_tpl_vars['block_var']['img_src']; ?>
"/></a></div>
	<div class="rightbox_mid_end"></div>
	<div class="rightbox_end_bac">
		<a href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/login.php?action=logout" id="logout"></a>
	</div>
</div>

<?php endif; ?>

<div class="rightbox_end"></div>
</div>