<?php /* Smarty version 2.6.26, created on 2011-07-15 17:53:30
         compiled from zh_tw/friendlist.tpl.htm */ ?>

<div class="personal_main">
	<a href="index.php">我的首頁</a>
		<br />
		<?php $_from = $this->_tpl_vars['personal_request']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
			<a href="index.php?uid=<?php echo $this->_tpl_vars['i']['account_from']; ?>
"><?php echo $this->_tpl_vars['i']['account_from']; ?>
</a>傳來交友邀請：
			<a href="friendlist.php?fid=<?php echo $this->_tpl_vars['i']['account_from']; ?>
&accept=1">同意</a>
			<a href="friendlist.php?fid=<?php echo $this->_tpl_vars['i']['account_from']; ?>
&accept=0">拒絕</a>
			<br />
		<?php endforeach; endif; unset($_from); ?>
		
		<br />好友列表:<br />
			<?php $_from = $this->_tpl_vars['friend']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>			
				<a href="index.php?uid=<?php echo $this->_tpl_vars['list']['friendid']; ?>
"><?php echo $this->_tpl_vars['list']['friendid']; ?>
</a>
				<a href="friendlist.php?delete=1&did=<?php echo $this->_tpl_vars['list']['friendid']; ?>
">刪除</a><br />
			<?php endforeach; endif; unset($_from); ?>
		<hr />
		<form action="" method="POST">
			<input type="text" name="name">
			<input type="submit" value="新增好友">
			<input name="action" type="hidden" value="new">
		</form>

</div>