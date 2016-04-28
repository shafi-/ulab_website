<!DOCTYPE html>
<html>
<head>
	<title>log in</title>
</head>
<body>
	<?php
		//var_dump($_POST);
		$sid = $_POST['sid'];
		$password = $_POST['password'];
		
		$sql = "Select password from student where id=$sid";

		$connectDB = new mysqli("localhost","root","","infosystem");

		$result = $connectDB->query($sql);

		$isLogin = 0;
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_row())
			{
				//var_dump($row);
				if( $row[0] == $password)
				{
					echo "Log in successful";
					$isLogin = 1;
				}
			}
		}		
		if($isLogin == 0)
		{
			echo "Log in failed.";
		}
		else
		{
			//name, id , department, session
			$sql = "Select * from student where id=$sid";

			$studentInfo = $connectDB->query($sql);

			if($studentInfo->num_rows > 0)
			{
				$row = $studentInfo->fetch_row();
				//var_dump($row);
				$id = $row[0];
				$name = $row[1];
				$department= $row[4];
				$session= $row[3];
				$email= $row[5];

				echo "<br> Profile: ";
				echo "<br> Name: " . $name . "<br>";
				echo "<br> Student ID: " . $id . "<br>";
				echo "<br> Department: " . $department . "<br>";
				echo "<br> Session: " . $session . "<br>";
				echo "<br> Email: " . $email . "<br>" ;
			}
		}
	?>

	
</body>
</html>