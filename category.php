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
                    <a href="" class="row">Bundles</a>
                    <a href="" class="row">Moisterizer</a>
                    <a href="" class="row">Toners</a>
                    <a href="" class="row">Serum & Essence</a>
                    <a href="" class="row">Cleanser</a>
                    <a href="" class="row">Masks</a>
            </div>
        </div>


        <div class="container categories">
            <div class="row py-5">
                <?php
                    while($row = mysqli_fetch_array($categoriesData)){
                        $id = $row["id"];
                        $name = $row["name"];
                        $desc = $row["short_description"];
                        
                        echo "<div class='container row mt-4'>
                                <div class='col-3 border-bottom'>
                                    <h3 class='text-darkgreen'><strong>$name</strong></h3>
                                    <p>$desc</p>
                                    <a href='products.php?category_id=$id' class='btn btn-primary fw-bold text-light px-4'>View All</a>
                                </div>";

                        $productsDataQuery = "SELECT * FROM products WHERE category_id = '$id' LIMIT 3";
                        $productsData = mysqli_query($connect, $productsDataQuery);

                        while($row = mysqli_fetch_array($productsData)){
                            $id = $row["id"];
                            $name = $row["name"];
                            $brand = $row["brand"];
                            $basePrice = $row['base_price'];
                            $numReviews = $row['num_reviews'];

                            $jsonobj = $row["images"];
                            $obj = json_decode($jsonobj);
                            $img = $obj->images->image1;

                            echo "<div class='col d-flex flex-column justify-content-between border-bottom'>
                                    
                                    <div>
                                    <img src='$img' alt='' class='img-fluid product-img d-flex mx-auto mb-2'>
                                        <p><strong>$name</strong> <br>By $brand</p>
                                    </div>
                                    <div class='d-flex align-items-center justify-content-between'>
                                        <p class='fs-5 text-darkgreen'>$basePrice dhs</p>
                                        <p>$numReviews reviews</p>
                                    </div>
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