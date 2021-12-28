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
	$mail->Body = "<h1>Dear ";
	$mail->Body .= $uname ;
	$mail->Body .= "</h1></br>";
	$mail->Body .= "<h4>Check the payment informationf!</h4>";
	$mail->Body .= "<h5>". "banking system" ."</h5>";

	$mail->Body .= "Please fill out the form below to confirm your payment";

	$mail->Body .= "<a href=''>Go to Payment Confirm</a>";

	$mail->Body .= "<p>For more detailed payment and courses information, you can contact us directly during business hours (9:00 ~ 17:00) </p>";
	$mail->Body .= "<h5>Regards, <br> JKT Myanmar Internation </h5>";
	$mail->Body .= "--------------------------------";
	$mail->Body .= "<p style='color: lightgrey;'>Phone No.: +959 269 564 339, +959 770 411 708</p>";
	$mail->Body .= "<p style='color: lightgrey;'>Email: jkt.mm.int@gmail.com</p>";
	$mail->Body .= "<p style='color: lightgrey;'>No.86, 3A, Shinsawpu Road, Near Myaynigone Citymart, Sanchaung Township, Yangon, Myanmar</p>";
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
