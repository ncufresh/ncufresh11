<?php /* Smarty version 2.6.26, created on 2011-08-07 09:32:51
         compiled from zh_tw/edit_anno.tpl.htm */ ?>
<script type="text/javascript">
function delete_rel_link(input_urlid)
{
	var is_delete_checked = confirm("確認刪除？");
	if(is_delete_checked)
	{
		$.ajax({
			url: 'delete_ext.php',
			data: {
				action: 'op_rel_link_delete',
				urlid: input_urlid,
			},
			success: function(response){
				$('div#rel_link_' + input_urlid).html('');
				$('div#rel_link_' + input_urlid).html(response);
			}
		});
	}
}


function delete_attach_file(input_fid)
{
	var is_delete_checked = confirm("確認刪除？");
	if(is_delete_checked)
	{
		$.ajax({
			url: 'delete_ext.php',
			data: {
				action: 'op_attachfile_delete',
				fid: input_fid,
			},
			success: function(response){
				$('div#attach_file_' + input_fid).html('');
				$('div#attach_file_' + input_fid).html(response);
			}
		});
	}
}
</script>
<form action="edit_anno.php?action=<?php echo $this->_tpl_vars['next_action']; ?>
" method="post" enctype="multipart/form-data">
<?php if ($this->_tpl_vars['error_message'] != ""): ?>
<span class="warning_msg"><?php echo $this->_tpl_vars['error_message']; ?>
</span>
<br /><br />
<?php endif; ?>

<div id="anno_upper"></div>

<div id="anno_middle">
	<div id="edit_anno_main">
	  <div class="edit_container">
	    <div class="edit_var">標題</div>
	    <div class="edit_value"><input type="text" name="title" value="<?php echo $this->_tpl_vars['post_title']; ?>
" /></div>
	    <br class="clear" />
	  </div>
	  <div class="edit_container">
	    <div class="edit_var">內容</div>
	    <div class="edit_value"><textarea name="contents" width="" class="tinymce"><?php echo $this->_tpl_vars['post_contents']; ?>
</textarea>
	    </div>
	    <br class="clear" />
	  </div>
	  <div class="edit_container">
	    <div class="edit_var">立即發布？</div>
	    <div class="edit_value"><input name="is_display" type="checkbox" value="1" <?php if ($this->_tpl_vars['post_is_display'] == 1): ?>checked="checked"<?php endif; ?> /></div>
	    <br class="clear" />
	  </div>
	  <div class="edit_container">
	    <div class="edit_var">相關連結</div>
	    <div class="edit_value">
	    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['rel_link_array']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
	    <div id="rel_link_<?php echo $this->_tpl_vars['rel_link_array'][$this->_sections['i']['index']]['urlid']; ?>
">
	      <strong><a onclick="delete_rel_link(<?php echo $this->_tpl_vars['rel_link_array'][$this->_sections['i']['index']]['urlid']; ?>
);">[刪除]</a></strong>
	      <a title="<?php echo $this->_tpl_vars['rel_link_array'][$this->_sections['i']['index']]['title']; ?>
" target="_blank" href="<?php echo $this->_tpl_vars['rel_link_array'][$this->_sections['i']['index']]['path']; ?>
"><?php echo $this->_tpl_vars['rel_link_array'][$this->_sections['i']['index']]['title']; ?>
 (網址：<?php echo $this->_tpl_vars['rel_link_array'][$this->_sections['i']['index']]['path']; ?>
)</a><br />
	    </div>
	    <?php endfor; endif; ?>
	    <br />
	    <strong>新增連結</strong> - 
	    標題: <input name="rel_link_title" type="text" size="5" />
	    網址: <input name="rel_link_path" type="text" value="http://"/>
	    <input type="submit" name="submit" value="新增連結" />
	    </div>
	    <br class="clear" />
	  </div>
	  <div class="edit_container">
	    <div class="edit_var">附件檔案</div>
	    <div class="edit_value">
	    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['attach_file_array']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
	    <div id="attach_file_<?php echo $this->_tpl_vars['attach_file_array'][$this->_sections['i']['index']]['fid']; ?>
">
	      <strong><a onclick="delete_attach_file(<?php echo $this->_tpl_vars['attach_file_array'][$this->_sections['i']['index']]['fid']; ?>
);">[刪除]</a></strong>
	      <a title="<?php echo $this->_tpl_vars['attach_file_array'][$this->_sections['i']['index']]['title']; ?>
" target="_blank" href="<?php echo $this->_tpl_vars['attach_file_array'][$this->_sections['i']['index']]['path']; ?>
"><?php echo $this->_tpl_vars['attach_file_array'][$this->_sections['i']['index']]['title']; ?>
</a><br />
	    </div>
	    <?php endfor; endif; ?>
	    <br />
	    <strong>新增附件</strong> - 
	    標題: <input name="attach_title" type="text" size="5" />
	    網址: <input name="attach_file" type="file" size="10" />
	    <input type="submit" name="submit" value="新增附檔" />
	    </div>
	    <br class="clear" />
	  </div>
	  <div class="edit_container">
	    <div class="edit_var"></div>
	    <div class="edit_value"><br />
	    <input type="hidden" name="tid" value="<?php echo $this->_tpl_vars['post_tid']; ?>
" />
	    <input type="submit" name="submit" value="送出公告" />
	    <input type="reset" name="reset" value="重新填寫" /><br /><br />
	    </div>
	    <br class="clear" />
	  </div>
	  <br class="clear" />
	</div>
	<div id="anno_return"><a href="list_anno.php"><img src="templates/zh_tw/images/return.png" /></a></div>
</div>

<div id="anno_footer"></div>
</form>
