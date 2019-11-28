<!DOCTYPE html>
<html>
<head>
	<title>Some nice photos :)</title>
	<link href="photos.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dmproj";
$page = rand(1, 20);
$conn = new mysqli($servername, $username, $password, $dbname) or die ("NOEP");
$response = file_get_contents('https://picsum.photos/v2/list?page='.$page.'&limit=6');
$arr_data = json_decode($response, true);
$jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
file_put_contents("results.json", $jsondata); // this saves data to the local server.
$arr_data = json_decode(file_get_contents("results.json"), TRUE);
$conn->query('TRUNCATE TABLE Pictures');
for ($i = 0; $i < count($arr_data); $i++) {
$sql = 'INSERT IGNORE INTO Pictures (id, author, width, height, url, download_url)
VALUES ('.$arr_data[$i]['id'].', "'.$arr_data[$i]['author'].'", '.$arr_data[$i]['width'].',
'.$arr_data[$i]['height'].', "'.$arr_data[$i]['url'].'", "'.$arr_data[$i]['download_url'].'")';
$conn->query($sql);
} ?>
<div id="try">
<table class="t1">
	<caption id="titles">Here are some pictures</caption>
<?php
$sql = "SELECT author, download_url FROM Pictures";
$result = $conn-> query($sql);
if($result-> num_rows > 0)
{
	while($row = $result-> fetch_assoc())
	{
		echo '<tr><th>';
		echo '<img src="'.$row['download_url'].'" width=310 height=175 alt="icon"" /><br>';
		echo 'Author: '.$row['author'].'';
		echo '</tr></th>';
		}
}
	$conn-> close();
?>
</table>
</div>
</body>