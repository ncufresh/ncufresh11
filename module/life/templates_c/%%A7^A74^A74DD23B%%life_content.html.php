<?php /* Smarty version 2.6.26, created on 2011-08-08 07:00:19
         compiled from zh_tw/life_content.html */ ?>
<script>
$(document).ready(function() {
	$('.text1').click(function() {
		$('#show_content').load($(this).attr('href'));
		
				
		return false;
	});
	
	$('.close').click(function(){
							$('#show_content').dialog('close');
						
							return false;
						        });
					
});

</script>

<style type="text/css">

.table_in
{
display: inline;
float: left;
height: 421px;
position: absolute;
width: 539px;
color: #59381d;
font-size: 16px;
line-height: 30px;
Font-Family: Microsoft JhengHei,Arial;
font-weight: bold;
/*z-index: 2;*/
overflow-y: auto;
overflow-x: hidden;
text-decoration:none;
word-wrap: break-word;
}

.table_up
{
display: inline;
float: left;
height: 50px;
position: absolute;
width: 495px;
text-decoration:none;
font-size: 20px;
line-height: 30px;
color:#59381d;
Font-Family: "·L³n¥¿¶ÂÅé",Arial;/*TEXT-ALIGN: left;*//*Microsoft JhengHei*/
font-weight: bold;

}
#photo{
	text-align: center;
}
#table_up a{
	text-decoration: none;
	color: #11245e;
}
#table_up a:visited{
	color: #ba1f19;
}

</style>
<div id="background<?php echo $this->_tpl_vars['img1']; ?>
_<?php echo $this->_tpl_vars['img2']; ?>
" class="backgroundsetting">
	

       <div id="table_up_pos" class="table_up">

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
			  
			   <a  class="text1" href="life_content.php?c1id=<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['category_id']; ?>
&scid=<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['sc_category_id']; ?>
&c2id=<?php echo $this->_sections['foo']['index']; ?>
">
				   &nbsp;
				   <?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['content_name']; ?>

			   </a>
		   
		   <?php endfor; endif; ?>
		   &nbsp;
           	   <br class="clear">
	   </div>
	   
       <a class="close" href=""></a>  
  
	    <br class="clear">
		<div id="table_in_pos" class="table_in" >

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


<!-- 				 name:<?php echo $this->_tpl_vars['array_4D'][$this->_sections['foo']['index']]['content_name']; ?>
<br/><br/> -->
				 <!-- content: --><?php echo $this->_tpl_vars['array_4D'][$this->_sections['foo']['index']]['content']; ?>
<br/><br/>

			<?php endfor; endif; ?>
	     <br class="clear">      
		</div>
</div>