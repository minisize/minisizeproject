<!-- Default Header Paste-->
<?php
include("includes/main-header.php");
include("includes/classes/Homepage.php");

$Home_funct = new Home_functions($connect);
?>

<style>
    .bg-home {
        background-color: #F7E6CA;
    }
    .view-btn:hover {
        filter: brightness(105%);
    }
</style>

<!--Add hero header in here-->
<div class="transition">
    <div class="position-relative">
        <div class="d-flex justify-content-end">
            <div class="col-6 container mt-5">
                <h1 class="fw-bold text-darkgreen" style="font-size:3.5rem;">Start Your Skincare Routine!</h1>
                <p class="fs-5">Lift away impurities with our selection of cleansers.</p>
                <a href="products.php?category_id=2" class="btn btn-primary btn-header rounded-pill text-white fs-5 fw-bold px-5 py-3 mt-2">
                    <p class="m-0 p-0">CHECK IT OUT</p>
                </a>
            </div>
            <img src="assets/images/website/index-bg-image.png" class="img-fluid" style="width:30%; z-index: 2">
        </div>
        <div class="position-absolute p-4 w-100" style="background-color: #F9EFDC; bottom:0; z-index:1;"></div>
    </div>
</div>

</header>

<!-- Enter Main Content Here-->
<main class="">
    <div class="container px-3 py-4">
        <?php
        if ($userLoggedIn != "") {
        ?>
            <div class="row">
                <h3 class="text-center fw-bold">RECOMMENDATIONS</h3>
            </div>
            <div class="py-2 best-sellers-container d-flex justify-content-center">
                <?php $Home_funct->recommendedProducts($userLoggedIn); ?>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="container px-3 py-5 ">
        <div class="row">
            <h3 class="text-center fw-bold mb-5 fs-3 text-darkgreen">BEST SELLERS</h3>
        </div>
        <div class="py-2 best-sellers-container d-flex justify-content-center">
            <!-- PHP CODE FOR LISTING -->
            <?php $Home_funct->GenerateList($connect); ?>
        </div>


        <div class="main_content container px-5 pt-5 w-100">
            <div class="row row-cols-2 my-3 py-5">
                <img class="col h-50 w-25" src="<?php $Home_funct->Generate_Random_img($connect, 6) ?>">
                <div class="col-9 container1_subcontent">
                    <div class="content">
                        <h5 class="fw-bold fs-3 text-darkgreen mb-3"> MEET OUR BUNDLES! </h5>
                        <p style="font-family: Josefin Sans" class="fs-5 mb-4">With our bundles, you can try a small set of skincare products for your skin type. We recommend items that work well with each other and give you that dazzling skin you deserve!</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="products.php?category_id=1"><button class="btn bg-primary border-0 text-white homepage-button-format fs-4 view-btn" style="font-family: Josefin Sans"> View all </button></a>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 my-3 py-5">
                <div class="col-9 container2_subcontent">
                    <div class="content">
                        <h5 class="fw-bold fs-3 text-darkgreen mb-3">FULL SIZED PRODUCTS!</h5>
                        <p style="font-family: Josefin Sans" class="fs-5 mb-4">Really sure about a product? Tried it a billion times and still love it? Well then, we have links for you to purchase the full-sized products with a discount! Show us some love and purchase it through our link! </p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="category.php"><button class="bg-primary border-0 text-white homepage-button-format fs-4 view-btn" style="font-family: Josefin Sans"> View all </button></a>
                    </div>

                </div>
                <img class="col h-50 w-25" src="<?php $Home_funct->Generate_Random_img($connect, 0) ?>">
            </div>
        </div>
    </div>

    <h4 class="row d-flex justify-content-center fs-1 text-green mb-5 pb-5"> Find the right products for your skin type! </h4>

    <div class="container px-3 pb-5 w-100">
        <div class="row row-cols-2 my-4">
            <div class="col position-relative footer-category-btns">
                <a href="products.php?skin_concern_id=2"><button class="btn-bg border-0 skin-type-product-buttons position-relative" style="background-image: url(assets/images/others/oily-bg.png); background-size: cover;">
                        <div class="product-buttons-effect"></div>
                        <h2> Oily </h2>
                    </button></a>
            </div>
            <div class="col position-relative footer-category-btns">
                <a href="products.php?skin_concern_id=1"><button class="btn-bg border-0 skin-type-product-buttons  position-relative" style="background-image: url(assets/images/others/dry-bg.png); background-size: cover;">
                        <div class="product-buttons-effect"></div>
                        <h2> Dry </h2>
                    </button></a>
            </div>
        </div>
        <div class="row row-cols-2 my-4">
            <div class="col position-relative footer-category-btns">
                <a href="products.php?skin_concern_id=5"><button class="btn-bg border-0 skin-type-product-buttons  position-relative" style="background-image: url(assets/images/others/sensitive-bg.png); background-size: cover;">
                        <div class="product-buttons-effect"></div>
                        <h2> Sensitive </h2>
                    </button></a>
            </div>
            <div class="col position-relative footer-category-btns">
                <a href="products.php?skin_concern_id=3">
                    <button class="btn-bg border-0 skin-type-product-buttons position-relative" style="background-image: url(assets/images/others/troubled-bg.png); background-size: cover; ">
                        <div class="product-buttons-effect"></div>
                        <h2> Troubled </h2>
                    </button>
                </a>
            </div>
        </div>
    </div>

</main>

</div>
</main>
</div>
<!-- Default Footer Paste -->
<?php
include("includes/main-footer.php");
?>