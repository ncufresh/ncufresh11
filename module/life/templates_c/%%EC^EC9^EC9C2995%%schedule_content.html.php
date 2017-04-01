<?php /* Smarty version 2.6.26, created on 2011-07-26 09:43:21
         compiled from zh_tw/schedule_content.html */ ?>
			<script>
			$(document).ready(function() {
			  for(var i=1;i<=5;i++)
			  {
					if(i==<?php echo $this->_tpl_vars['img']; ?>
){
									$('#index'+<?php echo $this->_tpl_vars['img']; ?>
).css({
									background-image: 'url('readme/readme/content/button02.png')', 
									margin-left: '600px',
	                                margin-top: '78px'
									
									});
									}
			  }
			});
			</script>

<div>



			<a id="index0"class="index0" href="schedule_menu.php"></a>
			<a id="index1"class="index1" href="menu.php?cid=1"></a>
			<a id="index2"class="index2" href="menu.php?cid=2"></a>
			<a id="index3"class="index3" href="menu.php?cid=3"></a>
			<a id="index4"class="index4" href="menu.php?cid=4"></a>   
			
			
		        <div id="background_up" class="background_up">
				</div>
							<div id="background_middle" class="background_middle">

												   <div class="table_up" id="table_up">
												   This page is not fully installed!
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
														
																	<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['content_name']; ?>

																	
														<?php endfor; endif; ?>
												   
												   </div>
												   
														<div id="table_in"class="table_in">

															  TESR
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


																 name:<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['content_name']; ?>
<br/><br/>
																 content:<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['content']; ?>
<br/><br/>

															 <?php endfor; endif; ?>
													    </div>

									  
							</div>
				
		        <div id="background_content0" class="background_bottom">
				</div>				
			
</div>