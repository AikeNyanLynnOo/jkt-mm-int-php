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
$edu = $_POST['edu'];


// STEP 2
$className = $_POST['className']; 
$classTime = $_POST['classTime']; 

// STEP 3
$bank = $_POST['bank']; 

// $sql = "INSERT INTO students (title, created_at,
//  updated_at) VALUES ('$title', now(), now())";
// mysqli_query($conn, $sql);
// header("location: type-list.php");

echo ($photo .
$uname.
$fname.
$nrcCode.  
$township. 
$type.
$nrcNumber.
$email.
$phone. 
$edu.
$className.
$classTime.
$bank
);

