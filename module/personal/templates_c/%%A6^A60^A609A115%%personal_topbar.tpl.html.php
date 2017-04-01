<?php /* Smarty version 2.6.26, created on 2011-08-03 17:39:15
         compiled from zh_tw/personal_topbar.tpl.html */ ?>
<div class="top_bar">
	<?php $_from = $this->_tpl_vars['top_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
		<a href="<?php echo $this->_tpl_vars['value']['href']; ?>
"><?php echo $this->_tpl_vars['value']['name']; ?>
</a>
	<?php endforeach; endif; unset($_from); ?>
</div>