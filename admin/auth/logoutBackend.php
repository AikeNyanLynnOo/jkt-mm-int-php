<?php 
    session_start();
    // unset($_SESSION[‘logged’]);
    unset($_SESSION['name']);
    // unset($_SESSION['valid_user'] );
    $hour = time() - 3600 * 24 * 30;
    setcookie('adminId', "", $hour);
    setcookie('adminName', "", $hour);
    // setcookie('active', "", $hour);
    header("Location: ../frontend/login.php");
?>