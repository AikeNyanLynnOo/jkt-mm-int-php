<?php
    session_start();
    include_once("../confs/config.php");
    // echo '<h1> User is authenticated </h1>';
    if(isset($_POST['login'])) {
        $email = $_POST['adminEmail'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM admins WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['admin_name'];
        if($row['email'] === $email) {
            if($row['password'] === $password){
                $_SESSION['name'] = $name;
                $_SESSION['adminId'] = $row['admin_id'];
                if( ($_POST['remember_me']==1) || ($_POST['remember_me']=='on')) {
                    $hour = time()+3600 *24 * 30;
                    setcookie('adminId', $row['admin_id'], $hour);
                    setcookie('adminName', $name, $hour);
                    // setcookie('active', 1, $hour);
                }
                header("location: ../frontend/index.php");
            } else {
                $_SESSION['pswErr'] = "Invalid Password! Please Try Again.";
                header("location: ../frontend/login.php");
            }
        } else {
            $_SESSION['emailErr'] = "Invalid Email! Please Try Again.";
            header("location: ../frontend/login.php");
        }
    }
?>