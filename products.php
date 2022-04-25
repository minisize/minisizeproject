<!-- Default Header Paste-->
<?php
    include("includes/main-header.php");
    include("includes/classes/User.php");
    include("includes/classes/Product.php");

    // get id
    if(isset($_GET['category_id'])){
        $itemID = $_GET['category_id'];
        $tab = 'category_id';
    } else if(isset($_GET['key_ingredient_id'])){
        $itemID = $_GET['key_ingredient_id'];
        $tab = 'key_ingredient_id';
    } else if(isset($_GET['skin_concern_id'])){
        $itemID = $_GET['skin_concern_id'];
        $tab = 'skin_concern_id';
    }
?>

<!--Add hero header in here-->

</header>

    <main class="">
        <div class="container">
            <div class="products-header row">

            <?php
            $productDataQuery = mysqli_query($connect, "SELECT * FROM products WHERE $tab='$itemID'");

            while($row = mysqli_fetch_array($productDataQuery)){
                $id = $row['id'];
                $name = $row['name'];
                $description = $row['description'];

                echo "$id <br><br> $name <br><br> $description <br><br><br>";
            }
            ?>
                <h1><?php echo $tab; ?></h1>
                <div class="container1 col">
                <h1> Moisturizer </h1>
                <p>
                Easy on the eyes. Hydrate and nourish with textures tailored for the area that ages fastest.
                </p>
                </div>
                <div class="container2 col"> Picture Product </div>
            </div>
        </div>
        
        <div class="products-maincontent">

            <div class="maincontent-header container">
                <div class="maincontent-filter1 row">

            <label> Home > Cream </label>
            </div>
            <div class="maincontent-filter2">
                <div class="filter-section">
                    <h6> Filter by </h6>

                    <select name="skin-type" id="" >
                        <option value="select1">Option 1</option>
                        <option value="select2">Option 1</option>
                        <option value="select3">Option 1</option>
                        <option value="select4">Option 1</option>
                        <option value="select5">Option 1</option>
                    </select>

                    <select name="ingredient" id="" >
                        <option value="select1">Option 1</option>
                        <option value="select2">Option 1</option>
                        <option value="select3">Option 1</option>
                        <option value="select4">Option 1</option>
                        <option value="select5">Option 1</option>
                    </select>

                    <select name="benefit" id="" >
                        <option value="select1">Option 1</option>
                        <option value="select2">Option 1</option>
                        <option value="select3">Option 1</option>
                        <option value="select4">Option 1</option>
                        <option value="select5">Option 1</option>
                    </select>
                </div>
                <div class="maincontent-filter2 row">
                    <div class="filter-section col-9">
                        <h6> Filter by </h6>

                <div class="sort-section">

                        <select name="ingredient" id="" >
                            <option value="select1">Option 1</option>
                            <option value="select2">Option 1</option>
                            <option value="select3">Option 1</option>
                            <option value="select4">Option 1</option>
                            <option value="select5">Option 1</option>
                        </select>
                    </div>

                    <div class="sort-section col">

                    <h6> Sort by </h6>

            </div>

        </div>
        <div class="maincontent-container2">

            <div class="product-container">
                <label for=""></label><img src="#" alt="">
                <div class="product-display">
                    <h6> Item Name </h6>
                    <p>subcontent</p>
                </div>
                <div class="product-price">
                    <label for=""> 15 AED </label>
                    <a href=""> 25 reviews </a>
                </div>
            </div>
            <div class="product-container">
                <label for=""></label><img src="#" alt="">
                <div class="product-display">
                    <h6> Item Name </h6>
                    <p>subcontent</p>
                </div>
                <div class="product-price">
                    <label for=""> 15 AED </label>
                    <a href=""> 25 reviews </a>
                </div>
            </div>
            <div class="product-container">
                <label for=""></label><img src="#" alt="">
                <div class="product-display">
                    <h6> Item Name </h6>
                    <p>subcontent</p>
                </div>
                <div class="product-price">
                    <label for=""> 15 AED </label>
                    <a href=""> 25 reviews </a>
                </div>
            </div>
            <div class="product-container">
                <label for=""></label><img src="#" alt="">
                <div class="product-display">
                    <h6> Item Name </h6>
                    <p>subcontent </p>
                </div>
                <div class="product-price">
                    <label for=""> 15 AED </label>
                    <a href=""> 25 reviews </a>
                </div>
            </div>
            <div class="product-container">
                <label for=""></label><img src="#" alt="">
                <div class="product-display">
                    <h6> Item Name </h6>
                    <p> subcontent </p>
                </div>

                <div class="product-price">
                    <label for=""> 15 AED </label>
                    <a href=""> 25 reviews </a>
                </div>
                </div>
            <div class="product-container">
                <label for=""></label><img src="#" alt="">
                <div class="product-display">
                    <h6> Item Name </h6>
                    <p>subcontent</p>
                </div>
                <div class="product-price">
                    <label for=""> 15 AED </label>
                    <a href=""> 25 reviews </a>
                </div>
            </div>
            <div class="container">
                <div class="maincontent-container2 row row-cols-5">

                    <div class="col">
                        <label for=""></label><img src="#" alt="">
                        <div class="product-display">
                            <h6> Item Name </h6>
                            <p>subcontent</p>
                        </div>
                        <div class="product-price">
                            <label for=""> 15 AED </label>
                            <a href=""> 25 reviews </a>
                        </div>
                    </div>
                    <div class="col">
                        <label for=""></label><img src="#" alt="">
                        <div class="product-display">
                            <h6> Item Name </h6>
                            <p>subcontent</p>
                        </div>
                        <div class="product-price">
                            <label for=""> 15 AED </label>
                            <a href=""> 25 reviews </a>
                        </div>
                    </div>
                    <div class="col">
                        <label for=""></label><img src="#" alt="">
                        <div class="product-display">
                            <h6> Item Name </h6>
                            <p>subcontent</p>
                        </div>
                        <div class="product-price">
                            <label for=""> 15 AED </label>
                            <a href=""> 25 reviews </a>
                        </div>
                    </div>
                    <div class="col">
                        <label for=""></label><img src="#" alt="">
                        <div class="product-display">
                            <h6> Item Name </h6>
                            <p>subcontent </p>
                        </div>
                        <div class="product-price">
                            <label for=""> 15 AED </label>
                            <a href=""> 25 reviews </a>
                        </div>
                    </div>
                    <div class="col">
                        <label for=""></label><img src="#" alt="">
                        <div class="product-display">
                            <h6> Item Name </h6>
                            <p> subcontent </p>
                        </div>

                        <div class="product-price">
                            <label for=""> 15 AED </label>
                            <a href=""> 25 reviews </a>
                        </div>
                    </div>
                    <div class="col">
                        <label for=""></label><img src="#" alt="">
                        <div class="product-display">
                            <h6> Item Name </h6>
                            <p>subcontent</p>
                        </div>
                        <div class="product-price">
                            <label for=""> 15 AED </label>
                            <a href=""> 25 reviews </a>
                        </div>
                    </div>
                    <div class="col">
                        <label for=""></label><img src="#" alt="">
                        <div class="product-display">
                            <h6> Item Name </h6>
                            <p>subcontent</p>
                        </div>
                        <div class="product-price">
                            <label for=""> 15 AED </label>
                            <a href=""> 25 reviews </a>
                        </div>
                    </div>
                    <div class="col">
                        <label for=""></label><img src="#" alt="">
                        <div class="product-display">
                            <h6> Item Name </h6>
                            <p>subcontent</p>
                        </div>
                        <div class="product-price">
                            <label for=""> 15 AED </label>
                            <a href=""> 25 reviews </a>
                        </div>
                    </div>
                    <div class="col">
                        <label for=""></label><img src="#" alt="">
                        <div class="product-display">
                            <h6> Item Name </h6>
                            <p>subcontent </p>
                        </div>
                        <div class="product-price">
                            <label for=""> 15 AED </label>
                            <a href=""> 25 reviews </a>
                        </div>
                    </div>
                    <div class="col">
                        <label for=""></label><img src="#" alt="">
                        <div class="product-display">
                            <h6> Item Name </h6>
                            <p> subcontent </p>
                        </div>

                        <div class="product-price">
                            <label for=""> 15 AED </label>
                            <a href=""> 25 reviews </a>
                        </div>
                    </div>
                </div>
            </div>
            
    </main>

<!-- Default Footer Paste -->
<?php
    include("includes/main-footer.php");
?>