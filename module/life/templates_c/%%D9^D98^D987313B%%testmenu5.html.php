<?php /* Smarty version 2.6.26, created on 2011-07-16 08:36:37
         compiled from zh_tw/testmenu5.html */ ?>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

</head>
<body>


<div id="background5" class="backgroundsetting">
     
    <div id="middle" class="middle">
	<?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['array_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <a class="text" href="testcontent.php?c1id=5&scid=<?php echo $this->_sections['foo']['index']; ?>
&c2id=0">
	<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['sc_name']; ?>

	</a></br></br>
	<?php endfor; endif; ?>
	</div>

<a href="testmenu1.php"id="food" class="imgfood"></a>
<a href="testmenu2.php"id="live" class="imglive"></a>
<a href="testmenu3.php"id="transport" class="imgtransport"></a>
<a href="testmenu4.php"id="outdoor" class="imgoutdoor"></a>
<a href="testmenu5.php"id="health" class="imghealth"></a>
<a href="testmenu6.php"id="sport" class="imgsport"></a>
<a href="testmenu7.php"id="life" class="imglife"></a>

</div>



</div>
</body>