$(document).ready(function(){
	$('.register_main form').submit(function(){
		$.post($(this).attr('action'), $(this).serialize(), function(result){
			if(result == 'SUCCESS'){
				alert('註冊成功！');
				location = 'index.php';
			}
			else{
				data = jQuery.parseJSON(result);
				var string = '';
				for(var key in data){
					string += data[key] + '\n';
				}
				alert(string);
			}
			return false;
		});
		return false;
	});
	
	var img_src_array = new Array(11);
	var path = 'module/pet_game/templates/zh_tw/images/pets/120/'
	img_src_array[0] = '8283c7a87c75a74eff21066d82a80580.png';
	img_src_array[1] = '140d0d4cda821b26569f9413e19fe1b7.png';
	img_src_array[2] = 'b53c1238fc407b6be49234ec881304e0.png';
	img_src_array[3] = '60100baecf160515cff58dc752b9ccad.png';
	img_src_array[4] = '18d6f084b50fc71c0740f0624296e870.png';
	img_src_array[5] = 'a6b796cd019773075e5e3234f40800b4.png';
	img_src_array[6] = '6201eb0c86c652c5281657bac5b75457.png';
	img_src_array[7] = '36c7fbf197f12ac3f686c5369a85bad4.png';
	img_src_array[8] = '3ac6c16183244fd075f0c95d02841574.png';
	img_src_array[9] = 'e02b40a94e343f85835149e9733f629a.png';
	img_src_array[10] = 'default.png';
	
	$('div#pet_select select#selectPetID').keyup(function(){
		var key = $(this).val();
		$('div#pet_select div.pet_pic').css('background-image', 'url(' + path + img_src_array[key] + ')');
	}).change(function(){
		var key = $(this).val();
		$('div#pet_select div.pet_pic').css('background-image', 'url(' + path + img_src_array[key] + ')');
	});
	
});

