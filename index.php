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
    <div class="container position-relative homepage-head pt-4">
        <div class="row w-100 ">
            <div class="col-3 minisize-head-img" style="background-image: url(assets/images/others/index-bg-image.png);"></div>
            <div class="col-9 ">
                <h1 class="text-center text-capitalize"> MiniSize </h1>
                <p class="homepage-head-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            </div>
        </div>
        <div class="homepage-bg-head"></div>
        <div class="homepage-bg-head2"></div>
    </div>
    <div class="container px-3 py-4 ">
        <div class="row d-flex justify-content-center">
            <h3 class="homepage-header-ctn"> BEST SELLERS </h3>
        </div>
        <div class=" row  py-2 best-sellers-container row-cols-auto d-flex justify-content-center">
            <!-- PHP CODE FOR LISTING -->
            <?php $Home_funct->GenerateList($connect); ?>
        </div>

    </div>


    <div class="main_content container px-3 py-3 w-100">
        <div class="row row-cols-2 my-3 py-2">
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
        <div class="row row-cols-2 my-3 py-2">
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
    <div class="container px-3 py-3 w-100">
        <div class="row row-cols-2 my-4">
            <div class="col position-relative footer-category-btns">
                <a href="products.php?category_id=2"><button class="btn-bg border-0 skin-type-product-buttons  position-relative" style="background-image: url(assets/images/others/oily-bg.png); background-size: cover;">
                        <div class="product-buttons-effect"></div>
                        <h2> Troubled Skin </h2>
                    </button></a>
            </div>
            <div class="col position-relative footer-category-btns">
                <a href="products.php?skin_concern_id=1"><button class="btn-bg border-0 skin-type-product-buttons  position-relative" style="background-image: url(assets/images/others/categories-moisturizer.png); background-size: cover;">
                        <div class="product-buttons-effect"></div>
                        <h2> Dry </h2>
                    </button></a>
            </div>
        </div>
        <div class="row row-cols-2 my-4">
            <div class="col position-relative footer-category-btns">
                <a href="products.php?skin_concern_id=5"><button class="btn-bg border-0 skin-type-product-buttons  position-relative" style="background-image: url(assets/images/others/categories-serum.png); background-size: cover;">
                        <div class="product-buttons-effect"></div>
                        <h2> Sensitive </h2>
                    </button></a>
            </div>
            <div class="col position-relative footer-category-btns">
                <a href="products.php?category_id=1">
                    <button class="btn-bg border-0 skin-type-product-buttons position-relative" style="background-image: url(assets/images/products/bundles/Bundles/acne-bundle.png); background-size: fill; ">
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