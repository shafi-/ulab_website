<!DOCTYPE html>
<html>
<head>
	<title>Registration Reply</title>
</head>
<body>

	<?php
		//save data to database
		//var_dump($_POST);

		$host = "localhost";
		$userName = "root";
		$dbPassword = "";
		$dbName = "infosystem";

		$name = $_POST['name'];
		$sid = $_POST['sid'];
		$dept = $_POST['department'];
		$session = $_POST['session'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		$tableName = "student";

		$sql = "INSERT INTO $tableName( id, name, password, session, department) VALUES( '$sid', '$name', '$password', '$session', '$dept', '$email')";
		
		$connection = new mysqli($host, $userName, $dbPassword, $dbName);
		
		if($connection->connect_error)
		{
			echo "Registration failed.";
		}
		else
		{
			
			$insertResult = $connection->query($sql);
			var_dump($insertResult);
//				echo "1 row inserted";

			$subject = "Registration successful!";
			$message = "<b>Hello, $name</b>You have registered successfully.";
			$header = "from: ulab@website.com";
			
			if (mail($email,$subject,$message,$header)) {
				echo "Email sent.";
			} else {
				//var_dump($retval);
				echo "<br>Email send failed.";
			}

			echo $sql;
			echo "<br>";
			echo "Registration successful.";
		}
	?>
	<br/>
</body>
</html>