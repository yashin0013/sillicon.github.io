<?php
  // include db 
  include 'partials/dbconnect.php'; 
//   include header 
 include 'partials/header.php';
 
 ?>

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="img/books.jpg" alt="Courses" style="height: 500px; width: 100%; object-fit: cover; box-shadow: 10px;">
    </div>
</div>


<!-- Start Popular course -->
<Div class="container mt-3">
    <h1 class="text-center">All Courses</h1>
   <div class="row mt-1">
   <?php
        $sql = "SELECT * FROM courses " ;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               $course_id = $row['course_id'];
               echo '<div class="col-sm-4 mb-4">
                        <a href="coursedetail.php?course_id='.$course_id.'" class="btn" style="text-align:left; padding: 0%; margin: 0%;">
                            <div class="card">
                            <img src="'. str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Guitar">
                            <div class="card-body">
                                <h5 class="card-title">'. $row['course_name'] .'</h5>
                                <p class="card-text">'. $row['course_desc'] .'</p>
                            </div>
                            <div class="card-footer">
                                <p class="card-text d-inline">Price: <small><del>&#8377 '. $row['course_original_price'] .'</del></small><span
                                        class="font-weight-bolder">&#8377 '. $row['course_price'] .' </span></p>
                                <a href="coursedetail.php?course_id='.$course_id.'"
                                    class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
                            </div>
                       </div>
                          </a>
               </div>';
            }
        }
        ?>
       
   </div>
  
</Div>
<!-- End Popular course -->

<!-- include footer  -->
<?php include 'partials/footer.php'; ?>