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
    <link rel="stylesheet" href="CSS/style.css">

    <!-- Testimonial -->
    <link href="CSS/test.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css"
        crossorigin="anonymous" />
		<script src="https://code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" crossorigin="anonymous">
    </script>
    <title>Silicon Valley</title>

</head>

<body>
    
    <!-- Star Navigation -->

    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">Silicon Valley</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav custom-nav pl-5">
                <li class="nav-item active custom-nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class="nav-link" href="courses.php">Courses</a>
                </li>
                
                <li class="nav-item custom-nav-item">
                    <a class="nav-link" href="paymentstatus.php">Payment Status</a>
                </li>
    <?php
        session_start();
        if (isset($_SESSION['is_login'])) {
            echo ' <li class="nav-item custom-nav-item">
                <a class="nav-link" href="Student/profile.php">My Profile</a>
                </li>
                <li class="nav-item custom-nav-item">
                <a class="nav-link " href="partials/logout.php">Log Out</a>
                 </li> ';
        }
        else {
            echo ' <li class="nav-item custom-nav-item">
                 <a class="nav-link " href="#" data-toggle="modal" data-target="#loginModal">Log In</a>
                 </li>
                <li class="nav-item custom-nav-item">
                    <a class="nav-link " href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a>
                </li> ';
        }
        ?>
                
                
                <li class="nav-item custom-nav-item">
                    <a class="nav-link " href="#">Feedback</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class="nav-link " href="#">Support</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- End Navigation -->
    <?php include 'signupmodal.php'; ?>
    <?php include 'loginmodal.php'; ?>