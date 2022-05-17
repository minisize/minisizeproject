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
    </style>
</head>

<body>

    <div id="bg"></div>

    <header class="d-flex flex-wrap align-items-center justify-content-between p-3">
        <div class="d-flex align-items-center">
            <img src="assets/images/website/logo/logo-placeholder.png" alt="Minisize Logo" width="50">
            <h4 class="mx-2">Minisize</h4>
        </div>
    </header>

    <section class="mx-5 my-3" style="width:50%;">
        <h1>Hello! Welcome back to Minisize.</h1>   
        <form action="login.php" method="POST" class="login-form px-1">
            <label for="loginEmail" class="form-label">Email</label>
            <input type="email" class="form-control mb-1" name="login_email" id="loginEmail"
                placeholder="Email" value="<?php
                        if(isset($_SESSION['login_email'])){
                            echo $_SESSION['login_email'];
                        }?>" required>

            <label for="loginPass" class="form-label">Password</label>
            <input type="password" class="form-control mb-1" name="login_pass" id="loginPass"
                placeholder="Password" required>

            <input type="submit" class="btn btn-primary form-control mt-2" name="login_btn" value="Login">
        </form>
    </section>

</body>

</html>