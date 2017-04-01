$(document).ready(function(){
	$('form#new_guestbook').submit(function(){
		$.post($(this).attr('action'), $(this).serialize(), function(result){
			if(result == 'SUCCESS'){
				location.reload();
			}
			else if(result == 'NEED_LOGIN'){
				alert('請先登入!');
			}
			else{
				alert(result);
			}
		})
		return false;
	});
	
	$('a.invite_friend').click(function(){
		$.get($(this).attr('href'), function(result){
			alert(result);
			location.reload();
		});
		return false;
	});
	
	$('a.delete_friend').click(function(){
		var con = confirm('確認要刪除嗎？');
		if(con){
			$.get($(this).attr('href'), function(result){
				alert(result);
				location.reload();
			});
		}
		return false;
	});
	
	//alert($('.personal_video').attr('id')) ;
	var youtubeApi = 'http://gdata.youtube.com/feeds/api/videos?v=2&alt=jsonc' ;
	$.get(youtubeApi, {'q':$('.personal_video').attr('id')}, function(response){
		var data = response.data ;
		//video notfound
		if(!data.totalItems){
			//isme!!
			if($('.personal_video').attr('value')==1)
				$('<a href="personal_data_edit.php" id="no_video"></a>').prependTo('.personal_video') ;
			else 
				$('<div id="no_video"></div>').prependTo('.personal_video') ;
			$('.personal_video > #no_video').css({
				'width': '138px',
				'height': '86px',
				'background': 'url("templates/zh_tw/images/no_video.png") no-repeat',
				'position': 'absolute',
				'z-index': '2000'
			}) ;
		}
		else{
			var img = "http://i.ytimg.com/vi/"+$('.personal_video').attr('id')+"/0.jpg" ;
			$('<input type="image" src="'+img+'" id="personal_video_img" width=138px height=86px/>').prependTo('.personal_video') ;
			$('#personal_video_img').click(function(){
				bonus = 1 ;
				var vlink = "http://www.youtube.com/watch?v="+$('.personal_video').attr('id') ;
				$('#mCenter').youTubeEmbed({
					video : vlink,
					width : 640
				}) ;
				$('#mCenter > .flashContainer').css('margin', '0px auto') ;
				showVideo() ;
			}) ;		
		}
	}, 'jsonp') ;
	/*
	if($('.personal_video').attr('id')){
		var youtubeApi = 'http://gdata.youtube.com/feeds/api/videos/'+$('.personal_video').attr('id') ;
		//$.get(youtubeApi, function(){alert('success');}, 'jsonp') ;
		var img = "http://i.ytimg.com/vi/"+$('.personal_video').attr('id')+"/0.jpg" ;
		$('<input type="image" src="'+img+'" id="personal_video_img" width=138px height=86px/>').prependTo('.personal_video') ;
		$('#personal_video_img').click(function(){
			bonus = 1 ;
			var vlink = "http://www.youtube.com/watch?v="+$('.personal_video').attr('id') ;
			$('#mCenter').youTubeEmbed({
				video : vlink,
				width : 640
			}) ;
			$('#mCenter > .flashContainer').css('margin', '0px auto') ;
			showVideo() ;
		}) ;
	}
	else{
		$('<a href="personal_data_edit"></a>').prependTo('.personal_video') ;
		$('.personal_video > a').css({
			'width': '138px',
			'height': '86px',
			'background': 'url("templates/zh_tw/images/no_video.png") no-repeat',
			'position': 'absolute',
			'z-index': '2000'
		}) ;
	}
	*/
});
