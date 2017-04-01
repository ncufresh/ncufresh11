	$(document).ready(function(){
		$('<div id="mOverlay"></div>').prependTo('body') ;
		$('<div id="mCenter"></div>').insertAfter('#mOverlay') ;
		$('<div id="mBottom"><div id="closelabel"></div></div>').insertAfter('#mCenter') ;
		$('#mOverlay').hide() ;
		$('#mCenter').hide() ;
		$('#mBottom').hide() ;
		$('#closelabel').click(function(){
			removeVideo() ;
		}) ;
		bonus = 0 ;
		k = new Array() ;
		//konamiCode
		
		document.onkeydown = function(e){
			e = e||window.event ;
			if(k.length == 10)
				k.shift() ;
			k.push(e.keyCode) ;
			if(k.toString() == "38,38,40,40,37,39,37,39,66,65" && bonus == 0) {
				//alert("±m³J´ú¸Õ~~") ;
				bonus = 1 ;
				$('#mCenter').youTubeEmbed({
					video : "http://www.youtube.com/watch?v=Jp2ap3fzdrE",
					width : 640
				}) ;
				$('#mCenter > .flashContainer').css('margin', '0px auto') ;
				showVideo() ;
				k = new Array() ;
			}
		} ;
		
		//videobox
		//alert($('#videobox > div').attr('id')) ;
		if($('#videobox').length > 0){
			var img = "http://i.ytimg.com/vi/"+$('#videobox').attr('value')+"/0.jpg" ;
			$('<img src="'+img+'" id="videoImg" />').prependTo('#videobox > div') ;
			$('#videoImg').css({
				'width' : '110px',
				'height' : '85px',
				'margin-left' : '20px'
			}) ;
			$('#videobox_end > div').css({
				'width' : '30px',
				'height' : '30px',
				'display' : 'block',
				'margin' : '0px auto',
				'cursor' : 'pointer'
			}) ;
			$('#videobox_end').css('padding-top', '10px') ;	
			$('#videobox_end > div').click(function(){
				bonus = 1 ;
				var vlink = "http://www.youtube.com/watch?v="+$('#videobox').attr('value') ;
				$('#mCenter').youTubeEmbed({
					video : vlink,
					width : 640
				}) ;
				$('#mCenter > .flashContainer').css('margin', '0px auto') ;
				showVideo() ;
			}) ;
		}
	}) ;
	function showVideo(){
		$('#mOverlay').css({
			'height' : $(document).height()+'px',
			'width' : $(window).width()+'px',
			'top' : '0px'
		}) ;
		var top = $(document).scrollTop()+40 ;
		var left = ($(window).width()-640)/2 ;
		$('#mCenter').css({
			'width' : '0px',
			'height' : '0px',
			'top' : top+'px',
			'left' : left+'px'
		}) ;
		$('#mBottom').css({
			'width' : '640px',
			'height' : '0px',	
			'top' : (top+360)+'px',
			'left' : left+'px'
		}) ;
		$('#mOverlay').fadeIn() ;
		$('#mCenter').show() ;
		$('#mCenter').animate({width: '640px'}, 1000).
			animate({height: '360px'}, 1000, function(){
				$('#mBottom').show() ;
				$('#mBottom').animate({height: '22px'},800) ;
		}) ;
	}
	
	function removeVideo(){
		$('#mBottom').animate({height: '0px'}, 500, function(){
			$('#mBottom').hide() ;
			$('#mCenter').animate({height: '0px'}, 800, function(){
				$('#mCenter').hide() ;
				$('#mOverlay').fadeOut() ;
			}) ;
		})
		bonus = 0 ;
		$('#mCenter > .flashContainer').remove() ;
	}
