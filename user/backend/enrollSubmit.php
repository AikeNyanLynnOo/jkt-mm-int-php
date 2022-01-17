<?php
include_once("../../admin/confs/config.php");

if (isset($_POST['paymentSubmit'])) {

    $enrollment_id = $_POST["enrollment_id"];
    $course_id = $_POST["course_id"];
    $bank_id = $_POST["bank_id"];
    $paymentAmount = $_POST["payment_amount"];
    $nrcNumber = $_POST['nrcNumber'];
    // get extension
    $ssExtension = pathinfo($_FILES["paymentImg"]["temp"], PATHINFO_EXTENSION);

    $paymentSS_name = "ss" . $enrollment_id;

    $dst = "./paymentUploads/" . $paymentSS_name . $ssExtension;

    if (move_uploaded_file($_FILES["paymentImg"]["temp"], $dst)) {
        $insert_into_payments = "INSERT INTO payments 
        (enrollment_id, course_id,bank_id,payment_amount, is_pending, created_at, updated_at) 
        VALUES ($enrollment_id, $course_id, $bank_id,$paymentAmount, 1, now(),now())";
        mysqli_query($conn, $insert_into_payments);
    }
    header("location: ../frontend/index.html");
}
