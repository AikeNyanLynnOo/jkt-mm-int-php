<?php
 $dbhost = "127.0.0.1:3306";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "training";
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
 mysqli_select_db($conn, $dbname);
?>
