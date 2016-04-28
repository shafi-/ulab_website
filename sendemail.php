<?php
	$to = "abdullahil.df@gmail.com";
	$subject = "test email";
	$message = "<b>Email test</b>";
	$header = "from: ulab@website.com";
	if (mail($to,$subject,$message,$header)) {
		echo "Email sent.";
	} else {
		//var_dump($retval);
		echo "<br>Email send failed.";
	}
	
?>