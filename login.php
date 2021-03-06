<?php 
    require 'includes/server.php';
    require 'includes/handlers/signup-handler.php';
    require 'includes/handlers/login-handler.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Minisize </title>

    <!-- bootstrap link -->
    <link rel="stylesheet" href="assets/styles/main.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <style>
        #bg {
            position: fixed;
            top: 0;
            right: 0;
            width: 40%;
            height: 100%;
            background-color: #F5D1C3; 
        }

        #bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div id="bg"><img src="assets/images/others/reg_signin-bg-image.png" alt=""></div>

    <header class="d-flex flex-wrap align-items-center justify-content-between p-3">
        <div class="d-flex align-items-center">
            <img src="assets/images/website/logo/logo.png" alt="Minisize Logo" width="50">
            <h4 class="mx-2">Minisize</h4>
            <!-- Error message for invalid login -->
            <?php if (in_array("Email or password is incorrect.", $errorListLogin)) echo "<p class='alert alert-danger mb-0 mx-2 p-2' data-toggle='tooltip' data-placement='right'>Email or password is incorrect.</p>" ?>
        </div>
    </header>

    <section class="mx-5 my-3" style="width:50%;">
        <h1 class="mb-4">Hello! Welcome back to Minisize.</h1>   
        <form action="login.php" method="POST" class="login-form px-1">
            <label for="loginEmail" class="form-label">Email</label>
            <input type="email" class="form-control mb-4" name="login_email" id="loginEmail"
                placeholder="Email" value="<?php
                        if(isset($_SESSION['login_email'])){
                            echo $_SESSION['login_email'];
                        }?>" required>

            <label for="loginPass" class="form-label">Password</label>
            <input type="password" class="form-control mb-4" name="login_pass" id="loginPass"
                placeholder="Password" required>

            <input type="submit" class="btn btn-primary form-control mt-2 p-3" name="login_btn" value="Log In">
        </form>
        <button class="btn w-100 mt-1"><a href="signup.php">No Account Yet? Create One Here.</a></button>
    </section>


</body>

</html>