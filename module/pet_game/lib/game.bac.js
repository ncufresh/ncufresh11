$(document).ready(function(){
	$('.pet_game_main .pet_game_actions .action').mouseover(function(){
		$(this).children('.action_content').show();
		var path = $(this).children('.action_name').css('backgroundImage');
		$(this).children('.action_name').css('backgroundImage', path.replace('.png', '_open.png'));
	}).mouseout(function(){
		$(this).children('.action_content').hide();
		var path = $(this).children('.action_name').css('backgroundImage');
		$(this).children('.action_name').css('backgroundImage', path.replace('_open.png', '.png'));
	});
	
	var small_window = $('div.pet_small_window').dialog({
		autoOpen: false,
		show: 'fade',
		hide: 'fade',
		draggable: false,
		resizable: false,
		modal: true
	});
	
	small_window.find('.close').click(function(){
		small_window.dialog('close');
	});
	
	
	$('.pet_game_main .pet_game_actions .action a.go_map').click(function(){
		$('div.pet_game_map').dialog({
			show: 'fade',
			hide: 'fade',
			draggable: false,
			resizable: false,
			height: 406,
			width: 505,
			modal: true
		}).load($(this).attr('href'), null, function() {
			$('.life_main .life_contents .life_content a.yes, .life_main .life_contents .life_content a.no').click(function() {
				$.get($(this).attr('href'), null, function(response) {
			
					$('div.pet_game_map').dialog('close');
			
					if ( response == 'FAILURE' ) {
						small_window.dialog('open').find('.small_window_content').html('你回答過了!!');
					} else if(response == 'ERROR'){
						small_window.dialog('open').find('.small_window_content').html('發生錯誤');
					} else {
						var data = jQuery.parseJSON(response);
						
						if( data.right == true ) {
							small_window.dialog('open').find('.small_window_content').html('你答對了!!');
							$('.pet_game_status .life_stick_foreground').css('width', data.life + '%');
							$('.pet_game_status .life_value').text(data.life);
							$('.pet_game_status .state').text(data.state);
						} else {
							small_window.dialog('open').find('.small_window_content').html('你答錯了!!');
						}
					}
				
				});
				// location.reload();
				return false;
			});
			
			
			$(this).find('a.close').click(function(){
				$('div.pet_game_map').dialog('close');
				return false;
			});
			var inside_height = eval($('div.pet_game_map').find('.life_content').css('height').replace('px', ''));
			var outside_height = eval($('div.pet_game_map').find('.life_contents').css('height').replace('px', ''));
			
			var delta = outside_height - inside_height;
			$(this).find('.prev').click(function(){
				if(delta < 0){
					var top = eval($('div.pet_game_map').find('.life_content').css('top').replace('px', ''));
					if(top + outside_height > 0){
						$('div.pet_game_map').find('.life_content').animate({'top': '0px'}, 300);
					}
					else{
						$('div.pet_game_map').find('.life_content').animate({'top': '+=' + outside_height + 'px'}, 300);
						
					}
				}
				return false;
			});
			
			$(this).find('.next').click(function(){
				if(delta<0){
					var top = eval($('div.pet_game_map').find('.life_content').css('top').replace('px', ''));
					if(top - outside_height < delta){
						$('div.pet_game_map').find('.life_content').animate({'top': delta + 'px'}, 300);
					}
					else{
						$('div.pet_game_map').find('.life_content').animate({'top': '-=' + outside_height + 'px'}, 300);
					}
				}
				return false;
			});
		});
		return false;
	});
	
	$('.pet_game_main .pet_game_status a.help_button, .friend_pet_main .friend_pet_status a.help_button').click(function(){
		$('div.pet_game_help').dialog({
			show: 'fade',
			hide: 'fade',
			draggable: false,
			resizable: false,
			height: 406,
			width: 505,
			modal: true
		}).load($(this).attr('href'), null, function() {
			$(this).find('a.close').click(function(){
				$('div.pet_game_help').dialog('close');
				return false;
			});
			
			var inside_height = eval($('div.pet_game_help').find('.help_content').css('height').replace('px', ''));
			var outside_height = eval($('div.pet_game_help').find('.help_contents').css('height').replace('px', ''));
			
			var delta = outside_height - inside_height;
			$(this).find('.prev').click(function(){
				if(delta < 0){
					var top = eval($('div.pet_game_help').find('.help_content').css('top').replace('px', ''));
					if(top + outside_height > 0){
						$('div.pet_game_help').find('.help_content').animate({'top': '0px'}, 300);
					}
					else{
						$('div.pet_game_help').find('.help_content').animate({'top': '+=' + outside_height + 'px'}, 300);
						
					}
				}
				return false;
			});
			
			$(this).find('.next').click(function(){
				if(delta < 0){
					var top = eval($('div.pet_game_help').find('.help_content').css('top').replace('px', ''));
					if(top - outside_height < delta){
						$('div.pet_game_help').find('.help_content').animate({'top': delta + 'px'}, 300);
					}
					else{
						$('div.pet_game_help').find('.help_content').animate({'top': '-=' + outside_height + 'px'}, 300);
					}
				}
				return false;
			});
		});
		return false;
	});
	
	$('.pet_game_main .pet_game_status a.friend_button').click(function(){
		$('div.pet_game_friend').dialog({
			show: 'fade',
			hide: 'fade',
			draggable: false,
			resizable: false,
			height: 406,
			width: 505,
			modal: true
		}).load($(this).attr('href'), null, function(){
			$(this).find('a.close').click(function(){
				$('div.pet_game_friend').dialog('close');
				return false;
			});
			
			$(this).find('a.friend_link').click(function(){
				location = $(this).attr('href');
				return false;
			});
			
			$('.friend_main').slides({
				container: 'friend_contents',
				generateNextPrev: false,
				generatePagination: false,
				prev: 'prev',
				next: 'next'
			});
		});
		return false;
	});

	$('.pet_game_main .pet_game_status a.log_button').click(function(){
		$('div.pet_game_log').dialog({
			show: 'fade',
			hide: 'fade',
			draggable: false,
			resizable: false,
			height: 406,
			width: 505,
			modal: true
		}).load($(this).attr('href'), null, function() {
			$(this).find('a.close').click(function(){
				$('div.pet_game_log').dialog('close');
				return false;
			});
			
			var inside_height = eval($('div.pet_game_log').find('.log_content').css('height').replace('px', ''));
			var outside_height = eval($('div.pet_game_log').find('.log_contents').css('height').replace('px', ''));
			
			var delta = outside_height - inside_height;
			$(this).find('.prev').click(function(){
				if(delta < 0){
					var top = eval($('div.pet_game_log').find('.log_content').css('top').replace('px', ''));
					if(top + outside_height > 0){
						$('div.pet_game_log').find('.log_content').animate({'top': '0px'}, 300);
					}
					else{
						$('div.pet_game_log').find('.log_content').animate({'top': '+=' + outside_height + 'px'}, 300);
						
					}
				}
				return false;
			});
			
			$(this).find('.next').click(function(){
				if(delta < 0){
					var top = eval($('div.pet_game_log').find('.log_content').css('top').replace('px', ''));
					if(top - outside_height < delta){
						$('div.pet_game_log').find('.log_content').animate({'top': delta + 'px'}, 300);
					}
					else{
						$('div.pet_game_log').find('.log_content').animate({'top': '-=' + outside_height + 'px'}, 300);
					}
				}
				return false;
			});
		});
		return false;
	});
	
	
	$('.friend_pet_main .friend_pet_actions a.action_name').click(function(){
		$('div.pet_interation').dialog({
			show: 'fade',
			hide: 'fade',
			draggable: false,
			resizable: false,
			modal: true
		}).load($(this).attr('href'), null, function(){
			$('div.pet_interation').find('.close').click(function(){
				$('div.pet_interation').dialog('close');
				return false;
			});
			
			$('div.interation_main').find('a.interate').click(function(){
				$.get($(this).attr('href'), function(response){
					$('div.pet_interation').find('.interation_content').html(response);
				});
				return false;
			});
		});
		return false;
	});
	
	if(!isEmpty(small_window.find('.new_friend ul').html())){
		small_window.dialog('open');
	};
	
	
	function isEmpty(obj) {
		if (typeof obj == 'undefined' || obj === null || obj === '') return true;
		if (typeof obj == 'number' && isNaN(obj)) return true;
		if (obj instanceof Date && isNaN(Number(obj))) return true;
		return false;
	}
});