<!DOCTYPE html>
<html>
<head>
	<title>City Weather</title>
	<link href="main.css" rel="stylesheet" type="text/css"/>
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

<div id="p01">
<div id="main">
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
</div>
</div>

<div id="links">
	<div id="bgc">
		<p class="p02"><a href="views.php">Our Views!</a></p>
		<p class="p02"><a href="pictures.php">The Picture API</a></p>
				<p class="p02"><a href="trainRegister.php">Register</a></p>
	</div>
</div>


</body>
</html>