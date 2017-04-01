<?php /* Smarty version 2.6.26, created on 2011-08-06 17:51:55
         compiled from home_forum_block.tpl.htm */ ?>
<div class="anno_main_block">
  <?php $_from = $this->_tpl_vars['block_var']['forum_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['anno_item']):
?>
  <?php if ($this->_tpl_vars['anno_item']['visible'] == 1 || $this->_tpl_vars['currmodule']->is_admin() == TRUE): ?>
  <div class="anno_item_block">
    <span class="anno_item_title"><a class="anno_link" title="<?php echo $this->_tpl_vars['anno_item']['title']; ?>
" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/forum/thread.php?tid=<?php echo $this->_tpl_vars['anno_item']['id']; ?>
&fid=<?php echo $this->_tpl_vars['anno_item']['forum_id']; ?>
"><?php echo $this->_tpl_vars['anno_item']['title']; ?>
</a></span>
    <span class="anno_item_info"><?php echo $this->_tpl_vars['anno_item']['datetime']; ?>
</span>
  </div>
  <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
  <div class="anno_title_block">
	<a title="檢視所有文章" href="<?php echo $this->_tpl_vars['currcfg']['URL_ROOT_PATH']; ?>
/module/forum">[檢視所有文章]</a>
	</div>
	<br class="clear" />
</div>