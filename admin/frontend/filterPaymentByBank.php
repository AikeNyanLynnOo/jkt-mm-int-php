<?php
    header('Content-Type: application/json');

    include("../confs/config.php");
    
    // $sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";
    $selectedValue = $_POST["selectedValue"];

    switch ($selectedValue) {
        case "AYA": {
                    $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, p.created_at AS created_at 
                    FROM payments p, enrollments e, courses c, banking_info b WHERE p.enrollment_id = e.enrollment_id 
                    AND p.course_id = c.course_id AND p.bank_id = b.bank_id AND b.bank_name = 'AYA' ORDER BY p.created_at DESC;
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
        case "KBZ": {
                $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, p.created_at AS created_at 
                FROM payments p, enrollments e, courses c, banking_info b WHERE p.enrollment_id = e.enrollment_id 
                AND p.course_id = c.course_id AND p.bank_id = b.bank_id AND b.bank_name = 'KBZ' ORDER BY p.created_at DESC;
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
        case "CB": {
                $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, p.created_at AS created_at 
                FROM payments p, enrollments e, courses c, banking_info b WHERE p.enrollment_id = e.enrollment_id 
                AND p.course_id = c.course_id AND p.bank_id = b.bank_id AND b.bank_name = 'CB' ORDER BY p.created_at DESC;
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
        case "UAB": {
                $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, p.created_at AS created_at 
                FROM payments p, enrollments e, courses c, banking_info b WHERE p.enrollment_id = e.enrollment_id 
                AND p.course_id = c.course_id AND p.bank_id = b.bank_id AND b.bank_name = 'UAB' ORDER BY p.created_at DESC;
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
        case "Shwe Bank": {
                $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, p.created_at AS created_at 
                FROM payments p, enrollments e, courses c, banking_info b WHERE p.enrollment_id = e.enrollment_id 
                AND p.course_id = c.course_id AND p.bank_id = b.bank_id AND b.bank_name = 'Shwe Bank' ORDER BY p.created_at DESC;
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
        case "A Bank": {
                $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, p.created_at AS created_at 
                FROM payments p, enrollments e, courses c, banking_info b WHERE p.enrollment_id = e.enrollment_id 
                AND p.course_id = c.course_id AND p.bank_id = b.bank_id AND b.bank_name = 'A Bank' ORDER BY p.created_at DESC;
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
        case "AYA Pay": {
                $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, p.created_at AS created_at 
                FROM payments p, enrollments e, courses c, banking_info b WHERE p.enrollment_id = e.enrollment_id 
                AND p.course_id = c.course_id AND p.bank_id = b.bank_id AND b.bank_name = 'AYA Pay' ORDER BY p.created_at DESC;
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
        case "KBZ Pay": {
                $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, p.created_at AS created_at 
                FROM payments p, enrollments e, courses c, banking_info b WHERE p.enrollment_id = e.enrollment_id 
                AND p.course_id = c.course_id AND p.bank_id = b.bank_id AND b.bank_name = 'KBZ Pay' ORDER BY p.created_at DESC;
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
        case "CB Pay": {
                $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, p.created_at AS created_at 
                FROM payments p, enrollments e, courses c, banking_info b WHERE p.enrollment_id = e.enrollment_id 
                AND p.course_id = c.course_id AND p.bank_id = b.bank_id AND b.bank_name = 'CB Pay' ORDER BY p.created_at DESC;
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
        case "Wave Money": {
                $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, p.created_at AS created_at 
                FROM payments p, enrollments e, courses c, banking_info b WHERE p.enrollment_id = e.enrollment_id 
                AND p.course_id = c.course_id AND p.bank_id = b.bank_id AND b.bank_name = 'Wave Money' ORDER BY p.created_at DESC;
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
        default: {
                    $sqlQuery = "SELECT payment_id, uname, title, level_or_sub, bank_name, payment_amount, p.created_at AS created_at 
                                FROM payments p, enrollments e, courses c, banking_info b WHERE p.enrollment_id = e.enrollment_id 
                                AND p.course_id = c.course_id AND p.bank_id = b.bank_id ORDER BY p.created_at DESC;
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