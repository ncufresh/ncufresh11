<?php /* Smarty version 2.6.26, created on 2011-08-08 15:20:24
         compiled from zh_tw/index.tpl.htm */ ?>
<div id="personal_main">
	<div class="cloud">
		<div class="personal_data">
		<table>
			<tr><td>姓名：</td><td><?php echo $this->_tpl_vars['personal_data']['name']; ?>
</td></tr>
			<tr><td>暱稱：</td><td><?php echo $this->_tpl_vars['personal_data']['nickname']; ?>
</td></tr>
			<tr><td>科系：</td><td><?php echo $this->_tpl_vars['personal_data']['department']; ?>
</td></tr>
			<tr><td>生日：</td><td><?php echo $this->_tpl_vars['personal_data']['birthday']; ?>
</td></tr>
			<tr><td>信箱：</td><td><?php echo $this->_tpl_vars['personal_data']['email']; ?>
</td></tr>
			<tr><td>高中：</td><td><?php echo $this->_tpl_vars['personal_data']['graduatedschool']; ?>
</td></tr>
			<tr><td>網頁：</td><td><a target="_blank" href="<?php echo $this->_tpl_vars['personal_data']['homepage']; ?>
"><?php echo $this->_tpl_vars['personal_data']['homepage']; ?>
</a></td></tr>
		</table>
		</div>
		<div class="introduction">
			自我介紹：<?php echo $this->_tpl_vars['personal_data']['intro']; ?>

		</div>
		<div id="edit_persoanl_data">
		<?php if ($this->_tpl_vars['is_self'] == true): ?>
			<form name="edit" action="personal_data_edit.php" method="post">
				<input type="submit" value="修改個人資料" />
			</form>
		<?php endif; ?>
		</div>
		<div class="personal_video" id="<?php echo $this->_tpl_vars['vid']; ?>
" value="<?php echo $this->_tpl_vars['is_me']; ?>
">
		</div>
	</div>
	<div class="house">
		<div class="personal_guestbooks">
			<div class="slides">
				<?php if ($this->_tpl_vars['guestbooks_is_valid'] == true): ?>
					<?php $_from = $this->_tpl_vars['personal_guestbooks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['guestbook']):
        $this->_foreach['foo']['iteration']++;
?>
						<?php if (($this->_foreach['foo']['iteration']-1) % 4 == 0): ?><div class="slide"> <?php endif; ?>
							<div class="message">
								<img class="photo" src="<?php echo $this->_tpl_vars['guestbook']['img_src']; ?>
" />
								<div class="content">
									<a class="personal_page_link" href="index.php?info_id=<?php echo $this->_tpl_vars['guestbook']['guestid']; ?>
"><?php echo $this->_tpl_vars['guestbook']['nickname']; ?>
</a>:<?php echo $this->_tpl_vars['guestbook']['content']; ?>

								</div> 
							</div>
						<?php if (($this->_foreach['foo']['iteration']-1) % 4 == 3 || $this->_foreach['foo']['iteration'] == $this->_foreach['foo']['total']): ?></div><?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				<?php else: ?>
					<div class="private">
						<strong>留言板目前不開放喔！必須成為好友後才能看到！</strong>
					</div>
				<?php endif; ?>
			</div>
			<?php if ($this->_tpl_vars['guestbooks_is_valid'] == true): ?>
				<form id="new_guestbook" action="index.php?info_id=<?php echo $this->_tpl_vars['info_id']; ?>
" method="post">
					<input class="new_gbook" name="content" type="text" value="留言..."/> 
				</form>
			<?php endif; ?>
			<span>滾輪換頁</span>
		</div>
		<div class="personal_name_pic">
			<span class="pet_name">
				<?php echo $this->_tpl_vars['personal_data']['pet_name']; ?>

			</span>
			<a href="../pet_game/index.php?uid=<?php echo $this->_tpl_vars['personal_data']['uid']; ?>
"><img class="pet_pic" src="<?php echo $this->_tpl_vars['personal_data']['img_src']; ?>
" /></a>
		</div>

		<?php if ($this->_tpl_vars['is_self'] == true): ?>
			<?php if ($this->_tpl_vars['unread_mail_rows'] == 0): ?>
				<a class="mailbox" href="mail.php"></a>
			<?php else: ?>
				<a class="new_mailbox" href="mail.php"><span><?php echo $this->_tpl_vars['unread_mail_rows']; ?>
</span></a>
			<?php endif; ?>
		<?php else: ?>
			<?php if ($this->_tpl_vars['is_friend'] == false): ?>
				<a class="invite_friend" href="index.php?action=invite&info_id=<?php echo $this->_tpl_vars['info_id']; ?>
"></a>
			<?php else: ?>
				<a class="delete_friend" href="index.php?action=del&did=<?php echo $this->_tpl_vars['info_id']; ?>
"></a>
			<?php endif; ?>
		<?php endif; ?>
		
	</div>
</div>
<?php echo $this->_tpl_vars['msg']; ?>
