	
<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp1.gmail.com;smtp2.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ulabemail@gmail.com';                 // SMTP username
$mail->Password = 'ulab.com.bd';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'ulabemail@gmail.com';
$mail->FromName = 'Mailer';
$mail->addAddress('ulabemail@gmail.com', 'Joe User');     // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}