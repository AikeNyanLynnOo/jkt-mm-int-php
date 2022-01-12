<?php

// db config
include("../../admin/confs/config.php");

// for mail
include("../mail/sendMail.php");

// STEP 1 

$photo = $_FILES['photo'];
$uname = $_POST['uname'];
$dob = $_POST['dob'];
$fname = $_POST['fname'];
$nrcCode = $_POST['nrcCode'];
$township = $_POST['township'];
$type = $_POST['type'];
$nrcNumber = $_POST['nrcNumber'];
$nrc = $nrcCode . "/" . $township . $type . $nrcNumber;
$email = isset($_POST['email']) ? $_POST['email'] : "";
$address = $_POST['address'];
$phone = $_POST['phone'];
$education = $_POST['education'];

$courseId = intval($_POST['classId']);
// $classTime = $_POST['classTime'];

// STEP 3
$payment_method = $_POST['paymentMethod'];
$paidPercent = intval($_POST['paidPercent']);
if (isset($_POST['isPending']) && $_POST["isPending"] == "on") {
    $isPending = 1;
} else {
    $isPending = 0;
}
// echo ($courseId .",".
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
//     $payment_method. ",".
//     $paidPercent.",".
//     $isPending
// );

function resize_image($file, $ext, $mHW)
{
    if (file_exists($file)) {
        switch ($ext) {
            case "jpeg":
                $original_image = imagecreatefromjpeg($file);
                break;
            case "JPEG":
                $original_image = imagecreatefromjpeg($file);
                break;
            case "jpg":
                $original_image = imagecreatefromjpeg($file);
                break;
            case "JPG":
                $original_image = imagecreatefromjpeg($file);
                break;
            case "png":
                $original_image = imagecreatefrompng($file);
                break;
            case "PNG":
                $original_image = imagecreatefrompng($file);
        }

        // resolution
        $original_width = imagesx($original_image);
        $original_height = imagesx($original_image);

        // try width first
        $ratio = $mHW / $original_width;
        $new_width = $mHW;
        $new_height = $original_height * $ratio;

        // if that doesn't work
        if ($new_height > $mHW) {
            $ratio = $mHW / $original_height;
            $new_height = $mHW;
            $new_width = $original_width * $ratio;
        }
        if ($original_image) {
            $new_image = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

            switch ($ext) {
                case "jpeg":
                    imagejpeg($new_image, $file, 90);
                    return TRUE;
                    break;
                case "JPEG":
                    imagejpeg($new_image, $file, 90);
                    return TRUE;
                    break;
                case "jpg":
                    imagejpeg($new_image, $file, 90);
                    return TRUE;
                    break;
                case "JPG":
                    imagejpeg($new_image, $file, 90);
                    return TRUE;
                    break;
                case "png":
                    imagepng($new_image, $file, 9);
                    return TRUE;
                    break;
                case "PNG":
                    imagepng($new_image, $file, 9);
                    return TRUE;
                    break;
            }
        }
    }
}

// Get Image Dimension
$fileinfo = @getimagesize($_FILES["photo"]["tmp_name"]);
$org_width = $fileinfo[0];
$org_height = $fileinfo[1];

$file_extension = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
$file = $_FILES['photo']['name'];

if ($org_width > "300" || $org_height > "300") {
    if (file_exists("../../user/backend/uploads/$nrcNumber.$file_extension")) unlink("../../user/backend/uploads/$nrcNumber.$file_extension");
    $target = "uploads/" . "$nrcNumber.$file_extension";
    move_uploaded_file($_FILES['photo']['tmp_name'], "../../user/backend/" . $target);

    if (resize_image($target, $file_extension, 300)) {
        // continue to insert to db cuz image upload succeed.
        $insert_into_enrollments = "INSERT INTO enrollments (
            course_id,
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
            $courseId,
            '$uname',
            '$dob',
            '$fname',
            '$nrc',
            '$email',
            '$education',
            '$address',
            '$phone',
            '$payment_method',
            $paidPercent , 
            '$target',
            now(), 
            now(),
            $isPending)";
        mysqli_query($conn, $insert_into_enrollments);
        $lastInserted = $conn->insert_id;

        $select_from_courses = "SELECT * FROM courses WHERE course_id = $courseId";
        $course_result = mysqli_query($conn, $select_from_courses);

        $row = mysqli_fetch_assoc($course_result);
        if ($email == "") {
            header("location: ../frontend/enrollments.php");
            exit();
        } else {
            if ($row) {
                if ($payment_method === "Cash") {
                    $afterTryingToSend = sendMail($email, $uname, $row, $lastInserted, TRUE);
                } else {
                    $afterTryingToSend = sendMail($email, $uname, $row, $lastInserted, FALSE);
                }
            }
        }
        if ($afterTryingToSend[0]) {
            header("location: ../frontend/enrollments.php");
            exit();
        } else {
            echo $afterTryingToSend[1];
            echo "fail to send mail";
        }
    } else {
        // $response = array(
        //     "type" => "error",
        //     "message" => "Problem in uploading image files.",
        //     "data" => $_POST,
        // );
    }
} else {
    if (file_exists("../../user/backend/uploads/$nrcNumber.$file_extension")) unlink("../../user/backend/uploads/$nrcNumber.$file_extension");
    $target = "uploads/" . "$nrcNumber.$file_extension";
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], "../../user/backend/" . $target)) {
        // continue to insert to db cuz image upload succeed.
        $insert_into_enrollments = "INSERT INTO enrollments (
            course_id,
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
            $courseId,
            '$uname',
            '$dob',
            '$fname',
            '$nrc',
            '$email',
            '$education',
            '$address',
            '$phone',
            '$payment_method',
            $paidPercent , 
            '$target',
            now(), 
            now(),
            $isPending)";
        mysqli_query($conn, $insert_into_enrollments);
        $lastInserted = $conn->insert_id;

        $select_from_courses = "SELECT * FROM courses WHERE course_id = $courseId";
        $course_result = mysqli_query($conn, $select_from_courses);

        $row = mysqli_fetch_assoc($course_result);
        if ($email == "") {
            header("location: ../frontend/enrollments.php");
            exit();
        } else {
            if ($row) {
                if ($payment_method === "Cash") {
                    $afterTryingToSend = sendMail($email, $uname, $row, $lastInserted, TRUE);
                } else {
                    $afterTryingToSend = sendMail($email, $uname, $row, $lastInserted, FALSE);
                }
            }
        }
        if ($afterTryingToSend[0]) {
            header("location: ../frontend/enrollments.php");
            exit();
        } else {
            echo $afterTryingToSend[1];
            echo "fail to send mail";
        }
    } else {
        // $response = array(
        //     "type" => "error",
        //     "message" => "Problem in uploading image files.",
        //     "data" => $_POST,
        // );
    }
}

mysqli_close($conn);
