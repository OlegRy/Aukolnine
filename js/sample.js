function startTimer(id) {
	$.ajax({
		type: 'GET',
		url: '/sample/get',
		data: { 'id' : id },
		success: function(data) {
			data = parseInt(data);
			$('#timer_' + id).countdown({until: +data, format: 'MS', compact: true, onTick: function(periods) {
				if (periods[6] > 1) {
					$.ajax({
						type: 'POST',
						url: '/sample/update',
						data: { 'id' : id, 'timer' : periods[6] }
					});
				} else {
					$.ajax({
						type: 'POST',
						url: '/sample/update',
						data: { 'id' : id, 'timer' : 15 },
						success: function(data) {
							refreshTimer(id);
						}
					});
				}
			}});
		}
	});
}

function refreshTimer(id) {
	$('#timer_' + id).countdown('destroy');
	startTimer(id);
}

