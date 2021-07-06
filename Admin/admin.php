<?php
if (!isset($_SESSION)) {
    session_start();
}
// Database connection 
include_once ('../partials/dbconnect.php');

// Student Login verification
if (!isset($_SESSION['admin_login'])) {
    
    if(isset($_POST['adminlogin']) && isset($_POST['adminloginemail']) && isset($_POST['adminloginpass'])) {
       $adminloginemail = $_POST['adminloginemail'];
       $adminloginpass = $_POST['adminloginpass'];

       $sql = "SELECT admin_email, admin_pass FROM admins WHERE `admin_email` = '". $adminloginemail ."' AND `admin_pass` = '". $adminloginpass ."' ";
       $result = mysqli_query($conn, $sql);
           $row = $result->num_rows;
           if ($row === 1) {
               $_SESSION['admin_login'] = true;
               $_SESSION['adminloginemail'] = $adminloginemail;
               echo json_encode($row);
           }
           else if ($row === 0) {
               echo json_encode($row);
           }
    }
   }
?>