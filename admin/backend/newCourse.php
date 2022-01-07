<?php
// include('checkUser.php');

include("../confs/config.php");
foreach ($_POST as $field => $val) {
    echo $field . " is " . var_dump($val) . "<br>";
}

$categoryId = $_POST["categoryId"];
$typeId = intval($_POST["typeId"]);
$title = $_POST["title"];
$levelorsub = $_POST["levelorsub"];
$fee = intval($_POST["fee"]);
$instructor = $_POST["instructor"];
$services = $_POST["services"];
$discountPercent = intval($_POST["discountPercent"]);

// date format change
$time = strtotime($_POST["startDate"]);
$startDate = date('Y-m-d', $time);

$days = $_POST["days"];
$startTime = $_POST["startTime"];
$endTime = $_POST["endTime"];
$duration = intval($_POST["duration"]);

// section json obj change
$arrObj = array("days" => $days, "sectionHour" => "$startTime ~ $endTime");
$sections = json_encode($arrObj);

$note = $_POST["note"];
$sql = "INSERT INTO courses (category_id,type_id,title ,levelorsub,fee,instructor,services,discount_percent,start_date,duration,sections,note, created_at,
 updated_at) VALUES ($categoryId,$typeId,'$title','$levelorsub',$fee,'$instructor','$services',$discountPercent,$startDate,$duration,'$sections', '$note' ,now(), now())";
// echo $sql;
mysqli_query($conn, $sql);
header("location: ../frontend/courses.php");
