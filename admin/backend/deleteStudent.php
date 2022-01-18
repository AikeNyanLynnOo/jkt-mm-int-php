<?php

// db config
include("../../admin/confs/config.php");

$studentDeletingId = intval($_POST["studentDeletingId"]);

$delete_from_students = "DELETE FROM students WHERE student_id=$studentDeletingId";

mysqli_query($conn,$delete_from_students);
header("location: ../frontend/students.php");
?>