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

                <div class="row mt-3">
                    <div class="col-4 text-end">
                        <h6>Delivery Method</h6>
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
                    <div class="col-4 text-end">
                        <h6>Address</h6>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="" id="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 text-end">
                        <h6>Payment Method</h6>
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
                    <div class="col-4 text-end">
                        <h6>Name on Card</h6>
                    </div>
                    <div class="col">
                        <input class="col form-control" type="text">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 text-end">
                        <h6>Card Number</h6>
                    </div>
                    <div class="col">
                        <input class="col form-control" type="text">
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-4 text-end">
                        <h6>Expiry</h6>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col text-end">
                        <h6>CVV</h6>
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
                    <?php
                        if(isset($_SESSION['cart'])){
                            $cartSubtotal = 0;
                            $cartTotal = 0;
                            $shippingFee = 7.95;

                            foreach ($_SESSION['cart'] as $key => $value) {
                                $name = $value['item_name'];
                                $size = $value['item_size'];
                                $price = $value['item_price'];
                                $qty = $value['quantity'];

                                $item = $size." ".$name;

                                $itemTotal = $price * $qty;
                                $cartSubtotal = $cartSubtotal + $itemTotal;
                    
                            ?>
                            <div class="row my-3">
                                <div class="col-8"><p><?php echo $item;?></p></div>
                                <div class="col"><p><?php echo "$".$price;?></p></div>
                                <div class="col"><p><?php echo "x ".$qty?></p></div>
                            </div>
                            <?php
                            }

                            if($cartSubtotal < 50){
                                $cartTotal = $cartSubtotal + $shippingFee;
                            } else {
                                $shippingFee = 0;
                                $cartTotal = $cartSubtotal + $shippingFee;
                            }
                        }
                    ?>
                    </div>
                    <div class="py-3">
                        <div class="row">
                            <div class="pb-3 border-top border-dark"></div>
                            <div class="col-8"><p class="m-0 p-0">Delivery Fee</p></div>
                            <div class="col text-end">
                                <p class="m-0 p-0"><?php if(isset($_SESSION['cart'])){ echo "$" . $shippingFee; }?></p>
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
                            <p class="m-0 p-0"><?php if(isset($_SESSION['cart'])){ echo "$" . $cartTotal; } ?></p>
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


</main>

<!-- Default Footer Paste -->
<?php include("../../includes/sub-footer.php"); ?>