<?php
    require "account-nav.php";
?>
        <div id="account-page-content" class="col p-5">
            <h2>Address</h2>
            <div class="row container mt-4">
                <?php $user_obj -> loadAddressList();?>
                <button type="button" class="btn btn-outline-dark mt-4 w-100" data-bs-toggle="modal" data-bs-target="#addressForm"><p class="m-0 p-0">Add New Address</p></button>    
            </div>
        </div>
    </div>

    <!-- Address Modal -->
    <div class="modal fade" id="addressForm" tabindex="-1" aria-labelledby="addressFormLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="addressFormLabel">Add a new address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../../includes/handlers/address-handler.php" method="POST">
                    <div class="modal-body">
                        <section class="px-3">
                            <div class="row pb-3">
                                <p class="col m-0 p-0 fs-5"><?php echo $user_obj->getFullName();?></p>
                                <p class="col m-0 p-0 fw-light text-end"><?php echo $user_obj->getEmail();?></p>
                            </div>
                            <div class="row pb-2">
                                <div class="col ps-0">
                                    <label for="addressBldg">Building</label>
                                    <input type="text" name="address_bldg" id="addressBldg" class="form-control" required>
                                </div>
                                <div class="col pe-0">
                                    <label for="addressStreet">Street</label>
                                    <input type="text" name="address_street" id="addressStreet" class="form-control" required>
                                </div>
                            </div>
                            <div class="row pb-2">
                                <label for="addressCity" class="px-0">City</label>
                                <input type="text" name="address_city" id="addressCity" class="form-control" required>
                            </div>
                            <div class="row pb-2">
                                <label for="addressCountry" class="px-0">Country</label>
                                <input type="text" name="address_country" id="addressCountry" class="form-control" required>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="save_address" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    require "../../includes/sub-footer.php";
?>