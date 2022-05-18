<?php
    require "account-index.php";
?>
        <div id="account-page-content" class="col p-5">
            <h2>Wishlist</h2>
            <div class="row mt-4">
                <?php $user_obj -> loadWishList();?>
            </div>
        </div>
    </div>
<?php
    require "../../includes/sub-footer.php";
?>