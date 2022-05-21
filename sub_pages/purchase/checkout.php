<!-- Default Header Paste-->
<?php require "../../includes/sub-header.php"; ?>

<!-- Main Content Is here -->

<main class="container">
    <div class="row">
        <div class="col-7 py-5 border-end">
            <div class="row mb-2">
                <h2> Payment Details </h2>
            </div>

            <form action="../../includes/handlers/order-handler.php" method="POST" class="payment-form pe-2" id="checkoutForm">
                <div class="row border-bottom">
                    <div class="col-4">
                        <p class="m-0 p-0 fs-5"><?php echo $user_obj->getFullName();?></p>
                        <!-- <p id="userPhone" class="m-0 mx-4 p-0 fs-5">+971 231-231-444</p> -->
                    </div>
                    <div class="col input-group mb-3">
                        <input type="tel" class="form-control form-control-sm" name="user_tel"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="(000) 000-0000" aria-describedby="addon" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="addon">TEL</span>
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
                        <select class="form-select" name="delivery_method" form="checkoutForm" required>
                            <option value="0" selected>Standard Delivery ( 3 - 5 Days )</option>
                        </select>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-4 d-flex align-self-center justify-content-end">
                        <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <select class="custom-select form-select" name="user_address" form="checkoutForm" required>
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
                        <input class="form-check-input" type="radio" value="card" name="payment_method" id="cardMethod"
                            checked>
                        <label class="form-check-label" for="cardMethod">
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
                        <input class="col form-control" type="text" name="payment_name" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 d-flex align-self-center justify-content-end">
                        <h6 class="mb-0">Card Number</h6>
                    </div>
                    <div class="col">
                        <input class="col form-control" type="text" name="payment_card_no" required>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-4 d-flex align-self-center justify-content-end">
                        <h6 class="mb-0">Expiry</h6>
                    </div>
                    <div class="col-4 d-flex">
                        <select name="expiry_month" id="expiryMonth" class="form-select" form="checkoutForm" required>
                            <option selected disabled>MM</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select> 
                        <select name="expiry_year" id="expiryYear" class="form-select" form="checkoutForm" required>
                            <option selected disabled>YY</option>
                            <option value="22">2022</option>
                            <option value="23">2023</option>
                            <option value="24">2024</option>
                            <option value="25">2025</option>
                            <option value="26">2026</option>
                        </select> 
                        <!-- <input type="text" class="form-control text-center" placeholder="MM/YY"> -->
                    </div>
                    <div class="col-2 d-flex align-self-center justify-content-end">
                        <h6 class="mb-0">CVV</h6>
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control text-center" name="cvv" placeholder="000" minlength="3" pattern="[0-9]+" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-check d-flex justify-content-end align-items-center">
                        <input class="form-check-input my-0 mx-2" type="checkbox" name="save_card" value="Yes" id="saveCard" checked>
                        <label class="form-check-label" for="saveCard">
                            Save Card
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-end">
                        <button type="submit" name="confirm_payment" class="btn btn-success">CONFIRM PAYMENT</button>
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
                                <p class="m-0 p-0"><?php echo "$".$cart_obj->getShippingFee(); ?></p>
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
                            <p class="m-0 p-0"><?php echo "$".$cart_obj->getCartTotal(); ?></p>
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


</main>

<!-- Default Footer Paste -->
<?php include("../../includes/sub-footer.php"); ?>