<?php /* Smarty version 2.6.26, created on 2011-08-05 00:45:23
         compiled from zh_tw/mailbox.tpl.html */ ?>
<?php if ($this->_tpl_vars['unread_mail_rows'] != 0): ?>
	<div class="mail_new">
		<div>
			<a class="recv_mail" href="mail.php">
				收信
			</a>
			<a class="send_mail" href="newmail.php">
				寫信
			</a>

		</div>
		<span class="unread_mail_rows">
			<?php echo $this->_tpl_vars['unread_mail_rows']; ?>

		</span>
	</div>
<?php else: ?>
	<div class="mail_nonew">
		<div>
			<a class="recv_mail" href="mail.php">
				收信
			</a>
			<a class="send_mail" href="newmail.php">
				寫信
			</a>
		</div>
	</div>
<?php endif; ?>