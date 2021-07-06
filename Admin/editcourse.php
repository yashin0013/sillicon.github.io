
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

    // Update
    if (isset($_REQUEST['reqUpdate'])) {
        if (($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_original_price'] == "") || ($_REQUEST['course_price'] == "")) {
            $msg = '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please Fill all Details.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else {
            $id = $_REQUEST['course_id'];
            $course_name = $_REQUEST['course_name'];
            $course_desc = $_REQUEST['course_desc'];
            $course_author = $_REQUEST['course_author'];
            $course_duration = $_REQUEST['course_duration'];
            $course_original_price = $_REQUEST['course_original_price'];
            $course_price = $_REQUEST['course_price'];

            $course_img = $_FILES['course_img']['name'];
            $img_folder = '../img/courseimg/'.$course_img;

            $sql = "UPDATE `courses` SET `course_name` = '$course_name', `course_desc` = '$course_desc', `course_author` = '$course_author', `course_img` = '$img_folder', `course_duration` = '$course_duration', `course_price` = '$course_price', `course_original_price` = '$course_original_price' WHERE course_id = '$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $msg = '<div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Course Updated Successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            }
        }
    }
?>

<div class="col-sm-6 mt-5 ml-5 px-5 py-3 jumbotron">

<!-- Alert -->
<?php if (isset($msg)) {
            echo $msg;
        } ?>
    <h3 class="text-center">Update Course Details</h3>

        <!-- Select Query -->
    <?php
    if (isset($_REQUEST['edit'])) {
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM `courses` WHERE `course_id` = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course ID</label>
            <input type="text" class="form-control" readonly name="course_id" id="course_id" value="<?php if(isset($row['course_id'])) {
               echo $row['course_id'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" name="course_name" id="course_name" value="<?php if(isset($row['course_name'])) {
               echo $row['course_name'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea type="text" class="form-control" name="course_desc" id="course_desc" rows="2"><?php if(isset($row['course_desc'])) {
               echo $row['course_desc'];
            } ?></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" class="form-control" name="course_author" id="course_author" value="<?php if(isset($row['course_author'])) {
               echo $row['course_author'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" name="course_duration" id="course_duration" value="<?php if(isset($row['course_duration'])) {
               echo $row['course_duration'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" name="course_original_price" id="course_original_price" value="<?php if(isset($row['course_original_price'])) {
               echo $row['course_original_price'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" name="course_price" id="course_price" value="<?php if(isset($row['course_price'])) {
               echo $row['course_price'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <img src="<?php if(isset($row['course_img'])) {
               echo $row['course_img'];
            }  ?>" alt="" class="img-thumbnail">
            <input type="file" class="form-control-file" name="course_img" id="course_img" >
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="reqUpdate" name="reqUpdate">
                Update
            </button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        
    </form>
</div>

<!-- Includer footer  -->
<?php include 'adminFooter.php'; ?>