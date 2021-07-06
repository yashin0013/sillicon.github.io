
    <!-- Login Modal Starts here  -->

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Student Log In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <i class="fas fa-envelope"></i><label class="ml-2 font-weight-bolder" for="loginemail">Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter Your Email" name="loginemail" id="loginemail"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-lock"></i><label class="ml-2 font-weight-bolder" for="loginpass">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Your Password" name="loginpass" id="loginpass">
                        </div>
                        <button type="button" onclick="stulogin()" class="btn btn-primary">Log In</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <span id="statuslog"></span>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- Log in Modal ends here  -->