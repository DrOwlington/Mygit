<!doctype html>
<html lang="en">
<head>
	<title>Digi Uhr </title>
	<meta charset="utf-8">
	<style>
	.Clk {

	}	
	.uhr{
		border-color: black;
		border-width: 5px;
		border-style: solid;
		background-color: #fb5;
		width: 80px;
		text-align: center;
	}
	</style>
<link rel="stylesheet" type="text/css" href="styles/my.css"/>
</head>

<body>

	<div class="Clk">
	<div class="uhr">
		<?php
		$timestamp = time();
		echo $date = date("d.m.Y", $timestamp);
		?>
		</br>
		<?php	
		$date = date("H:i", $timestamp);
		echo $date;
		$tage = array("So ", "Mo ", "Die", "Mi ", "Do ", "Fr ", "Sa ", "So ");
		$tag = date("w");
		echo "   $tage[$tag]";
		?>
	</div>
	</div>
</body>
</html>
