<?php /* Smarty version 2.6.26, created on 2011-08-07 20:52:24
         compiled from zh_tw/friend.tpl.html */ ?>
<div class="friend_main">
	<div class="friend_title">
		<a class="close" href="#"></a>
	</div>
	<div class="friend_contents">
		<?php $_from = $this->_tpl_vars['friends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['friend']):
        $this->_foreach['foo']['iteration']++;
?>
			<?php if (($this->_foreach['foo']['iteration']-1) % 8 == 0): ?><div class="friend_content"><?php endif; ?>
				<a class="friend_link" href="index.php?uid=<?php echo $this->_tpl_vars['friend']['friendid']; ?>
">
					<div class="pet_pic"><img src="<?php echo $this->_tpl_vars['friend']['img_src']; ?>
"/></div>
					<span><?php echo $this->_tpl_vars['friend']['nickname']; ?>
</span>
				</a>
			<?php if (($this->_foreach['foo']['iteration']-1) % 8 == 7 || $this->_foreach['foo']['iteration'] == $this->_foreach['foo']['total']): ?></div><?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</div>
	<div class="pagination">
		<a class="prev" href="#"></a>
		<a class="next" href="#"></a>
	</div>
</div>