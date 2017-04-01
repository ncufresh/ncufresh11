<?php /* Smarty version 2.6.26, created on 2011-07-28 18:08:24
         compiled from zh_tw/myfriend.tpl.htm */ ?>
<div class="top_menu">
	<?php $_from = $this->_tpl_vars['top_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
		<a href="<?php echo $this->_tpl_vars['value']['href']; ?>
"><?php echo $this->_tpl_vars['value']['name']; ?>
</a>
	<?php endforeach; endif; unset($_from); ?>
</div>

<div class="personal_main">
		<?php $_from = $this->_tpl_vars['personal_request']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['request']):
?>
			<a href="index.php?info_id=<?php echo $this->_tpl_vars['request']['friendid']; ?>
"><?php echo $this->_tpl_vars['request']['friendid']; ?>
</a>傳來交友邀請：
			<a href="myfriend.php?fid=<?php echo $this->_tpl_vars['request']['friendid']; ?>
&accept=true">同意</a>
			<a href="myfriend.php?fid=<?php echo $this->_tpl_vars['request']['friendid']; ?>
&accept=false">拒絕</a>
			<br />
		<?php endforeach; endif; unset($_from); ?>		
		<br />好友列表:<br />
			<?php $_from = $this->_tpl_vars['friend']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>			
				<a href="index.php?info_id=<?php echo $this->_tpl_vars['list']['friendid']; ?>
"><?php echo $this->_tpl_vars['list']['nickname']; ?>
(<?php echo $this->_tpl_vars['list']['username']; ?>
)</a>
				<a href="myfriend.php?action=del&did=<?php echo $this->_tpl_vars['list']['friendid']; ?>
">刪除</a><br />
			<?php endforeach; endif; unset($_from); ?>
		<hr />
		<?php echo $this->_tpl_vars['msg']; ?>

</div>