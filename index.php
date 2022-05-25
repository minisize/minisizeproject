<!-- Default Header Paste-->
<?php
include("includes/main-header.php");
include("includes/classes/Homepage.php");

$Home_funct = new Home_functions($connect);
?>

<!--Add hero header in here-->

</header>

<!-- Enter Main Content Here-->

<main class="">
    <div class="container ">
        <div class="row w-100">
            <div class="col-3 "> <img src="assets/images/others/index-bg-image.png"></div>
            <div class="col-9 ">
                <h1 class="text-center text-capitalize"> MiniSize </h1>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            </div>
        </div>
    </div>
    <div class="container p-3">
        <h3 class="row"> BEST SELLERS </h3>
        <div class=" row  p-3 best-sellers-container row-cols-auto">
            <!-- PHP CODE FOR LISTING -->
            <?php $Home_funct->GenerateList($connect); ?>
        </div>

    </div>


    <div class="main_content container p-3 w-100">
        <div class="row row-cols-2 my-3">
            <img class="col h-50 w-25" src="<?php $Home_funct->Generate_Random_img($connect, 6) ?>">
            <div class="col-9 container1_subcontent">
                <div class="content">
                    <h5 class=" fw-bold"> Meet our Bundles! </h5>
                    <p class="">Meet our bundle! We provide small set of skincare products for one time use for our customers.</p>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="products.php?category_id=1"><button class="bg-primary border-0 text-white homepage-button-format fs-4"> View all </button></a>
                </div>


            </div>
        </div>
        <div class="row row-cols-2 my-3">
            <div class="col-9 container2_subcontent">
                <div class="content">
                    <h5 class="fw-bold">Full-size products!</h5>
                    <p class="">Full Sized products are available too! make sure to get a subscription in order to get discounts for the produts!</p>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="category.php"><button class="bg-primary border-0 text-white homepage-button-format fs-4"> View all </button></a>
                </div>

            </div>
            <img class="col h-50 w-25" src="<?php $Home_funct->Generate_Random_img($connect, 0) ?>">
        </div>
        <h4 class="row d-flex justify-content-center fs-1 mb-5"> Find the right products for your skin type! </h4>
    </div>
    <div class="container p-3 w-100">
        <div class="row row-cols-2 my-5">
            <div class="col position-relative footer-category-btns">
                <a href="products.php?category_id=2"><button class="btn-bg w-75 border-0 skin-type-product-buttons" style="background-image: url(assets/images/others/categories-cleanser.png); background-size: cover;">
                        <h2> Oily </h2>
                    </button></a>
            </div>
            <div class="col position-relative footer-category-btns">
                <a href="products.php?skin_concern_id=1"><button class="btn-bg w-75 border-0 skin-type-product-buttons" style="background-image: url(assets/images/others/categories-moisturizer.png); background-size: cover;">
                        <h2> Dry </h2>
                    </button></a>
            </div>
        </div>
        <div class="row row-cols-2 my-5">
            <div class="col position-relative footer-category-btns">
                <a href="products.php?skin_concern_id=5"><button class="btn-bg w-75 border-0 skin-type-product-buttons" style="background-image: url(assets/images/others/categories-serum.png); background-size: cover;">
                    <h2> Sensitive </h2>
                </button></a>
            </div>
            <div class="col position-relative footer-category-btns">
                <a href="products.php?category_id=1">
                    <button class="btn-bg w-75 border-0 skin-type-product-buttons position-relative" style="background-image: url(assets/images/others/categories-bundles.png); background-size: cover; ">
                    <div class="product-buttons-effect"></div>     
                    <h2> Combination </h2>
                    </button>
                   
                </a>
            </div>
        </div>
    </div>

    </div>
</main>

<!-- Default Footer Paste -->
<?php
include("includes/main-footer.php");
?>