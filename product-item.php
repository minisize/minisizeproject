<!-- Default Header Paste-->
<?php include("includes/main-header.php");

    // get id
    if (isset($_GET['id'])) {
        $itemID = $_GET['id'];
    }

    // user query
    $userQuery = mysqli_query($connect, "SELECT * FROM users WHERE id='$userLoggedIn'");
    $row = mysqli_fetch_array($userQuery);
    $numWishlistItems = $row['num_wishlist'];

    // add to user wishlist
    if (isset($_POST['like_btn'])){
        // update num_wishlist in user table (increment by 1)
        $numWishlistItems++;
        $updateWishlistTotal = mysqli_query($connect, "UPDATE users SET num_wishlist='$numWishlistItems' WHERE id='$userLoggedIn'");

        $addedOn = date("Y-m-d"); // Get current date

        // insert in wishlist table
        $insertWishlistQuery = mysqli_query($connect, "INSERT INTO wishlist (user_id, product_id, added_on) VALUES ('$userLoggedIn', '$itemID', '$addedOn')");
    }

    // remove from user wishlist
    if (isset($_POST['unlike_btn'])){
        // update num_wishlist in user table (decrement by 1)
        $numWishlistItems--;
        $updateWishlistTotal = mysqli_query($connect, "UPDATE users SET num_wishlist='$numWishlistItems' WHERE id='$userLoggedIn'");

        // remove from wishlist table
        $removeItem = mysqli_query($connect, "DELETE FROM wishlist WHERE user_id='$userLoggedIn' AND product_id='$itemID'");
    }

    // add to cart
    if(isset($_POST['add_item'])){
        $itemName = $_POST['item'];
        $size = $_POST['size'];
        $price = $_POST['price'];

        // echo $itemName ."-". $size ."-". $price;

        if(isset($_SESSION['cart'])){
            $checkForItem = array_column($_SESSION['cart'], 'item_name');
            $checkForSize = array_column($_SESSION['cart'], 'item_size');

            if(in_array($itemName, $checkForItem) && in_array($size, $checkForSize)){
                echo "<script>alert('Product is already in cart!')</script>";

            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('item_name'=>$itemName, 'item_size'=>$size, 'item_price'=>$price);

                echo "<script>alert('Product Added');</script>";
            }
            
        } else {
            $_SESSION['cart'][0]=array('item_name'=>$itemName, 'item_size'=>$size, 'item_price'=>$price);

            echo "<script>alert('Product Added');</script>";

            // TODO: Add alert box design, it looks bad eheh
        }

        print_r($_SESSION['cart']);
    }
?>

<!--Add hero header in here-->

</header>

<main class="container">

    <main>

        <!-- Item Contents -->
        <div>
            <div>
                <?php $product_obj->loadProductItem($itemID, $userLoggedIn); ?>
            </div>

            <!-- Similar Products -->
            <div class="container">
                <?php $product_obj->loadSimilarProducts($itemID); ?>
            </div>
        </div>

        <div>

            <h1> Customer Reviews </h1>

            <!-- Overall results -->

            <div class="container">
                <div class="row">

                    <div class="col-3 container">
                        <div class="row"> 4 out of 5 </div>
                        <div class="row"> image of 4 out of 5 star rating </div>
                    </div>
                    <div class="col-5 container">
                        <div class="row">
                            <div class="progress col-10">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="col-1">5</p>
                        </div>
                        <div class="row">
                            <div class="progress col-10">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="col-1">4</p>
                        </div>
                        <div class="row">
                            <div class="progress col-10">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="col-1">3</p>
                        </div>
                        <div class="row">
                            <div class="progress col-10">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="col-1">2</p>
                        </div>
                        <div class="row">
                            <div class="progress col-10">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="col-1">1</p>
                        </div>
                    </div>

                    <div class="col-3 container">
                        <div class="row w-auto justify-content-center ">
                            <button type="button" class="btn btn-primary w-50  align-self-center"> Write a Review </button>
                        </div>
                        <div class="row w-auto">
                            <select class="form-select form-select-lg " aria-label=".form-select-lg example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>                            
                        </div>



                    </div>

                </div>

                

            </div>

            <div>
                <label> 3 reviews </label>
            </div>
            <!-- Reviews -->
            <!-- Customer Review Box 1 -->
            <div class="container">


                <div class="row">


                    <div class="col">

                        <h5>March 2, 2022</h5>
                        <img src="" alt="">
                        <p>One of the best I've used</p>
                        <div><label for="">was this helpful?</label><button>heart1</button><button>heart2</button></div>

                    </div>

                    <div class="col container">
                        <div class="row">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                                id est laborum.
                            </p>
                        </div>



                        <div class="row">
                            <!-- Customer Details -->

                            <div class="col">
                                <label for=""> location: </label>
                                <h6> UAE </h6>
                            </div>
                            <div class="col">
                                <label for=""> About Me: </label>
                                <h6> Skincare Addict</h6>
                            </div >
                            <div class="col">
                                <label for=""> Skin Type: </label>
                                <h6> Dry Skin</h6>
                            </div>
                            <div class="col">
                                <label for=""> Gender: </label>
                                <h6> Female </h6>
                            </div>
                            <div class="col">
                                <label for=""> Age: </label>
                                <h6> 31 - 35 </h6>
                            </div>                            
                        </div>



                    </div>

                    <!-- Get Concerns Section -->

                    <div class="col container">

                        <div class="row">
                            <img src="#" alt=" Image 1" class="col"><img src="#" alt="Image 2" class="col">
                        </div>
                        <div class="row">
                            <label> Concerns: </label>
                            <p>Acne & blemishes, Dark spots/uneven skin tone, Fine Lines & wrinkles, Dullness, Puffy
                                eyes/dark circles, Sensitive skin, Dryness</p>
                        </div>

                    </div>
                </div>
                <!-- END Customer Review Box 1 -->


                <div>
                    <h5>January 6, 2022</h5>
                    <img src="#" alt="">
                    <p>Impressive!</p>
                    <div><label for="">was this helpful?</label><button>heart1</button><button>heart2</button></div>
                </div>
                <div>
                    <p>
                        I'm impressed with the results I'm seeing using this eye cream!
                        I'm typically sensitive to vitamin c products, but I have had no irritation using this product. I'm
                        already beginning to see a
                        reduction in the dark circles under my eyes and it has only been a week
                    </p>

                    <!-- Customer Details -->

                    <div>
                        <label for=""> location: </label>
                        <h6> US </h6>
                    </div>
                    <div>
                        <label for=""> About Me: </label>
                        <h6> Stepping up my game </h6>
                    </div>
                    <div>
                        <label for=""> Skin Type: </label>
                        <h6> Combined Skin </h6>
                    </div>
                    <div>
                        <label for=""> Gender: </label>
                        <h6> Female </h6>
                    </div>
                    <div>
                        <label for=""> Age: </label>
                        <h6> 31 - 35 </h6>
                    </div>
                </div>

                <!-- Get Concerns Section -->

                <div>

                    <div>
                        <img src="#" alt=""><img src="#" alt="">
                    </div>
                    <div>
                        <label> Concern: </label>
                        <p>Fine lines & wrinkles, Puffy eyes/dark circles, Sensitive skin</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- END Customer Review Box 1 -->



        </div>
        </div>
        </div>
        <div></div>
        <div></div>
    </main>

    <!-- Default Footer Paste -->
    <?php
    include("includes/main-footer.php");
    ?>