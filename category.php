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
                <h1 class="row fw-bold">Category</h3>
                    <a href="" class="row">Bundles</a>
                    <a href="" class="row">Moisterizer</a>
                    <a href="" class="row">Toners</a>
                    <a href="" class="row">Serum & Essence</a>
                    <a href="" class="row">Cleanser</a>
                    <a href="" class="row">Masks</a>
            </div>
        </div>


        <div class="container categories">
            <div class="row py-5 border-bottom">
                <?php
                    while($row = mysqli_fetch_array($categoriesData)){
                        $id = $row["id"];
                        $name = $row["name"];
                        $desc = $row["short_description"];
                        
                        echo "<div class='container row'>
                                <div class='col-3'>
                                    <h3>$name</h3>
                                    <p>$desc</p>
                                    <button>View All</button>
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

                            echo "<div class='col'>
                                    <div>
                                        <img src='$img' alt='' class='img-fluid display-item-dimension'>
                                        <h5>$name</h5>
                                        <p>By $brand</p>
                                    </div>
                                    <div class='d-flex justify-content-between'>$basePrice dhs<a href='#'>$numReviews reviews</a></div>
                                </div>";

                        }

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