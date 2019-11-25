<!DOCTYPE html>
<html>
<head>
	<title>Some nice photos :)</title>
	<link href="views.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<?php
$response = file_get_contents('https://icanhazdadjoke.com/slack');
$arr_data = json_decode($response, true);
$jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
file_put_contents("jokes.json", $jsondata); // this saves data to the local server.

$jsonData = file_get_contents('jokes.json');
$data = json_decode($jsonData, true);
echo $data['attachments']['text'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dmproj";
$conn = new mysqli($servername, $username, $password, $dbname) or die ("NOEP");
/*
$sql = 'INSERT INTO jokes (text)
VALUES ('.$arr_data['attachments']['text'].',)';
$conn->query($sql);*/
?>