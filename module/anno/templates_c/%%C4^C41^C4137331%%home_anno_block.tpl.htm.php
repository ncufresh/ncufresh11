<?php /* Smarty version 2.6.26, created on 2011-08-06 20:13:08
         compiled from home_anno_block.tpl.htm */ ?>
<div class="anno_main_block">
  <?php $_from = $this->_tpl_vars['block_var']['anno_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['anno_item']):
?>
  <?php if ($this->_tpl_vars['anno_item']['is_display'] == TRUE || $this->_tpl_vars['currmodule']->is_admin() == TRUE): ?>
  <div class="anno_item_block">
    <span class="anno_item_title">
		<a class="anno_link" title="<?php echo $this->_tpl_vars['anno_item']['title']; ?>
" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/anno/show_anno.php?tid=<?php echo $this->_tpl_vars['anno_item']['tid']; ?>
">
			<?php if ($this->_tpl_vars['anno_item']['is_display'] == FALSE && $this->_tpl_vars['currmodule']->is_admin() == TRUE): ?>
				<span class="warning_msg">[尚未發布] </span>
			<?php endif; ?>
			<?php echo $this->_tpl_vars['anno_item']['title']; ?>

		</a>
    </span>
    <span class="anno_item_info"><?php echo $this->_tpl_vars['anno_item']['datetime']; ?>
</span>
  </div>
  <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
  <div class="anno_title_block">
	<a title="檢視所有公告" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/anno/list_anno.php">[檢視所有公告]</a>
	</div>
	<br class="clear" />
</div>