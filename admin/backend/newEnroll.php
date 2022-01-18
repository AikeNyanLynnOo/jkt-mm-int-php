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
echo ($courseId . "," .
    $uname . "," .
    $dob . "," .
    $fname . "," .
    $nrcCode . "," .
    $township . "," .
    $type . "," .
    $nrcNumber . "," .
    $email . "," .
    $phone . "," .
    $education . "," .
    $payment_method . "," .
    $paidPercent . "," .
    $isPending
);

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

$allowed_image_extension = array(
    "png",
    "PNG",
    "jpg",
    "JPG",
    "jpeg",
    "JPEG"
);

if ($org_width > "300" || $org_height > "300") {
    if (file_exists("../../user/backend/uploads/$nrcNumber.$file_extension")) unlink("../../user/backend/uploads/$nrcNumber.$file_extension");
    $target = "uploads/" . "$nrcNumber.$file_extension";
    move_uploaded_file($_FILES['photo']['tmp_name'], "../../user/backend/" . $target);

    if (resize_image("../../user/backend/".$target, $file_extension, 300)) {
        echo "resized";
        // continue to insert to db cuz image upload succeed.
        $check_student_if_exist = "SELECT * FROM students WHERE nrc='$nrc'";
        $stu_result = mysqli_query($conn, $check_student_if_exist);
        $stu_row = mysqli_fetch_assoc($stu_result);
        $update_student_if_exist = "UPDATE students SET 
            student_name='$uname',
            dob='$dob',
            fname='$fname',
            email='$email',
            phone='$education',
            address='$address',
            photo='$target',
            updated_at=now()
            WHERE nrc='$nrc'";

        $lastInsertedsid = null;

        if ($stu_row == null) {
            $insert_into_students = "INSERT INTO students (
                student_name,
                dob, 
                fname, 
                nrc, 
                email, 
                phone, 
                education, 
                address, 
                photo,
                created_at,
                updated_at) 
                VALUES (
                '$uname',
                '$dob',
                '$fname',
                '$nrc',
                '$email',
                '$phone',
                '$education',
                '$address',
                '$target',
                now(), 
                now())";

            mysqli_query($conn, $insert_into_students);
            $lastInsertedsid = $conn->insert_id;

            $insert_into_enrollments = "INSERT INTO enrollments (
                course_id,
                student_id,
                payment_method,
                paid_percent,
                created_at,
                updated_at,
                is_pending) 
                VALUES (
                    $courseId,
                $lastInsertedsid,
                '$payment_method',
                0 , 
                now(), 
                now(),
                1)";
            mysqli_query($conn, $insert_into_enrollments);
            $lastInserted = $conn->insert_id;
        } else {
            mysqli_query($conn, $update_student_if_exist);
            $getsid = "SELECT * FROM students WHERE nrc='$nrc'";
            $getsid_result = mysqli_query($conn, $getsid);
            $getsid_row = mysqli_fetch_assoc($getsid_result);
            $updated_id = $getsid_row["student_id"];
            $insert_into_enrollments = "INSERT INTO enrollments (
                course_id,
                student_id,
                payment_method,
                paid_percent,
                created_at,
                updated_at,
                is_pending) 
                VALUES (
                $courseId,
                $updated_id,
                '$payment_method',
                0 , 
                now(), 
                now(),
                1)";
            mysqli_query($conn, $insert_into_enrollments);
            $lastInserted = $conn->insert_id;
        }
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
                    var_dump($afterTryingToSend);
                } else {
                    var_dump($afterTryingToSend);
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
        echo "resize fail";
    }
} else {
    if (file_exists("../../user/backend/uploads/$nrcNumber.$file_extension")) unlink("../../user/backend/uploads/$nrcNumber.$file_extension");
    $target = "uploads/" . "$nrcNumber.$file_extension";
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], "../../user/backend/" . $target)) {
        // continue to insert to db cuz image upload succeed.
        $check_student_if_exist = "SELECT * FROM students WHERE nrc='$nrc'";
        $stu_result = mysqli_query($conn, $check_student_if_exist);
        $stu_row = mysqli_fetch_assoc($stu_result);
        $update_student_if_exist = "UPDATE students SET 
            student_name='$uname',
            dob='$dob',
            fname='$fname',
            email='$email',
            phone='$education',
            address='$address',
            photo='$target',
            updated_at=now()
            WHERE nrc='$nrc'";

        $lastInsertedsid = null;

        if ($stu_row == null) {
            $insert_into_students = "INSERT INTO students (
                student_name,
                dob, 
                fname, 
                nrc, 
                email, 
                phone, 
                education, 
                address, 
                photo,
                created_at,
                updated_at) 
                VALUES (
                '$uname',
                '$dob',
                '$fname',
                '$nrc',
                '$email',
                '$phone',
                '$education',
                '$address',
                '$target',
                now(), 
                now())";

            mysqli_query($conn, $insert_into_students);
            $lastInsertedsid = $conn->insert_id;

            $insert_into_enrollments = "INSERT INTO enrollments (
                course_id,
                student_id,
                payment_method,
                paid_percent,
                created_at,
                updated_at,
                is_pending) 
                VALUES (
                $courseId,
                $lastInsertedsid,
                '$payment_method',
                0 , 
                now(), 
                now(),
                1)";
            mysqli_query($conn, $insert_into_enrollments);
            $lastInserted = $conn->insert_id;
        } else {
            mysqli_query($conn, $update_student_if_exist);
            $getsid = "SELECT * FROM students WHERE nrc='$nrc'";
            $getsid_result = mysqli_query($conn, $getsid);
            $getsid_row = mysqli_fetch_assoc($getsid_result);
            $updated_id = $getsid_row["student_id"];
            $insert_into_enrollments = "INSERT INTO enrollments (
                course_id,
                student_id,
                payment_method,
                paid_percent,
                created_at,
                updated_at,
                is_pending) 
                VALUES (
                $courseId,
                $updated_id,
                '$payment_method',
                0 , 
                now(), 
                now(),
                1)";
            echo $insert_into_enrollments;
            mysqli_query($conn, $insert_into_enrollments);
            $lastInserted = $conn->insert_id;
        }

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
                    var_dump($afterTryingToSend);
                } else {
                    $afterTryingToSend = sendMail($email, $uname, $row, $lastInserted, FALSE);
                    var_dump($afterTryingToSend);
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
