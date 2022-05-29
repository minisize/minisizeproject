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

        public function getProductImage($itemID){
            $productData = mysqli_query($this->connect, "SELECT images FROM products WHERE id='$itemID'");
            $row = mysqli_fetch_array($productData);

            $jsonobjImg = $row["images"]; 
            $objImg = json_decode($jsonobjImg); 

            $img1 = $objImg->images->image1;

            return $img1;
            
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
                $position = "";
            } else {
                $position = "left: 20%;";
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
                $category = $row['category'];
                $mainIngredient = $row['main_ingredient'];
                $skinConcern = $row['for_skin_concern'];
                $basePrice = $row['base_price'];
                $numReviews = $row['num_reviews'];

                $jsonobj = $row["images"];
                $obj = json_decode($jsonobj);
                $img = $obj->images->image1;

                $head = "";

                if($category == "Bundles"){
                    $head = "<img src='$img' alt='' class='img-fluid product-img d-flex mx-auto mb-4'>
                            <p class='pb-3'><strong>$name</strong> <br> for $skinConcern</p>";
                } else {
                    $head = "<img src='$img' alt='' class='img-fluid product-img d-flex mx-auto mb-4'>
                            <p><strong>$name</strong> <br> with $mainIngredient</p>";
                }

                $productString .=   "<div class='col product-display position-relative p-4 d-flex flex-column justify-content-between'>
                                        <div>
                                            $head
                                        </div>
                                        <div class='product-price d-flex align-items-center justify-content-between mt-1'>
                                            <p class='fs-5 text-darkgreen'>$basePrice USD</p>
                                            <p>$numReviews reviews</p>
                                        </div>
                                        <div class='overlay-product'></div>
                                        <a href='product-item.php?id=$id' class='product-view btn btn-outline-primary fw-bold px-5'>View</a>
                                    </div>";
            }

            return $productString;
        }

        public function loadSimilarProducts($itemID){
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
                <!--<div class='row'>
                    <h1> Oops Sorry! </h1>
                    <h6> there are no products in our store with the same key ingredients </h6>
                </div>-->";
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
            $count = 0;
            $productImageIndicator = "";

            $productDataQuery = mysqli_query($this->connect, "SELECT * FROM products WHERE id='$itemID'");
            $row = mysqli_fetch_array($productDataQuery);

            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $category = $row['category'];
            $mainIngredient = $row['main_ingredient'];
            $cosdnaLink = $row['cosdna_link'];
            $basePrice = $row['base_price'];

            $jsonobjImg = $row["images"]; //set $jsonobj to the value of input of the array "images" from $row;
            $objImg = json_decode($jsonobjImg); //set $obj to the value of a php object converted from the string of $jsonobj

            $img = $objImg->images; // Set $img to the value of image1 from images by php object $obj
            $img1 = $objImg->images->image1; // size button image

            $jsonobjPrice = $row["price"]; 
            $objPrice = json_decode($jsonobjPrice);

            if($cosdnaLink == "#"){
                $textLink = "";
            } else {
                $textLink = "<i class='bi bi-link d-flex align-self-center fs-5'></i>Ingredient list";
            }

            foreach($img as $key => $value) {
            
                if ($num === false) {
                    $productsImageCarousel .="
                    <div class='carousel-item active'>
                        <div class='container'>
                            <img src='$value' class='d-block mw-100 mh-100 h-75 m-auto py-2' alt='$key'>
                        </div>
                    </div>";

                    $productImageIndicator .="
                    <li data-bs-target='#carousel' data-bs-slide-to='$count' class='active' style='background-image:url($value);'>
                    </li>";
                
                    $num = true;

                } else {
                    $productsImageCarousel .="
                    <div class='carousel-item'>
                        <div class='container'>
                            <img src='$value' class='d-block mw-100 mh-100 h-75 m-auto py-3' alt='$key'>
                        </div>
                    </div>";

                    $productImageIndicator .="
                    <li data-bs-target='#carousel' data-bs-slide-to='$count' style='background-image:url($value);'>
                    </li>";
                }

                $count = $count + 1;
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
                            <div id='carousel' class='product-carousel carousel carousel-dark slide bg-white' data-bs-ride='carousel' style='height: 37rem;'>
                                <div class='carousel-controls'>    
                                    <ol class='carousel-indicators'>
                                        $productImageIndicator
                                    </ol>
                                </div>
                                <div class='carousel-inner'>
                                        $productsImageCarousel
                                </div>
                                <button class='carousel-control-prev previous' type='button' data-bs-target='#carousel' data-bs-slide='prev'>
                                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                    <span class='visually-hidden'>Previous</span>
                                </button>
                                <button class='carousel-control-next next' type='button' data-bs-target='#carousel' data-bs-slide='next'>
                                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                    <span class='visually-hidden'>Next</span>
                                </button>
                            </div>";

            $productName = "<h2 class='col fw-bold text-darkgreen'>$name</h2>
                            <div class='col-1'>
                                " . $this->addToWishlist($id, $userID) . "
                            </div>";
            $productIngredient = "<p class='fs-5'>with $mainIngredient
                                        <a class='fs-6 d-inline-flex align-items-baseline text-secondary' href='$cosdnaLink'>
                                            $textLink
                                        </a>
                                    </p>";
           
            
            if($category == "Bundles"){
                $productIngredient = "";
                $productForm = "<form action='product-item.php?id=$itemID' method='POST'>
                                    <div class='row'>
                                        <div class='col d-flex justify-content-between align-items-center mt-4'>
                                            <input type='hidden' id='inputPrice' name='price' value='$basePrice'/>
                                            <input type='hidden' id='inputSize' name='size' value=''/>
                                            <input type='hidden' name='item' value='$name'/>
                                            <p id='priceSize' class='fs-4 m-0 text-dark'>$basePrice USD</p>
                                            <div class='d-flex align-items-center gap-4'>
                                                " . $this->addToCart($id, $userID) . "
                                            </div>
                                        </div>
                                    </div>
                                </form>";
            } else {

                $price10ml = $objPrice->prices->price1;
                $price15ml = $objPrice->prices->price2;
                $price20ml = $objPrice->prices->price3;

                $productForm = "<form action='includes/handlers/cart-handler.php' method='POST'>
                                    <div class='row'>
                                        <div class='col position-relative price-btn'>
                                            <input type='radio' value='$price10ml' id='price10ml' onClick='changePrice()' name='price-selected' class='position-absolute' checked/>
                                            <label class='w-100 d-flex align-items-center' for='price10ml'>
                                                <img src='$img1' alt=''>
                                                <p class='m-0 p-0'>10ml</p>
                                            </label>
                                        </div>

                                        <div class='col position-relative price-btn'>
                                            <input type='radio' value='$price15ml' id='price15ml' onClick='changePrice()' name='price-selected' class='position-absolute' />
                                            <label class='w-100 d-flex align-items-center' for='price15ml'>
                                                <img src='$img1' alt=''>
                                                <p class='m-0 p-0'>15ml</p>
                                            </label>
                                        </div>

                                        <div class='col position-relative price-btn'>
                                            <input type='radio' value='$price20ml' id='price20ml' onClick='changePrice()' name='price-selected' class='position-absolute' />
                                            <label class='w-100 d-flex align-items-center' for='price20ml'>
                                                <img src='$img1' alt=''>
                                                <p class='m-0 p-0'>20ml</p>
                                            </label>
                                        </div>
                                    </div>

                                    <div class='row'>
                                        <div class='col d-flex justify-content-between align-items-center mt-4'>
                                            <input type='hidden' id='inputPrice' name='price' value='$price10ml'/>
                                            <input type='hidden' id='inputSize' name='size' value='10 mL'/>
                                            <input type='hidden' name='item' value='$name'/>
                                            <input type='hidden' name='img' value='".$this->getProductImage($itemID)."'>
                                            <p id='priceSize' class='fs-4 m-0 text-dark'>$price10ml USD</p>
                                            <div class='d-flex align-items-center gap-4'>
                                                <p class='m-0'><a href=''>View full product</a></p>
                                                " . $this->addToCart($id, $userID) . "
                                            </div>
                                        </div>
                                    </div>
                                </form>";
            }

            $productString .= "<!-- Header Section of Item -->
                                <div>
                                    <div class='row d-flex align-items-baseline'>
                                        $productName
                                    </div>
                                    
                                    <div class='row'>
                                        $productIngredient
                                    </div>

                                </div>
                                
                                <!-- Main Section of Item -->
                                <div class='d-grid' style='row-gap:1rem;'>
                                    <div>
                                        <p class='row m-0 p-0'>$description</p>
                                    </div>
                                    
                                    $productForm

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
                                </div>";
            
                            
            echo "<div>
                    <div class='product-item-details row'> 
                        <div class='col ps-0'>
                        $productsImage
                        </div>
                        <div class='col pe-0'>
                        $productString
                        </div>
                    </div>
                </div>";
        }

        public function addToWishlist($itemID, $userID){

            $button = "";

            if($userID == ""){ // if there is no user logged in
                $button = "<button class='border-0 bg-transparent' name='like_btn' value='Like' data-bs-toggle='modal' data-bs-target='#registerModal'>
                                <i class='bi bi-heart mt-2 fs-3'></i>
                            </button>";
            } else {

                // check if product id with user id in wishlist table
                $checkWishlistQuery = mysqli_query($this->connect, "SELECT * FROM wishlist WHERE user_id='$userID' AND product_id='$itemID'");
                $numRows = mysqli_num_rows($checkWishlistQuery);

                if($numRows > 0){ // set button to unlike
                    $button = "<form action='product-item.php?id=$itemID' class='form-like' method='POST'>
                                    <button type='submit' class='border-0 bg-transparent' name='unlike_btn' value='Unlike'>
                                        <i class='bi bi-heart-fill mt-2 fs-3'></i>
                                    </button>
                                </form>";

                } else { // if no items -> set button to like
                    $button = "<form action='product-item.php?id=$itemID' class='form-like' method='POST'>
                                    <button type='submit' class='border-0 bg-transparent' name='like_btn' value='Like'>
                                        <i class='bi bi-heart mt-2 fs-3'></i>
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

        public function writeReview($itemID,$userID){

            if ($userID == ""){ //if no user logged in , prompt log in modal
                $button = "<button type='button' class='border-0' data-bs-toggle='modal' data-bs-target='#registerModal'>
                                <a class='btn btn-primary px-4'>
                                    <p class='m-0 p-0 fs-5 fw-bold text-white px-4'>Write a Review</p>
                                </a>
                            </button>";
            } else { //else proceed to write review
                $button = "<a href='write-review.php?id=$itemID' class='btn btn-primary w-100 align-self-center rounded'>
                                <p class='m-0 p-0 fs-5 fw-bold text-white px-4'>Write a Review</p>  
                            </a>";
            }

            return $button;
        }

        public function getReviewsData($itemID, $userID){
            $result = "";
            $query = mysqli_query($this->connect, "SELECT * FROM reviews WHERE product_id='$itemID'");
            $num = mysqli_num_rows($query);
            $rating = 0;
            $rating_ave = 0;
            $rating_five = 0; 
            $rating_four = 0;
            $rating_three = 0;
            $rating_two = 0;
            $rating_one = 0;
            $rating_star_ave = 0;
            $review_count = "";
            if($num != 0){
                while($reviewData = mysqli_fetch_array($query)){
                    $check_rating = $reviewData['rating'];
                    if ($check_rating == 5) $rating_five++;
                    if ($check_rating == 4) $rating_four++;
                    if ($check_rating == 3) $rating_three++;
                    if ($check_rating == 2) $rating_two++;
                    if ($check_rating == 1) $rating_one++;
                    $rating += $check_rating;
                }

                $rating = $rating / $num;
                $rating_ave = number_format((float)$rating,2,'.','');
                $rating_star_ave = ($rating_ave/ 5) *100;
                $rating_five = ($rating_five / $num) * 100; 
                $rating_four = ($rating_four / $num) * 100;
                $rating_three = ($rating_three / $num) * 100;
                $rating_two = ($rating_two / $num) * 100;
                $rating_one = ($rating_one / $num) * 100;

                $review_count = $rating_ave . " out of 5";
            }else{
                $review_count = "No Reviews Yet";
            }
            $result = "
            <div class='col'>
                <p class='fs-1 mb-0'>$review_count</p>
                <div class= 'py-1'>
                    <span class='position-relative'>
                        <span>
                            <i class='bi bi-star-fill fs-1 make-gray'></i>
                            <i class='bi bi-star-fill fs-1 make-gray'></i>
                            <i class='bi bi-star-fill fs-1 make-gray'></i>
                            <i class='bi bi-star-fill fs-1 make-gray'></i>
                            <i class='bi bi-star-fill fs-1 make-gray'></i>
                        </span>
                        <span class='position-absolute start-0' style='width: $rating_star_ave%;overflow: hidden;white-space: nowrap;'>
                            <i class='bi bi-star-fill fs-1 make-yellow'></i>
                            <i class='bi bi-star-fill fs-1 make-yellow'></i>
                            <i class='bi bi-star-fill fs-1 make-yellow'></i>
                            <i class='bi bi-star-fill fs-1 make-yellow'></i>
                            <i class='bi bi-star-fill fs-1 make-yellow'></i>
                        </span>
                    </span>
                    
                    <p class='mb-0 d-inline'>$num reviews</p>
                </div>
                ". $this->writeReview($itemID, $userID) ."
            </div>
            <div class='col-8'>
                <div class='row'>
                    <p class='col-1'>5</p>
                    <div class='progress col p-0'>
                        <div class='progress-bar' style='width: $rating_five%;'></div>
                    </div>
                </div>
                <div class='row'>
                    <p class='col-1'>4</p>
                    <div class='progress col p-0'>
                        <div class='progress-bar' style='width: $rating_four%;'></div>
                    </div>
                </div>
                <div class='row'>
                    <p class='col-1'>3</p>
                    <div class='progress col p-0'>
                        <div class='progress-bar' style='width: $rating_three%;'></div>
                    </div>
                </div>
                <div class='row'>
                    <p class='col-1'>2</p>
                    <div class='progress col p-0'>
                        <div class='progress-bar' style='width: $rating_two%;'></div>
                    </div>
                </div>
                <div class='row'>
                    <p class='col-1'>1</p>
                    <div class='progress col p-0'>
                        <div class='progress-bar' style='width: $rating_one%;'></div>
                    </div>
                </div>
            </div>";
            
            echo $result;
        }
        
        public function loadReviews($itemID){
            $reviewString= "";
            $query = mysqli_query($this->connect, "SELECT * FROM reviews WHERE product_id='$itemID'");

            while($reviewData = mysqli_fetch_array($query)){
                $review_id = $reviewData['id'];
                $userID = $reviewData ['user_id'];
                $time = $reviewData ['timestamp'];
                $title = $reviewData ['title'];
                $body = $reviewData ['body'];
                $rating = $reviewData ['rating'];
                $rating = ($rating / 5) * 100; //to set star style
                $likes = $reviewData['likes'];
                $dislikes = $reviewData['dislikes'];
                $reviewImagePreview = "";
                $imageGroup = "";
                $timeString = "";

                $jsonobjImg = $reviewData['images']; //set $jsonobj to the value of input of the array "images" from $row;
                if ($jsonobjImg != "null"){
                    $objImg = json_decode($jsonobjImg); //set $obj to the value of a php object converted from the string of $jsonobj
                    $img = $objImg->images; // Set $img to the value of image1 from images by php object $obj
                    foreach($img as $key => $value) {
                        $reviewImagePreview .= "
                        <div class='col p-0' style='height: 6rem; overflow: hidden;'>
                            <img src='$value' class='h-100' alt='$key'>
                        </div>"; 
                    }
                }

                if($reviewImagePreview != ""){
                    $imageGroup = "<a class='img-preview'  data-bs-toggle='modal' data-bs-target='#review-img-modal'><div class='row d-flex flex-row gap-1 m-0'>$reviewImagePreview</div></a>";
                }

                
                $timeString = new DateTime($time);
                $month = $timeString->format("m");
                $day = $timeString->format("d");
                $year = $timeString->format("Y");
                if($month == "1"){
                    $timeString = "January";
                }else if ($month == "2"){
                    $timeString = "February";
                }else if ($month == "3"){
                    $timeString = "March";
                }else if ($month== "4"){
                    $timeString = "April";
                }else if ($month == "5"){
                    $timeString = "May";
                }else if ($month == "6"){
                    $timeString = "June";
                }else if ($month == "7"){
                    $timeString = "July";
                }else if ($month == "8"){
                    $timeString = "August";
                }else if ($month == "9"){
                    $timeString = "September";
                }else if ($month == "10"){
                    $timeString = "October";
                }else if ($month == "11"){
                    $timeString = "November";
                }else if ($month == "12"){
                    $timeString = "December";
                }

                $timeString .= " ". $day . " " . $year;

                $userquery = mysqli_query($this->connect, "SELECT * FROM users WHERE id='$userID'");
                while($userData = mysqli_fetch_array($userquery)){
                    $username = $userData['username'];
                    $skin_concern = $userData['skin_concern'];
                    $skin_type = $userData['skin_type'];
                    // $age_range = $userData['age_range'];
                    // $gender = $userData['gender'];

                    $reviewString .= "
                    <hr>
                    <div class='row p-2'>
                    <div class='col d-flex flex-column gap-1'>
                        <p class='mb-0'>$timeString</p>
                        <div>
                            <span class='position-relative'>
                                <span>
                                    <i class='bi bi-star-fill fs-3 make-gray'></i>
                                    <i class='bi bi-star-fill fs-3 make-gray'></i>
                                    <i class='bi bi-star-fill fs-3 make-gray'></i>
                                    <i class='bi bi-star-fill fs-3 make-gray'></i>
                                    <i class='bi bi-star-fill fs-3 make-gray'></i>
                                </span>
                                <span class='position-absolute start-0' style='width: $rating%;overflow: hidden;white-space: nowrap;'>
                                    <i class='bi bi-star-fill fs-3 make-yellow'></i>
                                    <i class='bi bi-star-fill fs-3 make-yellow'></i>
                                    <i class='bi bi-star-fill fs-3 make-yellow'></i>
                                    <i class='bi bi-star-fill fs-3 make-yellow'></i>
                                    <i class='bi bi-star-fill fs-3 make-yellow'></i>
                                </span>
                            </span>
                        </div>
                        <h4>$title</h4>
                        <p class='d-inline mt-auto mb-0'>Was this helpful?
                            <a class='btn feedback-btn' data-id='$review_id' data-action='like' data-product='product-item.php?id=$itemID'><span class='count'>$likes</span><i class='bi bi-hand-thumbs-up'></i></a>
                            <a class='btn feedback-btn' data-id='$review_id' data-action='dislike' data-product='product-item.php?id=$itemID'><span class='count'>$dislikes</span><i class='bi bi-hand-thumbs-down'></i></a>
                        </p>
                    </div>
                    <div class='col-5'>
                        <p>$body</p>
                    </div>
                    <div class='col d-flex flex-column justify-content-between gap-3'>
                        $imageGroup
                        <div class='d-flex flex-row justify-content-between'>
                            <div>
                                <p class='text-dark mb-0 fs-7'>Skin Concern:</p>
                                <p class='text-dark mb-0 fs-7'>$skin_concern</p>
                            </div> 
                            <div>
                                <p class='text-dark mb-0 fs-7'>Skin Type:</p>
                                <p class='text-dark mb-0 fs-7'>$skin_type</p>
                            </div>
                            <div>
                                <p class='text-dark mb-0 fs-7'>Age:</p>
                                <p class='text-dark mb-0 fs-7'>31 - 35</p>
                            </div>      
                            <div>
                                <p class='text-dark mb-0 fs-7'>Gender:</p>
                                <p class='text-dark mb-0 fs-7'>Female</p>
                            </div>                      
                        </div>
                        <p class='fs-2 mb-0 align-self-end'>$username</p>
                    </div>
                </div>";
                }
            }

            echo $reviewString;
        }
    }
