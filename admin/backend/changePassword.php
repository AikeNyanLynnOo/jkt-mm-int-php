<?php
    session_start();
    include_once '../auth/authenticate.php';
    include('../auth/hashFunc.php');
    include("../confs/config.php");
    $admin_query = "SELECT * FROM admins WHERE admin_id = $adminId";
    $admin_result = mysqli_query($conn, $admin_query);
    $admin_row = mysqli_fetch_assoc($admin_result);

    if(isset($_POST['changePswdSubmit'])) {
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        if($newPassword !== $confirmPassword) {
            $_SESSION['notEqual'] = "Two Passwords Are Not Equal! Please Try Again.";
            header("location: ../frontend/setting.php");
        }

        $getPsd = encrypt_decrypt("decrypt", $admin_row['password']);
        $hashPswd = encrypt_decrypt("encrypt", $newPassword);
        if($oldPassword === $getPsd) {
            $update_query = "UPDATE admins SET password = '$hashPswd' WHERE admin_id = '$adminId'";
            mysqli_query($conn, $update_query);
            header("location: ../frontend/setting.php");
        } else {
            $_SESSION['chgPswErr'] = "Invalid Password! Please Try Again.";
            echo "<script>
                window.onload = function() {
                    document.getElementById('password_change').className = 'show';
                };
            </script>";
            header("location: ../frontend/setting.php");
        }
    }
?>