<?php /* Smarty version 2.6.26, created on 2011-07-27 13:03:37
         compiled from zh_tw/testcontent.html */ ?>
<script>
$(document).ready(function() {
	$('.text1').click(function() {
		$('#show').load($(this).attr('href'));
		
		
		
		return false;
	});
});
$('.close').click(
	function(){
		$('#show').dialog('close');
		
		return false;
	}
);
</script>


<div id="background<?php echo $this->_tpl_vars['img1']; ?>
_<?php echo $this->_tpl_vars['img2']; ?>
" class="backgroundsetting">
	

       <div class="table_up"id="table_up">
	   
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
      
       <a  class="text1" href="testcontent.php?c1id=<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['category_id']; ?>
&scid=<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['sc_category_id']; ?>
&c2id=<?php echo $this->_sections['foo']['index']; ?>
">
	   &nbsp;
	   <?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['content_name']; ?>

       </a>
	   
       <?php endfor; endif; ?>
	   &nbsp;
       
	   </div>
       <a class="close" href=""></a>
	   <br class="clear" />
		<div id="table_in"class="table_in">


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


				 name:<?php echo $this->_tpl_vars['array_4D'][$this->_sections['foo']['index']]['content_name']; ?>
<br/><br/>
				 content:<?php echo $this->_tpl_vars['array_4D'][$this->_sections['foo']['index']]['content']; ?>
<br/><br/>

			 <?php endfor; endif; ?>

	  
		</div>
</div>