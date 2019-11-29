<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
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
$sql = "SELECT City FROM Station";
$result = $conn->query($sql);
?>

<div id="p01">
<div id="main">

<form name="register" action="register.php" method="GET">
<h3>Please enter your first and last name.</h3>
<input type="text" name="fName"/>
<input type="text" name="lName"/>
<h3>Please enter your address.</h3>
<input type="text" name="address"/>
<h2></h2>
<h3>Where are you going today?</h3>
<select name="cityGoing">
<?php
while($row = $result->fetch_array()) {
	echo "<option value=".$row['City'].">".$row['City']."<br>\n";
}
$result = $conn->query($sql);
?>
</select>
<h2></h2>
<h3>Please select the city closest to you.</h3>
<select name="cityFrom"> 
<?php
while($row = $result->fetch_array()) {
	echo "<option value=".$row['City'].">".$row['City']."<br>\n";
}
?>
</select>
<h2></h2>
<input type="submit" value="Submit"/>
</form>
</div>
</div>


</body>
</html>