<html>
<head>
	<title>City Weather</title>
	<link href="main.css" rel="stylesheet" type="text/css"/>
</head>

<body>

<div id="p01">
<div id="main">
<?php
	$location = $_GET["Cities"];

	if ($location == "Niagara") {
		$location = "Niagara%20Falls";
	}
	$response = json_decode(file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$location.',Ca&appid=524b9e33ddf5c6c8ee78d8a03411de9f'), true);
	$kelvin = 273.16; 
	$weather = number_format(($response["main"]["temp"] - $kelvin), 2);
	if($weather > 0 && $weather < 1) 
			$weather = 1;
	echo "<h4>The weather in ".$response["name"]." is currently ".$weather." degrees. Conditions: ".$response['weather'][0]['main'].".</h4>";
?>
</div>
</div>

<div id="links">
	<div id="bgc">
		<p id="pg2"><a href="weather.php">Return to Main Page</a></p>
	</div>
</div>

</body>
</html>