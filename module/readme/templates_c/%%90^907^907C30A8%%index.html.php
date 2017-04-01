<?php /* Smarty version 2.6.26, created on 2011-08-07 14:49:56
         compiled from zh_tw/index.html */ ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js" type="text/javascript"></script>

<script type="text/javascript">
		$(document).ready(function(){
		
		
		
		
		
		
		
			$("#book1").hover(function(){
				$('.girl').stop().animate({
					marginLeft : "5px"
				}, 1000);
				return false;
			});
			$('#book2').hover(function() {
				$('.girl').stop().animate({
					marginLeft: '125'
				}, 1000);
				return false;
			});
			$('#book3').hover(function() {
				$('.girl').stop().animate({
					marginLeft: '245'
				}, 1000);
				return false;
			});
			$('#book4').hover(function() {
				$('.girl').stop().animate({
					marginLeft: '360'
				}, 1000);
				return false;
			});
			$('#book5').hover(function() {
				$('.girl').stop().animate({
					marginLeft: '485',
				}, 1000);
				return false;
			});
		});
/*function mouseover(txt)
{

var get;
get=txt;
if(txt==1){document.getElementById("girl").style.marginLeft='10px';}
if(get==2){document.getElementById("girl").style.marginLeft='135px';}
if(get==3){document.getElementById("girl").style.marginLeft='260px';}
if(get==4){document.getElementById("girl").style.marginLeft='380px';}
if(get==5){document.getElementById("girl").style.marginLeft='510px';}


}*/
		  
</script>

<div id="background_category" class="backgroundsetting_category">
<div id="cutegirl" class="girl"></div>
<a id="book1" class="book" href="schedule_menu.php" ></a>
<a id="book2" class="book" href="menu.php?cid=1" ></a>
<a id="book3" class="book" href="menu.php?cid=2" ></a>
<a id="book4" class="book" href="menu.php?cid=3" ></a>
<a id="book5" class="book" href="menu.php?cid=4" ></a>    
</div>

