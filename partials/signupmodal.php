<!-- Sign up Modal Starts here  -->

<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Student Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="stuform">
                    <div class="form-group">
                        <i class="fas fa-user"></i><label class="mx-2 font-weight-bolder" for="stuname">Name</label>
                        <span id="Msg1"></span>
                        <input type="text" class="form-control" name="stuname" placeholder="Enter Your Name"
                            id="stuname">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-envelope"></i><label class="mx-2 font-weight-bolder" for="stuemail">Email
                            Address</label><span id="Msg2"></span>
                        <input type="email" class="form-control" placeholder="Enter Your Email" name="stuemail"
                            id="stuemail" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-lock"></i><label class="mx-2 font-weight-bolder" for="stupass">New
                            Password</label><span id="Msg3"></span>
                        <input type="password" class="form-control" placeholder="Create a new password" name="stupass"
                            id="stupass">
                    </div>
                    <button type="button" id="signup" class="btn btn-primary" onclick="addStu()">Sign Up</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <span id="successMsg"></span>
                </form>
            </div>
            <div class="modal-footer">
            
            </div>
        </div>
    </div>
</div>
<!-- Sign up Modal ends here  -->