<?php /* Smarty version 2.6.26, created on 2011-08-08 07:22:31
         compiled from zh_tw/list.tpl.htm */ ?>
<div class="new_module_main">
	<div id="<?php echo $this->_tpl_vars['c']; ?>
_top">
		<div class="piece">
			<a href="index.php"><font color="<?php echo $this->_tpl_vars['color']; ?>
"><b>系所社團</b></font></a>
			<font color="<?php echo $this->_tpl_vars['color']; ?>
"><b> > </b></font>
			<a href="club_<?php echo $this->_tpl_vars['c']; ?>
.php"><font color="<?php echo $this->_tpl_vars['color']; ?>
"><b><?php echo $this->_tpl_vars['club_data']['category']; ?>
</b></font></a>
			<font color="<?php echo $this->_tpl_vars['color']; ?>
"><b> > </b></font>
			<a href="list.php?c_id=<?php echo $this->_tpl_vars['club_data']['id']; ?>
"><font color="<?php echo $this->_tpl_vars['color']; ?>
"><b><?php echo $this->_tpl_vars['club_data']['club_name']; ?>
</b></font></a>
		</div>
	</div>
	<div id="main2">
		<?php if ($this->_tpl_vars['club_data']['img_1'] != ""): ?>
			<div class="aru_pic">
			<a href="<?php echo $this->_tpl_vars['club_data']['img_1']; ?>
">
			<img src="<?php echo $this->_tpl_vars['club_data']['img_1']; ?>
" width="274" height="187"/>
			</a>
			</div>
		<?php else: ?>
			<div class="none_pic"></div>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['club_data']['img_2'] != ""): ?>
			<div class="aru_pic">
			<a href="<?php echo $this->_tpl_vars['club_data']['img_2']; ?>
">
			<img src="<?php echo $this->_tpl_vars['club_data']['img_2']; ?>
" width="274" height="187"/>
			</a>
			</div>
		<?php else: ?>
			<div class="none_pic"></div>
		<?php endif; ?>
		<div class="clear"></div>
		<?php if ($this->_tpl_vars['c'] == 'department'): ?>
			<div class="list_title">‧系所簡介：</div>
			<div class="list_content"><?php echo $this->_tpl_vars['contents']; ?>
</div>
			<div class="list_title">‧系代：</div>
			<div class="list_content">手機： <?php echo $this->_tpl_vars['club_data']['leader_phone']; ?>
<br />
									二進位ID： <?php echo $this->_tpl_vars['club_data']['leader_bbs']; ?>
<br />
									E-mail： <?php echo $this->_tpl_vars['club_data']['leader_email']; ?>
</div>
			<div class="list_title">‧副系代：</div>
			<div class="list_content">手機： <?php echo $this->_tpl_vars['club_data']['vice_phone']; ?>
<br />
									二進位ID： <?php echo $this->_tpl_vars['club_data']['vice_bbs']; ?>
<br />
									E-mail： <?php echo $this->_tpl_vars['club_data']['vice_email']; ?>
</div>
			<div class="list_title">‧系所網站： </div>
			<div class="list_content"><a href="<?php echo $this->_tpl_vars['club_data']['website']; ?>
"><?php echo $this->_tpl_vars['club_data']['website']; ?>
</a></div>
			<div class="list_title">‧二進位板名： </div>
			<div class="list_content"><?php echo $this->_tpl_vars['club_data']['bbs_site']; ?>
</div>

		<?php else: ?>
			<div class="list_title">‧社團簡介：</div>
			<div class="list_content"><?php echo $this->_tpl_vars['contents']; ?>
</div>
			<div class="list_title">‧社長：</div>
			<div class="list_content">手機： <?php echo $this->_tpl_vars['club_data']['leader_phone']; ?>
<br />
									二進位ID： <?php echo $this->_tpl_vars['club_data']['leader_bbs']; ?>
<br />
									E-mail： <?php echo $this->_tpl_vars['club_data']['leader_email']; ?>
</div>
			<div class="list_title">‧副社長：</div>
			<div class="list_content">手機： <?php echo $this->_tpl_vars['club_data']['vice_phone']; ?>
<br />
									二進位ID： <?php echo $this->_tpl_vars['club_data']['vice_bbs']; ?>
<br />
									E-mail： <?php echo $this->_tpl_vars['club_data']['vice_email']; ?>
</div>
			<div class="list_title">‧社團網站： </div>
			<div class="list_content"><a href="<?php echo $this->_tpl_vars['club_data']['website']; ?>
"><?php echo $this->_tpl_vars['club_data']['website']; ?>
</a></div>
			<div class="list_title">‧二進位板名： </div>
			<div class="list_content"><?php echo $this->_tpl_vars['club_data']['bbs_site']; ?>
</div>
		<?php endif; ?>
	</div>
	<div id="<?php echo $this->_tpl_vars['c']; ?>
_bottom">
	</div>
</div>