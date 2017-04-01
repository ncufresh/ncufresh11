<?php /* Smarty version 2.6.26, created on 2011-08-10 01:23:43
         compiled from zh_tw/show.htm */ ?>
<!--
<div class="new_module_main">
	<h1><?php echo $this->_tpl_vars['mail']['title']; ?>
</h1>

	date : <?php echo $this->_tpl_vars['mail']['date']; ?>

	<p>
		<form method="post" action="index.php">
			<input type="hidden" value="<?php echo $this->_tpl_vars['mail']['sender']; ?>
" name="reciever" /> <br />
			<input type="hidden" value="Re:<?php echo $this->_tpl_vars['mail']['title']; ?>
" name="title" />
		</form>
	</p>
</div>
-->
<div class="show_mail_main">
	<table class="content">
		<tbody>
			<tr><td class="tag">寄件人</td><td><?php echo $this->_tpl_vars['mail']['username']; ?>
</td></tr>
			<tr><td class="tag">標題</td><td><?php echo $this->_tpl_vars['mail']['title']; ?>
</td></tr>
			<tr><td class="tag">內容</td></tr>
			<tr><td colspan="2"><div class="text"><?php echo $this->_tpl_vars['mail']['content']; ?>
</div></td></tr>
		</tbody>
	</table>
	<a class="re_mail" href="newmail.php?title=<?php echo $this->_tpl_vars['mail']['title']; ?>
&rid=<?php echo $this->_tpl_vars['mail']['username']; ?>
">
		回信給作者
	</a>
	<a class="back" href="mail.php">
		回到上一層
	</a>
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