$(document).ready(function(){
	var width = 50 ;
	var height = 27 ;
	var firstdate = 225 ;
	//日期
	var mDay = new Date() ;
	mDay.setMonth(7) ;
	mDay.setDate(14) ;
	var id = 0;
	for(i=0 ; i<42 ; i++){
			var m = mDay.getMonth()+1 ;
			var temp = m+'/'+mDay.getDate() ;
			$('<div></div>').appendTo('.container .main .row_date') ;
			$('.container .main .row_date > div').eq(i).html(temp) ;
			$('.container .main .row_date > div').eq(i).css('left', 71*i) ;
			mDay.setDate(mDay.getDate()+1) ;
	}
	$('.container .main > td').css('width', 71*28+'px') ;
	//按鈕
	$('.container .left .arrow').click(function(){
		if(!$('.container .main').is(':animated')){
			var pos = $('.container .main').scrollLeft() - 497 ;
			$('.container .main').animate({'scrollLeft' : pos}, 1000) ;
		}
	}) ;
	$('.container .right .arrow').click(function(){
		if(!$('.container .main').is(':animated')){
			var pos = $('.container .main').scrollLeft() + 497 ;
			$('.container .main').animate({'scrollLeft' : pos}, 1000) ;
		}
	}) ;
	//event
	for(i=0 ; i<mEvent.length ; i=i+1){
		var length = (mEvent[i][1]-mEvent[i][0]+1) * 71 ;
		var top = mEvent[i][3] * height ;
		var left = (mEvent[i][0]-firstdate) * 71;
		var temp = '<div class="' + mEvent[i][5] + '"></div>' ;
		$(temp).appendTo($('.container .main .row').eq(mEvent[i][3])) ;
		$(mEvent[i][4]).appendTo('.container .main .'+mEvent[i][5]) ;
		$('.container .main .'+mEvent[i][5]).css({
			'width' : length+'px',
			'left' : left+'px'
		})
		$('.container .main .'+mEvent[i][5]+' > a').css({
			'width' : length+'px',
			'font-size' : '11px'
		}) ;
		$('.container .main .'+mEvent[i][5]+' > a').html(mEvent[i][2]) ;
		//判斷事件是否完成
		if($.inArray(mEvent[i][5], uEvent) >= 0){
			$('.container .main .'+mEvent[i][5]).css('background', '#1168b0') ;
			$('.container .main .'+mEvent[i][5]).attr('value', 'done') ;
		}
	}
	//event hover
	$('.container .main .row > div').hover(
		function(e){
			if($(this).attr('value')=='done')
				$(this).css('background', '#044377') ;
			else
				$(this).css('background', '#cc2938') ;
			$('<div id="bubble"></div>').prependTo('body') ;
			$('#bubble').hide() ;
			$('#bubble').css({
				'left' : (e.pageX-($(this).children().html().length*23)/2)+'px',
				'top' : ($(this).offset().top-33)+'px'
			}) ;
			$('#bubble').html($(this).children().html()) ;
			$('#bubble').fadeIn(500) ;
			$(this).mousemove(function(e){
				$('#bubble').css('left', (e.pageX-($(this).children().html().length*23)/2)+'px') ;
			}) ;
			},
		function(){
			if($(this).attr('value')=='done')
				$(this).css('background', '#1168b0') ;
			else
				$(this).css('background', '#f36f7b') ;
			$('#bubble').remove() ;
			}
	) ;
}) ;
//完成後事件顏色  1168b0  hover 044377