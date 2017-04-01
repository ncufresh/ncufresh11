<?php /* Smarty version 2.6.26, created on 2011-07-20 08:08:55
         compiled from zh_tw/schedule.html */ ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<div id="background_content0" class="background">
    <a id="index5_0"class="index5_0" href="category.php"></a> 
	<a id="index0"class="index0" href="schedule.php"></a>
    <a id="index1"class="index1" href="menu.php?cid=1"></a>
    <a id="index2"class="index2" href="menu.php?cid=2"></a>
	<a id="index3"class="index3" href="menu.php?cid=3"></a>
	<a id="index4"class="index4" href="menu.php?cid=4"></a>
	
	


     <div id="schedule_content"class="schedule_content">
        <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['array_4D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
$this->_sections['foo']['step'] = 1;
$this->_sections['foo']['start'] = $this->_sections['foo']['step'] > 0 ? 0 : $this->_sections['foo']['loop']-1;
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = $this->_sections['foo']['loop'];
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>


          name:<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['name']; ?>
<br/><br/>
          content:<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['content']; ?>
<br/><br/>

        <?php endfor; endif; ?>
 
     </div>
	 
	 
</div>

</html>