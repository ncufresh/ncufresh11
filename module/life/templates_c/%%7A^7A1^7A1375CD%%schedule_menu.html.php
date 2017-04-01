<?php /* Smarty version 2.6.26, created on 2011-07-25 09:30:52
         compiled from zh_tw/schedule_menu.html */ ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<div id="background_content0" class="background">
    <!--<a id="index5_0"class="index5_0" href="category.php"></a>-->
	<a href="schedule_content.php"></a>

	
	
	<div  id="" class="">
	<a></a>    有28個?
    </div>

     <div id="schedule_content"class="schedule_content">
        <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['array_info']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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


          name:<?php echo $this->_tpl_vars['array_info'][$this->_sections['foo']['index']]['event01']; ?>
<br/><br/>
          content:<?php echo $this->_tpl_vars['array_info'][$this->_sections['foo']['index']]['event01']; ?>
<br/><br/>

        <?php endfor; endif; ?>
 
     </div>
	 
	 
</div>

</html>