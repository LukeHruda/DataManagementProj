<!DOCTYPE html>
<html>
<head>
	<title>Jokes Anyone?</title>
	<link href="main.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<p id="title"> Can we start you off with a joke? </p>
<?php
$response = file_get_contents('https://icanhazdadjoke.com/slack');
$arr_data = json_decode($response, true);
$jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
file_put_contents("jokes.json", $jsondata); // this saves data to the local server.

$jsonData = file_get_contents('jokes.json');
$data = json_decode($jsonData, true);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dmproj";
$conn = new mysqli($servername, $username, $password, $dbname) or die ("NOEP");

$sql = "INSERT INTO jokes(text) VALUES ('".$data['attachments'][0]['text']."')";
$conn->query($sql);

$sql = "SELECT text FROM jokes
ORDER BY RAND()
LIMIT 1;";
$result = $conn-> query($sql);
if($result-> num_rows > 0)
{
	while($row = $result-> fetch_assoc())
	{
		echo '<div id="d01">';
		echo '<p id="p01">';
		echo $row['text'];
		echo '</p">';
		echo '</div>';
	}
}
?>
<div id="d02">
	<p class="p02"><a href="views.php">Our Views!</a></p>
	<p class="p02"><a href="pictures.php">The Picture API</a></p>
</div>