 <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    // include header 
    include 'adminHeader.php'; 

    // Include Database 
     include '../partials/dbconnect.php'; 

    if (!isset($_SESSION['admin_login'])) {
        echo "<script> location.href='../index.php';</script>";
    }
    $sql = "SELECT * FROM courses ";
    $result = $conn->query($sql);
    $totalcourse = $result->num_rows;

    $sql = "SELECT * FROM student ";
    $result = $conn->query($sql);
    $totalstu = $result->num_rows;

    $sql = "SELECT * FROM courseorder ";
    $result = $conn->query($sql);
    $totalsold = $result->num_rows;
    ?>

 <div class="col-sm-9 mt-5">
     <div class="row mx-5 text-center">
         <div class="col-sm-4 mt-5">
             <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                 <div class="card-header">Courses</div>
                 <div class="card-body">
                     <h4 class="card-title"><?php echo $totalcourse; ?></h4>
                     <a href="courses.php" class="btn text-white">View</a>
                 </div>
             </div>
         </div>
         <div class="col-sm-4 mt-5">
             <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                 <div class="card-header">Students</div>
                 <div class="card-body">
                     <h4 class="card-title"><?php echo $totalstu; ?></h4>
                     <a href="students.php" class="btn text-white">View</a>
                 </div>
             </div>
         </div>
         <div class="col-sm-4 mt-5">
             <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                 <div class="card-header">Sold</div>
                 <div class="card-body">
                     <h4 class="card-title"><?php echo $totalsold; ?></h4>
                     <a href="sellReport.php" class="btn text-white">View</a>
                 </div>
             </div>
         </div>
     </div>
     <div class="mx-5 mt-5 text-center">
         <!-- Table  -->
         <p class="bg-dark text-white p-2">Course Ordered</p>
         <?php
                        $sql = "SELECT * FROM courseorder ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo ' <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" >Order ID</th>
                                    <th scope="col" >Course ID</th>
                                    <th scope="col" >Student Email</th>
                                    <th scope="col" >Order Date</th>
                                    <th scope="col" >Amount</th>
                                    <th scope="col" >Action</th>
                                </tr>
                            </thead>
                             <tbody>';
                             while($row = mysqli_fetch_assoc($result)){
                                echo '<tr>
                                <th scope="row">'. $row["order_id"] .'</th>
                                <td>'. $row["course_id"] .'</td>
                                <td>'. $row["stu_email"].'</td>
                                <td>'. $row["date"].'</td>
                                <td>'. $row["amount"].'</td>
                                <td>
                                <form action="" method="POST" class="d-inline" >
                                    <input type="hidden" name="id" value='. $row["co_id"].'>
                                <button type="submit" class="delete btn btn-info" name="delete" value="Delete" ><i class="fas fa-trash-alt"></i></button>
                                 </form>
                                </td>
                                </tr>
                                ';}
                                echo'</tbody>
                                </table>';
                          }
                          if (isset($_REQUEST['delete'])) {
                            $sql = "DELETE FROM courseorder WHERE co_id = {$_REQUEST['id']}";
                                $result = $conn->query($sql);
                                if ($result) {
                                    echo '<meta http-quiv="refresh" content= "0;URL=?deleted" />';
                                    echo '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> Order Deleted Successfully.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                                }
                               
                        }
                    ?>
     </div>
 </div>
 </div>
 </div>

 <!-- Includer footer  -->
 <?php include 'adminFooter.php'; ?>