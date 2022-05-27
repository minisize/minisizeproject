<!-- Default Header Paste-->
<?php
    include("includes/main-header.php");

    $categoriesDataQuery = "SELECT * FROM categories";
    $categoriesData = mysqli_query($connect, $categoriesDataQuery);

?>
</header>

<main>
    <div class="category-header position-relative">
        <div class="position-relative">
            <div class="category-img">
                <img src="assets/images/website/category-header.jpg">
            </div>
            <div class="category-nav">
                <h1 class="row fw-bold text-darkgreen">Category</h3>
                    <a href="#Bundles" class="row">Bundles</a>
                    <a href="#Cleanser" class="row">Cleanser</a>
                    <a href="#Toner" class="row">Toners</a>
                    <a href="#Serum & Essence" class="row">Serum & Essence</a>
                    <a href="#Moisturizer" class="row">Moisturizer</a>
                    <a href="#Masks" class="row">Masks</a>
            </div>
        </div>


        <div class="container categories">
            <div class="row">
                <?php
                    while($row = mysqli_fetch_array($categoriesData)){
                        $id = $row["id"];
                        $name = $row["name"];
                        $desc = $row["short_description"];
                        
                        echo "<div id='$name' class='container row mt-4 border-bottom' style='grid-gap: 2.5rem'>
                                <div class='type col-3 border-bottom pt-5'>
                                    <h3 class='text-darkgreen'><strong>$name</strong></h3>
                                    <p>$desc</p>
                                    <a href='products.php?category_id=$id' class='btn btn-primary fw-bold text-light px-4 mb-4'>View All</a>
                                </div>";

                        $productsDataQuery = "SELECT * FROM products WHERE category_id = '$id' LIMIT 3";
                        $productsData = mysqli_query($connect, $productsDataQuery);

                        while($row = mysqli_fetch_array($productsData)){
                            $id = $row["id"];
                            $name = $row["name"];
                            $category = $row['category'];
                            $skinConcern = $row['for_skin_concern'];
                            $brand = $row["brand"];
                            $basePrice = $row['base_price'];
                            $numReviews = $row['num_reviews'];

                            $jsonobj = $row["images"];
                            $obj = json_decode($jsonobj);
                            $img = $obj->images->image1;

                            $item = "";

                            if($category == "Bundles"){
                                $item = "<p><strong>$name</strong> <br>For $skinConcern</p>";
                            } else {
                                $item = "<p><strong>$name</strong> <br>By $brand</p>";
                            }

                            echo "<div class='products col product-display position-relative d-flex flex-column justify-content-between py-4 mb-2'>
                                    <div>
                                        <img src='$img' alt='' class='img-fluid product-img d-flex mx-auto mb-4'>
                                        $item
                                    </div>
                                    <div class='d-flex align-items-center justify-content-between mt-4'>
                                        <p class='fs-5 text-darkgreen'>$basePrice AED</p>
                                        <p>$numReviews reviews</p>
                                    </div>
                                    <div class='overlay-product'></div>
                                    <a href='product-item.php?id=$id' class='product-view btn btn-outline-primary fw-bold px-5'>View</a>
                                </div>";

                        }
                        echo "</div>";
                    }
                ?>



            </div>
        </div>
    </div>


</main>

<!-- Default Footer Paste -->
<?php
    include("includes/main-footer.php");
?>