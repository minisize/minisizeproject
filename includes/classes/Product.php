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

            $position = "";

            if ($tab == "categories"){
                $position = "left: 25%;";
            } else {
                $position = "left: 15%;";
            }

            $headerString = "<div class='position-relative'>
                                <img src='$image' alt='' class='img-fluid'>
                                <div class='products-header' style='$position'>
                                    <div>
                                        <div class='container1'>
                                        <h1><strong>$name</strong></h1>
                                        <p class='col-8'> $description </p>
                                        </div>
                                    </div>
                                </div>
                            </div>";

            echo $headerString;
        }

        public function loadProducts($query){

            $productString = "";

            $result = mysqli_query($this->connect, $query);

            while($row = mysqli_fetch_array($result)){
                $id = $row['id'];
                $name = $row['name'];
                $mainIngredient = $row['main_ingredient'];
                $basePrice = $row['base_price'];
                $numReviews = $row['num_reviews'];

                //set $jsonobj to the value of input of the array "images" from $row;
                $jsonobj = $row["images"];
                //set $obj to the value of a php object converted from the string of $jsonobj
                $obj = json_decode($jsonobj);
                // Set $img to the value of image1 from images by php object $obj
                $img = $obj->images->image1;

                $productString .=   "<div class='col product-display position-relative p-4 d-flex flex-column justify-content-between'>
                                        <div>
                                            <img src='$img' alt='' class='img-fluid product-img d-flex mx-auto mb-2'>
                                            <p><strong>$name</strong> <br> with $mainIngredient</p>
                                        </div>
                                        <div class='product-price d-flex align-items-center justify-content-between'>
                                            <p class='fs-5 text-darkgreen'>$basePrice USD</p>
                                            <p>$numReviews reviews</p>
                                        </div>
                                        <div class='overlay-product'></div>
                                        <a href='product-item.php?id=$id' class='product-view btn btn-outline-primary fw-bold px-5'>View</a>
                                    </div>";
            }

            return $productString;
        }

        public function loadSimilarProducts($itemID)
        {
            $Add="";
            $hascontent = false ;

            $GET_Data = mysqli_query($this->connect, "SELECT * FROM products WHERE id='$itemID'");
            $GET_Item = mysqli_fetch_array($GET_Data);
            $Key_Ingredient = $GET_Item["main_ingredient"];
            $productDataQuery = mysqli_query($this->connect, "SELECT * FROM products WHERE main_ingredient = '$Key_Ingredient'");
            $row = mysqli_fetch_array($productDataQuery);

            $Key_ingredient_ID=$row['key_ingredient_id'];



            //Creates a foreach
            while ( $row = mysqli_fetch_array($productDataQuery)) {
            
            

            //set $jsonobj to the value of input of the array "images" from $row;
            $jsonobj = $row["images"];
            //set $obj to the value of a php object converted from the string of $jsonobj
            $obj = json_decode($jsonobj);
            // Set $img to the value of image1 from images by php object $obj
            $img = $obj->images->image1;

            if ($row["id"] != $itemID) {

                //Sets $hascontent to true for appropriate response
                $hascontent = true ;

                $Add.="
                    <div class='col product-display'>
                        <label for=''></label><img src='$img' alt='product image' class='img-fluid display-item-dimension'>
                        <div class='product-name'>
                            <p><strong>".$row['name']."</strong></p>
                        </div>
                            <p>contains</p>
                            <img src='#' alt='image of ingredient'>
                        <div>
                            <label for=''>".$row['base_price']."</label>
                        </div>
                    </div>
                ";
            }
                
            }

            
            // Sets String response of $Similar_String dependent if $hascontent is true or false
            if ( $hascontent === true ) {
                $Similar_String ="
                <div class='row'>
                    <h1> Similar Products </h1>
                    <h6> with the same key ingredients </h6>
                </div>

                <div class='row row-cols-1 row-cols-sm-2 row-cols-md-4'>
                    $Add
                </div>
                ";
            } else {
                $Similar_String ="
                <div class='row'>
                    <h1> Oops Sorry! </h1>
                    <h6> there are no products in our store with the same key ingredients </h6>
                </div>";
            };

            // $Similar_String ="
            //     <div class='row'>
            //         <h1> Similar Products </h1>
            //         <h6> with the same key ingredients </h6>
            //     </div>

            //     <div class='row row-cols-1 row-cols-sm-2 row-cols-md-4'>
            //         $Add
            //     </div>
            //     ";
            echo $Similar_String;
        }

        public function loadProductItem($itemID, $userID){
            $productString = "";
            $productsImage = "";
            $productsImageCarousel = "";
            $textLink = "";
            $num = false;

            // $btn_class=" fw-normal bg-white border-0 col py-2 mx-4 rounded-3";

            $productDataQuery = mysqli_query($this->connect, "SELECT * FROM products WHERE id='$itemID'");

            $row = mysqli_fetch_array($productDataQuery);
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $mainIngredient = $row['main_ingredient'];
            $cosdnaLink = $row['cosdna_link'];
            $basePrice = $row['base_price'];

<<<<<<< Updated upstream
            //set $jsonobj to the value of input of the array "images" from $row;
            $jsonobj = $row["images"];
            //set $obj to the value of a php object converted from the string of $jsonobj
            $obj = json_decode($jsonobj);
            // Set $img to the value of image1 from images by php object $obj
            $img = $obj->images;
=======
            
            $jsonobjImg = $row["images"]; //set $jsonobj to the value of input of the array "images" from $row;
            $objImg = json_decode($jsonobjImg); //set $obj to the value of a php object converted from the string of $jsonobj

            $img = $objImg->images; // Set $img to the value of image1 from images by php object $obj
            $img1 = $objImg->images->image1; // size button image

            $jsonobjPrice = $row["price"]; 
            $objPrice = json_decode($jsonobjPrice);

            $price10ml = $objPrice->prices->price1;
            $price15ml = $objPrice->prices->price2;
            $price20ml = $objPrice->prices->price3;
>>>>>>> Stashed changes

            if($cosdnaLink == "#"){
                $textLink = "";
            } else {
                $textLink = "Ingredient list";
            }

            foreach($img as $key => $value) {
            
            if ($num === false) {
                $productsImageCarousel .="
                <div class='carousel-item active'>
                    <img src='$value' class='d-block w-100' alt='$key'>
                </div>
            ";
            
            $num = true;
            } else {
                $productsImageCarousel .="
                <div class='carousel-item'>
                    <img src='$value' class='d-block w-100' alt='$key'>
                </div>
            ";
            }
              }

            $productsImage = "<!-- Main Image Display -->
                            <div id='carouselExampleControls' class='carousel slide' data-bs-ride='carousel'>
                                <div class='carousel-inner'>
                                        $productsImageCarousel
                                </div>
                                <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='prev'>
                                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                    <span class='visually-hidden'>Previous</span>
                                </button>
                                <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleControls' data-bs-slide='next'>
                                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                    <span class='visually-hidden'>Next</span>
                                </button>
                            </div>";

            $productString .= "<div class=''>
                                <!-- Header Section of Item -->
                                <div class='container'>
                                    <div class='row d-flex align-items-baseline'>
                                        <h2 class='col fw-bold text-darkgreen'>$name</h2>
                                        <div class='col-1'>
                                            " . $this->addToWishlist($id, $userID) . "
                                        </div>
                                    </div>
                                    
                                    <div class='row'>
                                        <p class='fs-5'>with $mainIngredient
                                            <a class='fs-6 d-inline-flex align-items-baseline text-secondary' href='$cosdnaLink'>
                                                <i class='material-icons d-flex align-self-center'>link</i>
                                                $textLink
                                            </a>
                                        </p>
                                    </div>

                                </div>
                                
                                <!-- Main Section of Item -->
                                <div class='container'>

                                    <p class='row'>$description</p>
                                    <div class='row my-3'>
                                        <button class='$btn_class'><img src='#' alt=''>10ml</button>
                                        <button class='$btn_class'><img src='#' alt=''>15ml</button>
                                        <button class='$btn_class'><img src='#' alt=''>20ml</button>
                                    </div>
                                    <div class='row'>
                                        <label for='' class='col'>$basePrice AED</label>
                                        <a href='' class='col'>View full product</a>
                                        <button class='col border-0 bg-primary rounded-3 fw-bold py-1 text-white'>Add to Cart</button>
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

        public function addToWishlist($itemID, $userID){

            $button = "";

            if($userID == ""){ // if there is no user logged in
                $button = "<button class='border-0 bg-transparent' name='like_btn' value='Like' data-bs-toggle='modal' data-bs-target='#registerModal'>
                                <i class='material-icons mt-2 fs-3'>favorite_border</i>
                            </button>";
            } else {

                // check if product id with user id in wishlist table
                $checkWishlistQuery = mysqli_query($this->connect, "SELECT * FROM wishlist WHERE user_id='$userID' AND product_id='$itemID'");
                $numRows = mysqli_num_rows($checkWishlistQuery);

                if($numRows > 0){ // set button to unlike
                    $button = "<form action='product-item.php?id=$itemID' class='form-like' method='POST'>
                                    <button type='submit' class='border-0 bg-transparent' name='unlike_btn' value='Unlike'>
                                        <i class='material-icons mt-2 fs-3'>favorite</i>
                                    </button>
                                </form>";

                } else { // if no items -> set button to like
                    $button = "<form action='product-item.php?id=$itemID' class='form-like' method='POST'>
                                    <button type='submit' class='border-0 bg-transparent' name='like_btn' value='Like'>
                                        <i class='material-icons mt-2 fs-3'>favorite_border</i>
                                    </button>
                                </form>";
                }
            }
            
            return $button;
        }
    }
