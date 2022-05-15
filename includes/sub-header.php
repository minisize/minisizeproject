<?php require '../../includes/server.php';
    include("../../includes/classes/User.php");
    $userLoggedIn = $_SESSION['id'];
    $userDetailsQuery = mysqli_query($connect, "SELECT * FROM users WHERE id='$userLoggedIn'");
    $user = mysqli_fetch_array($userDetailsQuery); 

    $user_obj = new User($connect, $userLoggedIn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minisize</title>

    <!-- bootstrap link -->
    <link rel="stylesheet" href="../../assets/styles/main.css">
    

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;500;700&family=Montserrat:wght@400;600&family=Roboto&display=swap');        
        body{
            background-color: #F7F3F0;
        }
        
        *{
            font-family: 'Josefin Sans', sans-serif;
        }
        h3{
            font-family: 'Josefin Sans', sans-serif;
            font-weight: 500;
        }
        h4,label{
            font-family: 'Montserrat', sans-serif;
            font-size: 0.75rem;
            font-weight: 600;
        }
        h5,input,select{
            font-family: 'Roboto', sans-serif;
            font-size: 1rem;
        }

    </style>

</head>

<body>
    <header class="d-flex flex-wrap align-items-center justify-content-between p-5 border-bottom">
        <a class="">
            <img src="../../assets/images/website/logo/logo-placeholder.png"
                        alt="Minisize Logo" width="75">
        </a>

        <div class="d-flex flex-wrap">
            <a href="../../index.php" class="material-icons text-decoration-none link-dark pe-4">home</a>
            <a href="#" class="material-icons text-decoration-none link-dark">shopping_cart</a>
        </div>
    </header>

<!-- End of file -->