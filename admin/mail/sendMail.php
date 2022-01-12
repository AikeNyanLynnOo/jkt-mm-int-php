<?php
//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $uname, $classInfo,$insertedId, $isInCash)
{
	//Create instance of PHPMailer
	$mail = new PHPMailer();
	//Set mailer to use smtp
	$mail->isSMTP();
	//Define smtp host
	$mail->Host = "jktmyanmarint.com";
	//Enable smtp authentication
	$mail->SMTPAuth = true;
	//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
	//Port to connect smtp
	$mail->Port = "587";
	//Set gmail username
	$mail->Username = "noreply.payment@jktmyanmarint.com";
	//Set gmail password
	$mail->Password = "noreplyjkt%";
	//Email subject
	$mail->Subject = "Thank you for joining the course - " . $classInfo["title"] . " - Here is payment information";
	//Set sender email
	$mail->setFrom('noreply.payment@jktmyanmarint.com');
	//Enable HTML
	$mail->isHTML(true);
	//Attachment
	// $mail->addAttachment("../mail/img/doraemon.png");
	//Email body

	// $mail->Body = "<div style='font-family: Helvetica, sans-serif;'>";
	$mail->Body = "<h1>Dear ";
	$mail->Body .= $uname;
	$mail->Body .= "</h1></br>";
	$mail->Body .= "Welcome! - You tried to enroll our " . $classInfo["levelorsub"] . " level " . $classInfo["title"] . " course </br>";
	
	$mail->Body .= "<h3>Check the payment information!</h3>";
	
	if ($isInCash) {
		$mail->Body .= "<p>The course will start on " . $classInfo["start_date"]  . "</p>";
		$mail->Body .= "<p>You can pay on the first day of the course. If you pay fully at once, 5% discount on your course.If you want to pay installment, we accepted 3 times installment before the course completes.</p>";
	} else {
		$mail->Body .= "<h4>" . "Banking system" . "</h4>";
		$mail->Body .= "<p>Please fill out the form below to confirm your payment.";
		$mail->Body .= "Please be sure to submit payment 2 days from now.";
		$mail->Body .= "If we don't receive any payment, your course enrollment will be cancelled.</p></br>";
		$mail->Body .= "<a style='
		text-decoration:none;
		color:#fff;
		background-color:#5bafe7;
		padding:10px 20px;
		margin : 20px 0;
		border-radius: 5px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		-ms-border-radius: 5px;
		-o-border-radius: 5px;' 
		href='https://stu-regist.000webhostapp.com/user/frontend/paymentDetail.php?enroll_id=" . "$insertedId" . "'>Go to Payment Confirm</a>";
	}

	$mail->Body .= "<p>For more detailed payment and courses information, you can contact us directly during business hours (9:00 ~ 17:00) </p>";
	$mail->Body .= "<h4>Regards, <br> JKT Myanmar Internation </h4>";
	$mail->Body .= "--------------------------------";
	$mail->Body .= "<p style='color: grey;'>Phone No.: +959 269 564 339, +959 770 411 708</p>";
	$mail->Body .= "<p style='color: grey;'>Email: jkt.mm.int@gmail.com</p>";
	$mail->Body .= "<p style='color: grey;'>No.86, 3A, Shinsawpu Road, Near Myaynigone Citymart, Sanchaung Township, Yangon, Myanmar</p>";
	
	// $mail->Body = "</div>";
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
