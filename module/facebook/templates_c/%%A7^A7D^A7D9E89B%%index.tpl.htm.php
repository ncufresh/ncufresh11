<?php /* Smarty version 2.6.26, created on 2011-07-26 15:59:11
         compiled from zh_tw/index.tpl.htm */ ?>
<div class="new_module_main">
<?php if ($this->_tpl_vars['isLogin']): ?>
您在臉書的個人資料為：<br />
<img src="https://graph.facebook.com/<?php echo $this->_tpl_vars['fbuser']['id']; ?>
/picture" /><br />
<?php echo $this->_tpl_vars['fbtext']; ?>

User ID: <?php echo $this->_tpl_vars['fbuser']['id']; ?>
<br />
Name: <?php echo $this->_tpl_vars['fbuser']['name']; ?>
<br />
Gender: <?php echo $this->_tpl_vars['fbuser']['gender']; ?>
<br />
Bio: <?php echo $this->_tpl_vars['fbuser']['bio']; ?>
<br />
Website: <?php echo $this->_tpl_vars['fbuser']['website']; ?>
<br />
Email: <?php echo $this->_tpl_vars['fbuser']['email']; ?>
<br />
<br />
<form action="" method="post">
<input type="text" name="fbtext" id="updateFB" />
<input type="submit" name="submitBtn" id="submitBtn" value="貼到臉書" />
<input type="hidden" name="action" value="updateFB" />
</form>
<?php if ($this->_tpl_vars['fbupdate']): ?>
臉書訊息更新成功！
<?php endif; ?>
<br /><a href="<?php echo $this->_tpl_vars['fburl']; ?>
">點我登出Facebook</a>
<?php echo $this->_tpl_vars['fbtext']; ?>

<?php else: ?>
您尚未登入！
<a href="<?php echo $this->_tpl_vars['fburl']; ?>
">點我登入Facebook</a>
<?php endif; ?>
<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=243899775634420&amp;xfbml=1"></script><fb:like href="" send="true" width="450" show_faces="true" font=""></fb:like>
<p>總共有 <?php echo $this->_tpl_vars['fblikenum']; ?>
 人按了讚</p>
</div>