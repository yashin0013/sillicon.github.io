<?php
 // include db 
 include 'partials/dbconnect.php'; 
 //   include header 
include 'partials/header.php'; ?>

<!-- Background image start here -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="img/books.jpg" alt="Courses" style="height: 500px; width: 100%; object-fit: cover; box-shadow: 10px;">
    </div>
</div>
<!-- image ends here  -->

<!-- main content start here  -->
<div class="container mt-3">
    <div class="row">
        <?php
    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];
        $_SESSION['course_id'] = $course_id;
        $sql = "SELECT * FROM courses WHERE course_id = '$course_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
            echo '  <div class="col-md-4">
            <img src="'. str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="Java">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">'. $row['course_name'] .'</h5>
                <p class="card-text">'. $row['course_desc'] .'</p>
                <p class="card-text">Duration '. $row['course_duration'] .'</p>
                <form action="checkout.php" method="Post">
                    <p class="card-text d-inline">Price: <small><del>&#8377 '. $row['course_original_price'] .'</del></small><span
                            class="font-weight-bolder">&#8377 '. $row['course_price'] .' </span></p>
                            <input type="hidden" name="id" value="'. $row['course_price'] .'">
                    <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right">Buy
                        Now</button>
                </form>
            </div>
        </div>';
        }
        ?>

    </div>
    <div class="container">
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Lesson No.</th>
                        <th scope="col">Lesson Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $course_id = $_GET['course_id'];
                    $sql = "SELECT * FROM lessons WHERE course_id = '$course_id'";
                    if ($result->num_rows > 0) {
                    $result = $conn->query($sql);
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        echo ' <tr>
                        <th scope="row">'. $i .'</th>
                        <td>'. $row['lesson_name'] .'</td>
                        </tr>';
                    }}

                ?>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- main content end here  -->

<!-- include footer  -->
<?php include 'partials/footer.php'; ?>