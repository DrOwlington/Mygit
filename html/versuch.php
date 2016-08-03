<!doctype html>
<html>
<head>
	<title> PHP Kalender </title>
</head>

<body>
<table border = "1">

<?php $schicht = ["Lilli", "Peter", "Johanna", "Steffan", "Johannes","Andreas"];
        $woche = ["Mo", "Die", "Mi", "Do", "Fr", "Sa", "So"];
	$index_woche = 0;
	$spalte = 0;
	$delta = 0;
	$week = 0;
	$mod = sizeof($schicht);
	$akw = strftime("%V");
	$kw = $akw;
        $index = $kw%$mod;
	$datum = getdate();
?>

<tr>
	<th>KW </th>
	
	<?php
	kw:
	?>

	<td>
		<?php
		echo $kw;
		?>
	</td>
	
	<?php
	if($spalte < 3) {
		$spalte++;
		if($kw == 52)
			$kw = 1;
		else $kw++;
		goto kw;
	}
	else
		$spalte = 0;
	?>

</tr>

<tr>
	<th>Schicht </th>
	
	<?php
	$index = $akw%$mod;
	spalte:
	?>
	
	<td>
		<?php
		for($i = 0; $i < $mod; $i++) {
			if($index == $i)
				echo $schicht[$index];
		}

		?>
	</td>
	
	<?php
	if($spalte < 3) {
		if($kw == 52)
			$kw = 1;
		else $kw++;
		$week += 7;
		$spalte++;
		$index = ($index+1)%$mod;
		goto spalte;
	}
	else  {
		$spalte = 0;
		$week = 0;
	}
	?>

</tr>
	<?php
	wochewdh:
	?>
<tr>
	<th>
		<?php
		echo $woche[$index_woche];
		?>
	</th>
	
	<?php
	woche:
	?>

	<td>
		<?php
		$zahl = $week + $index_woche;
		echo "<script>
		       var date = new Date();
		        console.log(date.getDay());
		        var cal = $zahl;
		        var weekd;
		        if (date.getDay() == 0) {
		                weekd = 6;
		        } else {
		                weekd = date.getDay() - 1;
		        }
		        cal = cal - weekd;
		        date.setDate(date.getDate() + cal);
		        document.write(date.getDate());
		</script>"
		?>
	</td>
	
	<?php
        if($spalte < 3) {
		$week += 7;
		$delta++;
		$spalte++;
                goto woche;
        }
	else {
		$week = 0;
		$spalte = 0;
	}
        ?>

	
</tr>

	<?php
        if($index_woche < 6) {
		$index_woche++;
		goto wochewdh;
	}
	?>
</table>
</body>
</html>
