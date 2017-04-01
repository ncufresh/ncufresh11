<?php /* Smarty version 2.6.26, created on 2011-08-07 13:43:40
         compiled from zh_tw/interation.tpl.html */ ?>
<div class="log_main">
	<div class="log_title">
		<a class="close" href="#"></a>
	</div>
	<div class="log_contents">
		<div class="log_content">
			<h1>日記</h1>
			<?php $_from = $this->_tpl_vars['logs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['log']):
?>
				<div class="log">
					<img src="<?php echo $this->_tpl_vars['log']['img_src']; ?>
"/>
					<div><?php echo $this->_tpl_vars['log']['time']; ?>
<br /><?php echo $this->_tpl_vars['log']['record']; ?>
</div>
				</div>
				<hr class="dashed_line" />
			<?php endforeach; endif; unset($_from); ?>
		</div>
	</div>
	<div class="pagination">
		<a class="prev" href="#"></a>
		<a class="next" href="#"></a>
	</div>
</div>