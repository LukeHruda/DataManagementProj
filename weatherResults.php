<?php
	$location = $_GET["Cities"];
	if ($location == "Niagara") {
		$location = "Niagara%20Falls";
	}
	echo $location;
	$response = json_decode(file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$location.',Ca&appid=524b9e33ddf5c6c8ee78d8a03411de9f'), true);
	echo "<h1>The weather in ".$response["name"]." right now: ".$response['weather'][0]['main'].".</h4>";
	var_dump($response);
?>