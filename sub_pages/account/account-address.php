<?php
    require "account-nav.php";
?>
        <div id="account-page-content" class="col p-5">
            <h2>Address</h2>
            <div class="row container mt-4">
                <?php $user_obj -> loadAddressList();?>
                <button class="btn btn-outline-dark mt-4 w-100"><p class="m-0 p-0">Add New Address</p></button>    
            </div>
        </div>
    </div>
<?php
    require "../../includes/sub-footer.php";
?>