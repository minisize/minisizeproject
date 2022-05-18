<?php
    require "account-index.php";
?>
        <div id="account-page-content" class="col p-5">
            <h2>Address</h2>
            <div class="row mt-4">
                <?php $user_obj -> loadAddressList();?>
            </div>
            <button class="btn btn-outline-dark mt-4 w-100">Add New Address</button>
        </div>
    </div>
<?php
    require "../../includes/sub-footer.php";
?>