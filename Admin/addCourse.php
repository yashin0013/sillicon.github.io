
<?php 
 if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['admin_login'])) {
    echo "<script> location.href='../index.php';</script>";
 }
// <!-- Includer header  -->
    include 'adminHeader.php'; 
    // Include Database 
    include '../partials/dbconnect.php'; 


    if (isset($_REQUEST['courseSubmitBtn'])) {
        if (($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_price'] == "")) {
            $msg = '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please Fill all Details.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else {
            $course_name = $_REQUEST['course_name'];
            $course_desc = $_REQUEST['course_desc'];
            $course_author = $_REQUEST['course_author'];
            $course_duration = $_REQUEST['course_duration'];
            $course_original_price = $_REQUEST['course_original_price'];
            $course_price = $_REQUEST['course_price'];

            $course_img = $_FILES['course_img']['name'];
            $course_img_temp = $_FILES['course_img']['tmp_name'];
            $img_folder = '../img/courseimg/'.$course_img;
            move_uploaded_file($course_img_temp, $img_folder);

            $sql = "INSERT INTO `courses` (`course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`, `course_price`, `course_original_price`) VALUES ('$course_name', '$course_desc', '$course_author', '$img_folder', '$course_duration', '$course_price', '$course_original_price')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $msg = '<div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Course Added Successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            }
        }
    }
?>

<div class="col-sm-6 mt-5 ml-5 px-5 py-3 jumbotron">
<?php if (isset($msg)) {
            echo $msg;
        } ?>
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" name="course_name" id="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea type="text" class="form-control" name="course_desc" id="course_desc" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" name="course_author" id="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" name="course_duration" id="course_duration">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" name="course_original_price" id="course_original_price">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" name="course_price" id="course_price">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <input type="file" class="form-control-file" name="course_img" id="course_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">
                Submit
            </button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        
    </form>
</div>

<!-- Includer header  -->
<?php include 'adminFooter.php'; ?>