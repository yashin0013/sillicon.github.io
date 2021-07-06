<?php
 if (!isset($_SESSION)) {
     session_start();
 }
 
 // Include Database 
 include '../partials/dbconnect.php'; 

 if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['loginemail'];
 }
if (isset($stuEmail)) {
    $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuEmail' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Font awesome Css  -->
    <link rel="stylesheet" href="CSS/all.min.css">

    <!-- Google font  -->
    <link href="https://fonts.googleapis.com/css2?family=Pangolin&display=swap" rel="stylesheet">

    <!-- Custom Css  -->
    <link rel="stylesheet" href="/ELearning/CSS/adminstyle.css">

    <title>Profile</title>

</head>

<body>

    <!-- Top Navbar -->
    <nav class="navbar navbar-dark p-0 fixed-top shdow" style="background-color: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../index.php">Sillicon Valley</a>
    </nav>

    <!-- Start Sidebar  -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                        <img class="img-thumbnail rounded-circle" src="<?php echo $stu_img; ?>" alt="Profile Picture">
                        </li>
                        <li class="nav-item">
                            <a href="profile.php" class="nav-link">
                            <i class="fas fa-user"></i>
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myCourse.php" class="nav-link">
                            <i class="fab fa-accessible-icon"></i>
                                My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="feedback.php" class="nav-link">
                            <i class="fab fa-accessible-icon"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="stupasschange.php" class="nav-link">
                            <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../partials/logout.php" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>