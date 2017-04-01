<?php /* Smarty version 2.6.26, created on 2011-08-08 15:08:11
         compiled from zh_tw/personal_data_edit.tpl.html */ ?>
<script>
$(function() {
	$( "#birID" ).datepicker({
		showButtonPanel: true,
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		regional: 'zh-TW',
        defaultDate: '1992-01-01'
	});
});
</script>

<div id="edit_background">

<div class="personal_main">
	<div id="pet_select">
		<?php if ($this->_tpl_vars['is_pet_dead'] == true): ?>
			<form id="pet_select_form" action="personal_data_edit.php?id=choose_pet">
				<div class="pet_pic"></div>
				<label for="selectPetID">選擇寵物：</label>
				<select name="pet" id="selectPetID" >
					<option value="10">請選擇</option>
					<?php $_from = $this->_tpl_vars['pet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['value']):
?>
						<?php if ($this->_tpl_vars['k'] < $this->_tpl_vars['admin_pet_key_start']): ?>
							<option value="<?php echo $this->_tpl_vars['k']; ?>
" ><?php echo $this->_tpl_vars['value']['1']; ?>
</option>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</select>
				<input type="submit" value="選擇" />
			</form>
		<?php endif; ?>
	</div>
	<div class="personal_data_form">
		<form id="personal_data_edit" action="personal_data_edit.php?id=data" method="post">
			<table>
			<tr><td>姓名：</td><td><input type="text" name="name" value="<?php echo $this->_tpl_vars['personal_data']['name']; ?>
"></td></tr>
			<tr><td>暱稱：</td><td><input type="text" name="nickname" value="<?php echo $this->_tpl_vars['personal_data']['nickname']; ?>
"></td></tr>
			<tr><td>生日：</td><td><input type="text" id="birID" name="birthday" value="<?php echo $this->_tpl_vars['personal_data']['birthday']; ?>
"></td></tr>
			<tr><td>信箱：</td><td><input type="text" name="email" value="<?php echo $this->_tpl_vars['personal_data']['email']; ?>
"></td></tr>
			<tr><td>畢業高中：</td><td><input type="text" name="graduatedschool" value="<?php echo $this->_tpl_vars['personal_data']['graduatedschool']; ?>
"></td></tr>
			<tr><td>個人網頁：</td><td><input type="text" name="homepage" value="<?php echo $this->_tpl_vars['personal_data']['homepage']; ?>
"></td></tr>
			<tr><td>自我介紹：</td><td><textarea name="intro"><?php echo $this->_tpl_vars['personal_data']['intro']; ?>
</textarea></td></tr>
			<tr><td>留言板：</td><td><input type="radio" name="guestbooks_public" value="1" <?php if ($this->_tpl_vars['personal_data']['guestbooks_public'] == 1): ?>checked<?php endif; ?> />開放
									 <input type="radio" name="guestbooks_public" value="0" <?php if ($this->_tpl_vars['personal_data']['guestbooks_public'] == 0): ?>checked<?php endif; ?> />隱藏</td></tr>
			<tr><td>個人影片</td><td><input name="video" value="http://www.youtube.com/watch?v=<?php echo $this->_tpl_vars['personal_data']['video']; ?>
" /></td></tr>
			<tr><td><input type="hidden" name="postback" value="true"></td></tr>
			<tr><td><input type="submit" value="修改資料" ></td></tr>
			</table>
		</form>
	</div>
	<hr />
	<div class="password_edit">
		<form id="password_edit" action="personal_data_edit.php?id=password" method="post">
			<table>
				<tr><td>原始密碼：</td><td><input type="password" name="password"/></td></tr>
				<tr><td>新密碼：</td><td><input type="password" name="new_password"/></td></tr>
				<tr><td>新密碼確認：</td><td><input type="password" name="new_password_check"/></td></tr>
				<tr><td><input type="submit" value="修改密碼"/></td></tr>
			</table>
		</form>
	</div>
</div>
<?php echo $this->_tpl_vars['error_message']; ?>

</div>