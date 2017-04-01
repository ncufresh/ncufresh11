<?php /* Smarty version 2.6.26, created on 2011-08-08 01:01:02
         compiled from zh_tw/schedule_content.html */ ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		var h = eval($("#background_middle_pos").css('height').toString().replace('px', ''));
		$("#background_middle_pos").css('height', Math.ceil(h/210+1) * 210);
		
		
		
							$('unfinished_c').click(function() {
						    

								alert("你已完成此事件，如果是誤點，請之後再按取消完成鍵即可")

							});
		
					/*$('unfinished_c').click(function() {
						    
							$.get($(this).attr('href'), function(response){
								$('unfinished_c').hide();
								alert(<?php echo $this->_tpl_vars['ifcheck']; ?>
)
								alert('You finished!!')
							});
							/*
							$.ajax({
							
								  type: "POST",
								  url: "update.php",
								  data: {send_eveid=<?php echo $this->_tpl_vars['getcon']; ?>
},
								  success: function(){
									alert( "it works !!" );
								  }
								});
							
	                         */
							
							return false;
					});
	});
</script>



			<a id="index0_active_pos" class="index0" href="schedule_menu.php"></a>
			<a id="index1_pos" class="index1" href="menu.php?cid=1"></a>
			<a id="index2_pos" class="index2" href="menu.php?cid=2"></a>
			<a id="index3_pos" class="index3" href="menu.php?cid=3"></a>
			<a id="index4_pos" class="index4" href="menu.php?cid=4"></a>   
			
			
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
														
																	<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['content_name']; ?>

														<?php endfor; endif; ?>
						
						</div>
						<div  id="type_pos" class="Type"><?php echo $this->_tpl_vars['type']; ?>
</div>
				
						<?php if ($this->_tpl_vars['ifcheck'] == 0): ?>
				
								
								<a  id="unfinished_pos" class="unfinished_c" href="update.php?send_eveid=<?php echo $this->_tpl_vars['getcon']; ?>
"></a><!--   更新頁面+修改資料庫按鈕    -->
						<?php else: ?>
						        <?php if ($this->_tpl_vars['ifcheck'] == 1): ?>
						        <a  id="undo_pos" class="undo_c" href="delete.php?send_eveid=<?php echo $this->_tpl_vars['getcon']; ?>
"></a>
								<?php endif; ?>
						<?php endif; ?>	
				
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
				

									  
							</div>

		        <div id="bg_bottom_pos1" class="BG_bottom">
							<div  id="bg_bottomimg_pos" class="BG_bottomimg">
							</div>				
			
				</div>