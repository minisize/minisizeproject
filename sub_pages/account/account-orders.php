<?php
    require "account-index.php";
?>
        <div id="account-page-content" class="col p-5">
            <h2>Orders</h2>
            <div class="col mt-4">
                <?php $user_obj -> loadOrdersList()?>
            </div>
        </div>
    </div>
<?php
    require "../../includes/sub-footer.php";
?>