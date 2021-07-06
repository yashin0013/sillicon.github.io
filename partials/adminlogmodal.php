
    <!--Admin Login Modal Starts here  -->

    <!-- Modal -->
    <div class="modal fade" id="adminloginModal" tabindex="-1" aria-labelledby="adminloginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminloginModalLabel">Admin Log In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <i class="fas fa-envelope"></i><label class="ml-2 font-weight-bolder" for="adminloginemail">Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter Your Email" name="adminloginemail" id="adminloginemail"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-lock"></i><label class="ml-2 font-weight-bolder" for="adminloginpass">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Your Password" name="adminloginpass" id="adminloginpass">
                        </div>
                        <button type="button" onclick="adminlogin()" class="btn btn-primary">Log In</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <span id="adminstatuslog"></span>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Log in Modal ends here  -->