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



    if (isset($_REQUEST['editStudent'])) {
        if (($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_occ'] == "")) {
            $msg = '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please Fill all Details.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else {
            $id = $_REQUEST['stu_id'];
            $stu_name = $_REQUEST['stu_name'];
            $stu_email = $_REQUEST['stu_email'];
            $stu_pass = $_REQUEST['stu_pass'];
            $stu_occ = $_REQUEST['stu_occ'];

            $sql ="UPDATE `student` SET `stu_name` = '$stu_name', `stu_email` = '$stu_email', `stu_pass` = '$stu_pass', `stu_occ` = '$stu_occ' WHERE stu_id = '$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $msg = '<div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Student Information Changed Successfully.
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
    <h3 class="text-center">Update Student Information</h3>

       <!-- Select Query -->
       <?php
    if (isset($_REQUEST['edit'])) {
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM `student` WHERE `stu_id` = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">Student Id</label>
            <input type="text" class="form-control" name="stu_id" id="stu_id" readonly value="<?php if(isset($row['stu_id'])) {
               echo $row['stu_id'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="stu_name">Student Name</label>
            <input type="text" class="form-control" name="stu_name" id="stu_name" value="<?php if(isset($row['stu_name'])) {
               echo $row['stu_name'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="stu_email">Student Email</label>
            <input type="email" class="form-control" name="stu_email" id="stu_email" value="<?php if(isset($row['stu_email'])) {
               echo $row['stu_email'];
            } ?>"></input>
        </div>
        <div class="form-group">
            <label for="stu_pass">New Password</label>
            <input type="text" class="form-control" name="stu_pass" id="stu_pass" value="<?php if(isset($row['stu_pass'])) {
               echo $row['stu_pass'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="stu_occ">Student Occupation</label>
            <input type="text" class="form-control" name="stu_occ" id="stu_occ" value="<?php if(isset($row['stu_occ'])) {
               echo $row['stu_occ'];
            } ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="editStudent" name="editStudent">
                Save Changes
            </button>
            <a href="students.php" class="btn btn-secondary">Close</a>
        </div>
        
    </form>
</div>

<!-- Includer header  -->
<?php include 'adminFooter.php'; ?>