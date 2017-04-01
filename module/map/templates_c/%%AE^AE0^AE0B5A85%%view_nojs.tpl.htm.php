<?php /* Smarty version 2.6.26, created on 2011-08-02 22:19:06
         compiled from zh_tw/view_nojs.tpl.htm */ ?>
<div id="map_module_main">
	<div id="box">
		<div id="pic"></div>
		<a id="close" href="view.php"></a>
		<div id="poi_title"><?php echo $this->_tpl_vars['poi_name']; ?>
</div>
		<style type="text/css">
		div#pic{
			background: url("templates/zh_tw/images/window/<?php echo $this->_tpl_vars['pic']; ?>
") no-repeat;
			width:65px;
			height:65px;
			display:block;
			margin: 12px 0 0 14px;
		}
		a#close{
			float:right;
			background: url("templates/zh_tw/images/window/window_close.png") no-repeat;
			width:45px;
			height:44px;
			margin: -71px 4px 0;
		}
		div#poi_title {
			float:left;
			margin-left:100px;
			margin-top:-56px;
			font-size:20px;
			font-weight: bold;
		}
		</style>
		<div class="text"><?php echo $this->_tpl_vars['content']; ?>
</div>
	</div>
</div>