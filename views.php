<!DOCTYPE html>
<html>
<head>
	<title>Here is some data</title>
</head>

<body>
<table>
	<tr>
		<th>ID</th>
		<th>Model</th>
		<th>ID</th>
		<th>Fname</th>
		<th>ID</th>
		<th>Fname</th>
	</tr>
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
		while($row = $result-> fetch_assoc())
		{
			echo "<tr>";
			echo "<td>". $row["trainID"] ."</td>";
			echo "<td>". $row["Model"] ."</td>";
			echo "<td>". $row["conID"] ."</td>";
			echo "<td>". $row["conFname"] ."</td>";
			echo "<td>". $row["engID"] ."</td>";
			echo "<td>". $row["engFname"] ."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	$conn-> close();
?>
</table>
</body>
</html>
