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

    ?>

<div class="col-sm-9 mt-5">
     <!-- Table  -->
     <p class="bg-dark text-white text-center p-2">Feedback From Students</p>
     <?php
            $sql = "SELECT * FROM `feedback`";
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">Feedback ID</th>
                        <th scope="col">Content</th>
                        <th scope="col">Student ID</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
            while($row = mysqli_fetch_assoc($result)){
            $feedback_id = $row['f_id'];
            $content = $row['f_content'];
            $stu_id = $row['stu_id'];
                echo '<tr>
                <th scope="row">'. $feedback_id .'</th>
                <td>'. $content .'</td>
                <td>'. $stu_id .'</td>
                <td>
                <form action="" method="POST" class="d-inline" >
                    <input type="hidden" name="id" value='. $row["f_id"].'>
                <button type="submit" class="delete btn btn-info" name="delete" value="Delete" ><i class="fas fa-trash-alt"></i></button>
            </form>
                </td>
            </tr>';
            }}

            if (isset($_REQUEST['delete'])) {
                $sql = "DELETE FROM feedback WHERE f_id = {$_REQUEST['id']}";
                    $result = $conn->query($sql);
                    if ($result) {
                        echo '<meta http-quiv="refresh" content= "0;URL=?deleted" />';
                        echo '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Feedback Deleted Successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                    }}
            ?>
             
         </tbody>
     </table>
 </div>


    
<!-- Includer footer  -->
<?php include 'adminFooter.php'; ?>