<!-- Modal -->
<div class="modal fade" id="signup_modal" tabindex="-1" aria-labelledby="signup_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signup_modalLabel">Sign Up</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="utils/_handlesignup.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" aria-describedby="textHelp" name="username" placeholder="Enter Username" />
                    </div>
                    <div class="mb-3">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="user_email" aria-describedby="emailHelp" name="user_email" placeholder="Enter Email Address" />
                        <div id="emailHelp" class="form-text">
                            We'll never share your email with anyone else.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" />
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Re-Enter Password" />
                        <p class="text text-warning">Re-Enter the same password.</p>
                    </div>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancle
                    </button>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>