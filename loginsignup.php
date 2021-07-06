<?php
 // include db 
 include 'partials/dbconnect.php'; 
 //   include header 
include 'partials/header.php';
 ?>

<!-- Background image start here -->
<!-- <div class="container-fluid bg-dark">
    <div class="row">
        <img src="img/books.jpg" alt="Courses" style="height: 500px; width: 100%; object-fit: cover; box-shadow: 10px;">
    </div>
</div> -->
<!-- image ends here  -->

<div class="container jumbotron mt-5">
<h3 class="text-center bg-danger text-white mb-3 p-2">You Have to Login for Continue</h3>
    <div class="row">
        <div class="col-md-4">
            <h5 class="mb-3">If Already Registered !! Login</h5>
            <form role="form" >
                <div class="form-group">
                    <i class="fas fa-envelope"></i><label class="ml-2 font-weight-bolder" for="loginemail">Email
                        Address</label>
                    <input type="email" class="form-control" placeholder="Enter Your Email" name="loginemail"
                        id="login_email" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <i class="fas fa-lock"></i><label class="ml-2 font-weight-bolder" for="loginpass">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Your Password" name="loginpass"
                        id="login_pass">
                </div>
                <button type="button" onclick="stu_login()" class="btn btn-primary">Log In</button>
                <span id="status_log"></span>
            </form>
        </div>
        <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New User !! Sign Up</h5>
            <form role="form" id="stu_form">
                <div class="form-group">
                    <i class="fas fa-user"></i><label class="mx-2 font-weight-bolder" for="stuname">Name</label>
                    <span id="Msg-1"></span>
                    <input type="text" class="form-control" name="stuname" placeholder="Enter Your Name" id="stu_name">
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i><label class="mx-2 font-weight-bolder" for="stuemail">Email
                        Address</label><span id="Msg-2"></span>
                    <input type="email" class="form-control" placeholder="Enter Your Email" name="stuemail"
                        id="stu_email" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-lock"></i><label class="mx-2 font-weight-bolder" for="stupass">New
                        Password</label><span id="Msg-3"></span>
                    <input type="password" class="form-control" placeholder="Create a new password" name="stupass"
                        id="stu_pass">
                </div>
                <button type="button" id="sign_up" class="btn btn-primary" onclick="add_Stu()">Sign Up</button>
                <span id="success_Msg"></span>
            </form>
        </div>
    </div>
</div>


    <!-- included Support/contact Section Here  -->
    <?php include 'partials/support.php'; ?>
    


<!-- include footer  -->
<?php include 'partials/footer.php'; ?>