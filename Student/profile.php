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
    $stu_name = $row['stu_name'];
    $stu_email = $row['stu_email'];
    $stu_occ = $row['stu_occ'];
    $stu_img = $row['stu_img'];
 }
 
    // Update
    if (isset($_REQUEST['reqUpdate'])) {
        if (($_REQUEST['stu_id'] == "") || ($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_occ'] == "")) {
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
            $stu_occ = $_REQUEST['stu_occ'];

            $stu_img = $_FILES['stu_img']['name'];
            $stu_img_temp = $_FILES['stu_img']['tmp_name'];
            $img_folder = '../img/stuimg/'.$stu_img;
            move_uploaded_file($stu_img_temp, $img_folder);

            $sql = "UPDATE `student` SET `stu_name` = '$stu_name', `stu_occ` = '$stu_occ', `stu_img` = '$img_folder' WHERE stu_email = '$stuEmail'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $msg = '<div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Profile Updated Successfully.
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
    <h3 class="text-center">Student Profile Details</h3>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">Student ID</label>
            <input type="text" class="form-control" readonly name="stu_id" id="stu_id" value="<?php if(isset($row['stu_id'])) {
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
            <input type="text" readonly class="form-control" name="stu_email" id="stu_email" value="<?php if(isset($row['stu_email'])) {
               echo $row['stu_email'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" name="stu_occ" id="stu_occ" value="<?php if(isset($row['stu_occ'])) {
               echo $row['stu_occ'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="stu_img">Upload Student Image</label>
            <input type="file" class="form-control-file" name="stu_img" id="stu_img" >
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="reqUpdate" name="reqUpdate">
                Update
            </button>
            <a href="../index.php" class="btn btn-secondary">Close</a>
        </div>
        
    </form>
</div>


<?php
 //  Includer Footer
 include 'stuInclude/stuFooter.php'; 
 ?>