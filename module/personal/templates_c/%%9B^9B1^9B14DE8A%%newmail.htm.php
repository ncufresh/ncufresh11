<?php /* Smarty version 2.6.26, created on 2011-08-07 11:21:43
         compiled from zh_tw/newmail.htm */ ?>
<div class="new_mail_main">
	<form id="new_mail_form" method="post" action="newmail.php">
		<table class="content">
			<tbody>
				<tr><td class="tag">收件人ID</td><td><input type="text" value="<?php echo $this->_tpl_vars['rid']; ?>
" name="reciever" /></td></tr>
				<tr><td class="tag">標題</td><td><input type="text" value="<?php echo $this->_tpl_vars['title']; ?>
" name="title" /></td></tr>
				<tr><td class="tag">內容</td></tr>
				<tr><td colspan="2"><textarea class="text" name="mail"></textarea></td></tr>
			</tbody>
		</table>
		<input class="send" type="submit" value="送出" />
		<a class="back" href="mail.php">
			回到上一層
		</a>
	</form>
	<!--
	<a href="mail.php">信件列表</a>
	<a href="newmail.php">撰寫新信</a>
	-->
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./zh_tw/mailbox.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>