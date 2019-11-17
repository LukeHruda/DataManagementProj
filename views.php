<!DOCTYPE html>
<html>
<head>
	<title>Here is some data</title>
	<link href="views.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table class ="t1" summary="Shows all the Trains by ID and Model. With which engineer and conductor serves on them.">
<caption>Trains in service with associated Conductor and Engineer</caption>
	<thead>
	<tr><th>ID</th><th>Model</th><th>ID</th><th>Fname</th><th>ID</th><th>Fname</th></tr>
	</thead>
	<tfoot>
	<tr><th colspan="6">Final Project Group 1</th></tr>
	</tfoot>
	<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "dmproj";	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Connection Failed");
	$sql = "SELECT train.trainID, train.Model, engineers.engID, engineers.engFname, conductors.conID, conductors.conFname
FROM ((train INNER JOIN engineers ON train.trainID = engineers.TrainID) 
INNER JOIN conductors ON train.trainID = conductors.TrainID)";
	$result = $conn-> query($sql);
	
	if($result-> num_rows >0)
	{
		echo "<tbody>";
		while($row = $result-> fetch_assoc())
		{
			echo "<tr>";
			echo "<th>". $row["trainID"] ."</th>";
			echo "<td>". $row["Model"] ."</td>";
			echo "<td>". $row["conID"] ."</td>";
			echo "<td>". $row["conFname"] ."</td>";
			echo "<td>". $row["engID"] ."</td>";
			echo "<td>". $row["engFname"] ."</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	$conn-> close();
?>
</table>
</body>
</html>
