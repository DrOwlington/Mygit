<html>
<body>
<script src="jquery.js"></script>
<script>
	var date = new Date();
	console.log(date.getDay());
	var cal = 1;
	var weekd;
	if (date.getDay() == 0) {
		weekd = 6;
	} else {
		weekd = date.getDay() - 1;
	}
	cal = cal - weekd;
	date.setDate(date.getDate() + cal);
	document.write(date.getDate());
</script>
</body>
</html>
