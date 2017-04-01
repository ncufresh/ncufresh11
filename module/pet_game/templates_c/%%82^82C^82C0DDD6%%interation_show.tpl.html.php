<?php /* Smarty version 2.6.26, created on 2011-08-07 18:07:15
         compiled from zh_tw/interation_show.tpl.html */ ?>
<div class="interation_main">
	<div class="interation_title">
		<a class="close" href="#"></a>
	</div>
	<div class="interation_content">
	<ul>
		<?php $_from = $this->_tpl_vars['interation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['val']):
?>
			<li><a class="interate" href="map.php?action=interate&pid=<?php echo $this->_tpl_vars['pid']; ?>
&type=<?php echo $this->_tpl_vars['type']; ?>
&option=<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['val']['name']; ?>
</a></li>
		<?php endforeach; endif; unset($_from); ?>
	<ul>
	</div>
</div>