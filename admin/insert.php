<?php
// include('checkUser.php');
?>

<?php
include("confs/config.php");
$title = $_POST['title'];
$sql = "INSERT INTO types (title, created_at,
 updated_at) VALUES ('$title', now(), now())";
mysqli_query($conn, $sql);
header("location: type-list.php");
