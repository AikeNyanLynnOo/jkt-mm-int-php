<?php 
    if(isset($_COOKIE['adminName'])){
        $name = $_COOKIE['adminName'];
    } 
    
    if(isset($_SESSION['name'])) {
        $name = $_SESSION['name'];
    } else {
        header("location: ./login.php");
    }
?>