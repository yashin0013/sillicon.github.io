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

    <title>Admin Dashboard</title>

</head>

<body>

    <!-- Top Navbar -->
    <nav class="navbar navbar-dark p-0 fixed-top shdow" style="background-color: #225470;">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminDashboard.php">Sillicon Valley <small
                class="text-white">Admin Area</small></a>
    </nav>

    <!-- Start Sidebar  -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="adminDashboard.php" class="nav-link">
                            <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="courses.php" class="nav-link">
                            <i class="fab fa-accessible-icon"></i>
                                Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lessons.php" class="nav-link">
                            <i class="fab fa-accessible-icon"></i>
                                Lessons
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="students.php" class="nav-link">
                            <i class="fas fa-users"></i>
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="sellReport.php" class="nav-link">
                            <i class="fas fa-table"></i>
                                Sell Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="aPaymentStatus.php" class="nav-link">
                            <i class="fas fa-table"></i>
                                Payment Status
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="feedback.php" class="nav-link">
                            <i class="fab fa-accessible-icon"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adminpasschange.php" class="nav-link">
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