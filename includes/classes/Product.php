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

            
            $jsonobjImg = $row["images"]; //set $jsonobj to the value of input of the array "images" from $row;
            $objImg = json_decode($jsonobjImg); //set $obj to the value of a php object converted from the string of $jsonobj

            $img = $objImg->images; // Set $img to the value of image1 from images by php object $obj
            $img1 = $objImg->images->image1; // size button image

            $jsonobjPrice = $row["price"]; 
            $objPrice = json_decode($jsonobjPrice);

            $price10ml = $objPrice->prices->price1;
            $price15ml = $objPrice->prices->price2;
            $price20ml = $objPrice->prices->price3;

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

              ?>

              <script>
                    function changePrice() {
                        var inputPrice = document.getElementById("inputPrice");
                        var inputSize = document.getElementById("inputSize");

                        var priceLabel10 = document.getElementById('price10ml');
                        var priceLabel15 = document.getElementById('price15ml');
                        var priceLabel20 = document.getElementById('price20ml');

                        var priceSize = document.getElementById('priceSize');

                        if(priceLabel15.checked) {
                            priceSize.innerHTML = priceLabel15.value + " USD";
                            inputPrice.value = priceLabel15.value;
                            inputSize.value = "15 mL";

                        } else if(priceLabel20.checked) {
                            priceSize.innerHTML = priceLabel20.value + " USD";
                            inputPrice.value = priceLabel20.value;
                            inputSize.value = "20 mL";
                            
                        } else if(priceLabel10.checked) {
                            priceSize.innerHTML = priceLabel10.value + " USD";
                            inputPrice.value = priceLabel10.value;
                            inputSize.value = "10 mL";
                        }
                        
                    }
                </script>

              <?php

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
                                <div>
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
                                <div class='d-grid' style='row-gap:1rem;'>
                                    <div>
                                        <p class='row m-0 p-0'>$description</p>
                                    </div>
                                    
                                    <form action='product-item.php?id=$itemID' method='POST'>
                                        <div class='row'>
                                            <div class='col position-relative price-btn'>
                                                <input type='radio' value='$price10ml' id='price10ml' onClick='changePrice()' name='price-selected' class='position-absolute' checked/>
                                                <label class='w-100 d-flex align-items-center gap-2' for='price10ml'>
                                                    <img src='$img1' alt=''>
                                                    <p class='m-0 p-0'>10ml</p>
                                                </label>
                                            </div>

                                            <div class='col position-relative price-btn'>
                                                <input type='radio' value='$price15ml' id='price15ml' onClick='changePrice()' name='price-selected' class='position-absolute' />
                                                <label class='w-100 d-flex align-items-center gap-2' for='price15ml'>
                                                    <img src='$img1' alt=''>
                                                    <p class='m-0 p-0'>15ml</p>
                                                </label>
                                            </div>

                                            <div class='col position-relative price-btn'>
                                                <input type='radio' value='$price20ml' id='price20ml' onClick='changePrice()' name='price-selected' class='position-absolute' />
                                                <label class='w-100 d-flex align-items-center gap-2' for='price20ml'>
                                                    <img src='$img1' alt=''>
                                                    <p class='m-0 p-0'>20ml</p>
                                                </label>
                                            </div>
                                        </div>

                                        <div class='row'>
                                            <div class='col d-flex justify-content-between align-items-center mt-4'>
                                                <input type='hidden' id='inputPrice' name='price' value=''/>
                                                <input type='hidden' id='inputSize' name='size' value=''/>
                                                <input type='hidden' name='item' value='$name'/>
                                                <p id='priceSize' class='fs-4 m-0 text-dark'>$price10ml USD</p>
                                                <div class='d-flex align-items-center gap-4'>
                                                    <p class='m-0'><a href=''>View full product</a></p>
                                                    " . $this->addToCart($id, $userID) . "
                                                    <!--<button type='button' name='add_item' class='border-0' onclick=".'"addItemToCart()"'." data-bs-toggle='modal' data-bs-target='#registerModal'>
                                                            <a class='btn btn-primary px-4'>
                                                                <p class='m-0 p-0 fs-5 fw-bold text-white px-4'>Add to Cart</p>
                                                            </a>
                                                    </button>-->
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                                <!-- Footer Section of Item -->
                                <div class='d-grid' style='row-gap:1rem;'>
                                    <div class='border-top border-bottom border-dark mt-3'>
                                        <p class='row my-1 p-0 text-center'>
                                            <i>PURCHASE AND EARN 5</i>
                                        </p>
                                    </div>

                                    <div class='row'>
                                        <div>
                                            <ul class='nav nav-pills mb-3' id='pills-tab' role='tablist'>
                                            <li class='nav-item' role='presentation'>
                                                <button class='nav-link active' id='pills-shipping-tab' data-bs-toggle='pill' data-bs-target='#pills-shipping' type='button' role='tab' aria-controls='pills-shipping' aria-selected='true'><p class='m-0 p-0'>Shipping</p></button>
                                            </li>
                                            <li class='nav-item' role='presentation'>
                                                <button class='nav-link' id='pills-returns-tab' data-bs-toggle='pill' data-bs-target='#pills-returns' type='button' role='tab' aria-controls='pills-returns' aria-selected='false'><p class='m-0 p-0'>Returns</p></button>
                                            </li>
                                            <li class='nav-item' role='presentation'>
                                                <button class='nav-link' id='pills-points-tab' data-bs-toggle='pill' data-bs-target='#pills-points' type='button' role='tab' aria-controls='pills-points' aria-selected='false'><p class='m-0 p-0'>Points</p></button>
                                            </li>
                                            </ul>
                                            <div class='tab-content' id='pills-tabContent'>
                                                <div class='tab-pane fade show active' id='pills-shipping' role='tabpanel' aria-labelledby='pills-shipping-tab'>
                                                    <p>Orders $50 and over always ship for free without an offer code For shipments totaling less than $50, there is a delivery charge of $7.95 for ground shipping. Please allow up to 4 business days processing time, depending on when you place your order.</p>
                                                </div>
                                                <div class='tab-pane fade' id='pills-returns' role='tabpanel' aria-labelledby='pills-returns-tab'>
                                                    <p>All sales are final and non-refundable. Minisize reserves the right to refuse any returns on product that has been produced explicitly for the customer. Failure to use product(s) does not constitute a basis for refusing to pay any of the associated charges.</p>
                                                </div>
                                                <div class='tab-pane fade' id='pills-points' role='tabpanel' aria-labelledby='pills-points-tab'>
                                                    <p>Every product purchased equals to two points earned. This does not include products included in a bundle. Earn 13 points to earn a free 10ml product, 15 points for a 15ml product, and 17 points for a 20ml product.</p>
                                                </div>
                                            </div>
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

        public function addToCart($itemID, $userID){
            $button = "";

            if ($userID == ""){
                $button = "<button type='button' class='border-0' data-bs-toggle='modal' data-bs-target='#registerModal'>
                                <a class='btn btn-primary px-4'>
                                    <p class='m-0 p-0 fs-5 fw-bold text-white px-4'>Add to Cart</p>
                                </a>
                            </button>";
            } else {
                $button = "<button type='submit' name='add_item' class='btn btn-primary px-4 border-0'>
                                <p class='m-0 p-0 fs-5 fw-bold text-white px-4'>Add to Cart</p>
                            </button>";
            }

            return $button;
        }
    }
