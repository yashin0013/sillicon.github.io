<?php
 if (!isset($_SESSION)) {
     session_start();
 }

//  Includer header
 include 'adminHeader.php'; 
 // Include Database 
 include '../partials/dbconnect.php'; 

 if (!isset($_SESSION['admin_login'])) {
    echo "<script> location.href='../index.php';</script>";
 }

 ?>

<div class="col-sm-9 mt-5">
    <form action="" method="post" class="d-print-none">
        <div class="form-row">
            <div class="form-group col-md-3">
                <input type="date" class="form-control" id="startdate" name="startdate">
            </div> <span> to </span>
            <div class="form-group col-md-3">
                <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-secondary" name="searchsubmit" value="Search">
            </div>
        </div>
    </form>
    <?php  
    if (isset($_REQUEST['searchsubmit'])) {
        $s_date = $_REQUEST['startdate'];
        $e_date = $_REQUEST['enddate'];
        $sql = "SELECT * FROM courseorder WHERE date BETWEEN '$s_date' AND '$e_date' "; 
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo ' <p class="bg-dark text-center text-white p-2 mt-4">Details</p>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Payment Status</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>';
            while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                    <th scope="row">'. $row["order_id"] .'</th>
                    <td>'. $row["course_id"] .'</td>
                    <td>'. $row["stu_email"].'</td>
                    <td>'. $row["status"].'</td>
                    <td>'. $row["date"].'</td>
                    <td>'. $row["amount"].'</td></tr>
                    ';}
                    echo'</tbody>
                    </table>';
                echo ' <div class="text-center">
                <button class="btn btn-danger d-print-none" onclick="javascript:window.print();">Print</button>
            </div>';
        }
        else {
            echo '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
             No Records Found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
         }
    }
    ?>

</div>

<!-- Includer Footer  -->
<?php include 'adminFooter.php'; ?>