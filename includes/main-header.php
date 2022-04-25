<?php require 'includes/server.php';
    
    if (isset($_SESSION['id'])){
        $userLoggedIn = $_SESSION['id'];
        $userDetailsQuery = mysqli_query($connect, "SELECT * FROM users WHERE id='$userLoggedIn'");
        $user = mysqli_fetch_array($userDetailsQuery);

        ?>
            <script>
            function accountPage() {
                window.location.href = "sub_pages/account/account-profile.php";
            }

            function cartPage() {
                window.location.href = "sub_pages/purchase/cart.php";
            }
            </script>

        <?php

    } else {
        include("sub_pages/popup/login-alert.php");
    }

    $sql = "SELECT * FROM `products`";
    $result = $connect->query($sql);
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

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS Link -->
    <link rel="stylesheet" href="assets/styles/header_footer/header_n_footer.css">

</head>

<body>

<header>

    <header class="d-flex flex-wrap align-items-center justify-content-between p-3">
        <i class="d-flex align-items-center col-1 material-icons">
            settings</i>
            
        <ul class="main-nav nav col-8 justify-content-around align-items-center">
            <li class="nav-item py-4"><a href="index.php">Home</a></li>
            <li class="nav-item nav-item-dropdown py-4"><a href="#">Shop</a>
                <section class="dropdown-menu mt-4">
                    <ul>
                        <li class="nav-item"><a href="#" class="dropdown-item py-4">Bundles</a></li>
                        <li class="nav-item nav-item-dropdown"><a href="category.php" class="dropdown-item py-4">Category</a>
                            <section class="dropdown-menu sub-menu">
                                <ul>
                                    <li><a href="products.php?category_id=1" class="dropdown-item py-4">Bundles</a></li>
                                    <li><a href="products.php?category_id=2" class="dropdown-item py-4">Cleanser</a></li>
                                    <li><a href="products.php?category_id=3" class="dropdown-item py-4">Toner</a></li>
                                    <li><a href="products.php?category_id=4" class="dropdown-item py-4">Serum & Essence</a></li>
                                    <li><a href="products.php?category_id=5" class="dropdown-item py-4">Moisturizer</a></li>
                                    <li><a href="products.php?category_id=6" class="dropdown-item py-4">Masks</a></li>
                                </ul>
                            </section>
                        </li>
                        <li class="nav-item nav-item-dropdown"><a href="#" class="dropdown-item py-4">By Key Ingredient</a>
                            <section class="dropdown-menu sub-menu">
                                <ul>
                                    <li><a href="products.php?key_ingredient_id=1" class="dropdown-item py-4">Hyaluronic Acid</a></li>
                                    <li><a href="products.php?key_ingredient_id=2" class="dropdown-item py-4">Niacinamide</a></li>
                                    <li><a href="products.php?key_ingredient_id=3" class="dropdown-item py-4">Vitamin E</a></li>
                                    <li><a href="products.php?key_ingredient_id=4" class="dropdown-item py-4">Antioxidants</a></li>
                                    <li><a href="products.php?key_ingredient_id=5" class="dropdown-item py-4">Salicylic Acid</a></li>
                                    <li><a href="products.php?key_ingredient_id=6" class="dropdown-item py-4">Amino Acids</a></li>
                                    <li><a href="products.php?key_ingredient_id=7" class="dropdown-item py-4">Butylene Glycol</a></li>
                                    <li><a href="products.php?key_ingredient_id=8" class="dropdown-item py-4">Citric Acid</a></li>
                                    <li><a href="products.php?key_ingredient_id=9" class="dropdown-item py-4">Glycerin</a></li>
                                </ul>
                            </section>
                        </li>
                        <li class="nav-item nav-item-dropdown"><a href="#" class="dropdown-item py-4">By Concern</a>
                            <section class="dropdown-menu sub-menu">
                                <ul>
                                    <li><a href="products.php?skin_concern_id=1" class="dropdown-item py-4">Hydration</a></li>
                                    <li><a href="products.php?skin_concern_id=2" class="dropdown-item py-4">Pore Solutions</a></li>
                                    <li><a href="products.php?skin_concern_id=3" class="dropdown-item py-4">Troubled Skin</a></li>
                                    <li><a href="products.php?skin_concern_id=4" class="dropdown-item py-4">Dullness & Uneven Skin Tone</a></li>
                                    <li><a href="products.php?skin_concern_id=5" class="dropdown-item py-4">Sensitive Skin</a></li>
                                    <li><a href="products.php?skin_concern_id=6" class="dropdown-item py-4">Age Prevention</a></li>
                                    <li><a href="products.php?skin_concern_id=7" class="dropdown-item py-4">Lifting & Firming</a></li>
                                </ul>
                            </section>
                        </li>
                    </ul>
                </section>
            </li>
            <li class="nav-item"><a href="index.php"><img src="assets/images/website/logo/logo-placeholder.png"
                        alt="Minisize Logo" width="75"></a></li>
            <li class="nav-item"><a href="#">Blogs</a></li>
            <li class="nav-item"><a href="about-us.php">About</a></li>
        </ul>

        <div class="col-1 d-flex justify-content-between">
            <button type="button" onclick="accountPage()" data-bs-toggle="modal" data-bs-target="#registerModal"
                class="btn btn-link text-dark text-decoration-none material-icons">account_circle</button>
            <button type="button" onclick="cartPage()" data-bs-toggle="modal" data-bs-target="#registerModal"
                class="btn btn-link text-dark text-decoration-none material-icons">shopping_cart</button>
        </div>
    </header>

<!-- ADD ENDING </header> TAG AFTER INCLUDING THIS FILE IN PAGE -->
