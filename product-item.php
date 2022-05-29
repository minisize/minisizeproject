<!-- Default Header Paste-->
<?php include("includes/main-header.php");
    include("includes/handlers/reviewfeedback-handler.php");

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

    
?>

<!--Add hero header in here-->

</header>

<main class="container-lg product-item">

    <!-- Item Contents -->
    <div>
        <div class="container">
            <?php $product_obj->loadProductItem($itemID, $userLoggedIn); ?>
        </div>

        <!-- Similar Products -->
        <div class="container mt-4">
            <?php $product_obj->loadSimilarProducts($itemID); ?>
        </div>

        <div class="container mt-4">
            <h2 class="fw-bold text-darkgreen"> Customer Reviews </h2>
            <!-- Overall results -->

            <div class="container">
                <div class="row">
                    <?php $product_obj->getReviewsData($itemID, $userLoggedIn);?>
                </div>
            </div>

            <!-- Reviews -->
            <!-- Customer Review Box 1 -->
            <div class="container">
                <?php $product_obj->loadReviews($itemID);?>
            </div>
        </div>
        <!-- END Customer Review Box 1 -->
    </div>


</main>

<!-- Modal to view images from review -->
<div class="modal fade" id="review-img-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" id="revimg-modal-content">
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.img-preview').on('click', function() {
        $('#revimg-modal-content').html("");
        $count = 0;
        var img = $(this).children('div.row').children('div.col').children('img');
        img.each(function() {
            $count++;
            imgsrc = this.src;
            passImageData(imgsrc);
        })
        $("#revimg-modal-content div:first-child").addClass("active");

    });
});

function passImageData(imgsrc) {
    console.log("passImageData Called");
    var imgdiv = document.createElement("div");
    imgdiv.className = "carousel-item";
    var imgelem = document.createElement("img");
    imgelem.src = imgsrc;
    imgelem.className = "d-block w-100";
    // imgdiv.html = imgelem;
    document.getElementById("revimg-modal-content").appendChild(imgdiv).appendChild(imgelem);
}
</script>
<!-- Default Footer Paste -->
<?php
    include("includes/main-footer.php");
    ?>