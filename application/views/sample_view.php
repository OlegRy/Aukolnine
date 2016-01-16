<html>
	<head>
		<title>Sample</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="/js/jquery.plugin.js"></script>
		<script type="text/javascript" src="/js/jquery.countdown.js"></script>
		<script type="text/javascript" src="/js/jquery.countdown-ru.js"></script>
		<script type="text/javascript" src="/js/sample.js"></script>
	</head>
	<body>
		<div id="timer_<?= $sample[0]->id ?>">
			<script>
				startTimer(<?= $sample[0]->id ?>);
			</script>
		</div>

	</body>
</html>