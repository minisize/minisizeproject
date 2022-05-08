<?php
    class Product {
        private $connect;

        public function __construct($connect){
            $this->connect = $connect;
        }

        public function getItemCategory($tab, $itemID) {

            $query = "SELECT * FROM $tab WHERE id='$itemID'";
            $result = mysqli_query($this->connect, $query);
            
            $this->row = mysqli_fetch_array($result);

            return $this->row['name'];
        }

        public function loadHeader($tab, $itemID){

            $query = "SELECT * FROM $tab WHERE id='$itemID'";
            $result = mysqli_query($this->connect, $query);

            $row = mysqli_fetch_array($result);

            $name = $row['name'];
            $description = $row['description'];
            $image = $row['image'];

            $headerString = "<div class='container'>
                                <div class='products-header row'>
                                    <div class='container1 col'>
                                    <h1> $name </h1>
                                    <p> $description </p>
                                    </div>
                                    <div class='container2 col'> Picture Product </div>
                                </div>
                            </div>";

            echo $headerString;
        }

        public function ImageLoad($itemID)
        {
            $query = "SELECT * FROM products WHERE id='$itemID'";
            $result = mysqli_query($this->connect, $query);

            $row = mysqli_fetch_array($result);

            //set $jsonobj to the value of input of the array "images" from $row;
            $jsonobj = $row["images"];
            //set $obj to the value of a php object converted from the string of $jsonobj
            $obj = json_decode($jsonobj);
            // Set $img to the value of image1 from images by php object $obj
            $img = $obj->images->image1;

            $produceImages = "
            
            ";

            echo $produceImages;
        }

        public function loadProducts($tab, $itemID){

            if($tab == "categories"){
                $tab = "category";
            }

            $tabID = $tab . "_id";
            $productString = "";

            $productDataQuery = mysqli_query($this->connect, "SELECT * FROM products WHERE $tabID='$itemID'");

            while($row = mysqli_fetch_array($productDataQuery)){
                $id = $row['id'];
                $name = $row['name'];
                $mainIngredient = $row['main_ingredient'];
                $basePrice = $row['base_price'];
                $numReviews = $row['num_reviews'];

                // $productString .= "$id <br><br> $name <br><br> $description <br><br><br>";
                $productString .= "<div class='col'>
                                        <label for=''></label><img src='#' alt=''>
                                        <div class='product-display'>
                                            <h6>$name</h6>
                                            <p>with $mainIngredient</p>
                                        </div>
                                        <div class='product-price'>
                                            <label for=''>$basePrice AED</label>
                                            <a href=''>$numReviews reviews </a>
                                        </div>
                                        <a href='product-item.php?id=$id' class='btn btn-info'>View</a>
                                    </div>";
            }

            echo $productString;
        }

        public function loadProductItem($itemID){
            $productString = "";
            $productsImage = "";
            $productsImageCarousel = "";
            $image = "";
            $image_total = 0;
            $textLink = "";

            $productDataQuery = mysqli_query($this->connect, "SELECT * FROM products WHERE id='$itemID'");

            $row = mysqli_fetch_array($productDataQuery);
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $mainIngredient = $row['main_ingredient'];
            $cosdnaLink = $row['cosdna_link'];
            $basePrice = $row['base_price'];

            //set $jsonobj to the value of input of the array "images" from $row;
            $jsonobj = $row["images"];
            //set $obj to the value of a php object converted from the string of $jsonobj
            $obj = json_decode($jsonobj);
            // Set $img to the value of image1 from images by php object $obj
            $img = $obj->images;

            if($cosdnaLink == "#"){
                $textLink = "";
            } else {
                $textLink = "Ingredient list";
            }

            foreach($img as $key => $value) {
            $productsImageCarousel .="
            <div class='carousel-item'>
                <img src='$value' class='d-block w-50' alt='$key'>
            </div>
            ";
              }

            $productsImage = "
            <!-- Main Image Display -->
            <div id='carouselExampleControls' class='carousel slide vh-10' data-bs-ride='carousel'>
                <div class='carousel-inner vh-10'>
                    <div class='carousel-item active'>
                        $productsImageCarousel
                    </div>
                </div>
                <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='prev'>
                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                    <span class='visually-hidden'>Previous</span>
                </button>
                <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='next'>
                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                    <span class='visually-hidden'>Next</span>
                </button>
            </div>
            ";

            $productString .= "
                            <div class=''>
                                <div>
                                    <!-- Header Section of Item -->
                                    <div class='container'>
                                        <div class='row'>
                                            <h2 class='col'>$name</h2>
                                            <img src='#' class='col'>
                                        </div>
                                        
                                        <div class='row'>
                                            <h5 class='col'>With $mainIngredient </h5>
                                            <a href='$cosdnaLink' class='col'>$textLink</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Main Section of Item -->
                                <div class='container'>

                                    <p class='row'>$description</p>
                                    <div class='row'>
                                        <button class='col'><img src='#' alt=''>10ml</button>
                                        <button class='col'><img src='#' alt=''>15ml</button>
                                        <button class='col'><img src='#' alt=''>20ml</button>
                                    </div>
                                    <div class='row'>
                                        <label for='' class='col'>$basePrice AED</label>
                                        <a href='' class='col'>View full product</a>
                                        <button class='col'>Add to Cart</button>
                                    </div>

                                <p></p>

                                <!-- Footer Section of Item -->
                                <div class='container'>
                                    <div class='row'> PURCHASE AND EARN 5</div>

                                    <div class='row'>
                                        <ul class='nav nav-pills mb-3' id='pills-tab' role='tablist'>
                                        <li class='nav-item' role='presentation'>
                                            <button class='nav-link active' id='pills-shipping-tab' data-bs-toggle='pill' data-bs-target='#pills-shipping' type='button' role='tab' aria-controls='pills-shipping' aria-selected='true'>Shipping</button>
                                        </li>
                                        <li class='nav-item' role='presentation'>
                                            <button class='nav-link' id='pills-returns-tab' data-bs-toggle='pill' data-bs-target='#pills-returns' type='button' role='tab' aria-controls='pills-returns' aria-selected='false'>Returns</button>
                                        </li>
                                        <li class='nav-item' role='presentation'>
                                            <button class='nav-link' id='pills-points-tab' data-bs-toggle='pill' data-bs-target='#pills-points' type='button' role='tab' aria-controls='pills-points' aria-selected='false'>Points</button>
                                        </li>
                                        </ul>
                                        <div class='tab-content' id='pills-tabContent'>
                                            <div class='tab-pane fade show active' id='pills-shipping' role='tabpanel' aria-labelledby='pills-shipping-tab'>
                                                Orders $50 and over always ship for free without an offer code For shipments totaling less than $50, there is a delivery charge of $7.95 for ground shipping. Please allow up to 4 business days processing time, depending on when you place your order.
                                            </div>
                                            <div class='tab-pane fade' id='pills-returns' role='tabpanel' aria-labelledby='pills-returns-tab'>You cant return it, its literally 2 dhs</div>
                                            <div class='tab-pane fade' id='pills-points' role='tabpanel' aria-labelledby='pills-points-tab'>...</div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
            echo " 
            <div class='container'>
                <div class='row'> 
                    <div class='col'>
                    $productsImage
                    </div>
                    <div class='col'>
                    $productString
                    </div>
                </div>
            </div>";
        }
    }
