<?php
require 'includes/server.php';
include("includes/classes/User.php");
include("includes/classes/Product.php");
include("includes/classes/Blog.php");

if (isset($_SESSION['id'])) {
    $userLoggedIn = $_SESSION['id'];
    $userDetailsQuery = mysqli_query($connect, "SELECT * FROM users WHERE id='$userLoggedIn'");
    $user = mysqli_fetch_array($userDetailsQuery);

    $user_obj = new User($connect, $userLoggedIn);

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
    $userLoggedIn = "";
    include("sub_pages/popup/login-alert.php");
}

$sql = "SELECT * FROM `products`";
$result = $connect->query($sql);

$product_obj = new Product($connect);
$blog_obj = new Blog($connect);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

    <!-- Google Material Icons -->
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->

    <!-- CSS Link -->
    <link rel="stylesheet" href="assets/styles/header_footer/header_n_footer.css">
    <link rel="stylesheet" href="assets/styles/products/products-style.css">
    <link rel="stylesheet" href="assets/styles/category/category.css">
    <link rel="stylesheet" href="assets/styles/blog/blog.css">
    <link rel="stylesheet" href="assets/styles/homepage/homepage.css">

    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>

    <header class="top-background bg-home">

        <header class="d-flex flex-wrap align-items-center justify-content-between p-3">

            <div class="d-flex align-items-center col-1 fill"></div>
            <div class="d-flex align-items-center col-1 mobile-main-nav">
                <nav class="">
                    <i class="bi-list"></i>
                    <div class="navbar">
                        <div class="nav-links">
                            <div class="sidebar-logo">
                                <span class="logo-name">Minisize</span>
                                <i class="bi bi-x"></i>
                            </div>
                            <ul class="links">
                                <li><a href="index.php" class="mobile-menu-items">Home</a></li>
                                <li><a href="# "class="mobile-menu-items">Shop</a>
                                <i class="bi bi-chevron-right arrow mobile-menu-arrow-shop"></i>
                                    <ul class="mobile-submenu">
                                        <li><a href="#">Category</a><i class="bi bi-chevron-right arrow mobile-menu-arrow-category"></i>
                                        <ul class="mobile-submenu-Category">
                                            <li><a href="products.php?category_id=1" class="mobile-menu-items">Bundles</a></li>
                                            <li><a href="products.php?category_id=2" class="mobile-menu-items">Cleanser</a></li>
                                            <li><a href="products.php?category_id=3" class="mobile-menu-items">Toner</a></li>
                                            <li><a href="products.php?category_id=4" class="mobile-menu-items">Serum & Essence</a></li>
                                            <li><a href="products.php?category_id=5" class="mobile-menu-items">Moisturizer</a></li>
                                            <li><a href="products.php?category_id=6" class="mobile-menu-items">Masks</a></li>
                                        </ul>
                                    </li>
                                        <li><a href="#">By Key Ingredient</a><i class="bi bi-chevron-right arrow mobile-menu-arrow-BKI"></i>
                                        <ul class="mobile-submenu-BKI">
                                            <li><a href="products.php?key_ingredient_id=1" class="mobile-menu-items">Hyaluronic Acid</a></li>
                                            <li><a href="products.php?key_ingredient_id=2" class="mobile-menu-items">Niacinamide</a></li>
                                            <li><a href="products.php?key_ingredient_id=3" class="mobile-menu-items">Vitamin E</a></li>
                                            <li><a href="products.php?key_ingredient_id=4" class="mobile-menu-items">Antioxidants</a></li>
                                            <li><a href="products.php?key_ingredient_id=5" class="mobile-menu-items">Salicylic</a></li>
                                            <li><a href="products.php?key_ingredient_id=6" class="mobile-menu-items">Amino Acids</a></li>
                                            <li><a href="products.php?key_ingredient_id=7" class="mobile-menu-items">Butylene Glycol</a></li>
                                            <li><a href="products.php?key_ingredient_id=8" class="mobile-menu-items">Citric Acid</a></li>
                                            <li><a href="products.php?key_ingredient_id=9" class="mobile-menu-items">Glycerin</a></li>
                                        </ul>
                                    </li>
                                        <li><a href="#">By Concern</a><i class="bi bi-chevron-right arrow mobile-menu-arrow-shop-BC"></i>
                                        <ul class="mobile-submenu-BC">
                                            <li><a href="products.php?skin_concern_id=1" class="mobile-menu-items">Hydration</a></li>
                                            <li><a href="products.php?skin_concern_id=2" class="mobile-menu-items">Pore Solutions</a></li>
                                            <li><a href="products.php?skin_concern_id=3" class="mobile-menu-items">Troubled Skin</a></li>
                                            <li><a href="products.php?skin_concern_id=4" class="mobile-menu-items">Dullness & Uneven Skin Tone</a></li>
                                            <li><a href="products.php?skin_concern_id=5" class="mobile-menu-items">Sensitive Skin</a></li>
                                            <li><a href="products.php?skin_concern_id=6" class="mobile-menu-items">Age Prevention</a></li>
                                            <li><a href="products.php?skin_concern_id=7" class="mobile-menu-items">Lifting & Firming</a></li>
                                        </ul>
                                    </li>
                                    </ul>
                                </li>
                                <li><a href="about-us.php" class="mobile-menu-items">About Us</a></li>
                                <li><a href="blog-list.php" class="mobile-menu-items">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>


            <ul class="main-nav nav col-8 justify-content-around align-items-center">
                <li class="main-nav-item nav-item py-4"><a href="index.php">Home</a></li>
                <li class="main-nav-item nav-item nav-item-dropdown py-4"><a href="#">Shop</a>
                    <section class="dropdown-menu mt-4">
                        <ul>
                            <li class="nav-item nav-item-dropdown sub-nav-item-dropdown"><a href="category.php" class="dropdown-item py-4">Category</a>
                                <section class="dropdown-menu sub-menu">
                                    <ul>
                                        <li><a href="products.php?category_id=1" class="dropdown-item sub-dropdown-item-1 py-4">Bundles</a></li>
                                        <li><a href="products.php?category_id=2" class="dropdown-item sub-dropdown-item-1 py-4">Cleanser</a></li>
                                        <li><a href="products.php?category_id=3" class="dropdown-item sub-dropdown-item-1 py-4">Toner</a></li>
                                        <li><a href="products.php?category_id=4" class="dropdown-item sub-dropdown-item-1 py-4">Serum & Essence</a></li>
                                        <li><a href="products.php?category_id=5" class="dropdown-item sub-dropdown-item-1 py-4">Moisturizer</a></li>
                                        <li><a href="products.php?category_id=6" class="dropdown-item sub-dropdown-item-1 py-4">Masks</a></li>
                                    </ul>
                                </section>
                            </li>
                            <li class="nav-item nav-item-dropdown sub-nav-item-dropdown"><a href="#" class="dropdown-item py-4">By Key Ingredient</a>
                                <section class="dropdown-menu sub-menu">
                                    <ul>
                                        <li><a href="products.php?key_ingredient_id=1" class="dropdown-item sub-dropdown-item-2 py-4">Hyaluronic Acid</a></li>
                                        <li><a href="products.php?key_ingredient_id=2" class="dropdown-item sub-dropdown-item-2 py-4">Niacinamide</a></li>
                                        <li><a href="products.php?key_ingredient_id=3" class="dropdown-item sub-dropdown-item-2 py-4">Vitamin E</a></li>
                                        <li><a href="products.php?key_ingredient_id=4" class="dropdown-item sub-dropdown-item-2 py-4">Antioxidants</a></li>
                                        <li><a href="products.php?key_ingredient_id=5" class="dropdown-item sub-dropdown-item-2 py-4">Salicylic Acid</a></li>
                                        <li><a href="products.php?key_ingredient_id=6" class="dropdown-item sub-dropdown-item-2 py-4">Amino Acids</a></li>
                                        <li><a href="products.php?key_ingredient_id=7" class="dropdown-item sub-dropdown-item-2 py-4">Butylene Glycol</a></li>
                                        <li><a href="products.php?key_ingredient_id=8" class="dropdown-item sub-dropdown-item-2 py-4">Citric Acid</a></li>
                                        <li><a href="products.php?key_ingredient_id=9" class="dropdown-item sub-dropdown-item-2 py-4">Glycerin</a></li>
                                    </ul>
                                </section>
                            </li>
                            <li class="nav-item nav-item-dropdown sub-nav-item-dropdown"><a href="#" class="dropdown-item py-4">By Concern</a>
                                <section class="dropdown-menu sub-menu">
                                    <ul>
                                        <li><a href="products.php?skin_concern_id=1" class="dropdown-item sub-dropdown-item-3 py-4">Hydration</a></li>
                                        <li><a href="products.php?skin_concern_id=2" class="dropdown-item sub-dropdown-item-3 py-4">Pore Solutions</a></li>
                                        <li><a href="products.php?skin_concern_id=3" class="dropdown-item sub-dropdown-item-3 py-4">Troubled Skin</a></li>
                                        <li><a href="products.php?skin_concern_id=4" class="dropdown-item sub-dropdown-item-3 py-4">Dullness & Uneven Skin Tone</a></li>
                                        <li><a href="products.php?skin_concern_id=5" class="dropdown-item sub-dropdown-item-3 py-4">Sensitive Skin</a></li>
                                        <li><a href="products.php?skin_concern_id=6" class="dropdown-item sub-dropdown-item-3 py-4">Age Prevention</a></li>
                                        <li><a href="products.php?skin_concern_id=7" class="dropdown-item sub-dropdown-item-3 py-4">Lifting & Firming</a></li>
                                    </ul>
                                </section>
                            </li>
                        </ul>
                    </section>
                </li>
                <li class="main-nav-item nav-item nav-logo"><a href="index.php"><img src="assets/images/website/logo/logo.png" alt="Minisize Logo" width="75"></a></li>
                <li class="main-nav-item nav-item"><a href="blog-list.php">Blogs</a></li>
                <li class="main-nav-item nav-item"><a href="about-us.php">About</a></li>
            </ul>

            <div class="col-md-1 col-sm-2 d-flex justify-content-between">
                <button type="button" onclick="accountPage()" data-bs-toggle="modal" data-bs-target="#registerModal" class="btn text-dark text-decoration-none"><i class="bi bi-person-circle fs-5"></i></button>
                <button type="button" onclick="cartPage()" data-bs-toggle="modal" data-bs-target="#registerModal" class="btn text-dark text-decoration-none"><i class="bi bi-cart-fill fs-5"></i></button>
            </div>
        </header>

        <script src="JS/mobilenavbar.js"></script>