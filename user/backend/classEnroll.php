<?php

// STEP 1 
// photo
// unamme
// dob
// fname

// nrcCode
// township
// type
// nrcNumber

// email
// phone
// edu

// STEP 2
// className
// classTime

// STEP 3
// bank

include("../../admin/confs/config.php");

// STEP 1 
$photo = $_POST['photo'];
$uname = $_POST['uname'];
$dob = $_POST['dob'];
$fname = $_POST['fname'];
$nrcCode = $_POST['nrcCode'];
$township = $_POST['township'];
$type = $_POST['type'];
$nrcNumber = $_POST['nrcNumber'];
$nrc = $nrcCode."/".$township.$type.$nrcNumber;
$email = $_POST['email'];
$address = $_POST['email'];
$phone = $_POST['phone'];
$education = $_POST['edu'];


// STEP 2
$classId = intval($_POST['classId']);
$classTime = $_POST['classTime'];

// STEP 3
$payment_method = $_POST['payment_method'];
$paid_percent = 100;

// echo ($classId .",".
//     $uname .",".
//     $dob .",".  
//     $fname .",".
//     $nrcCode .",".
//     $township .",".
//     $type .",".
//     $nrcNumber .",".
//     $email .",".
//     $phone .",".
//     $education .",".
//     $classTime .",".
//     $bank
// );


if($conn){
    $sql = "INSERT INTO enrollments (class_id,uname, dob, fname, nrc, email, education, address, phone, payment_method,paid_percent,created_at,
updated_at,is_pending) VALUES ($classId,'$uname','$dob','$fname','$nrc','$email','$education','$address','$phone','$payment_method',$paid_percent , now(), now(),1)";
mysqli_query($conn, $sql);
}else{
    echo "fail to insert";
}

include("../../admin/mail/sendMail.php");

$afterTryingToSend = sendMail($email,$uname);

if($afterTryingToSend[0]){
    header("location:javascript://history.go(-1)");
}else{
    echo "fail to send mail"; 
}

// mysqli_close($conn);

