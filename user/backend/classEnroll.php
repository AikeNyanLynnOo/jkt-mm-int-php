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
$src = $_POST["src"];
$photo = $_FILES['photo'];
$uname = $_POST['uname'];
$dob = $_POST['dob'];
$fname = $_POST['fname'];
$nrcCode = $_POST['nrcCode'];
$township = $_POST['township'];
$type = $_POST['type'];
$nrcNumber = $_POST['nrcNumber'];
$nrc = $nrcCode . "/" . $township . $type . $nrcNumber;
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$education = $_POST['edu'];

$classId = intval($_POST['courseId']);
// $classTime = $_POST['classTime'];

// STEP 3
$payment_method = $_POST['payment_method'];
$paid_percent = 0;

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


// Get Image Dimension
$fileinfo = @getimagesize($_FILES["photo"]["tmp_name"]);
$width = $fileinfo[0];
$height = $fileinfo[1];

$allowed_image_extension = array(
    "png",
    "jpg",
    "jpeg"
);

// Get image file extension
$file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
session_start();
if (!in_array($file_extension, $allowed_image_extension)) {
    $response = array(
        "type" => "error",
        "message" => "Upload valiid images. Only JPG, PNG and JPEG are allowed.",
        "data" => $_POST,
    );
}    // Validate image file size
else if (($_FILES["photo"]["size"] > 2000000)) {
    $response = array(
        "type" => "error",
        "message" => "Image size exceeds 2MB",
        "data" => $_POST,
    );
}    // Validate image file dimension
else if ($width > "300" || $height > "300") {
    $response = array(
        "type" => "error",
        "message" => "Image dimension should be within 300X300",
        "data" => $_POST,
    );
} else {
    if(file_exists("uploads/$nrcNumber.$file_extension")) unlink("uploads/$nrcNumber.$file_extension");
    $target = "uploads/" . "$nrcNumber.$file_extension";
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target)) {
        // continue to insert to db cuz image upload succeed.
        $insert_into_enrollments = "INSERT INTO enrollments (
            class_id,
            uname, 
            dob, 
            fname, 
            nrc, 
            email, 
            education, 
            address, 
            phone, 
            payment_method,
            paid_percent,
            photo,
            created_at,
            updated_at,
            is_pending) 
            VALUES (
            $classId,
            '$uname',
            '$dob',
            '$fname',
            '$nrc',
            '$email',
            '$education',
            '$address',
            '$phone',
            '$payment_method',
            $paid_percent , 
            '$target',
            now(), 
            now(),
            1)";
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
            unset($_SESSION['response']); 
            header("location: ../frontend/enrollSuccess.php");
            exit();
        } else {
            echo "fail to send mail";
        }
    } else {
        $response = array(
            "type" => "error",
            "message" => "Problem in uploading image files.",
            "data" => $_POST,
        );
    }
}
$_SESSION['response'] = $response;
header("location: ../frontend/classEnroll.php");

mysqli_close($conn);
