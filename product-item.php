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

        if(isset($_SESSION['cart'])){
            $checkForItem = array_column($_SESSION['cart'], 'item_name');
            $checkForSize = array_column($_SESSION['cart'], 'item_size');

            if(in_array($itemName, $checkForItem) && in_array($size, $checkForSize)){
                echo "<script>alert('Product is already in cart!')</script>";

            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('item_name'=>$itemName, 'item_size'=>$size, 'item_price'=>$price, 'quantity'=>1);

                echo "<script>alert('Product Added');</script>";
            }
            
        } else {
            $_SESSION['cart'][0]=array('item_name'=>$itemName, 'item_size'=>$size, 'item_price'=>$price, 'quantity'=>1);

            echo "<script>alert('Product Added');</script>";

            // TODO: Add alert box design, it looks bad eheh
        }
    }

    // write review
    // if(isset($_POST["submit_review".$itemID])){
    //     $rating = $_POST["rating"];
    //     $title = $_POST["title"];
    //     // $current_date = date("Y-m-d- H:i:s");
    //     $body = $_POST["body"];

    //     $insertReview = mysqli_query($connect,"INSERT INTO reviews VALUES ('','$itemID', '$userLoggedIn', '', '$title','$body', '', '$rating', '','')");
    // }
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
                    <?php $product_obj->getReviewsData($itemID);?>
                    <div class="col">
                        <a href="write-review.php?id=<?php echo $itemID?>" class="btn btn-primary w-100 align-self-center rounded"> Write a Review </a>
                    </div>
                </div>
            </div>

            <!-- Reviews -->
            <!-- Customer Review Box 1 -->
            <div class="container">
                <?php $product_obj->loadReviews($itemID);?>
            </div>
        </div>
        <!-- END Customer Review Box 1 -->
    </main>

    <!-- Default Footer Paste -->
    <?php
    include("includes/main-footer.php");
    ?>