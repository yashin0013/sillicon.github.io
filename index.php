<?php 
    // include Header Here
    include 'partials/header.php'; 

    // include db 
    include 'partials/dbconnect.php'; 
    ?>

<!-- Start Video Background -->
<div class="container-fluid m-0 p-0">
    <div class="vid-parent">
        <video playsinline autoplay muted Loop>
            <source src="Video/banvid3.mp4">
        </video>
        <div class="vid-overlay"></div>
    </div>
    <div class="vid-content">
        <h1 class="my-content text-light">Welcome to <br> Silicon Valley Sr Sec School</h1>
        <span class="my-content text-light">Learn and Grow</span><br>
        <?php
            if (!isset($_SESSION['is_login'])) {
               echo '<a href="#" class="btn btn-primary mt-2" data-toggle="modal" data-target="#signupModal">Get Started </a>'; 
            }
            else {
                echo '<a href="Student/profile.php" class="btn btn-primary mt-2">My Profile</a>';
            }
            ?>

    </div>
</div>

<!-- End Video Background -->

<!-- Start Text Banner  -->

<div class="container-fluid btn-dark text-banner">
    <div class="row bottom-banner">
        <div class="col-sm">
            <h5><i class="fas fa-book-open mr-2"></i>100+ Online Courses </h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-users mr-2"></i>Expert Instructors</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-keyboard mr-2"></i>Lifetime Access</h5>
        </div>
        <div class="col-sm">
            <h5><i class="fas fa-rupee-sign mr-2"></i>Money Back Guarantee</h5>
        </div>
    </div>
</div>

<!-- End Text Banner  -->

<!-- Start Popular course -->
<Div class="container mt-3">
    <h1 class="text-center">Popular Courses</h1>
    <!-- 1st card Starts here  -->
    <div class="card-deck mt-4">
        <?php
        $sql = "SELECT * FROM courses LIMIT 3";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               $course_id = $row['course_id'];
               echo ' <a href="coursedetail.php?course_id='.$course_id.'" class="btn" style="text-align:left; padding: 0%; margin: 0%;">
               <div class="card">
                   <img src="'. str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Guitar">
                   <div class="card-body">
                       <h5 class="card-title">'. $row['course_name'] .'</h5>
                       <p class="card-text">'. $row['course_desc'] .'</p>
                   </div>
                   <div class="card-footer">
                       <p class="card-text d-inline">Price: <small><del>&#8377 '. $row['course_original_price'] .'</del></small><span
                               class="font-weight-bolder">&#8377 '. $row['course_price'] .' </span></p>
                       <a href="coursedetail.php?course_id='.$course_id.'" class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
                   </div>
               </div>
           </a>';
            }
        }
        ?>

    </div>
    <!-- 1st card ends here  -->

    <!-- 2nd card Starts here  -->
    <div class="card-deck mt-4">
        <?php
        $sql = "SELECT * FROM courses LIMIT 3, 3";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               $course_id = $row['course_id'];
               echo ' <a href="coursedetail.php?course_id='.$course_id.'" class="btn" style="text-align:left; padding: 0%; margin: 0%;">
               <div class="card">
                   <img src="'. str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Guitar">
                   <div class="card-body">
                       <h5 class="card-title">'. $row['course_name'] .'</h5>
                       <p class="card-text">'. $row['course_desc'] .'</p>
                   </div>
                   <div class="card-footer">
                       <p class="card-text d-inline">Price: <small><del>&#8377 '. $row['course_original_price'] .'</del></small><span
                               class="font-weight-bolder">&#8377 '. $row['course_price'] .' </span></p>
                       <a href="coursedetail.php?course_id='.$course_id.'" class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
                   </div>
               </div>
           </a>';
            }
        }
        ?>
    </div>
    <!-- 2nd card ends here  -->

    <div class="text-center m-2">
        <a href="courses.php" class="btn btn-danger btn-sm">View All Courses</a>
    </div>
</Div>
<!-- End Popular course -->

<!-- included Support/contact Section Here  -->
<?php include 'partials/support.php'; ?>


<!-- Feedback Start here -->

<div class="container-fluid mt-5 bg-dark"  id="feedback">
    <h1 class="text-center text-light p-2">Students Feedback</h1>
    <div class="testi-wrap">
        <div class="container">
            <div class="row">
                <div id="testimonial-slider" class="owl-carousel">
                    <?php  
							$sql2 = "SELECT stu_name, stu_occ, stu_img, f_content FROM student JOIN feedback ON 'stu_id' = 'stu_id'";
							$result2 = $conn->query($sql2);
							if ($result2->num_rows > 0) {
								while ($row2 = $result2->fetch_assoc()) {
									$stu_img = $row2['stu_img'];
									$n_img = str_replace('..', '.', $stu_img);?>
                    <div class="testi-in">
                        <div class="testi-in-content">
                            <p><?php echo $row2['f_content'];?></p>
                        </div>
                        <div class="testi-in-image">
                            <img src="<?php echo $n_img; ?>" alt="">
                            <h2><?php echo $row2['stu_name']; ?>
                                <br>
                                <span><?php echo $row2['stu_occ'];?></span>
                            </h2>
                        </div>
                    </div>
                    <?php	}
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $("#testimonial-slider").owlCarousel({
        items: 3,
        navigation: false,
        pagination: true,
        autoPlay: true
    });
});
</script>

<!-- Feedback End here -->

<!-- Social Follow Start Here  -->
<div class="container-fluid bg-danger">
    <div class="row text-white text-center p-1">
        <div class="col-sm">
            <a href="#" class="text-white social-hover"><i class="fab fa-facebook-f"></i> Facebook</a>
        </div>
        <div class="col-sm">
            <a href="#" class="text-white social-hover"><i class="fab fa-twitter"></i> Twitter</a>
        </div>
        <div class="col-sm">
            <a href="#" class="text-white social-hover"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        </div>
        <div class="col-sm">
            <a href="#" class="text-white social-hover"><i class="fab fa-instagram"></i> Intagram</a>
        </div>
    </div>
</div>
<!-- Social Follow End Here  -->

<!-- Start About Section  -->
<div class="container-fluid bg-light p-4">
    <div class="container bg-light">
        <div class="row text-center">
            <div class="col-sm">
                <h5>About Us</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci officia iure excepturi minus
                    dolor ducimus, neque repudiandae totam perferendis, perspiciatis nobis tenetur placeat?</p>
            </div>
            <div class="col-sm">
                <h5>Category</h5>
                <a href="#" class="text-dark">Web Development</a><br>
                <a href="#" class="text-dark">Web Designing</a><br>
                <a href="#" class="text-dark">App Developer</a><br>
                <a href="#" class="text-dark">iOS Development</a><br>
                <a href="#" class="text-dark">Data Analysis</a><br>
            </div>
            <div class="col-sm">
                <h5>Support</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci officia iure excepturi minus
                    dolor ducimus, neque repudiandae totam perferendis, perspiciatis nobis tenetur placeat?</p>
            </div>
        </div>
    </div>
</div>
<!-- About Section End Here -->

<!-- include footer  -->
<?php 
    include 'partials/footer.php'; 
    ?>