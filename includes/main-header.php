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

    <header class="top-background">

        <header class="d-flex flex-wrap align-items-center justify-content-between p-3">
            <div class="fs-5 d-flex align-items-center col-1 dropdown mobile-dropdown mobile-nav-item-dropdown">
                <a class="btn btn-secondary">
                    <i class="bi bi-list "></i>
                </a>
                <section class="mobile-dropdown-menu">
                    <ul class="px-3">
                        <li><a class="mobile-dropdown-item" href="index.php">Home</a></li>
                        <li class="mobile-nav-item-dropdown"><a class="mobile-dropdown-item " href="#">Shop</a>
                            <section class="mobile-nav-item-dropdown mobile-dropdown-menu  mt-4">
                                <ul>
                                    <li class="mobile-nav-item-dropdown"><a href="#" class=" mobile-nav-item py-4">Category</a>
                                        <section class="stacked-mobile-dropdown-menu mobile-dropdown-menu">
                                            <ul>
                                                <li><a href="products.php?category_id=1" class="mobile-nav-item">Bundles</a></li>
                                                <li><a href="products.php?category_id=2" class="mobile-nav-item">Cleanser</a></li>
                                                <li><a href="products.php?category_id=3" class="mobile-nav-item">Toner</a></li>
                                                <li><a href="products.php?category_id=4" class="mobile-nav-item">Serum & Essence</a></li>
                                                <li><a href="products.php?category_id=5" class="mobile-nav-item">Moisturizer</a></li>
                                                <li><a href="products.php?category_id=6" class="mobile-nav-item">Masks</a></li>
                                            </ul>
                                        </section>
                                    </li>
                                    <li class="mobile-nav-item-dropdown"><a href="#" class="mobile-nav-item py-4">By Key Ingredient</a>
                                    <section class="stacked-mobile-dropdown-menu mobile-dropdown-menu mt-2">
                                            <ul>
                                                <li><a href="products.php?key_ingredient_id=1" class="mobile-nav-item">Hyaluronic Acid</a></li>
                                                <li><a href="products.php?key_ingredient_id=2" class="mobile-nav-item">Niacinamide</a></li>
                                                <li><a href="products.php?key_ingredient_id=3" class="mobile-nav-item">Vitamin E</a></li>
                                                <li><a href="products.php?key_ingredient_id=4" class="mobile-nav-item">Antioxidants</a></li>
                                                <li><a href="products.php?key_ingredient_id=5" class="mobile-nav-item">Salicylic Acid</a></li>
                                                <li><a href="products.php?key_ingredient_id=6" class="mobile-nav-item">Amino Acids</a></li>
                                                <li><a href="products.php?key_ingredient_id=7" class="mobile-nav-item">Butylene Glycol</a></li>
                                                <li><a href="products.php?key_ingredient_id=8" class="mobile-nav-item">Citric Acid</a></li>
                                                <li><a href="products.php?key_ingredient_id=9" class="mobile-nav-item">Glycerin</a></li>
                                            </ul>
                                        </section>
                                    </li>
                                    <li class="mobile-nav-item-dropdown"><a href="#" class="mobile-nav-item py-4">By Concern</a>
                                    <section class="stacked-mobile-dropdown-menu mobile-dropdown-menu mt-2">
                                            <ul>
                                                <li><a href="products.php?skin_concern_id=1" class="mobile-nav-item">Hydration</a></li>
                                                <li><a href="products.php?skin_concern_id=2" class="mobile-nav-item">Pore Solutions</a></li>
                                                <li><a href="products.php?skin_concern_id=3" class="mobile-nav-item">Troubled Skin</a></li>
                                                <li><a href="products.php?skin_concern_id=4" class="mobile-nav-item">Dullness & Uneven Skin Tone</a></li>
                                                <li><a href="products.php?skin_concern_id=5" class="mobile-nav-item">Sensitive Skin</a></li>
                                                <li><a href="products.php?skin_concern_id=6" class="mobile-nav-item">Age Prevention</a></li>
                                                <li><a href="products.php?skin_concern_id=7" class="mobile-nav-item">Lifting & Firming</a></li>
                                            </ul>
                                        </section>
                                    </li>
                                </ul>
                            </section>
                        </li>
                        <li><a class="mobile-dropdown-item " href="blog-list.php">Blogs</a></li>
                        <li><a class="mobile-dropdown-item" href="about-us.php">About</a></li>
                    </ul>
                </section>

            </div>
            <div class="fs-5 d-flex align-items-center col-1 desktop-fill"></div>


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
                <li class="main-nav-item nav-item nav-item-logo"><a href="index.php"><img src="assets/images/website/logo/logo.png" alt="Minisize Logo" width="75"></a></li>
                <li class="main-nav-item nav-item"><a href="blog-list.php">Blogs</a></li>
                <li class="main-nav-item nav-item"><a href="about-us.php">About</a></li>
            </ul>

            <div class="col-1 d-flex justify-content-between">
                <button type="button" onclick="accountPage()" data-bs-toggle="modal" data-bs-target="#registerModal" class="btn text-dark text-decoration-none"><i class="bi bi-person-circle fs-5"></i></button>
                <button type="button" onclick="cartPage()" data-bs-toggle="modal" data-bs-target="#registerModal" class="btn text-dark text-decoration-none"><i class="bi bi-cart-fill fs-5"></i></button>
            </div>
        </header>