<?php
//Require the phpmailer library
require("class.phpmailer.php");

//creating variable for phpmailer function
$mail = new PHPMailer();

//Telling the class to use SMTP
$mail->IsSMTP();

//Set SMTP Server
$mail->Host = "localhost";

//Sets Sender Information, Email and Name
$mail->SetFrom("MonkeyD@luffy","luffy");

//Sets Recipient information
$mail->AddAddress("JoseHernandez","TestJR");

//Subject Header
$mail->Subject = "Test Subject";

//Body Text
$mail->Body = "Test Body";
//$mail->WordWrap = 80;


//If conditional to send email

if($mail->Send()){
	echo "<h2>Email sent!</h2>\n";
	echo "<p>Your test e-mail should be in your inbox momentarily, but may take longer depending on mail volume.";

}else{
	echo "<h2>Failure</h2>\n";
	echo "<p>Something went awry, and email was not sent. Try again later, or report the following error: " . $mail->ErrorInfo . " - Thank you!</p>\n";
}

?>