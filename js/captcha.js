function handleCaptcha(captcha) {
	var answer = $('#answer').val();
	if (captcha != answer) {
		$('#answer').css('border-color', '#FF0000');
		reloadCaptcha();
	} else {
		$('#answer').css('border-color', '#BBBBBB');
		var feedbackText = $('#feedback_text').val();
		if (!feedbackText) {
			$('#feedback_text').css('border-color', '#FF0000');
		} else {
			$.ajax({
				type: 'POST',
				url: '/feedback/send_feedback',
				data: {'feedback': feedbackText},
				success: function(data) {
					data = jQuery.parseJSON(data);
					if (data.success) {
						alert(data.success);
					} else {
						alert(data.error);
					}
				}
			});
		}
	}
}

function reloadCaptcha() {
	$.ajax({
		type: 'POST',
		url: '/feedback/reload_captcha',
		success: function(data) {
			data = jQuery.parseJSON(data);
			$('#captcha').attr('src', '/images/captcha/' + data.img);
		}
	});
}