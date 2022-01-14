<?php 
    include_once("../../admin/confs/config.php");

    if(isset($_POST['paymentSubmit'])) {
        $nrcNumber = $_POST['nrcNumber'];
        $ssExtension = pathinfo($_FILES["paymentImg"]["temp"], PATHINFO_EXTENSION);
        $paymentSS_name = "ss".$nrcNumber;
        $dst = "./paymentUploads/".$paymentSS_name.$ssExtension;
        if (move_uploaded_file($_FILES["paymentImg"]["temp"], $dst)) {
            $insert_sql = "INSERT INTO payments";
            mysqli_query($conn, $insert_into_enrollments);
        }
        header("location: ../frontend/index.html");
    }
?>