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
$email = $_POST['email'];
$address = "address"; // post value
$phone = $_POST['phone'];
$education = $_POST['edu'];


// STEP 2
$classId = $_POST['classId'];
$classTime = $_POST['classTime'];

// STEP 3
$bank = $_POST['bank'];


// echo ($photo .
//     $uname .
//     $fname .
//     $nrcCode .
//     $township .
//     $type .
//     $nrcNumber .
//     $email .
//     $phone .
//     $edu .
//     $classId .
//     $classTime .
//     $bank
// );

// $sql = "INSERT INTO enrollments (cid, uname, dob, fname, nrc, email, education, address, phone, payment_bank, created_at
//  updated_at, is_pending) VALUES ('$classId','$uname','$dob','$fname','$nrcNumber','$email','$education','$address','$phone','$bank' ,now(), now(), 1)";
// mysqli_query($conn, $sql);
$sql = "INSERT INTO types (title, created_at,
 updated_at) VALUES ('$nrcCode/$township$nrcNumber', now(), now())";
mysqli_query($conn, $sql);
header("location: success.php");
