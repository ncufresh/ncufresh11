<?php /* Smarty version 2.6.26, created on 2011-08-07 23:42:06
         compiled from zh_tw/mail.tpl.htm */ ?>
<div id="mail_list_main">
	<form method="post" action="mail.php">
	<table id="mail_list_class">
		<thead>
			<tr>
				<td class="title">
					訊息標題
				</td>
				<td class="sender">
					寄件人
				</td>
				<td class="date">
					寄件日期
				</td>
				<td class="del">
					
				</td>
			</tr>
		</thead>
	</table>
	<div class="slides">
		<?php $_from = $this->_tpl_vars['mails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['mail_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['mail_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['mail']):
        $this->_foreach['mail_list']['iteration']++;
?>
			<?php $this->assign('rows', 7); ?>
			<?php if (($this->_foreach['mail_list']['iteration']-1) % $this->_tpl_vars['rows'] == 0): ?><table class="mail_list"><tbody class="slide"><?php endif; ?>
				<tr>
					<td class="title">
					<?php if ($this->_tpl_vars['mail']['is_read'] == '0'): ?>
						<img class="read_image" src="./templates/zh_tw/images/unread.png" align="middle"/>
					<?php else: ?>
						<img class="read_image" src="./templates/zh_tw/images/read.png" align="middle"/>
					<?php endif; ?>
					<a class="mail_link" href="show.php?mailid=<?php echo $this->_tpl_vars['mail']['id']; ?>
">
					<?php echo $this->_tpl_vars['mail']['title']; ?>
</a></td>
					<td class="sender"><a class="mail_link" href="index.php?info_id=<?php echo $this->_tpl_vars['mail']['senderid']; ?>
"><?php echo $this->_tpl_vars['mail']['username']; ?>
</a></td>
					<td class="date"><?php echo $this->_tpl_vars['mail']['date']; ?>
</td>
					<td class="del"><a href="mail.php?del_id=<?php echo $this->_tpl_vars['mail']['id']; ?>
" class="del_button" name="mailid" ></a></td>
				</tr>
			<?php if (($this->_foreach['mail_list']['iteration']-1) % $this->_tpl_vars['rows'] == ( $this->_tpl_vars['rows'] - 1 ) || $this->_foreach['mail_list']['iteration'] == $this->_foreach['mail_list']['total']): ?></tbody></table><?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</div>
	</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "zh_tw/mailbox.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>