<?php /* Smarty version 2.6.26, created on 2011-07-28 07:38:36
         compiled from zh_tw/testmenu1.html */ ?>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js" type="text/javascript"></script>
			<script type="text/javascript">
			$(document).ready(function() {
		
				var show = $('#show');
				    var need_reload = false;
					var ifload = false;
				$('.text').click(function() {
				
					var $url = $(this).attr('href');
					if ( need_reload ){
					   
						show.dialog("destroy");
						$('.ui-dialog-titlebar').hide();
						need_reload = false;
							
					}
					//var $url = $(this).attr('href');
					
			
					show.dialog({
						create: function() {
							$(this).load($url);
						},
						modal: true,
                        show: 'fade',
						hide: 'fade',
						draggable: false,
						resizable: false,
						position:[$('#main_mid').offset().left - $('body').scrollLeft(), $('#main_mid').offset().top - $('body').scrollTop()],
						height: 620,
						width: 626
						
					})
					$('.ui-dialog-titlebar').hide();
			
					
					need_reload = true;
					ifload=true;
					
					return false;
				});
			});
			</script>
</head>


<div id="thispage">

		<div id="background<?php echo $this->_tpl_vars['img']; ?>
" class="backgroundsetting_lifemenu">
				
				  
				
					<div id="middle<?php echo $this->_tpl_vars['img']; ?>
" class="middle">
							</br>
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
										<a id="img<?php echo $this->_tpl_vars['img']; ?>
_<?php echo $this->_sections['foo']['index']; ?>
"class="text" href="testcontent.php?c1id=<?php echo $this->_tpl_vars['array_2D'][$this->_sections['foo']['index']]['category_id']; ?>
&scid=<?php echo $this->_sections['foo']['index']; ?>
&c2id=0">
						
										</a></br></br>
								<?php endfor; endif; ?>
					</div>
				

			<a href="testmenu1.php?c1id=1"id="food" class="imgfood"></a>
			<a href="testmenu1.php?c1id=5"id="life" class="imglife"></a>
			<a href="testmenu1.php?c1id=2"id="live" class="imglive"></a>
			<a href="testmenu1.php?c1id=4"id="health" class="imghealth"></a>
			<a href="testmenu1.php?c1id=3"id="transport" class="imgtransport"></a>
			<a href="testmenu1.php?c1id=7"id="outdoor" class="imgoutdoor"></a>
			<a href="testmenu1.php?c1id=6"id="sport" class="imgsport"></a>
<div id="show"></div>

		</div>



</div>