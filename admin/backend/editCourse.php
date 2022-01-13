<?php

// db config
include("../../admin/confs/config.php");

// $courseIdEdit = intval($_POST["courseIdEdit"]);
$courseIdEdit = intval($_POST["courseIdEdit"]);

$createdAt = strtotime($_POST["courseCreatedAt"]);
$courseCreatedAt = date('Y-m-d H:i:s', $createdAt);

$courseTitleEdit = $_POST["courseTitleEdit"];
$courseCategoryIdEdit = intval($_POST["courseCategoryIdEdit"]);
$courseTypeIdEdit = intval($_POST["courseTypeIdEdit"]);
$level_or_sub = $_POST["level_or_sub"];
$fee = intval($_POST["fee"]);
$discountPercent = intval($_POST["discountPercent"]);

$time = strtotime($_POST["startDate"]);
$startDate = date('Y-m-d H:i:s', $time);

$duration = intval($_POST["duration"]);
$startTime = $_POST["startTime"];
$endTime = $_POST["endTime"];

$days = $_POST["days"];
$arrObj = array("days" => $days, "sectionHour" => "$startTime~$endTime");
$sections = json_encode($arrObj);

$instructor = $_POST["instructor"];
$services = $_POST["services"];
$note = $_POST["note"];

// echo "id is" . $courseIdEdit . " ," . "<br>" .
//     "created at" . $courseCreatedAt . "," . "<br>" .
//     "title" . $courseTitleEdit . "," . "<br>" .
//     "category id" . $courseCategoryIdEdit . "," . "<br>" .
//     "type_id" . $courseTypeIdEdit . "," . "<br>" .
//     "level or sub" . $level_or_sub . "," . "<br>" .
//     "fee" . $fee . "," . "<br>" .
//     "discount percent" . $discountPercent . "," . "<br>" .
//     "start date " . $startDate . "," . "<br>" .
//     "duration" . $duration . "," . "<br>" .
//     "start time" . $startTime . "," . "<br>" .
//     "end time" . $endTime . "," . "<br>" .
//     "sections " . $sections . "," . "<br>" .

//     "instructor is" . $instructor . "," . "<br>" .
//     "services are " . $services . "," . "<br>" .
//     "note is " . $note;

// var_dump($courseIdEdit);
// echo "<br>";
// var_dump($courseTitleEdit);
// echo "<br>";
// var_dump($courseCategoryIdEdit);
// echo "<br>";
// var_dump($level_or_sub);
// echo "<br>";
// var_dump($fee);
// echo "<br>";
// var_dump($discountPercent);
// echo "<br>";
// var_dump($startDate);
// echo "<br>";
// var_dump($duration);
// echo "<br>";
// var_dump($startTime);
// echo "<br>";
// var_dump($endTime);
// echo "<br>";
// var_dump($sections);
// echo "<br>";
// var_dump($instructor);
// echo "<br>";
// var_dump($services);
// echo "<br>";
// var_dump($note);

$update_to_courses = "UPDATE courses SET
category_id=$courseCategoryIdEdit,
type_id=$courseTypeIdEdit,
title='$courseTitleEdit',
level_or_sub='$level_or_sub',
fee=$fee,
instructor='$instructor',
services='$services',
discount_percent=$discountPercent,
start_date='$startDate',
duration='$duration',
sections='$sections',
note='$note',
created_at='$courseCreatedAt',
updated_at=now()
WHERE course_id=$courseIdEdit";

mysqli_query($conn, $update_to_courses);
header("location: ../frontend/courses.php");
