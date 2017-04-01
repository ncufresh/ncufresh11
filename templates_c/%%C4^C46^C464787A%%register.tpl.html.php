<?php /* Smarty version 2.6.26, created on 2011-08-08 15:06:48
         compiled from zh_tw/register.tpl.html */ ?>
<!--[if lte IE 7]>
	<style type="text/css">
		div#register_form span.warning {
			zoom: 1;
			position: relative;
		}
	</style>
<![endif]-->

<script type="text/javascript">
$(function() {
	$( "#birID" ).datepicker({
		showButtonPanel: true,
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
        defaultDate: '1992-01-01'
	});
});
</script>

<div class="register_main">
	<form action="register.php?action=register" method="post">
		<div id="pet_select">
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
		</div>
		
		<div id="register_form">
		
			<p><span class="warning" id="must_fill" >*&nbsp;欄位為必填項目</span><p/>
			<label for="accountID"><span class="warning">*&nbsp;</span>帳號：</label>
			<input class="hint" type="text" name="account" value="<?php echo $this->_tpl_vars['post']['account']; ?>
"  id="accountID" title="您的帳號，請輸入3~12個字元" /><br />
			<label for="passID"><span class="warning">*&nbsp;</span>原始密碼：</label>
			<input class="hint" type="password" name="password" id="passID" title="您的密碼，只能使用數字、英文字母、底線，且不得少於6個字元" /><br />
			<label for="passcfmID"><span class="warning">*&nbsp;</span>密碼確認：</label>
			<input class="hint" type="password" name="password_check" id="passcfmID" title="請再輸入一次密碼"  /><br />
			<label for="nameID"><span class="warning">*&nbsp;</span>姓名：</label>
			<input class="hint" type="text" name="name" value="<?php echo $this->_tpl_vars['post']['name']; ?>
" id="nameID" title="您的姓名" /><br />
			<label for="nickID"><span class="warning">*&nbsp;</span>暱稱：</label>
			<input class="hint" type="text" name="nickname" value="<?php echo $this->_tpl_vars['post']['nickname']; ?>
" id="nickID" title="您的暱稱，不能超過10個字元" /><br />
			<label for="depID"><span class="warning">*&nbsp;</span>科系：</label>
				<select class="hint" name="department" id="depID" title="您的科系" >
				<option value="">請選擇</option>
				<?php $_from = $this->_tpl_vars['departments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['value']):
?>
					<option value="<?php echo $this->_tpl_vars['value']; ?>
"><?php echo $this->_tpl_vars['value']; ?>
</option>
				<?php endforeach; endif; unset($_from); ?>
				</select><br />
			<label for="birID">生日：</label>
			<input type="text" name="birthday" value="<?php echo $this->_tpl_vars['post']['birthday']; ?>
" id="birID" title="您的生日" /><br />
			<label for="mailID">信箱：</label>
			<input class="hint" type="text" name="email" value="<?php echo $this->_tpl_vars['post']['email']; ?>
" id="mailID" title="您的信箱" /><br />
			<label for="hsID">畢業高中：</label>
			<input class="hint" type="text" name="graduatedschool" value="<?php echo $this->_tpl_vars['post']['graduatedschool']; ?>
" id="hsID" title="您的畢業高中" /><br />
			<label for="siteID">個人網頁：</label>
			<input class="hint" type="text" name="homepage" value="<?php echo $this->_tpl_vars['post']['homepage']; ?>
" id="siteID" title="您的網站" /><br />
			<label for="introID">自我介紹：</label>	<textarea class="hint" name="intro" id="introID" title="個人介紹，不得超過100個字" ><?php echo $this->_tpl_vars['post']['intro']; ?>
</textarea><br />
			<label for="vidID">個人影片：</label>
			<input class="hint" name="video" value="<?php echo $this->_tpl_vars['post']['video']; ?>
" id="vidID" title="自訂 YouTube 影片，可以在這裡貼上你 YouTube 影片的網址，會出現在個人頁面" /><br />
			<label for="gbookID">留言板：</label>
			<input class="hint" type="radio" name="guestbooks_public" value="1" checked="true" id="open" title="開放留言板供大家瀏覽" />
			<label for="open">開放</label>
			<input class="hint" type="radio" name="guestbooks_public" value="0" id="close" title="關閉留言板" />
			<label for="close">隱藏</label>
			<br /><br />
			<input type="hidden" name="postback" value="true" />
			<input class="hint" type="submit" value="" id="register_button" title="確認送出" />
			<input class="hint" type="reset" value="" id="reset_button" title="清除資料" />
		</div>
	</form>
	
</div>
<script type=text/javascript>
$("#register_form .hint").tooltip({
	// place tooltip on the right edge
	position: "center right",
	// a little tweaking of the position
	offset: [-2, 10],
	// use the built-in fadeIn/fadeOut effect
	effect: "fade",
	// custom opacity setting
	opacity: 0.6
});

</script>