
 <?php
 if (!isset($_SESSION)) {
     session_start();
 }
 $delete = false;

//  Includer header
 include 'adminHeader.php'; 
 // Include Database 
 include '../partials/dbconnect.php'; 

 if (!isset($_SESSION['admin_login'])) {
    echo "<script> location.href='../index.php';</script>";
 }
 
 if(isset($_REQUEST['delete'])){
    $id = $_REQUEST['id'];
    $delete = true;
    $sql = "DELETE FROM `student` WHERE `stu_id` = $id";
    $result = mysqli_query($conn, $sql);
  }
 ?>

 <div class="col-sm-9 mt-5">
     <!-- Table  -->
     <p class="bg-dark text-white text-center p-2">List of Students</p>
     <table class="table">
         <thead>
             <tr>
                 <th scope="col">Student ID</th>
                 <th scope="col">Name</th>
                 <th scope="col">Email</th>
                 <th scope="col">Action</th>
             </tr>
         </thead>
         <tbody>
         <?php
            $sql = "SELECT * FROM `student`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            $stu_id = $row['stu_id'];
            $stu_name = $row['stu_name'];
            $stu_email = $row['stu_email'];
                echo '<tr>
                <th scope="row">'. $stu_id .'</th>
                <td>'. $stu_name .'</td>
                <td>'. $stu_email .'</td>
                <td>
                <form action="editstudent.php" method="POST" class="d-inline" >
                    <input type="hidden" name="id" value='. $row["stu_id"].'>
                <button type="submit" class="btn btn-info mr-3" name="edit" value="View"><i class="fas fa-pen"></i></button></form>
                <form action="" method="POST" class="d-inline" >
                    <input type="hidden" name="id" value='. $row["stu_id"].'>
                <button type="submit" class="delete btn btn-info" name="delete" value="Delete" ><i class="fas fa-trash-alt"></i></button>
            </form>
                </td>
            </tr>';
            }
            ?>
             
         </tbody>
     </table>
 </div>

 <div>
 <a href="addStudent.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
 </div>
 
 <!-- Includer header  -->
 <?php include 'adminFooter.php'; ?>
