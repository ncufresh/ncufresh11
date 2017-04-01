<?php /* Smarty version 2.6.26, created on 2011-07-25 21:34:45
         compiled from zh_tw/choose_pet.tpl.html */ ?>
<div class="choose_pet_main">
	<div class="top_menu">
		<?php $_from = $this->_tpl_vars['top_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
			<a href="<?php echo $this->_tpl_vars['value']['href']; ?>
"><?php echo $this->_tpl_vars['value']['name']; ?>
</a>
		<?php endforeach; endif; unset($_from); ?>
	</div>
	<div class="choose_pet">
		<form action="choose_pet.php" method="post">
			<table>
				<tr>
					<td>請選擇寵物：</td>
					<td>
						<select name="pet">
						<?php $_from = $this->_tpl_vars['pet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['value']):
?>
							<option value="<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['value']['1']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
						</select>
					</td>
					<td><?php echo $this->_tpl_vars['message']; ?>
</td>
				</tr>
				<tr><td><input type="submit" /></td></tr>
			</table>
		</form>
	</div>
</div>