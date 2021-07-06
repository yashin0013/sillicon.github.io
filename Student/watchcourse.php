<?php
 if (!isset($_SESSION)) {
     session_start();
 }
 
 // Include Database 
 include '../partials/dbconnect.php'; 

 if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['loginemail'];
    
 } else {
    echo "<script> location.href='../index.php';</script>";
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
    <link rel="stylesheet" href="/ELearning/CSS/stustyle.css">

    <title>Watch Course</title>
</head>

<body>
    <div class="container-fluid bg-success p-2">
        <h3>Welcome to Silicon Valley</h3>
        <a href="mycourse.php" class="btn btn-danger">My Courses</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul class="nav flex-column" id="playlist">
                    <?php
        if (isset($_GET['course_id'])) {
            $course_id = $_GET['course_id'];
            $sql = "SELECT * FROM lessons WHERE course_id = '$course_id'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                   echo '<li class="nav-item border-bottom py-2" movieurl='.$row['lesson_link'].' style="cursor:pointer;"> '.$row['lesson_name'].'</li>';
                }
            }
        }
     ?>
                </ul>
            </div>
            <div class="col-sm-8">
                <video src="../JS/custom.js" id="videoarea" class="mt-5 w-75 ml-2" controls></video>
            </div>
        </div>
    </div>

          <!-- Boot Javascript and jQuery -->
          <script src="../JS/jQuery.js"></script>
          <script src="../JS/popper.min.js"></script>
      
          <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
              integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
              </script> -->
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
              integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
              </script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
              integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
              </script>
      <script src="../JS/custom.js"></script>
          <!-- Font awesome Javascript -->
          <script src="../JS/all.min.js"></script>
          
</body>

</html>