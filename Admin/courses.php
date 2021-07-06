
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
    $course_id = $_REQUEST['id'];
    $delete = true;
    $sql = "DELETE FROM `courses` WHERE `course_id` = $course_id";
    $result = mysqli_query($conn, $sql);
  }
 ?>

 <div class="col-sm-9 mt-5">
     <!-- Table  -->
     <p class="bg-dark text-white text-center p-2">List of Courses</p>
     <table class="table">
         <thead>
             <tr>
                 <th scope="col">Course ID</th>
                 <th scope="col">Name</th>
                 <th scope="col">Author</th>
                 <th scope="col">Action</th>
             </tr>
         </thead>
         <tbody>
         <?php
            $sql = "SELECT * FROM `courses`";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            $course_id = $row['course_id'];
            $course_name = $row['course_name'];
            $course_author = $row['course_author'];
                echo '<tr>
                <th scope="row">'. $course_id .'</th>
                <td>'. $course_name .'</td>
                <td>'. $course_author .'</td>
                <td>
                <form action="editcourse.php" method="POST" class="d-inline" >
                    <input type="hidden" name="id" value='. $row["course_id"].'>
                <button type="submit" class="btn btn-info mr-3" name="edit" value="View"><i class="fas fa-pen"></i></button></form>
                <form action="" method="POST" class="d-inline" >
                    <input type="hidden" name="id" value='. $row["course_id"].'>
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
 <a href="addCourse.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
 </div>
 
 <!-- Includer header  -->
 <?php include 'adminFooter.php'; ?>
