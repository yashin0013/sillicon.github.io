
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
        if (($_REQUEST['lesson_id'] == "") || ($_REQUEST['lesson_name'] == "") ||($_REQUEST['lesson_desc'] == "") ||  ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")) {
            $msg = '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please Fill all Details.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else {
            $id = $_REQUEST['lesson_id'];
            $lesson_name = $_REQUEST['lesson_name'];
            $lesson_desc = $_REQUEST['lesson_desc'];
            $course_id = $_REQUEST['course_id'];
            $course_name = $_REQUEST['course_name'];

            $l_vid = $_FILES['lesson_link']['name'];
            $llink = '../Video/lessonvid'.$l_vid;

            $sql = "UPDATE `lessons` SET `lesson_name` = '$lesson_name', `lesson_desc` = '$lesson_desc', `course_id` = '$course_id', `lesson_link` = '$llink' WHERE lesson_id = '$id'";
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
    <h3 class="text-center">Update Lesson Details</h3>

        <!-- Select Query -->
    <?php
    if (isset($_REQUEST['edit'])) {
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM `lessons` WHERE `lesson_id` = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lesson_id">Lesson ID</label>
            <input type="text" class="form-control" readonly name="lesson_id" id="lesson_id" value="<?php if(isset($row['lesson_id'])) {
               echo $row['lesson_id'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" name="lesson_name" id="lesson_name" value="<?php if(isset($row['lesson_name'])) {
               echo $row['lesson_name'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lessson Description</label>
            <textarea type="text" class="form-control" name="lesson_desc" id="lesson_desc" rows="2"><?php if(isset($row['lesson_desc'])) {
               echo $row['lesson_desc'];
            } ?></textarea>
        </div>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" name="course_id" id="course_id" value="<?php if(isset($row['course_id'])) {
               echo $row['course_id'];
            } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" readonly name="course_name" id="course_name" value="<?php if(isset($row['course_name'])) {
               echo $row['course_name'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Link</label>
            <div class="embed-responsive embed-responsive-16by9">
            <iframe src="<?php if(isset($row['lesson_link'])) {
               echo $row['lesson_link'];
            } ?>" allowfullscren class="embed-responsive-item"></iframe></div>
            <input type="file" class="form-control-file" name="lesson_link" id="lesson_link" >
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="reqUpdate" name="reqUpdate">
                Update
            </button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
        </div>
        
    </form>
</div>

<!-- Includer header  -->
<?php include 'adminFooter.php'; ?>