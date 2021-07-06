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

    $admin_email = $_SESSION['adminloginemail'];
    if (isset($_REQUEST['editpass'])) {
        if ($_REQUEST['admin_new_pass'] == "") {
            $msg = '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please Enter New Password.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        else {
            $sql = "SELECT * FROM `admins` WHERE `admin_email` = '$admin_email'";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $new_pass = $_REQUEST['admin_new_pass'];
            $sql ="UPDATE `admins` SET `admin_pass` = '$new_pass' WHERE admin_email = '$admin_email'";
            if ($conn->query($sql) == TRUE) {
                $msg = '<div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Admin Password Changed Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                }
                else {
                    $msg = '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Admin Password Not Changed.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
                     }
             }
             else {
                $msg = '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Admin Password Not Changed Successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
             }

        }
    }
?>

    <div class="col-sm-6 mt-5 ml-5 px-5 py-3">
<?php if (isset($msg)) {
            echo $msg;
        } ?>
    <h3 class="text-center">Change Admin Password</h3>

       <!-- Select Query -->
       <?php
       $admin_email = $_SESSION['adminloginemail'];
        $sql = "SELECT * FROM `admins` WHERE `admin_email` = '$admin_email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="admin_email">Admin Email</label>
            <input type="email" class="form-control" readonly name="admin_email" id="admin_email" value="<?php if(isset($row['admin_email'])) {
               echo $row['admin_email'];
            } ?>"></input>
        </div>
        <div class="form-group">
            <label for="admin_pass">Old Password</label>
            <input type="text" class="form-control" readonly name="admin_pass" id="admin_pass" value="<?php if(isset($row['admin_pass'])) {
               echo $row['admin_pass'];
            } ?>">
        </div>
        <div class="form-group">
            <label for="admin_new_pass">New Password</label>
            <input type="text" class="form-control" name="admin_new_pass" id="admin_new_pass">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="editpass" name="editpass">
                Save Changes
            </button>
            <a href="adminDashboard.php" class="btn btn-secondary">Close</a>
        </div>
        
    </form>
</div>

<!-- Includer footer  -->
<?php include 'adminFooter.php'; ?>