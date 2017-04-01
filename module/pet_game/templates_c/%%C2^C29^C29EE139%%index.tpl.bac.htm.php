<?php /* Smarty version 2.6.26, created on 2011-08-10 12:04:40
         compiled from zh_tw/index.tpl.bac.htm */ ?>
<div class="pet_game_main">
	<div class="pet_game_actions">
		<?php $_from = $this->_tpl_vars['actions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type'] => $this->_tpl_vars['value']):
?>
			<div id="<?php echo $this->_tpl_vars['type']; ?>
" class="action">
				<div class="action_name" style="display:block;">
				</div>
				<div class="action_content">
					<ul class="action_content_main">
						<?php $_from = $this->_tpl_vars['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
							<li><a class="go_map" href="map.php?action=info&type=<?php echo $this->_tpl_vars['type']; ?>
&id=<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['v']['name']; ?>
</a></li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
					<div class="action_content_bottom">
					</div>
				</div>
			</div>
		<?php endforeach; endif; unset($_from); ?>
	</div>
	<div class="pet_game_pic">
		<span class="pet_name"><?php echo $this->_tpl_vars['pet_name']; ?>
</span>
		<img class="pet_pic" src="<?php echo $this->_tpl_vars['img_src']; ?>
"/>
		<div class="exit"><a href="../personal/index.php"></a></div>
	</div>
	<div class="pet_game_status">
		<a class="help_button" href="help.php">
		</a>
		<div class="life_stick_background">
			<div class="life_stick_foreground" style="width:<?php echo $this->_tpl_vars['pet_life']; ?>
%;">
			</div>
			<span class="life_value">
				<?php echo $this->_tpl_vars['pet_life']; ?>

			</span>
		</div>
		<a class="log_button" href="interation.php">日記(<?php echo $this->_tpl_vars['num_interations']; ?>
)</a>
		<a class="friend_button" href="friend.php">好友(<?php echo $this->_tpl_vars['num_friends']; ?>
)</a>
		<div class="state">
			<?php $_from = $this->_tpl_vars['pet_state']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['value']):
?>
				<?php echo $this->_tpl_vars['value']; ?>

			<?php endforeach; endif; unset($_from); ?>
		</div>
	</div>
</div>
<div class="pet_game_help">
</div>
<div class="pet_game_map">
</div>
<div class="pet_game_log">
</div>
<div class="pet_game_friend">
</div>
<div class="pet_small_window">
	<div class="small_window_main">
		<div class="small_window_title">
			<a class="close" href="#"></a>
		</div>
		<div class="small_window_content">
			<div class="new_friend">
			<p>有人邀請你成為他的好友！到他個人專區點擊加為好友你們就成為朋友囉！</p>
			<ul><?php $_from = $this->_tpl_vars['new_friends']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new_friend']):
?><li><a href="../personal/index.php?info_id=<?php echo $this->_tpl_vars['new_friend']['friendid']; ?>
"><?php echo $this->_tpl_vars['new_friend']['name']; ?>
</a></li><?php endforeach; endif; unset($_from); ?></ul>
			</div>
		</div>
	</div>
</div>