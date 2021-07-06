<?php
if (!isset($_SESSION)) {
    session_start();
}
// Database connection 
include_once ('../partials/dbconnect.php');

// checking email already registered
if (isset($_POST['checkmail']) && isset($_POST['stuemail'])) {
    $stuemail = $_POST['stuemail'];
    $sql = "SELECT stu_email FROM student WHERE `stu_email` = '". $stuemail ."'";
    $result = mysqli_query($conn, $sql);
    $row = $result->num_rows;
    echo json_encode($row);
}

// insert signup data into db for registration
if(isset($_POST['signup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass'])) {
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = $_POST['stupass'];

    $sql = "INSERT INTO `student` ( `stu_name`, `stu_email`, `stu_pass`) VALUES ('$stuname', '$stuemail', '$stupass')";
    $result = mysqli_query($conn, $sql);
    if ($result == true) {
        echo json_encode("OK");
    }
    else {
        echo json_encode("Failed");
    }
}

// Student Login verification
    if (!isset($_SESSION['is_login'])) {
    
     if(isset($_POST['login']) && isset($_POST['loginemail']) && isset($_POST['loginpass'])) {
        $loginemail = $_POST['loginemail'];
        $loginpass = $_POST['loginpass'];

        $sql = "SELECT stu_email, stu_pass FROM student WHERE `stu_email` = '". $loginemail ."' AND `stu_pass` = '". $loginpass ."'";
        $result = mysqli_query($conn, $sql);
            $row = $result->num_rows;
            if ($row === 1) {
                $_SESSION['is_login'] = true;
                $_SESSION['loginemail'] = $loginemail;
                echo json_encode($row);
            }
            else if ($row === 0) {
                echo json_encode($row);
            }
     }
    }
?>