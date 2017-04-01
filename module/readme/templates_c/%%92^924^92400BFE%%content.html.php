<?php /* Smarty version 2.6.26, created on 2011-08-07 18:35:30
         compiled from zh_tw/content.html */ ?>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		var h = eval($("#background_middle").css('height').toString().replace('px', ''));
		$("#background_middle").css('height', Math.ceil(h/210) * 210);
	});
</script>




    <?php if ($this->_tpl_vars['imgc'] == 0): ?>
	<a id="index0_active_pos" class="index0" href="schedule_menu.php"></a>
	<?php else: ?>
	<a id="index0_pos" class="index0" href="schedule_menu.php"></a>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['imgc'] == 1): ?>
		<a id="index1_active_pos" class="index1" href="menu.php?cid=1"></a>
	<?php else: ?>
		<a id="index1_pos" class="index1" href="menu.php?cid=1"></a>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['imgc'] == 2): ?>
		<a id="index2_active_pos" class="index2" href="menu.php?cid=2"></a>
	<?php else: ?>
		<a id="index2_pos" class="index2" href="menu.php?cid=2"></a>
	<?php endif; ?>
		
	<?php if ($this->_tpl_vars['imgc'] == 3): ?>
		<a id="index3_active_pos" class="index3" href="menu.php?cid=3"></a>
	<?php else: ?>
		<a id="index3_pos" class="index3" href="menu.php?cid=3"></a>
	<?php endif; ?>
	
		
	<?php if ($this->_tpl_vars['imgc'] == 4): ?>
		<a id="index4_active_pos" class="index4" href="menu.php?cid=4"></a>
	<?php else: ?>
		<a id="index4_pos" class="index4" href="menu.php?cid=4"></a>
	<?php endif; ?>

	            <div id="background_up_pos" class="background_up">
				
						 <div id="title_pos"  class="Title">
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
								
											<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['name']; ?>

								<?php endfor; endif; ?>
						
						</div>
				
				</div>
							<div id="background_middle_pos" class="background_middle">

											<div id="content_content_pos"class="content_content">

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

															<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['content']; ?>


												<?php endfor; endif; ?>
											<div style="clear:both"></div>
									
											</div>
											
									
									<div style="clear:both"></div>
							
							</div>
							
					<div id="bg_bottom_pos" class="BG_bottom_c">		
					
							<div id="background_content<?php echo $this->_tpl_vars['imgc']; ?>
" class="background_bottomimg<?php echo $this->_tpl_vars['imgc']; ?>
">
							</div>
					</div>				
	