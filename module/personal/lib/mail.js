$(document).ready(function(){
	$('form#new_mail_form').submit(function(){
		$.post('newmail.php', $('form#new_mail_form').serializeArray(), function(result){
			if(result == 'SUCCESS'){
				alert("信已寄出！");
				location = 'mail.php';
			}
			else if(result == 'NEED_LOGIN'){
				location = '../../login.php';
			}
			else{
				alert(result);
			}
		})
		return false;
	});
});
