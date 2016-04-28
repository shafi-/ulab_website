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

		$sql = "INSERT INTO $tableName( id, name, password, session, department, email) VALUES( $sid, '$name', '$password', '$session', '$dept', '$email')";

		$connection = new mysqli($host, $userName, $dbPassword, $dbName);

		if($connection->connect_error)
		{
			echo "Registration failed.";
		}
		else
		{

			$insertResult = $connection->query($sql);
//			$sql = "INSERT into student(id,name,password,session,department,email) values(123,'abc','def','2015','CSE','ulab@gmail.com')";
//      $insert = $connection->query($sql);

      if ($insertResult === TRUE) {
        # code...
        echo "Information stored in database successfully<br>";
      } else {
        # code...
        echo "Failed to save in database.<br>";
      }
			//var_dump($insertResult);
//				echo "1 row inserted";

			require_once "Mail.php";

			$from = '<ulabemail@gmail.com>';
			$to = '<'.$email.'>';
			$subject = 'Registration successful!';

			$body = "Hi $name,\n\nYou are successfully registered. Please log in now.";

			$headers = array(
					'From' => $from,
					'To' => $to,
					'Subject' => $subject
			);

			$smtp = Mail::factory('smtp', array(
							'host' => 'ssl://smtp.gmail.com',
							'port' => '465',
							'auth' => true,
							'username' => 'ulabemail@gmail.com',
							'password' => 'ulab.comlbd'
					));

			$mail = $smtp->send($to, $headers, $body);

			if (PEAR::isError($mail)) {
					echo('<p>' . $mail->getMessage() . '</p>');
			} else {
					echo('<p>A email is sent.</p>');
					echo "Please check ".$email;
					echo '<br> Goto <a href="index.html">homepage</a>';
			}

		}
	?>
	<br/>
</body>
</html>
