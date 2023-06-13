<?php
//database
	$serverName='localhost';
	$userName='root';
	$password='admin';
	$databaseName='Libary';
	$con = mysqli_connect($serverName,$userName,$password , $databaseName);
	if(!$con)
		die("ERROR: Couldn't connect to database");

?>