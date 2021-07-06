<?php
 if (!isset($_SESSION)) {
     session_start();
 }

//  Includer header
 include 'stuInclude/stuHeader.php'; 
 // Include Database 
 include '../partials/dbconnect.php'; 

 if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['loginemail'];
    
 } else {
    echo "<script> location.href='../index.php';</script>";
 }

 $sql = "SELECT * FROM `student` WHERE `stu_email` = '$stuEmail'";
 $result = $conn->query($sql);
 if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stu_id = $row['stu_id'];
 }

    // Update
    if (isset($_REQUEST['reqSubmit'])) {
        if (($_REQUEST['f_content'] == "")) {
            $msg = '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please Write Few Words.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else {
            $f_content = $_REQUEST['f_content'];
           
            $sql = "INSERT INTO `feedback` (`f_content`, `stu_id`, `time`) VALUES ('$f_content', '$stu_id', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $msg = '<div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Feedback Submited Successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            }
        }
    }
 ?>

<div class="col-sm-6 mt-5 ml-5 px-4">
    <h3 class="text-center">Feedback</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">Student ID</label>
            <input type="text" class="form-control" readonly name="stu_id" id="stu_id" value="<?php if(isset($row['stu_id'])) {
               echo $row['stu_id'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="f_content">Write Feedback</label>
            <textarea type="text" class="form-control" name="f_content" id="f_content" row=2></textarea>
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-primary" id="reqSubmit" name="reqSubmit">
                Submit
            </button>
        </div>
        
    </form>
    <!-- Alert -->
<?php if (isset($msg)) {
            echo $msg;
        } ?>
</div>

<?php
 //  Includer Footer
 include 'stuInclude/stuFooter.php'; 
 ?>