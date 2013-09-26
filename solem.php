<?php
/*
Solem
Author: Jose Hernandez
Description: Web Application to conduct the E-mail Filter Assessment.
Version: 0.2
*/

//Require the phpmailer library
require("class.phpmailer.php");

//creating variable for phpmailer function
$mail = new PHPMailer();

//Telling the class to use SMTP
$mail->IsSMTP();

//Set SMTP Server
$mail->Host = "localhost";

//Variable to hold Spoofed Sender email and name
$sender= $_GET['sender'];
$sender_name= $_GET['sender_name'];

//Variable to hold Target Recipient
$recipient= $_GET['recipient'];
$recipient_name= $_GET['recipient_name'];


function attachments($a)
{
	//switch case for the attachment location
	//value of the checkbox will be used to return the location of the attachment	
	switch ($a)
	{
		case "st":
		     return "spam test directory location";
		     break;
		case "ve":
		     return "/var/www/html/skynet/solem/attachments/eicar.com";
		     break;
		case "vze":
		     return "/var/www/html/skynet/solem/attachments/eicar_com.zip";
		     break;
		case "vdze":
		     return "/var/www/html/skynet/solem/attachments/eicarcom2.zip";
		     break;
		case "vdf":
		     return "/var/www/html/skynet/solem/attachments/eicar_com.zip.txt";
		     break;
		case "vez":
		     return "/var/www/html/skynet/solem/attachments/EICARENC.ZIP";
		     break;  
		case "clsid":
		     return "/var/www/html/skynet/solem/attachments/testhta.txt.{3050F4D8-98B5-11CF-BB82-00AA00BDCE0B}";
		     break;
		case "dfe":
		     return "/var/www/html/skynet/solem/attachments/NOTEPAD.EXE.txt";
		     break;		     
		case "mfe":
		     return "/var/www/html/skynet/solem/attachments/NOTEPAD.EXE.";
		     break;
		case "vbs":
		     return "/var/www/html/skynet/solem/attachments/helloworld.vbs";
		     break;
		case "vba":
		     return "/var/www/html/skynet/solem/attachments/helloworld.vba";
		     break;
		case "scr":
		     return "/var/www/html/skynet/solem/attachments/helloworld.scr";
		     break;
		case "pif":
		     return "/var/www/html/skynet/solem/attachments/helloworld.pif";
		     break;
		case "shs":
		     return "/var/www/html/skynet/solem/attachments/helloworld.shs";
		     break;		     
		case "dll":
		     return "/var/www/html/skynet/solem/attachments/helloworld.dll";
		     break;
		case "chm":
		     return "/var/www/html/skynet/solem/attachments/helloworld.chm";
		     break;		     
		case "bat":
		     return "/var/www/html/skynet/solem/attachments/helloworld.bat";
		     break;
		case "exe":
		     return "/var/www/html/skynet/solem/attachments/NOTEPAD.EXE";
		     break;
	}
}


//This For Loop will iterate through all the checkboxes and send each individual e-mail
foreach($_GET['attach'] as $value)
{
			//Sets Sender Information, Email and Name
			$mail->SetFrom($sender,$sender_name);
			
			//Sets Recipient information
			$mail->AddAddress($recipient,$recipient_name);
			
			//Subject Header
			$mail->Subject = "E-mail Filter Assessment - ";
			
			//Adding Attachment,experimental test
			$mail->AddAttachment(attachments($value));
			
			//Body Text
			$mail->Body = "E-mail Filter Assessment";
			//$mail->WordWrap = 80;

			//If conditional to send email
			if($mail->Send())
			{
				echo "<h2>Email sent!</h2>\n";
				echo "<p>Your test e-mail should be in your inbox momentarily, but may take longer depending on mail volume.";
			}
			else{
				echo "<h2>Failure</h2>\n";
				echo "<p>Something went awry, and email was not sent. Try again later, or report the following error: " . $mail->ErrorInfo . " - Thank you!</p>\n";
			}//closing bracket for if	
}//closing bracket for foreach


?>