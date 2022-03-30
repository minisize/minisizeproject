<?php require 'includes/server.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Minisize </title>

    <!-- bootstrap link -->
    <link rel="stylesheet" href="assets/styles/main.css">

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS Link -->
    <link rel="stylesheet" href="assets/styles/header_footer/header_n_footer.css">

</head>

<header class="d-flex flex-wrap align-items-center justify-content-between p-3">
    <button type="button"
        class="btn btn-link d-flex align-items-center col-1 text-dark text-decoration-none material-icons">
        settings</button>

    <ul class="main-nav nav col-8 justify-content-around align-items-center">
        <li class="nav-item py-4"><a href="index.php">Home</a></li>
        <li class="nav-item nav-item-dropdown py-4"><a href="#">Shop</a>
            <section class="dropdown-menu mt-4">
                <ul>
                    <li class="nav-item"><a href="#" class="dropdown-item py-4">Bundles</a></li>
                    <li class="nav-item nav-item-dropdown"><a href="#" class="dropdown-item py-4">Category</a>
                        <section class="dropdown-menu sub-menu">
                            <ul>
                                <li><a href="#" class="dropdown-item py-4">Bundles</a></li>
                                <li><a href="#" class="dropdown-item py-4">Moisturizer</a></li>
                                <li><a href="#" class="dropdown-item py-4">Toner</a></li>
                                <li><a href="#" class="dropdown-item py-4">Serum Essence</a></li>
                                <li><a href="#" class="dropdown-item py-4">Masks</a></li>
                            </ul>
                        </section>
                    </li>
                    <li class="nav-item nav-item-dropdown"><a href="#" class="dropdown-item py-4">By Key
                            Ingredient</a></li>
                    <section class="dropdown-menu sub-menu">
                        <ul>
                            <li></li>
                        </ul>
                    </section>
                    <li class="nav-item nav-item-dropdown"><a href="#" class="dropdown-item py-4">By Concern</a>
                    </li>
                    <section class="dropdown-menu sub-menu">
                        <ul>
                            <li></li>
                        </ul>
                    </section>
                </ul>
            </section>
        </li>
        <li class="nav-item"><a href="index.php"><img src="assets/images/website/logo/logo-placeholder.png"
                    alt="Minisize Logo" width="75"></a></li>
        <li class="nav-item"><a href="#">Blogs</a></li>
        <li class="nav-item"><a href="#">About</a></li>
    </ul>

    <div class="col-1 d-flex justify-content-between">
        <button type="button" data-bs-toggle="modal" data-bs-target="#registerModal"
            class="btn btn-link text-dark text-decoration-none material-icons">account_circle</button>
        <button type="button" data-bs-toggle="modal" data-bs-target="#registerModal"
            class="btn btn-link text-dark text-decoration-none material-icons">shopping_cart</button>
    </div>
</header>

<!-- Registration Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="registerModalLabel">Hello! Welcome to Minisize</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="sub_pages/popup/registration.php" id="register_iframe" frameborder="0"
                    width="100%"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- DO NOT REMOVE OR MODIFY PAST THIS -->

<body>