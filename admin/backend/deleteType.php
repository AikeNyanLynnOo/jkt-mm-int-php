<?php

// db config
include("../../admin/confs/config.php");

$typeIdDel = $_POST["typeIdDel"];

$delete_from_types = "DELETE FROM types WHERE type_id=$typeIdDel";

mysqli_query($conn, $delete_from_types);
header("location: ../frontend/types.php");
