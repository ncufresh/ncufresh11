
$(document).ready(function(){
	/*mail*/
	
	$('div#mail_list_main').slides({
		container: 'slides',
		preload: true,
		generateNextPrev: true,
		generatePagination: true
	});
	
	$('#mail_list_main').mousewheel(function(event, delta){
		if(delta < 0){
			$('a.next').click();
		}
		else{
			$('a.prev').click();
		}
		return false;
	});
	
	
	/*personal page*/
	$('div.personal_guestbooks').slides({
		container: 'slides',
		preload: true,
		generateNextPrev: true,
		generatePagination: true,
		animationComplete: function(){
			$('#house .pagination li.current a').attr('href', '');
		}
	});
	
	
	$('div.personal_guestbooks').mousewheel(function(event, delta){
		if(delta < 0){
			$('a.next').click();
		}
		else{
			$('a.prev').click();
		}
		return false;
	});
	
	$('body').keydown(function(event){
		if(event.keyCode == 37)
			$('a.prev').click();
		else if(event.keyCode == 39)
			$('a.next').click();
	});
	
	var text = $('#personal_main input.new_gbook').attr('value');
	
	$('#personal_main input.new_gbook').focus(function(){
		if($(this).attr('value') == text){
			$(this).attr('value', '');
		}
	});
	
	$('#personal_main input.new_gbook').blur(function(){
		if($(this).attr('value') == ''){
			$(this).attr('value', text);
		}
	});
});

