    <!-- Default Header Paste-->
    <?php
    include("../../includes/sub-header.php");
    ?>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="../../assets/styles/header_footer/header_n_footer.css">

    <!-- bootstrap link -->
    <link rel="stylesheet" href="../../assets/styles/main.css">

    <!-- Main Content Is here -->

    <main class="container">
        <div class="row mx-2">
            <div class="container mx-2 py-5 col-6 border-end">
                <div class="row mb-2">
                    <h1> Payment Details </h1>
                </div>

                <div class="row border-bottom d-flex px-1 py-3 mx-2 ">
                    <h5 class="col-4 fw-bold border border-1 text-end ">Shaine Fahardo</h5>
                    <label class="col-5 fw-bold border border-1" for="">+971 231-231-444</label>
                    <button class="col-2 bg-primary border-0 rounded ms-auto fw-light fs-6 p-2">CHANGE</button>
                </div>

                <form action="Checkout_Details.php" method="post" class="row container py-4">
                    <div class="row">
                        <label class="col-4 text-end border border-1"> Delivery Method </label>
                        <select class="col form-select " aria-label="Default select example">
                            <option value="0" selected>Regular Delivery ( 3 - 5 Days )</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="row">
                        <label class="col-4 text-end ">Address</label> <input class="col border border-1 border-dark" type="text">
                    </div>

                    <div class="row">
                        <label class="text-end col-4">Payment Method</label>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Cash
                            </label>
                        </div>

                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Card
                            </label>
                        </div>

                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">
                                Paypal
                            </label>
                        </div>
                    </div>

                    <div class="row col-10">
                        <label class="col-5 text-end">Name on Card</label>
                        <input class="col border-1 border-dark" type="text">
                    </div>


                    <div class="row col-10">
                        <label class="col-5 text-end">Card Number</label>
                        <input class="col border-1 border-dark" type="text">
                    </div>

                    <div class="row row-cols-3">
                        <div class="col-2"></div>
                        <div class="col">
                            <label class="text-end">Expiry</label>
                            <input type="text border-1 border-dark">
                        </div>

                        <div class="col">
                            <label class="text-end">CVV</label>
                            <input type="text border-1 border-dark">
                        </div>
                    </div>

                    <button class="row bg-success border-0 my-2 mx-1 w-25 float-end">CONFIRM PAYMENT: $5</button>
                </form>

            </div>

            <div class="container p-5 col-5">
                <h1 class="text-center mb-4">Order Summary</h1>
                <div>

                    <!-- List of Items -->
                    <div class="container px-4 py-3 bg-beige">
                        <div class="row bg-beige my-3">
                            <div class="col-7 bg-beige">Summer bundle pack</div>
                            <div class="col-2 bg-beige text-end">95$</div>
                            <div class="col bg-beige border text-center"> x1 </div>
                        </div>
                        <div class="row bg-beige my-3">
                            <div class="col-7 bg-beige">Summer bundle pack</div>
                            <div class="col-2 bg-beige text-end">95$</div>
                            <div class="col bg-beige border text-center"> x1 </div>
                        </div>
                        <div class="row bg-beige my-3">
                            <div class="col-7 bg-beige">Summer bundle pack</div>
                            <div class="col-2 bg-beige text-end">95$</div>
                            <div class="col bg-beige border text-center"> x1 </div>
                        </div>
                        <div class="row bg-beige my-3">
                            <div class="col-7 bg-beige">Summer bundle pack</div>
                            <div class="col-2 bg-beige text-end">95$</div>
                            <div class="col bg-beige border text-center"> x1 </div>
                        </div>
                        <div class="row bg-beige my-3">
                            <div class="col-7 bg-beige">Summer bundle pack</div>
                            <div class="col-2 bg-beige text-end">95$</div>
                            <div class="col bg-beige border text-center"> x1 </div>
                        </div>
                </div>
                <div class="container px-4 py-3 bg-beige ">
                        <div class="row bg-beige pt-3 border-dark border-top">
                            <div class="col-7 bg-beige">Delivery Fee</div>
                            <div class="col-2 bg-beige">10$</div>
                            <div class="col bg-beige text-center"></div>
                        </div>
                        <div class="row bg-beige border-dark border-bottom pb-3">
                            <div class="col-7 bg-beige">Special Voucher Code</div>
                            <div class="col-2 bg-beige">-77.25$</div>
                            <div class="col bg-beige text-center"></div>
                        </div>                    
                </div>

                <div class="container px-4 py-3 bg-beige">
                        <div class="row bg-beige">
                            <div class="col bg-beige">Total:</div>
                            <div class="col bg-beige"></div>
                            <div class="col bg-beige">5$</div>                              
                        </div>                    
                </div>

                      
                    


                </div>
                <form action="">
                    <div class="container">
                        <div class="row row-cols-2">
                            <input type="text" class="form-control col" placeholder="Enter Voucher Code">
                            <button type="submit" class="btn btn-primary col">APPLY</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>


    </main>

    <!-- Default Footer Paste -->
    <?php
    include("../../includes/main-footer.php");
    ?>