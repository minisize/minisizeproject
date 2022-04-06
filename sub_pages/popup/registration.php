<?php 
    require 'includes/handlers/signup-handler.php';
    require 'includes/handlers/login-handler.php';
?>

<!-- Registration Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="height:500px">
            <div class="modal-header">
                <h3 class="modal-title" id="registerModalLabel">Hello! Welcome to Minisize</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#signUp">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#login">Log In</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="signUp">
                        <form action="registration.php" method="POST" class="sign-up-form">
                            <input type="text" class="form-control mt-2" name="sign_up_fname" placeholder="First Name" required>
                            <input type="text" class="form-control mt-2" name="sign_up_lname" placeholder="Last Name" required>
                            <input type="email" class="form-control mt-2" name="sign_up_email" placeholder="Email" required>
                            <input type="password" class="form-control mt-2" name="sign_up_pass" placeholder="Password" required>
                            <input type="password" class="form-control mt-2" name="sign_up_cpass" placeholder="Confirm Password" required>
                            <input type="submit" class="btn btn-primary form-control mt-2" name="sign_up_btn" value="Create an account">

                            <?php
                                if(empty($errorListRegister)){
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Success!</strong> Sign Up
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                         </div>';
                                }
                            ?>
                        </form>
                    </div>
                    <div class="tab-pane" id="login">
                        <form action="registration.php" method="POST" class="login-form">
                            <input type="email" class="form-control mt-2" name="login_email" placeholder="Email" required>
                            <input type="password" class="form-control mt-2" name="login_pass" placeholder="Password" required>
                            <input type="submit" class="btn btn-primary form-control mt-2" name="login_btn" value="Login">

                            <?php
                                if(empty($errorListLogin)){
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Success!</strong> Login
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                                }
                            ?>
                        </form>
                    </div>
                </div>

                <!-- <iframe src="sub_pages/popup/registration.php" id="register_iframe" frameborder="0"
                    width="100%" height="100%"></iframe> -->
            </div>
        </div>
    </div>
</div>
