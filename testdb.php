<?php

	$dbName = "infosystem";
	$table = "student";
	$host = "localhost";
	$user = "root";
	$password = "";

//	$conn = new mysqli($host,$user,$password);

	$connection = new mysqli($host, $user, $password);

	if ($connection->connect_error) {
		# code...
		echo "mysql connection: Okay";
	} else {
		# code...
		echo "mysql connection: failed";
	}
	
//	echo "mysql connection: " . $conn->connect_error;

	$conn = new mysqli($host, $user, $password, $dbName);

	echo "infosystem connection: " . $conn->connect_error;

?>