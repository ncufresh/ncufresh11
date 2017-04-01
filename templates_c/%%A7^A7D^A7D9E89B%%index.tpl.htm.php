<?php /* Smarty version 2.6.26, created on 2012-03-06 03:24:43
         compiled from zh_tw/index.tpl.htm */ ?>
<link rel=stylesheet type="text/css" href="templates/zh_tw/subtpl.css">
<script type="text/javascript">
	mEvent = new Array() ;
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
		var temp = new Array() ;
		<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['start'] = (int)0;
$this->_sections['j']['loop'] = is_array($_loop=6) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
if ($this->_sections['j']['start'] < 0)
    $this->_sections['j']['start'] = max($this->_sections['j']['step'] > 0 ? 0 : -1, $this->_sections['j']['loop'] + $this->_sections['j']['start']);
else
    $this->_sections['j']['start'] = min($this->_sections['j']['start'], $this->_sections['j']['step'] > 0 ? $this->_sections['j']['loop'] : $this->_sections['j']['loop']-1);
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = min(ceil(($this->_sections['j']['step'] > 0 ? $this->_sections['j']['loop'] - $this->_sections['j']['start'] : $this->_sections['j']['start']+1)/abs($this->_sections['j']['step'])), $this->_sections['j']['max']);
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
			temp.push('<?php echo $this->_tpl_vars['calender'][$this->_sections['i']['index']][$this->_sections['j']['index']]; ?>
') ;
		<?php endfor; endif; ?>
		mEvent.push(temp) ;
	<?php endfor; endif; ?>
	uEvent = new Array() ;
	<?php if ($this->_tpl_vars['is_login']): ?>
	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['uEvent']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		uEvent.push('<?php echo $this->_tpl_vars['uEvent'][$this->_sections['i']['index']]; ?>
') ;
	<?php endfor; endif; ?>
	<?php endif; ?>
</script>
<img src="templates/zh_tw/images/end.jpg" />
<div id="calender">
	<div class="container">
		<div class="left"><div class="arrow"></div></div>
		<div class="main">
			<table>
				<tr><td class="row"></td></tr>
				<tr><td class="row"></td></tr>
				<tr><td class="row"></td></tr>
				<tr><td class="row"></td></tr>
				<tr><td class="row"></td></tr>
				<tr><td class="row_date"></td><td><div style="width:5px;"></div></td></tr>
			</table>
		</div>
		<div class="right"><div class="arrow"></div></div>
	</div>
</div>
<div id="latest">
	<div class="left">
		<h4>最新消息</h4>
		<?php echo $this->_tpl_vars['anno_block']; ?>

 	</div>
	<div class="right">
		<h4>最新論壇</h4>
		<?php echo $this->_tpl_vars['forum_block']; ?>

	</div>
</div>
<div id="board_height">
	<div id="board">
		<div id="link">
			<table>
			<tr>
			<td><a target="_blank" href="https://portal.ncu.edu.tw/wps/portal/!ut/p/cxml/04_Sj9SPykssy0xPLMnMz0vM0Q_wyU_PzNMvSFdUBACQIYPZ">Portal入口</a></td>
			<td><a target="_blank" href="http://puma.cc.ncu.edu.tw:8080/Course/main/news/announce">選課系統</a></td>
			</tr>
			<tr>
				<td><a target="_blank" href="http://passport.ncu.edu.tw/">服務學習</a></td>
				<td><a target="_blank" href="http://www.lib.ncu.edu.tw/cmain.php">圖書館首頁</a></td>
			</tr>
			<tr>
				<td><a target="_blank" href="http://www.cc.ncu.edu.tw/">電算中心</a></td>
				<td><a target="_blank" href="http://www.ncu.edu.tw/">中大首頁</a></td>
			</tr>
			<tr>
				<td><a target="_blank" href="http://learn.lib.ncu.edu.tw:8080/~refitoy/e-learning/">圖書館資源學習網</a></td>
				<td><a target="_blank" href="http://ncufresh.ncu.edu.tw/ncufresh11/module/readme/document_fordownload/download/100%E5%AD%B8%E5%B9%B4%E5%BA%A6%E6%A0%A1%E6%9B%86.pdf">100學年度校曆</a></td>
			</tr>
			</table>
		</div>
		<div id="favo">
			<table>
				<tr>
					<td><a target="_blank" href="http://www.uac.edu.tw/">線上查榜系統</a></td>
					<td><a target="_blank" href="http://www4.is.ncu.edu.tw/register/check/stdno_check.php">學號查詢</a></td>
				</tr>
				<tr>
					<td><a target="_blank" href="http://www.facebook.com/pinewave">松濤電台</a></td>
					<td><a target="_blank" href="http://ncugrad.pixnet.net/blog">研究生部落</a></td>
				</tr>
				<tr>
					<td><a target="_blank" href="http://ncufresh.ncu.edu.tw/ncufresh11/module/readme/content.php?cid=3&Cid=6">校園安全</a></td>
				</tr>
			</table>
		</div>
	</div>
</div>