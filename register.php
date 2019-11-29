<!DOCTYPE html>
<html>
<head>
	<title>City Weather</title>
	<link href="main2.css" rel="stylesheet" type="text/css"/>
</head>

<body>	
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dmproj";
$conn = new mysqli($servername, $username, $password, $dbname) or die ("NOEP");
$list = '';
$firstName = $_GET["fName"];
$lastName = $_GET["lName"];
$address = $_GET["address"];
$cityGoing = $_GET["cityGoing"];
$going = $conn->query("SELECT * FROM dmproj.station WHERE City='".$cityGoing."'");
while($row = $going->fetch_array()) {
	$cityGoing = $row['ID'];
}
$cityFrom = $_GET["cityFrom"];
$from = $conn->query("SELECT ID FROM dmproj.station WHERE City='".$cityFrom."'");
while($row = $from->fetch_array()) {
	$cityFrom = $row['ID'];
}
$sql = "INSERT INTO `passengers` (`ID`, `Fname`, `Lname`, `Address`, `DepartureTo`, `DepartureFrom`) VALUES (NULL, '".$firstName."', '".$lastName."', '".$address."', '".$cityGoing."', '".$cityFrom."');
";
$result = $conn->query($sql);
?>

<div id="p01">
<div id="main">
<h3>Registered.</h3>
<p class="p02"><a href="weather.php">Return to main page</a></p>
</div>
</div>


</body>
</html>