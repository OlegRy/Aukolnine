function saveData()
{
	var login = $('#login').val();
	var firstname = $('#firstname').val();
	var lastname = $('#lastname').val();
	var pol = $('#pol').val();
	var age = $('#age').val();
	var form = $('#personal_info').serialize();
	$.ajax({
		type: "POST",
		url: "/personal/info_personal",
		data: {
			'login': login,
			'firstname': firstname,
			'lastname': lastname,
			'pol': pol,
			'age': age,
		},
		success: function(msg){
			if(msg == 'success')
			{
				$('#success_password_personal_info').css('display', 'block');
			}
		}
	});
}