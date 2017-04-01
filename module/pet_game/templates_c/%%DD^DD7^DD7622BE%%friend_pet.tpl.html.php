<?php /* Smarty version 2.6.26, created on 2011-08-08 05:06:48
         compiled from zh_tw/friend_pet.tpl.html */ ?>
<div class="friend_pet_main">
	<div class="friend_pet_actions">
		<?php $_from = $this->_tpl_vars['interations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type'] => $this->_tpl_vars['value']):
?>
			<div id="<?php echo $this->_tpl_vars['type']; ?>
" class="action">
				<a class="action_name" href=	"map.php?action=interation&pid=<?php echo $this->_tpl_vars['pid']; ?>
&type=<?php echo $this->_tpl_vars['type']; ?>
">
				</a>
			</div>
		<?php endforeach; endif; unset($_from); ?>
	</div>
	<div class="friend_pet_pic">
		<span class="pet_name"><?php echo $this->_tpl_vars['pet_name']; ?>
</span>
		<img class="pet_pic" src="<?php echo $this->_tpl_vars['img_src']; ?>
"/>
		
		<div class="exit"><a href="../personal/index.php?info_id=<?php echo $this->_tpl_vars['pid']; ?>
"></a></div>
	</div>
	<div class="friend_pet_status">
		<a class="help_button" href="help.php">
		</a>
		<div class="state">
			<?php $_from = $this->_tpl_vars['pet_state']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['value']):
?>
				<?php echo $this->_tpl_vars['value']; ?>

			<?php endforeach; endif; unset($_from); ?>
		</div>
	</div>
</div>
<div class="friend_pet_friend">
</div>
<div class="pet_interation">
</div>
<div class="pet_game_help">
</div>