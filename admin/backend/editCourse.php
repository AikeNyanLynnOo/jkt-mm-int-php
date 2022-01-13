<?php

// db config
include("../../admin/confs/config.php");

$courseIdEdit = intval($_POST["courseIdEdit"]);
$courseCreatedAt = $_POST["courseCreatedAt"];
$courseTitleEdit = $_POST["courseTitleEdit"];
$courseCategoryIdEdit = $_POST["courseCategoryIdEdit"];
$courseTypeIdEdit = $_POST["courseTypeIdEdit"];
$level_or_sub = $_POST["level_or_sub"];
$fee = $_POST["fee"];
$discountPercent = $_POST["discountPercent"];

$startDate = date('Y-m-d',  strtotime($_POST["startDate"]));

$duration = $_POST["duration"];
$startTime = $_POST["startTime"];
$endTime = $_POST["endTime"];

$days = $_POST["days"];
$arrObj = array("days" => $days, "sectionHour" => "$startTime~$endTime");
$sections = json_encode($arrObj);

$instructor = $_POST["instructor"];
$services = $_POST["services"];
$note = $_POST["note"];

echo $courseIdEdit . "," .
    $courseCreatedAt . "," .
    $courseTitleEdit . "," .
    $courseCategoryIdEdit . "," .
    $courseTypeIdEdit . "," .
    $level_or_sub . "," .
    $fee . "," .
    $discountPercent . "," .
    $startDate . "," .
    $duration . "," .
    $startTime . "," .
    $endTime . "," .
    $sections . "," .

    $instructor . "," .
    $services . "," .
    $note;

var_dump($days);
$update_to_courses = "UPDATE courses SET 
category_id=$courseCategoryIdEdit,
type_id=$courseTypeIdEdit,
title='$courseTitleEdit',
level_or_sub='$level_or_sub',
fee=$fee,
instructor='$instructor',
services='$services',
discount_percent=$discountPercent,
start_date=$startDate,
duration='$duration',
sections='$sections',
note='$note',
created_at=$courseCreatedAt,
updated_at=now()
WHERE course_id=$courseIdEdit";

mysqli_query($conn, $update_to_courses);
// header("location: ../frontend/courses.php");
