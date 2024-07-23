<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Login</h2>
                <p>Login with user credentials</p>
                <form action="<?php echo URLROOT ;?>/users/register" method="post">
                    <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="text" name="email" class="form-control form-control-lg 
                        <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback">
                            <?php echo $data['email_err']; ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="text" name="password" class="form-control form-control-lg 
                        <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback">
                            <?php echo $data['password_err']; ?>
                        </span>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-flex justify-content-center align-items-center">
                            <input type="Submit" value="Login" class="btn btn-success btn-block w-100">
                        </div>
                        <div class="col d-flex justify-content-center align-items-center">
                            <a href="<?php echo URLROOT . "/users/register" ?>" 
                            class="btn btn-light btn-block w-100">
                                No Account? Register
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>