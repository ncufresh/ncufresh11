<?php /* Smarty version 2.6.26, created on 2011-08-07 18:59:41
         compiled from zh_tw/menu.html */ ?>

<div id="background_menu<?php echo $this->_tpl_vars['img']; ?>
" class="background">
   
	<?php if ($this->_tpl_vars['img'] != 4): ?>
	                           <div id="leftmenu_content" class="innermenu_content">
      
							   <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['array_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['max'] = (int)$this->_tpl_vars['i']+1;
$this->_sections['foo']['show'] = true;
if ($this->_sections['foo']['max'] < 0)
    $this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
$this->_sections['foo']['step'] = 1;
$this->_sections['foo']['start'] = $this->_sections['foo']['step'] > 0 ? 0 : $this->_sections['foo']['loop']-1;
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
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
							  
							   <a  href="content.php?cid=<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['category_id']; ?>
&Cid=<?php echo $this->_sections['foo']['index']; ?>
"><?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['name']; ?>
</a>
							   <br/><br/>
							   <?php endfor; endif; ?>
							   
							   </div>
							   
							   
							   <div id="rightmenu_content" class="innermenu_content">
                           
							   <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['array_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['start'] = (int)$this->_tpl_vars['i']+1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
$this->_sections['foo']['step'] = 1;
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
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
							               
										   <?php if ($this->_sections['foo']['index'] < 10): ?>
												   
															<a  href="content.php?cid=<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['category_id']; ?>
&Cid=<?php echo $this->_sections['foo']['index']; ?>
"><?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['name']; ?>
</a>
															<br /><br />
												   
										   <?php else: ?>
										   
										            <?php if ($this->_tpl_vars['img'] == 3): ?>
														   <a  href="<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['content']; ?>
"><?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['name']; ?>
</a>
														   <br/><br/>
										            <?php else: ?>
													        <?php if ($this->_tpl_vars['img'] == 4): ?>
																			    <a  href="<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['content']; ?>
"><?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['name']; ?>
</a>
																				<br/><br/>
															        <?php else: ?>					
																				<a  href="content.php?cid=<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['category_id']; ?>
&Cid=<?php echo $this->_sections['foo']['index']; ?>
"><?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['name']; ?>
</a>
																				<br /><br />
															<?php endif; ?>
													<?php endif; ?>
										   <?php endif; ?>
										   
							   <?php endfor; endif; ?>
							               
							   </div>
			
	<?php else: ?>			
	
                                <div id="leftmenu_content" class="innermenu_content">
      
							   <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['array_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['max'] = (int)$this->_tpl_vars['i']+1;
$this->_sections['foo']['show'] = true;
if ($this->_sections['foo']['max'] < 0)
    $this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
$this->_sections['foo']['step'] = 1;
$this->_sections['foo']['start'] = $this->_sections['foo']['step'] > 0 ? 0 : $this->_sections['foo']['loop']-1;
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
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
							  
							    <a  href="<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['content']; ?>
"><?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['name']; ?>
</a>
							   <br/><br/>
							   <?php endfor; endif; ?>
							   
							   </div>
							   
							   
							   <div id="rightmenu_content" class="innermenu_content">
      
							   <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['array_2D']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['start'] = (int)$this->_tpl_vars['i']+1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
$this->_sections['foo']['step'] = 1;
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
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
							  
							   <a  href="<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['content']; ?>
"><?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['name']; ?>
</a>
							   <br /><br />
							   <?php endfor; endif; ?>
							   
							   </div>
			
			               
			
			
    <?php endif; ?>
	 <a id="menu_back"class="menu_back_c"href="index.php"></a>
</div>
