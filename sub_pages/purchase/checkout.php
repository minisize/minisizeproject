    <!-- Default Header Paste-->
    <?php
        include("../../includes/sub-header.php");
    ?>
        <!-- bootstrap link -->
        <link rel="stylesheet" href="../../assets/styles/header_footer/header_n_footer.css">

        <!-- bootstrap link -->
        <link rel="stylesheet" href="../../assets/styles/main.css">

    <!-- Main Content Is here -->

    <main>

    <div>
        <h1>Payment Details</h1>
        <div>

            <h5>Shaine Fahardo</h5>
            <label for="">+971 231-231-444</label>
            <button>change</button></div>

        <form action="Checkout_Details.php" method="post">
            Delivery Method
            <select class="form-select" aria-label="Default select example">
                <option value="0" selected>Regular Delivery ( 3 - 5 Days )</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>

            Address <input type="text">
            Payment Method   <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Cash
                                    </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Card
                                    </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" >
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        Paypal
                                    </label>
                            </div>
            Name on Card <input type="text">
            Card Number <input type="text">
            <div>
                Expiry<input type="text">
                CVV<input type="text">   
            </div>
            
        
        </form>
        <button>CONFIRM PAYMENT:</button>

        <div>
            <h1>Order Summary</h1>
            <div>

                <!-- List of Items -->
                <div>
                    <div>
                        <div>Summer bundle pack</div>
                        <div>95$</div>
                        <div> x1 </div>
                    </div>
                    <div>
                        <div>Summer bundle pack</div>
                        <div>95$</div>
                        <div> x1 </div>
                    </div>
                    <div>
                        <div>Summer bundle pack</div>
                        <div>95$</div>
                        <div> x1 </div>
                    </div>
                    <div>
                        <div>Summer bundle pack</div>
                        <div>95$</div>
                        <div> x1 </div>
                    </div>
                    <div>
                        <div>Summer bundle pack</div>
                        <div>95$</div>
                        <div> x1 </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div>Delivery Fee</div>
                        <div>10$</div>
                    </div>
                    <div>
                        <div>Special Voucher Code</div>
                        <div>-77.25$</div>
                    </div>
                </div>

                <div>
                    <div>Total:</div>
                    <div>5$</div>
                </div>
                


            </div>
            <form action="">
                <input type="text" class="form-control" placeholder="Enter Voucher Code">
                <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
            </form>
        </div>
    </div>

    </main>

<!-- Default Footer Paste -->
<?php
    include("../../includes/main-footer.php");
?>