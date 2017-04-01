<?php /* Smarty version 2.6.26, created on 2011-08-04 20:06:05
         compiled from zh_tw/calender_event_handle.html */ ?>
﻿<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript">
	$(function() {
		$( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
	});
</script>

<div class="new_module_main">
	<form method="post" action="calender_event_handle.php">
		<input type="submit" value="刪除" /> <hr />
		<table>
			<tr>
			<td width=40px></td>
			<td width=40px>id</td>
			<td width=100px>title</td>
			<td width=100px>startdate</td>
			<td width=200px>enddate</td>
			<tr>
			<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['calender']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<tr>
						<td width=40px><input type="checkbox" name="event[]" value="<?php echo $this->_tpl_vars['calender'][$this->_sections['i']['index']][5]; ?>
"></td>
						<td width=40px><?php echo $this->_tpl_vars['calender'][$this->_sections['i']['index']][5]; ?>
</td>
						<td width=100px><?php echo $this->_tpl_vars['calender'][$this->_sections['i']['index']][2]; ?>
</td>
						<td width=100px><?php echo $this->_tpl_vars['calender'][$this->_sections['i']['index']][0]; ?>
</td>
						<td width=200px><?php echo $this->_tpl_vars['calender'][$this->_sections['i']['index']][1]; ?>
</td>
					</tr>
			<?php endfor; endif; ?>
		</table>
	</form>
	<hr />
	<form method="post" action="calender_event_handle.php">
		<p>
			EventId: <input type="text" name="eventid" /> <br />
			EventTitle: <input type="text" name="title" /> <br />
			EventLink: <input type="text" name="link" /> <br />
			StartDate: <input type="text" class="datepicker" name="startdate" /> <br />
			EndDate: <input type="text" class="datepicker" name="enddate" /> <br />
			Row:
				<select name="row">
					<option>0</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select>
		</p>
		<input type="submit" value="send" />
	</form>
</div>