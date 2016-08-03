<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Hello World</title>
	<link href="styles/maintest.css" rel="stylesheet" />
</head>


<body>
<h1>Hello World</h1>


<div class="Trafic">
<div>
	<h2 class="Stop_Name">Fahrplan für </h2>
</div>

<p class="Depatures" />

</div>


<div class="Weather">
<div>
	<h2 class="City_Name">Aktuelles Wetter für </h2> 
	<ul class="Current_Weather" />
</div>
<div>
	<h2 class="Forecast_City_Name">Wettervorhersage für </h2> 
	<ul class="Forecast" />
</div>
</div>

<div>
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
                for($i = 0; $i < $mod; $i++) 
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
</div>



<script src="jquery.js"></script>
<script>

	$(document).ready(function() {
		var tomorrow = new Date();
		tomorrow.setDate(tomorrow.getDate() - 24);
		console.log(tomorrow.getDate());
		$.getJSON('http://api.openweathermap.org/data/2.5/weather?q=berlinwilmersdorf&lang=de&units=metric&appid=85b934a4045bd995933536a2a5469fb3', function(data) {
			$(".City_Name").append(data.name);
			$(".Current_Weather").append("<li>Temperatur: " + data.main.temp +"</li><li>Wetter: " + data.weather[0].description + "</li>"+"<img src= http://openweathermap.org/img/w/" + data.weather[0].icon + ".png></img>" );
		});
		$.getJSON('http://api.openweathermap.org/data/2.5/forecast?q=berlinwilmersdorf&lang=de&units=metric&appid=85b934a4045bd995933536a2a5469fb3', function(data) {
                	$(".Forecast_City_Name").append(data.city.name);
              		for(index=1;index<5;index++){
				var thisday = new Date();
				thisday = whatDay(index);
				$(".Forecast").append("<div>" +
							"<div>" +
								"</li>" +
									"<bold>"+ thisday.day+"</bold>" +
								"</li>" +
								"<li>"+data.list[thatAfternoon(thisday, data.list, index)].weather[0].description+"</li>" +
								"<img src= http://openweathermap.org/img/w/" + data.list[thatAfternoon(thisday, data.list, index)].weather[0].icon + ".png />" +
								"<p class='Temp'>"+data.list[thatAfternoon(thisday, data.list, index)].main.temp+"</p>" +
							"</div>" +
							"</div>" );
                       	};
          	});

	function whatDay(d){
		var retd = new Date();
		if(d==1){
			retd.day = "Morgen";
		} else if (d==2){
			retd.day = "Übermorgen";
		} else if (d==3){
			retd.day = "In 3 Tagen";
		} else if (d==4){
			retd.day = "In 4 Tagen";
		}
		return retd;
	}
	});

	function thatAfternoon(d, li, i){
		var thisGet =d.getDate() + i;
		var ret;
		$.each(li, function(index){
			var thisDate = li[index].dt_txt;
			var thisHour = li[index].dt_txt;
			thisDate = thisDate.slice(8, 10);
			thisHour = thisHour.slice(11, 13);
			if(thisGet == thisDate){
				if(thisHour == 15){
					ret = index;
				}
			}
		});
		return ret;
	}

	function averageWeather(d, li, i){
		var add = 0;
		var is = 0;
		var ret;
		var thisGet = d.getDate() + i;
		$.each(li, function(index){
			var thisD = li[index].dt_txt;
			thisD = thisD.slice(8, 10);
			if(thisGet == thisD){
				is = is + 1;
				add = add + li[index].main.temp;
			}
		});
		return Math.round(ret*100)/100;
	}

	function mostPic(d, li, i){
		var add = 0;
		var thisGet = d.getDate() + i;
		var clear_sky = 0;
		var few_clouds = 0;
		var scattered_clouds = 0;
		var broken_clouds = 0;
		var shower_rain = 0;
		var rain = 0;
		var thunderstorm = 0;
		var snow = 0;
		var mist = 0;
		$.each(li, function(index){
			var thisD = li[index].dt_txt;
			thisD = thisD.slice(8, 10);
			if(thisGet == thisD){
				switch(li[index].weather[0].icon) {
					case "01d": clear_sky = clear_sky + 1;
					case "01n": clear_sky = clear_sky + 1;
                            		case "02d": few_clouds = few_clouds + 1;
                             	   	case "02n": few_clouds = few_clouds + 1;
                                	case "03d": scattered_clouds = scattered_clouds + 1;
                                	case "03n": scattered_clouds = scattered_clouds + 1;
                                	case "04d": broken_clouds = broken_clouds + 1;
                                	case "04n": broken_clouds = broken_clouds + 1;
                                	case "09d": shower_rain = shower_rain + 1;
                                	case "09n": shower_rain = shower_rain + 1;
                                	case "10d": rain = rain + 1;
                                	case "10n": rain = rain + 1;
                                	case "11d": thunderstorm = thunderstorm + 1;
                                	case "11n": thunderstorm = thunderstorm + 1;
                                	case "13d": snow = snow + 1;
                                	case "13n": snow = snow + 1;
                                	case "50d": mist = mist + 1;
                                	case "50n": mist = mist + 1;;
					default: ;
				}
			}
		});
	}

</script>
<script>
	$(document).ready(function() {
		function logResults(json){
			console.log(json);
		}

		$.getJSON('https://bvg-api.herokuapp.com/station/9043101', function(data) {
			$(".Stop_Name").append(data[0].name);
			for(i=0;i<3;i++){
				$(".Depatures").append(
					"<div>" +
					colorcheck(data[0].departures[i].line) +
					"<ul><li class'Dir'>Richtung " + data[0].departures[i].direction + "</li><li><bold>" + data[0].departures[i].time + "<bold></li>" +
						
					"</div>");
			};
		});

         });

	function colorcheck(a) {
		var ret;
		var first = a.charAt(0);
		if(first == "B") {
			ret = '<img src=\'http://da-luma.de/wp-content/uploads/2015/06/bus.png\'></img><big class="Vehicle">' + a + '</big>'
		} else if (first == "U") {
                        ret = '<img src=\'https://www.bvg.de/images/content/bvgicons/ubahn.gif\'></img><big class="Vehicle">' + a + '</big>'
		} else {
			console.log("N");
			ret = a
		}
		return ret
	}
</script>
</body>
</html>
