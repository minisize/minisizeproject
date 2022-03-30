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
            sign up
        </div>
        <div class="tab-pane" id="logIn">
            log in
        </div>
    </div>

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>

</body>

</html>