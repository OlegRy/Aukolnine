function saveUsersAddress()
{
	var fio = $('#fio').val();
	var email = $('#email_index').val();
	var country = $('#country').val();
	var city = $('#city').val();
	var phone = $('#my_phone').val();
	var note = $('#note').val();
	var address = $('#address').val();
	$.ajax({
		type: "POST",
		url: "/personal/users_address",
		data: {
			'fio': login,
			'email': email_index,
			'country': country,
			'city': city,
			'phone': my_phone,
			'note': note,
			'address': address,
		},
		success: function(msg){
			if(msg == 'success')
			{
				$('#success_users_address').css('display', 'block');
			}
			else if(msg == 'error')
			{
				alert('Во время записи произошли ошибки');
			}
		}
	});
}