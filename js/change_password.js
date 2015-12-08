function change_password(login)
{
	var current = $('#cur_password').val();
	var new_password = $('#new_password').val();
	var login = $('#my_login').val();
	$.ajax({
		type: "POST",
		url: "/personal/change_password",
		data: {
			'current': current,
			'new_password': new_password
		},
		success: function(msg){
			if(msg == 'error')
			{
				$('#error_password').css('display', 'block');
			}
			else if(msg == 'success')
			{
				$('#error_password').css('display', 'none');
				$('#success_password').css('display', 'block');
			}
		}
	});
}