<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	 http-equiv="refresh" content="30, URL=http://141.64.150.66/interface.php" />
	<title>Hello World</title>
	<link href="styles/main.css" rel="stylesheet" />
</head>


<body>
<h1>Hello World</h1>


<div class="Trafic">
<div>
	<h2 class="Stop_Name">Fahrplan für </h2>
</div>

<p class="Depatures" />

</div>



<script src="jquery.js"></script>
<script>
	var txt = "pi";
	$.post("http://appinvtinywebdb.appspot.com/getvalue", {tag: txt}, function(data){
		var thisdata = data.split("\\\\n\\\\n").join( "\\\\n");
		var word=thisdata.split("\\\\n");
		word[word.length-1]=word[word.length-1].split("\\")[0];
		for(i=(word.length-11); i<(word.length); i++){
			document.createTextNode('Hello, ');
		}
	});
</script>
</body>
</html>
