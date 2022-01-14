<?php 
    header('Content-Type: application/json');
    include('../confs/config.php');
    
    // $sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";
    
    $selectedFilteredDate = $_POST["selectedFilteredDate"];
    
    switch ($selectedFilteredDate) {
        case "1": {
                $sqlQuery = "SELECT
            DATE_FORMAT(`created_at`, '%Y-%M') as `date`,
            COUNT(*) as `count`
            FROM `enrollments`
            WHERE `created_at` < Now() and `created_at` > DATE_ADD(Now(), INTERVAL- 7 DAY)
            GROUP BY DAY(`created_at`)
            ORDER BY `date` DESC
            ";
                $result = mysqli_query($conn, $sqlQuery);
                $data = array();
                foreach ($result as $row) {
                    $data[] = $row;
                }
                $firstEle = array_shift($data);
                $data[] = $firstEle;
            }
            break;
        case "2": {
                $sqlQuery = "SELECT
            DATE_FORMAT(`created_at`, '%Y-%M') as `date`,
            COUNT(*) as `count`
            FROM `enrollments`
            WHERE YEAR(created_at) = YEAR(CURDATE())
            GROUP BY MONTH(`created_at`)
            ORDER BY `date` ASC
            ";
                $result = mysqli_query($conn, $sqlQuery);
                $data = array();
                foreach ($result as $row) {
                    $data[] = $row;
                }
            }
            break;
        default: {
                $sqlQuery = "SELECT
            DATE_FORMAT(`created_at`, '%M-%d') as `date`,
            COUNT(*) as `count`
            FROM `enrollments`
            WHERE MONTH(created_at) = MONTH(CURDATE())
            GROUP BY MONTH(`created_at`)
            ORDER BY `date` ASC
            ";
    
                $result = mysqli_query($conn, $sqlQuery);
                $data = array();
                foreach ($result as $row) {
                    $data[] = $row;
                }
            }
    }
    echo $data;
?>