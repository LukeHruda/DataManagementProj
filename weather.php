<!DOCTYPE html>
<html>
<head>
	<title>Some nice photos :)</title>
	<link href="views.css" rel="stylesheet" type="text/css"/>
</head>

<body>	
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dmproj";
$conn = new mysqli($servername, $username, $password, $dbname) or die ("NOEP");
$list = '';
$sql = "SELECT City FROM Station";
$result = $conn->query($sql);
?>

<h1>Select a city:</h1>
<form name="citySelect" action="weatherResults.php" method="GET	">
<select name="Cities"> 
<?php
while($row = $result->fetch_array()) {
	echo "<option value=".$row['City'].">".$row['City']."<br>\n";
}
?>
</select>
<input type="submit" value="Submit"/>
</form>