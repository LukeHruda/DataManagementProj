<!DOCTYPE html>
<html>
<link href="views.css" rel="stylesheet" type="text/css" />
<head>
	<title>Here is some data</title>
</head>

<body>
<table class ="t1" summary="Shows all the Trains by ID and Model. With which engineer and conductor serves on them.">
<caption>Trains in service with associated Conductor and Engineer</caption>
	<thead>
	<tr><th>Train ID</th><th>Model</th><th>Conductor ID</th><th>Name</th><th>Engineer ID</th><th>Name</th></tr>
	</thead>
	<tfoot>
	<tr><th colspan="6">View 1</th></tr>
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

<table class ="t1" summary="Shows a list of all the rails that have more distance than any set of rails on station 11 and sorts the list of rails by distance, ascending.">
<caption>Rails longer than Station 11 railway connections</caption>
	<thead>
	<tr><th>Rail ID</th><th>Start Station</th><th>End Station</th><th>Distance</th></tr>
	</thead>
	<tfoot>
	<tr><th colspan="4">View 2</th></tr>
	</tfoot>
	<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "dmproj";	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Connection Failed");
	$sql = "SELECT * 
FROM rails 
WHERE rails.Distance > ANY(SELECT rails.Distance 
FROM rails 
WHERE rails.StartStation=11) 
ORDER BY rails.StartStation ASC";
	$result = $conn-> query($sql);
	
	if($result-> num_rows >0)
	{
		echo "<tbody>";
		while($row = $result-> fetch_assoc())
		{
			echo "<tr>";
			echo "<th>". $row["RailID"] ."</th>";
			echo "<td>". $row["StartStation"] ."</td>";
			echo "<td>". $row["EndStation"] ."</td>";
			echo "<td>". $row["Distance"] ."</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	$conn-> close();
?>

<table class ="t1" summary="Shows a list of conductors that have more experience than the average conductor.">
<caption>Conductors that have more experience than the average conductor.</caption>
	<thead>
	<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Years Experience</th></tr>
	</thead>
	<tfoot>
	<tr><th colspan="4">View 3</th></tr>
	</tfoot>
	<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "dmproj";	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Connection Failed");
	$sql = "SELECT conductors.conID, conductors.conFname, conductors.conLname, conductors.YearsExperience 
FROM conductors
WHERE conductors.YearsExperience > (SELECT AVG(conductors.YearsExperience) 
      FROM conductors);";
	$result = $conn-> query($sql);
	
	if($result-> num_rows >0)
	{
		echo "<tbody>";
		while($row = $result-> fetch_assoc())
		{
			echo "<tr>";
			echo "<th>". $row["conID"] ."</th>";
			echo "<td>". $row["conFname"] ."</td>";
			echo "<td>". $row["conLname"] ."</td>";
			echo "<td>". $row["YearsExperience"] ."</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	$conn-> close();
?>

<table class ="t1" summary="Show a list of all trains that are currently docked at a station">
<caption>Show a list of all trains that are currently docked at a station</caption>
	<thead>
	<tr><th>Station ID</th><th>City</th><th>Location</th><th>Train ID</th><th>Train Model</th><th>Current Station</th><th>Platform Number</th><th>Departure Date</th></tr>
	</thead>
	<tfoot>
	<tr><th colspan="8">View 4</th></tr>
	</tfoot>
	<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "dmproj";	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Connection Failed");
	$sql = "SELECT s.ID, s.City, s.Location, t.trainID, t.Model, t.CurrentStation, t.PlatformNumber, t.DepartureDate 
FROM station s 
LEFT JOIN train t ON s.ID = t.CurrentStation 
UNION 
SELECT s.ID, s.City, s.Location, t.trainID, t.Model, t.CurrentStation, t.PlatformNumber, t.DepartureDate 
FROM station s 
RIGHT JOIN train t ON s.ID = t.CurrentStation";
	$result = $conn-> query($sql);
	
	if($result-> num_rows >0)
	{
		echo "<tbody>";
		while($row = $result-> fetch_assoc())
		{
			echo "<tr>";
			echo "<th>". $row["ID"] ."</th>";
			echo "<td>". $row["City"] ."</td>";
			echo "<td>". $row["Location"] ."</td>";
			echo "<td>". $row["trainID"] ."</td>";
			echo "<td>". $row["Model"] ."</td>";
			echo "<td>". $row["CurrentStation"] ."</td>";
			echo "<td>". $row["PlatformNumber"] ."</td>";
			echo "<td>". $row["DepartureDate"] ."</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	$conn-> close();
?>

<table class ="t1" summary="Show a list of all conductors and engineers that are not assigned to a train.">
<caption>Show a list of all conductors and engineers that are not assigned to a train.</caption>
	<thead>
	<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Year Experience</th><th>Salary</th></tr>
	</thead>
	<tfoot>
	<tr><th colspan="5">View 5</th></tr>
	</tfoot>
	<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "dmproj";	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Connection Failed");
	$sql = "SELECT conID, conFname, conLname, YearsExperience, salary FROM (SELECT * FROM conductors UNION SELECT * FROM engineers) 
AS u 
WHERE u.TrainID IS NULL;";
	$result = $conn-> query($sql);
	
	if($result-> num_rows >0)
	{
		echo "<tbody>";
		while($row = $result-> fetch_assoc())
		{
			echo "<tr>";
			echo "<th>". $row["conID"] ."</th>";
			echo "<td>". $row["conFname"] ."</td>";
			echo "<td>". $row["conLname"] ."</td>";
			echo "<td>". $row["YearsExperience"] ."</td>";
			echo "<td>". $row["salary"] ."</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	$conn-> close();
?>

<table class ="t1" summary="Get a list of all passengers that do not live in Toronto.">
<caption>Get a list of all passengers that do not live in Toronto.</caption>
	<thead>
	<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Address</th></tr>
	</thead>
	<tfoot>
	<tr><th colspan="4">View 6</th></tr>
	</tfoot>
	<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "dmproj";	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Connection Failed");
	$sql = "SELECT passengers.ID, passengers.Fname, passengers.Lname, passengers.Address 
FROM passengers 
WHERE Address NOT IN (SELECT passengers.Address 
FROM passengers WHERE passengers.Address LIKE '%Toronto%');";
	$result = $conn-> query($sql);
	
	if($result-> num_rows >0)
	{
		echo "<tbody>";
		while($row = $result-> fetch_assoc())
		{
			echo "<tr>";
			echo "<th>". $row["ID"] ."</th>";
			echo "<td>". $row["Fname"] ."</td>";
			echo "<td>". $row["Lname"] ."</td>";
			echo "<td>". $row["Address"] ."</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	$conn-> close();
?>

<table class ="t1" summary="Shows only 'pairs' (conductors and engineers on the same train) where the conductor has more experience than the engineer.">
<caption>Shows only 'pairs' where the conductor has more experience than the engineer.</caption>
	<thead>
	<tr><th>Conductor First Name</th><th>Conductor Last Name</th><th>Conductor Years Experience</th><th>Engineer First Name</th><th>Engineer Last Name</th></tr>
	</thead>
	<tfoot>
	<tr><th colspan="5">View 7</th></tr>
	</tfoot>
	<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "dmproj";	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Connection Failed");
	$sql = "SELECT conductors.conFname, conductors.conLname, conductors.YearsExperience, engineers.engFname, engineers.engLname 
	FROM conductors INNER JOIN engineers ON conductors.TrainID=engineers.TrainID 
	WHERE (conductors.YearsExperience > engineers.YearsExperience);";
	$result = $conn-> query($sql);
	
	if($result-> num_rows >0)
	{
		echo "<tbody>";
		while($row = $result-> fetch_assoc())
		{
			echo "<tr>";
			echo "<th>". $row["conFname"] ."</th>";
			echo "<td>". $row["conLname"] ."</td>";
			echo "<td>". $row["YearsExperience"] ."</td>";
			echo "<td>". $row["engFname"] ."</td>";
			echo "<td>". $row["engLname"] ."</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	$conn-> close();
?>

<table class ="t1" summary="Show an ascending list of engineers that have more experience than the most experienced conductor.">
<caption>Show alist of engineers that have more experience than the most experienced conductor.</caption>
	<thead>
	<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Years Experience</th></tr>
	</thead>
	<tfoot>
	<tr><th colspan="5">View 8</th></tr>
	</tfoot>
	<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "dmproj";	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Connection Failed");
	$sql = "SELECT engineers. engID, engineers.engFname, engineers.engLname, engineers.YearsExperience
FROM engineers 
WHERE engineers.YearsExperience > (SELECT MAX(conductors.YearsExperience) 
    FROM conductors)
GROUP BY engineers.YearsExperience ASC;;";
	$result = $conn-> query($sql);
	
	if($result-> num_rows >0)
	{
		echo "<tbody>";
		while($row = $result-> fetch_assoc())
		{
			echo "<tr>";
			echo "<th>". $row["engID"] ."</th>";
			echo "<td>". $row["engFname"] ."</td>";
			echo "<td>". $row["engLname"] ."</td>";
			echo "<td>". $row["YearsExperience"] ."</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	$conn-> close();
?>

<table class ="t1" summary="Show a list of all rails by city, their destinations, and the distance to them.">
<caption>Show a list of all rails by city, their destinations, and the distance to them.</caption>
	<thead>
	<tr><th>City</th><th>End Station</th><th>Distance</th></tr>
	</thead>
	<tfoot>
	<tr><th colspan="3">View 9</th></tr>
	</tfoot>
	<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "dmproj";	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Connection Failed");
	$sql = "SELECT station.City, rails.EndStation, rails.Distance 
FROM rails 
INNER JOIN station ON rails.StartStation=station.ID 
ORDER BY station.City ASC;";
	$result = $conn-> query($sql);
	
	if($result-> num_rows >0)
	{
		echo "<tbody>";
		while($row = $result-> fetch_assoc())
		{
			echo "<tr>";
			echo "<th>". $row["City"] ."</th>";
			echo "<td>". $row["EndStation"] ."</td>";
			echo "<td>". $row["Distance"] ."</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	$conn-> close();
?>

<table class ="t1" summary="Show a list of all conductors and all engineers.">
<caption>Show a list of all conductors and all engineers.</caption>
	<thead>
	<tr><th>First Name</th><th>Last Name</th></tr>
	</thead>
	<tfoot>
	<tr><th colspan="2">View 10</th></tr>
	</tfoot>
	<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "dmproj";	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("Connection Failed");
	$sql = "SELECT conFname, conLname FROM conductors 
UNION 
SELECT engFname, engLname from engineers";
	$result = $conn-> query($sql);
	
	if($result-> num_rows >0)
	{
		echo "<tbody>";
		while($row = $result-> fetch_assoc())
		{
			echo "<tr>";
			echo "<th>". $row["conFname"] ."</th>";
			echo "<td>". $row["conLname"] ."</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	$conn-> close();
?>
<div id="links">
	<div id="bgc">
		<p id="pg2"><a href="weather.php">Return to Main Page</a></p>
	</div>
</div>
</body>
</html>