<?php

// db config
include("../../admin/confs/config.php");

$enrollmentDeletingId = $_POST["enrollmentDeletingId"];

$delete_from_enrollments = "DELETE FROM enrollments WHERE enrollment_id=$enrollmentDeletingId";

mysqli_query($conn,$delete_from_enrollments);
header("location: ../frontend/enrollments.php");
