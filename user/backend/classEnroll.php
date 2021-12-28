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
// classId
// classTime

// STEP 3
// payment_method

// db config
include("../../admin/confs/config.php");

// for mail
include("../../admin/mail/sendMail.php");

// STEP 1 
$photo = $_POST['photo'];
$uname = $_POST['uname'];
$dob = $_POST['dob'];
$fname = $_POST['fname'];
$nrcCode = $_POST['nrcCode'];
$township = $_POST['township'];
$type = $_POST['type'];
$nrcNumber = $_POST['nrcNumber'];
$nrc = $nrcCode . "/" . $township . $type . $nrcNumber;
$email = $_POST['email'];
$address = $_POST['email'];
$phone = $_POST['phone'];
$education = $_POST['edu'];

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
//     $payment_method
// );

// STEP 2
$classId = intval($_POST['classId']);
$classTime = $_POST['classTime'];

// STEP 3
$payment_method = $_POST['payment_method'];
$paid_percent = 0;

$insert_into_enrollments = "INSERT INTO enrollments (class_id,uname, dob, fname, nrc, email, education, address, phone, payment_method,paid_percent,created_at,
updated_at,is_pending) VALUES ($classId,'$uname','$dob','$fname','$nrc','$email','$education','$address','$phone','$payment_method',$paid_percent , now(), now(),1)";
mysqli_query($conn, $insert_into_enrollments);

$select_from_courses = "SELECT * FROM courses WHERE course_id = $classId";
$course_result = mysqli_query($conn, $select_from_courses);

$row = mysqli_fetch_assoc($course_result);
if ($row) {
    if ($payment_method === "Cash") {
        $afterTryingToSend = sendMail($email, $uname, $row, TRUE);
    } else {
        $afterTryingToSend = sendMail($email, $uname, $row, FALSE);
    }
}
if ($afterTryingToSend[0]) {
    header("location:javascript://history.go(-1)");
} else {
    echo "fail to send mail";
}

mysqli_close($conn);