function buy(rate_id) {
	console.log(rate_id);
}

function mouseOver() {
    $('#btn_buy').html("Войти");
}

function mouseOut(body) {
    $('#btn_buy').html(body);
}

function highlight(id) {
	$('#pay_1').css('border', 'none');
	$('#pay_2').css('border', 'none');
	$('#pay_3').css('border', 'none');
	$('#pay_4').css('border', 'none');
	$('#pay_5').css('border', 'none');
	$('#pay_6').css('border', 'none');
	$('#pay_7').css('border', 'none');
	$('#pay_' + id).css('border', '1px solid #000000');
}