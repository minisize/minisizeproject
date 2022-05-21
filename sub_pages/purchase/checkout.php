<!-- Default Header Paste-->
<?php require "../../includes/sub-header.php"; ?>

<!-- Main Content Is here -->

<main class="container">
    <div class="row">
        <div class="col-7 py-5 border-end">
            <div class="row mb-2">
                <h2> Payment Details </h2>
            </div>

            <form action="" method="POST" class="payment-form pe-2">
                <div class="row border-bottom">
                    <div class="col-4">
                        <p class="m-0 p-0 fs-5"><?php echo $user_obj->getFullName();?></p>
                        <!-- <p id="userPhone" class="m-0 mx-4 p-0 fs-5">+971 231-231-444</p> -->
                    </div>
                    <div class="col input-group mb-3">
                        <input type="tel" class="form-control form-control-sm" placeholder="(000) 000-0000" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">TEL</span>
                        </div>
                    </div>
                    <!-- <div class="col">
                        <input type="tel" class="form-control form-control-sm" name="phone" id="userPhone">
                    </div>
                    <div class="col text-end pb-3">
                        <button id="editBtn" class="btn btn-sm btn-primary">CHANGE</button>
                    </div> -->
                </div>

                <div class="row mt-2">
                    <div class="col-4 d-flex align-self-center justify-content-end">
                        <h6 class="mb-0">Delivery Method</h6>
                    </div>
                    <div class="col">
                        <select class="form-select " aria-label="Default select example">
                            <option value="0" selected>Standard Delivery ( 3 - 5 Days )</option>
                            <option value="1">Fast Delivery</option>
                            <option value="2">Same Day Delivery</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-4 d-flex align-self-center justify-content-end">
                        <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <select class="custom-select form-select" id="inputGroupSelect04">
                                <option selected disabled>Choose...</option>
                                <?php
                                    $query = mysqli_query($connect, "SELECT * FROM addresses WHERE user_id='$userLoggedIn'");
                                    while($row = mysqli_fetch_array($query)){
                                        $id = $row['id'];
                                        $building = $row['building'];
                                        $street = $row['street'];
                                        $city = $row['city'];
                                        $country = $row['country'];

                                        ?>
                                            <option value="<?php echo $id; ?>"><?php echo "$building, $street, $city, $country"?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#addressForm">+ Add</button>
                            </div>
                        </div>
                        <!-- <input type="text" class="form-control" name="" id=""> -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 d-flex align-self-center justify-content-end">
                        <h6 class="mb-0">Payment Method</h6>
                    </div>
                    <div class="form-check col ms-3">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Card
                        </label>
                    </div>

                    <div class="form-check col">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" disabled>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Paypal
                        </label>
                    </div>

                    <div class="form-check col">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" disabled>
                        <label class="form-check-label" for="flexRadioDefault3">
                            Master Card
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 d-flex align-self-center justify-content-end">
                        <h6 class="mb-0">Name on Card</h6>
                    </div>
                    <div class="col">
                        <input class="col form-control" type="text">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 d-flex align-self-center justify-content-end">
                        <h6 class="mb-0">Card Number</h6>
                    </div>
                    <div class="col">
                        <input class="col form-control" type="text">
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-4 d-flex align-self-center justify-content-end">
                        <h6 class="mb-0">Expiry</h6>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col d-flex align-self-center justify-content-end">
                        <h6 class="mb-0">CVV</h6>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col text-end">
                        <button type="submit" class="btn btn-success">CONFIRM PAYMENT</button>
                    </div>
                </div>
            </form>

        </div>

        <div class="col">
            <h2 class="text-center mt-5 mb-4">Order Summary</h2>
            <div>

                <!-- List of Items -->
                <div class="order-summary px-4 py-3 mx-2">

                    <div class="items">
                        <?php $cart_obj->displayOrderSummary(); ?>
                    </div>
                    <div class="py-3">
                        <div class="row">
                            <div class="pb-3 border-top border-dark"></div>
                            <div class="col-8"><p class="m-0 p-0">Delivery Fee</p></div>
                            <div class="col text-end">
                                <p class="m-0 p-0"><?php echo $cart_obj->getShippingFee(); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8"><p class="m-0 p-0">Special Voucher Code</p></div>
                            <div class="col text-end">$0</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="pb-3 border-top border-dark"></div>
                        <div class="col"><p class="m-0 p-0">Total</p></div>
                        <div class="col text-end">
                            <p class="m-0 p-0"><?php echo $cart_obj->getCartTotal(); ?></p>
                        </div>
                    </div>

                </div>

                <form action="">
                    <div class="container">
                        <div class="row">
                            <input type="text" class="form-control col" placeholder="Enter Voucher Code">
                            <button type="submit" class="btn btn-primary col">APPLY</button>
                        </div>
                    </div>
                </form>

            </div>
            

        </div>
    </div>

    <!-- Modal -->
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


</main>

<!-- Default Footer Paste -->
<?php include("../../includes/sub-footer.php"); ?>