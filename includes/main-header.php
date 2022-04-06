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

<body>

<header class="top-background">
    <!-- <nav>
            <div class="side-navigation side-nav-left"> 
                settings icon
            </div>
            <div class="main-navigation"> 
                <ul>
                    <li> <button> Home </button> </li>
                    <li><button> products </button></li>
                    <label> Website icon </label>
                    <li><button> Blog </button></li>
                    <li><button> About </button></li>
                </ul>
            </div>
            <div class="side-navigation side-nav-right">
                <label for=""><button>Profile Icon</button></label>
                <label for=""><button>Shopping Cart Icon</button></label>
            </div>
        </nav> -->

    <header class="d-flex flex-wrap align-items-center justify-content-between p-3">
        <i class="d-flex align-items-center col-1 text-dark material-icons">
            settings
        </i>

        <ul class="main-nav nav col-8 justify-content-around align-items-center">
            <li class="nav-item py-4" ><a href="index.php">Home</a></li>
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
                        <li class="nav-item nav-item-dropdown"><a href="#" class="dropdown-item py-4">By Key Ingredient</a></li>
                            <section class="dropdown-menu sub-menu">
                                <ul>
                                    <li></li>
                                </ul>
                            </section>
                        <li class="nav-item nav-item-dropdown"><a href="#" class="dropdown-item py-4">By Concern</a></li>
                            <section class="dropdown-menu sub-menu">
                                <ul>
                                    <li></li>
                                </ul>
                            </section>
                    </ul>
                </section>
            </li>
            <li class="nav-item"><a href="index.php"><img src="assets/images/website/logo/logo-placeholder.png" alt="Minisize Logo"
                        width="75"></a></li>
            <li class="nav-item"><a href="#">Blogs</a></li>
            <li class="nav-item"><a href="#">About</a></li>
        </ul>

        <div class="col-1 d-flex justify-content-between">
            <a href="#" class="material-icons">account_circle</a>
            <a href="#" class="material-icons">shopping_cart</a>
        </div>
    </header>

