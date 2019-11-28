<?php
	$location = $_GET["Cities"];

	if ($location == "Niagara") {
		$location = "Niagara%20Falls";
	}
	//echo $location;
	$response = json_decode(file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$location.',Ca&appid=524b9e33ddf5c6c8ee78d8a03411de9f'), true);
	$kelvin = 273.16; 
	$weather = $response["main"]["temp"] - $kelvin;
	if($weather > 0 && $weather < 1) 
			$weather = 1;
	echo "<h1>The weather in ".$response["name"]." is currently ".$weather." degrees. Conditions: ".$response['weather'][0]['main'].".</h4>";
	//var_dump($response);
?>