<?php
    header('Content-Type: application/json');

    include("../confs/config.php");
    
    // $sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";
    
    $selectedValue = $_POST["selectedValue"];
    
    switch ($selectedValue) {
        case "1": {
                    $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, 
                                p.created_at AS created_at FROM payments p, enrollments e, courses c, banking_info b 
                                WHERE p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                AND p.created_at > now() - INTERVAL 7 DAY ORDER BY p.created_at DESC;
                            ";
                            $result = mysqli_query($conn, $sqlQuery);
                            $data = array();
                            foreach ($result as $row) {
                                $data[] = $row;
                            }
                            $firstEle = array_shift($data);
                            $data[] = $firstEle;
                            // echo json_encode($data);
                }
            break;
        case "2": {
                    $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, 
                                p.created_at AS created_at FROM payments p, enrollments e, courses c, banking_info b 
                                WHERE p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                AND p.created_at > now() - INTERVAL 30 DAY ORDER BY p.created_at DESC;
                            ";
                        $result = mysqli_query($conn, $sqlQuery);
                        $data = array();
                        foreach ($result as $row) {
                            $data[] = $row;
                        }
                        $firstEle = array_shift($data);
                        $data[] = $firstEle;
                        // echo json_encode($data);
            }
            break;
        case "3": {
                    $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, 
                                p.created_at AS created_at FROM payments p, enrollments e, courses c, banking_info b 
                                WHERE p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                AND p.created_at > now() - INTERVAL 3 MONTH ORDER BY p.created_at DESC
                            ";
                        $result = mysqli_query($conn, $sqlQuery);
                        $data = array();
                        foreach ($result as $row) {
                            $data[] = $row;
                        }
                        $firstEle = array_shift($data);
                        $data[] = $firstEle;
                        // echo json_encode($data);
            }
            break;

        case "4": {
                    $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, 
                                p.created_at AS created_at FROM payments p, enrollments e, courses c, banking_info b 
                                WHERE p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                AND p.created_at > now() - INTERVAL 6 MONTH ORDER BY p.created_at DESC;
                    ";
                        $result = mysqli_query($conn, $sqlQuery);
                        $data = array();
                        foreach ($result as $row) {
                            $data[] = $row;
                        }
                        $firstEle = array_shift($data);
                        $data[] = $firstEle;
                        // echo json_encode($data);
            }
            break;
        default: {
                    $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, 
                                p.created_at AS created_at FROM payments p, enrollments e, courses c, banking_info b 
                                WHERE p.enrollment_id = e.enrollment_id AND p.course_id = c.course_id AND p.bank_id = b.bank_id 
                                ORDER BY p.created_at DESC;
                            ";
                        $result = mysqli_query($conn, $sqlQuery);
                        $data = array();
                        foreach ($result as $row) {
                            $data[] = $row;
                        }
                        $firstEle = array_shift($data);
                        $data[] = $firstEle;
                        
            }
    }
    echo json_encode($data);
?>