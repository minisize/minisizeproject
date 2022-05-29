<?php
    require "account-nav.php";
?>
        <div id="account-page-content" class="col p-5">
            <h2>Payment Method</h2>
            <div class="row container mt-4">
                <div class="row mb-4 px-4 py-3 rounded-3" style="background-color: #FFFBF8;">
                    <table>
                        <thead>
                            <th><p class="m-0 fw-normal">Methods</p></th>
                            <th><p class="m-0 fw-normal">Expiry</p></th>
                            <th><p></p></th>
                        </thead>
                        <tbody>
                            <?php $user_obj -> loadPaymentList();?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <p class="m-0 p-0">Available Points</p>
                    <p class="m-0 p-0 fs-4"><?php echo $user_obj -> getPoints();?> pts</p>
                </div>
                <!-- <div class="col-7">
                    <p class="fs-7 pe-0" style="text-align: justify;">Every product purchased equals to two points earned. This does not include products included in a bundle. Earn 13 points to earn a free 10ml product, 15 points for a 15ml product, and 17 points for a 20ml product.</p>
                </div> -->
            </div>
        </div>
    </div>
<?php
    require "../../includes/sub-footer.php";
?>