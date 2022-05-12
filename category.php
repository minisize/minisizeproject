<!-- Default Header Paste-->
<?php
    include("includes/main-header.php");
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

        
        <div class="categories">

            <div class="row py-5 border-bottom">
                <?php

                //QUERY(IES)
                $Q = "SELECT * FROM `categories`";
                $result_FROM_Category = $connect->query($Q);

                if ($result_FROM_Category->num_rows > 0) {

                    //Limit the items to display
                    $Item_Display_Limit = 1;

                    while (($row = $result_FROM_Category->fetch_assoc()) && ($Item_Display_Limit === 1)) {

                        //Creation of HTML
                        echo "
                        <div class='col-2'>
                            <h3>" . $row["name"] . "</h3>
                            <p>" . $row["short_description"] . "</p>
                            <button> View All </button>
                        </div>
                        ";

                        $Item_Display_Limit += 1;
                    }
                } else {
                    echo "0 results";
                }

                // NEXT DIVISION//

                //Limit the items to display
                $Item_Display_Limit = 0;

                //QUERY(IES)
                $Q = "SELECT * FROM `products` WHERE `category_id` = 1";
                $result_FROM_Category = $connect->query($Q);

                //Gets data from minisize_db
                if ($result_FROM_Category->num_rows > 0) {

                    while (($row = $result_FROM_Category->fetch_assoc()) && ($Item_Display_Limit <= 2)) {

                        //set $jsonobj to the value of input of the array "images" from $row;
                        $jsonobj = $row["images"];
                        //set $obj to the value of a php object converted from the string of $jsonobj
                        $obj = json_decode($jsonobj);
                        // Set $img to the value of image1 from images by php object $obj
                        $img = $obj->images->image1;

                        //Creation of HTML
                        echo "
                        <div class='col'>
                            <div>
                                <img src='" . $img . "' alt='' class='img-fluid display-item-dimension'>
                                <h5>" . $row["name"] . "</h5>
                                <p>" . "By " . $row["brand"] . "</p>
                            </div>
                            <div class='d-flex justify-content-between'><label for=''>" . $row["base_price"] . " dhs" . "</label><a href='#'>16 reviews</a></div>
                        </div>
                        ";
                        $Item_Display_Limit += 1;
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>
            <div class="row py-5">
                <?php

                //QUERY(IES)
                $Q = "SELECT * FROM `categories` WHERE `id` = 5";
                $result_FROM_Category = $connect->query($Q);

                if ($result_FROM_Category->num_rows > 0) {

                    //Limit the items to display
                    $Item_Display_Limit = 1;

                    while (($row = $result_FROM_Category->fetch_assoc()) && ($Item_Display_Limit === 1)) {

                        //Creation of HTML
                        echo "
                        <div class='col-2'>
                            <h3>" . $row["name"] . "</h3>
                            <p>" . $row["short_description"] . "</p>
                            <button> View All </button>
                        </div>
                        ";

                        $Item_Display_Limit += 1;
                    }
                } else {
                    echo "0 results";
                }

                // NEXT DIVISION//

                //Limit the items to display
                $Item_Display_Limit = 0;

                //QUERY(IES)
                $Q = "SELECT * FROM `products` WHERE `category_id` = 5";
                $result_FROM_Category = $connect->query($Q);

                //Gets data from minisize_db
                if ($result_FROM_Category->num_rows > 0) {

                    while (($row = $result_FROM_Category->fetch_assoc()) && ($Item_Display_Limit <= 2)) {

                        //set $jsonobj to the value of input of the array "images" from $row;
                        $jsonobj = $row["images"];
                        //set $obj to the value of a php object converted from the string of $jsonobj
                        $obj = json_decode($jsonobj);
                        // Set $img to the value of image1 from images by php object $obj
                        $img = $obj->images->image1;

                        //Creation of HTML
                        echo "
                            <div class='col'>
                                <div>
                                    <img src='" . $img . "' alt='' class='img-fluid display-item-dimension'>
                                    <h5>" . $row["name"] . "</h5>
                                    <p>" . "By " . $row["brand"] . "</p>
                                </div>
                                <div class='d-flex justify-content-between'><label for=''>" . $row["base_price"] . " dhs" . "</label><a href='#'>16 reviews</a></div>
                            </div>
                            ";
                        $Item_Display_Limit += 1;
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>
            <div class="row py-5 border-top">
                <!-- PHP CODE FOR LISTING -->
                <?php

                //QUERY(IES)
                $Q = "SELECT * FROM `categories` WHERE `id` = 3";
                $result_FROM_Category = $connect->query($Q);

                if ($result_FROM_Category->num_rows > 0) {

                    //Limit the items to display
                    $Item_Display_Limit = 1;

                    while (($row = $result_FROM_Category->fetch_assoc()) && ($Item_Display_Limit === 1)) {

                        //Creation of HTML
                        echo "
                        <div class='col-2'>
                            <h3>" . $row["name"] . "</h3>
                            <p>" . $row["short_description"] . "</p>
                            <button> View All </button>
                        </div>
                        ";

                        $Item_Display_Limit += 1;
                    }
                } else {
                    echo "0 results";
                }

                // NEXT DIVISION//

                //Limit the items to display
                $Item_Display_Limit = 0;

                //QUERY(IES)
                $Q = "SELECT * FROM `products` WHERE `category_id` = 3";
                $result_FROM_Category = $connect->query($Q);

                //Gets data from minisize_db
                if ($result_FROM_Category->num_rows > 0) {

                    while (($row = $result_FROM_Category->fetch_assoc()) && ($Item_Display_Limit <= 2)) {

                        //set $jsonobj to the value of input of the array "images" from $row;
                        $jsonobj = $row["images"];
                        //set $obj to the value of a php object converted from the string of $jsonobj
                        $obj = json_decode($jsonobj);
                        // Set $img to the value of image1 from images by php object $obj
                        $img = $obj->images->image1;

                        //Creation of HTML
                        echo "
                                <div class='col'>
                                    <div>
                                        <img src='" . $img . "' alt='' class='img-fluid display-item-dimension'>
                                        <h5>" . $row["name"] . "</h5>
                                        <p>" . "By " . $row["brand"] . "</p>
                                    </div>
                                    <div class='d-flex justify-content-between'><label for=''>" . $row["base_price"] . " dhs" . "</label><a href='#'>16 reviews</a></div>
                                </div>
                                ";
                        $Item_Display_Limit += 1;
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>
            </div>
        </div>
    </div>


</main>

<!-- Default Footer Paste -->
<?php
    include("includes/main-footer.php");
?>