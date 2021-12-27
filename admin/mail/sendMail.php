<?php
//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$uname)
{
	//Create instance of PHPMailer
	$mail = new PHPMailer();
	//Set mailer to use smtp
	$mail->isSMTP();
	//Define smtp host
	$mail->Host = "smtp.gmail.com";
	//Enable smtp authentication
	$mail->SMTPAuth = true;
	//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
	//Port to connect smtp
	$mail->Port = "587";
	//Set gmail username
	$mail->Username = "omoomocool789@gmail.com";
	//Set gmail password
	$mail->Password = "iscommonacc_omoomocool";
	//Email subject
	$mail->Subject = "Thank you for joining the course - ".$uname." - Here is payment information";
	//Set sender email
	$mail->setFrom('omoomocool789@gmail.com');
	//Enable HTML
	$mail->isHTML(true);
	//Attachment
	$mail->addAttachment('./img/doraemon.png');
	//Email body
	$mail->Body = "<h1>Dear ". $uname ."</h1></br><p>Check the following image for payment information!</p>";
	//Add recipient
	$mail->addAddress($email);
	//Finally send email
	if ($mail->send()) {
		return array(TRUE, "Email sent!");
	} else {
		return array(FALSE, "Email couldn't be sent. Error : " . $mail->ErrorInfo);
	}
	//Closing smtp connection
	$mail->smtpClose();
}
