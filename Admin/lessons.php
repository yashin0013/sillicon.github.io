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

<div class="col-sm-9 mt-5 mx-3">
    <form action="" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Course ID: </label>
            <input type="text" class="form-control ml-3" id="checkid" name="checkid">
        </div>
        <button type="submit" class="btn btn-danger">Search</button>
    </form>


    <?php
$sql = "SELECT course_id From courses";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    if (isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']) {
        $sql = "SELECT * FROM courses WHERE course_id = {$_REQUEST['checkid']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if(($row['course_id']) == $_REQUEST['checkid']){
            $_SESSION['course_id'] = $row['course_id'];
            $_SESSION['course_name'] = $row['course_name'];
            ?>
     <h3 class="mt-5 bg-dark text-center text-white p-2">Course ID: <?php if (isset($row['course_id'])) {
                echo $row['course_id'];
            } ?> Course Name: <?php if (isset($row['course_name'])) {
                echo $row['course_name'];
            } ?></h3>
        <?php 
        $sql = "SELECT * FROM lessons WHERE course_id = {$_REQUEST['checkid']}";
        $result = $conn->query($sql);
        echo ' <table class="table">
        <thead>
            <tr>
                <th scope="col">Lesson ID</th>
                <th scope="col">Lesson Name</th>
                <th scope="col">Lesson Link</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>';
        while($row = mysqli_fetch_assoc($result)){
        $lesson_id = $row['lesson_id'];
        $lesson_name = $row['lesson_name'];
        $lesson_link = $row['lesson_link'];
            echo '<tr>
            <th scope="row">'. $lesson_id .'</th>
            <td>'. $lesson_name .'</td>
            <td>'. $lesson_link .'</td>
            <td>
            <form action="editlesson.php" method="POST" class="d-inline" >
                <input type="hidden" name="id" value='. $row["lesson_id"].'>
            <button type="submit" class="btn btn-info mr-3" name="edit" value="View"><i class="fas fa-pen"></i></button></form>
            <form action="" method="POST" class="d-inline" >
                <input type="hidden" name="id" value='. $row["lesson_id"].'>
            <button type="submit" class="delete btn btn-info" name="delete" value="Delete" ><i class="fas fa-trash-alt"></i></button>
        </form>
            </td>
        </tr>';
      }
    
        echo'</tbody>
        </table>';
      }
        else{
            echo '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Course Not Found.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
      
    }
}
if (isset($_REQUEST['delete'])) {
    $sql = "DELETE FROM lessons WHERE lesson_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        if ($result) {
            echo '<meta http-quiv="refresh" content= "0;URL=?deleted" />';
            echo '<div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Lesson Deleted Successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
        }
       
}
?>
</div>
<?php
if (isset($_SESSION['course_id'])) {
    echo '
    <div>
     <a href="addlesson.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
     </div>';
}

?>

<!-- Includer Footer  -->
<?php include 'adminFooter.php'; ?>