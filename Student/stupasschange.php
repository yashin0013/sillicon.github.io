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

    if (isset($_REQUEST['changepass'])) {
        if ($_REQUEST['stu_new_pass'] == "") {
            $msg = '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please Enter New Password.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else {
            $sql = "SELECT * FROM `student` WHERE `stu_email` = '$stuEmail'";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $new_pass = $_REQUEST['stu_new_pass'];
            $sql ="UPDATE `student` SET `stu_pass` = '$new_pass' WHERE stu_email = '$stuEmail'";
            if ($conn->query($sql) == TRUE) {
                $msg = '<div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your Password Changed Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                }
             }
        }
    }
?>

<div class="col-sm-6 mt-5 ml-5 px-5 py-3">
    <h3 class="text-center">Change Your Password</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label for="admin_email">Admin Email</label>
            <input type="email" class="form-control" readonly name="admin_email" id="admin_email" value="<?php if(isset($stuEmail)) {
               echo $stuEmail;
            } ?>"></input>
        </div>
        <div class="form-group">
            <label for="stu_new_pass">New Password</label>
            <input type="text" class="form-control" name="stu_new_pass" id="stu_new_pass">
        </div>
        <div class="text-left">
            <button type="submit" class="btn btn-primary" id="changepass" name="changepass">
                Save Changes
            </button>
        </div>
    </form>
    <?php if (isset($msg)) {
            echo $msg;
        } ?>
</div>

<?php
 //  Includer Footer
 include 'stuInclude/stuFooter.php'; 
 ?>