<?php require '../../includes/server.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- bootstrap link -->
    <link rel="stylesheet" href="../../assets/styles/main.css">

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>


<body>

    <ul class="nav nav-tabs nav-fill">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#signUp">Sign Up</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#logIn">Log In</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="signUp">
            <form action="registration.php"  method="POST" class="sign-up-form">
                <input type="text" class="form-control mt-2" name="sign_up_fname" placeholder="First Name" required> 
                <input type="text" class="form-control mt-2" name="sign_up_lname" placeholder="Last Name" required>
                <input type="email" class="form-control mt-2" name="sign_up_email" placeholder="Email" required>
                <input type="password" class="form-control mt-2" name="sign_up_pass" placeholder="Password" required>
                <input type="password" class="form-control mt-2" name="sign_up_cpass" placeholder="Confirm Password" required>
                <input type="submit" class="btn btn-primary form-control mt-2" name="sign_up_btn" value="Create an account">
            </form>
        </div>
        <div class="tab-pane" id="logIn">
            <form action="registration.php"  method="POST" class="login-form">
                <input type="email" class="form-control mt-2" name="login_email" placeholder="Email" required>
                <input type="password" class="form-control mt-2" name="login_pass" placeholder="Password" required>
                <input type="submit" class="btn btn-primary form-control mt-2" name="login_btn" value="Login">
            </form>
        </div>
    </div>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>

</body>

</html>