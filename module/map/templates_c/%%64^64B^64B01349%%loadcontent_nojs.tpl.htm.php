<?php /* Smarty version 2.6.26, created on 2011-07-21 12:12:31
         compiled from zh_tw/loadcontent_nojs.tpl.htm */ ?>
<div id="map_module_main">
	<div id="box">
		<div id="pic"></div>
		<a id="close" onclick="hidebox();"></a>
		<style type="text/css">
		div#pic{
			background: url("<?php echo $this->_tpl_vars['pic']; ?>
") no-repeat;
			width:65px;
			height:65px;
			display:block;
			margin: 12px 0 0 14px;
		}
		a#close{
			float:right;
			background: url("templates/zh_TW/images/window/window_close.png") no-repeat;
			width:45px;
			height:44px;
			margin: -71px 4px 0;
		}
		</style>
		<div class="text"><?php echo $this->_tpl_vars['content']; ?>
</div>
	</div>
</div>