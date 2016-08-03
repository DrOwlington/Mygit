<!doctype html>
<html>
<head>
	<title> PHP Kalender </title>
</head>

<body>
	<table border = "1">
		<tr>
			<th>KW </th>
			<th>Schicht</th>
		</tr>
		<tr>
			<td>
				<?php
				$kw = strftime("%V");
				echo "$kw";
				?>
			</td>
			<td>
				<?php
				$schicht = ["Max","Peter","Marie"];
				$zahl = $kw%3;
				echo "$schicht[$zahl]";
				?>
			</td>
		</tr>
		<tr>
			<td>
				<?php
				echo $kw+1;
				?>
			</td>
			<td>
				<?php
				$index = ($zahl+1)%3;
				echo "$schicht[$index]";
				?>
			</td>
		</tr>
		<tr>
			<td>
				<?php
				echo $kw+2;
				?>
			</td>
			<td>
				<?php
				echo $schicht[($zahl+2)%3];
				?>
			</td>
		</tr>
	</table>
</body>
</html>
