<?php
    session_start();
    include_once '../auth/authenticate.php';
    include("../confs/config.php");
    $admin_query = "SELECT * FROM admins WHERE admin_id = $adminId";
    $admin_result = mysqli_query($conn, $admin_query);
    $admin_row = mysqli_fetch_assoc($admin_result);

    if(isset($_POST['changeSubmit1'])) {
        $newAdminName = $_POST['name'];
        $password = $_POST['password'];
        if($password === $admin_row['password']) {
            $_SESSION['name'] = $newAdminName;
            $update_query = "UPDATE admins SET admin_name = '$newAdminName' WHERE password = '$password'";
            mysqli_query($conn, $update_query);
            header("location: ../frontend/setting.php");
        }
    }
?>