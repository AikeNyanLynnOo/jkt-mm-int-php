<?php

// db config
include("../../admin/confs/config.php");

$catIdDel = $_POST["catIdDel"];

$delete_from_categories = "DELETE FROM categories WHERE category_id=$catIdDel";

mysqli_query($conn, $delete_from_categories);
header("location: ../frontend/categories.php");
