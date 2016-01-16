function sortByTime(urlName) {
	sortAuctions(1, urlName);
}

function sortByCategory(urlName) {
	sortAuctions(2, urlName);
}

function sortByGenre(urlName) {
	sortAuctions(3, urlName);
}

function sortAuctions(sortType, urlName) {
	$.ajax({
		type: 'GET',
		url: '/gamezone/index',
		data: { 'sortType' : sortType },
		success: function(data) {
			
			window.location = '/' + urlName + '?sortType=' + sortType;
		}
	}); 
}