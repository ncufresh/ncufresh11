<?php /* Smarty version 2.6.26, created on 2011-07-15 09:21:24
         compiled from zh_tw/testmenu.html */ ?>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

</head>
<body>


<div id="background" class="backgroundsetting">
     
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
    <a  href="testcontent.php?aid=<?php echo $this->_sections['foo']['index']; ?>
&id=<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['category_id']; ?>
"><?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['name']; ?>
</a></br>
	<?php endfor; endif; ?>
	</div>

<a href="testmenu.php?id=1"id="food" class="imgfood"></a>
<a href="testmenu.php?id=2"id="live" class="imglive"></a>
<a href="testmenu.php?id=3"id="transport" class="imgtransport"></a>
<a href="testmenu.php?id=4"id="outdoor" class="imgoutdoor"></a>
<a href="testmenu.php?id=5"id="health" class="imghealth"></a>
<a href="testmenu.php?id=6"id="sport" class="imgsport"></a>
<a href="testmenu.php?id=7"id="life" class="imglife"></a>

</div>



</div>
</body>