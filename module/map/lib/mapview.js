// JavaScript Document

function hidebox(){
	//J("#box").hide();
	$("#box").fadeOut(400);
	$("div#table").html("");
}


function showcontent(key){
	
	//J("#box").show();
	$("#box").fadeIn(400);
	$("div#content").html("");
	$.ajax({
		url: 'loadcontent.php',
		data:{
			id: key
		},
		success:function(response){
			$("div#content").html(response);
           	$("div#content").animate(100);
           	$("div.text").animate({scrollTop: 0},100);
		}
	});
}
function change(){
	$('#v06').css({"background-image":"url('templates/zh_tw/images/view/v06h.png')","z-index":"16"});
	$('#v07').css({"background-image":"url('templates/zh_tw/images/view/v07h.png')"});
	$('#v08').css({"background-image":"url('templates/zh_tw/images/view/v08h.png')","z-index":"0"});
}
function undochange(){
	$('#v06').css("background-image","url('templates/zh_tw/images/view/v06.png')");
	$('#v07').css({"background-image":"url('templates/zh_tw/images/view/v07.png')"});
	$('#v08').css({"background-image":"url('templates/zh_tw/images/view/v08.png')","z-index":"0"});
}

function changeart(){
	$('#v13').css("background-image","url('templates/zh_tw/images/view/v13h.png')");
	$('#v14').css("background-image","url('templates/zh_tw/images/view/v14h.png')");
	$('#v15').css({"background-image":"url('templates/zh_tw/images/view/v15h.png')","z-index":"100"});
	$('#v16').css({"background-image":"url('templates/zh_tw/images/view/v16h.png')","z-index":"100"});
}
function undochangeart(){
	$('#v13').css("background-image","url('templates/zh_tw/images/view/v13.png')");
	$('#v14').css("background-image","url('templates/zh_tw/images/view/v14.png')");
	$('#v15').css({"background-image":"url('templates/zh_tw/images/view/v15.png')","z-index":"15"});
	$('#v16').css({"background-image":"url('templates/zh_tw/images/view/v16.png')","z-index":"13"});
}