
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


    if (isset($_REQUEST['addLesson'])) {
        if (($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")) {
            $msg = '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please Fill all Details.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else {
            $lesson_name = $_REQUEST['lesson_name'];
            $lesson_desc = $_REQUEST['lesson_desc'];
            $course_id = $_REQUEST['course_id'];
            $course_name = $_REQUEST['course_name'];

            $lesson_link = $_FILES['lesson_link']['name'];
            $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
            $link_folder = '../Video/lessonvid/'.$lesson_link;
            move_uploaded_file($lesson_link_temp, $link_folder);

            $sql = "INSERT INTO `lessons` (`lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`) VALUES ('$lesson_name', '$lesson_desc', '$link_folder', '$course_id', '$course_name')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $msg = '<div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Lesson Added Successfully.
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
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" name="course_id" id="course_id" value ="<?php if (isset($_SESSION['course_id'])) {
                echo $_SESSION['course_id'];
            } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" name="course_name" id="course_name" value ="<?php if (isset($_SESSION['course_name'])) {
                echo $_SESSION['course_name'];
            } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" name="lesson_name" id="lesson_name">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea type="text" class="form-control" name="lesson_desc" id="lesson_desc" rows="2"></textarea>
        </div>
        
        <div class="form-group">
            <label for="lesson_link">Lesson Video Link</label>
            <input type="file" class="form-control-file" name="lesson_link" id="lesson_link">
        </div>
       
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="addLesson" name="addLesson">
                Submit
            </button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
        </div>
        
    </form>
</div>

<!-- Includer footer  -->
<?php include 'adminFooter.php'; ?>