<!-- Default Header Paste-->
<?php
include("includes/main-header.php");

// get id
if (isset($_GET['id'])) {
    $itemID = $_GET['id'];
}
?>

<!--Add hero header in here-->

</header>

<main class="container">

    <main>

        <!-- Item Contents -->
        <div>
            <div>
                <?php $product_obj->loadProductItem($itemID); ?>
            </div>

            <!-- Similar Products -->
            <div class="container">
            <?php $product_obj->loadSimilarProducts($itemID); ?>
            </div>
        </div>

        <div>

            <h1> Customer Reviews </h1>

            <!-- Overall results -->

            <div>
                <div>

                    <div>
                        <div> 4 out of 5 </div>
                        <div> image of 4 out of 5 star rating </div>
                    </div>
                    <div>
                        <div>
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p>5</p>
                        </div>
                        <div>
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p>4</p>
                        </div>
                        <div>
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p>3</p>
                        </div>
                        <div>
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p>2</p>
                        </div>
                        <div>
                            <div class="progress">
                                <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p>1</p>
                        </div>
                    </div>

                </div>

                <div>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

            </div>

            <div>
                <label> 3 reviews </label>
            </div>
            <!-- Reviews -->
            <!-- Customer Review Box 1 -->
            <div>


                <div>

                    <h5>March 2, 2022</h5>
                    <img src="" alt="">
                    <p>One of the best I've used</p>
                    <div><label for="">was this helpe?</label><button>heart1</button><button>heart2</button></div>

                </div>

                <div>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                        id est laborum.
                    </p>

                    <!-- Customer Details -->

                    <div>
                        <label for=""> location: </label>
                        <h6> UAE </h6>
                    </div>
                    <div>
                        <label for=""> About Me: </label>
                        <h6> Skincare Addict</h6>
                    </div>
                    <div>
                        <label for=""> Skin Type: </label>
                        <h6> Dry Skin</h6>
                    </div>
                    <div>
                        <label for=""> Gender: </label>
                        <h6> Female </h6>
                    </div>
                    <div>
                        <label for=""> Age: </label>
                        <h6> 31 - 35 </h6>
                    </div>

                </div>

                <!-- Get Concerns Section -->

                <div>

                    <div>
                        <img src="#" alt=""><img src="#" alt="">
                    </div>
                    <div>
                        <label> Concerns: </label>
                        <p>Acne & blemishes, Dark spots/uneven skin tone, Fine Lines & wrinkles, Dullness, Puffy
                            eyes/dark circles, Sensitive skin, Dryness</p>
                    </div>

                </div>
            </div>
            <!-- END Customer Review Box 1 -->


            <div>
                <h5>January 6, 2022</h5>
                <img src="#" alt="">
                <p>Impressive!</p>
                <div><label for="">was this helpful?</label><button>heart1</button><button>heart2</button></div>
            </div>
            <div>
                <p>
                    I'm impressed with the results I'm seeing using this eye cream!
                    I'm typically sensitive to vitamin c products, but I have had no irritation using this product. I'm
                    already beginning to see a
                    reduction in the dark circles under my eyes and it has only been a week
                </p>

                <!-- Customer Details -->

                <div>
                    <label for=""> location: </label>
                    <h6> US </h6>
                </div>
                <div>
                    <label for=""> About Me: </label>
                    <h6> Stepping up my game </h6>
                </div>
                <div>
                    <label for=""> Skin Type: </label>
                    <h6> Combined Skin </h6>
                </div>
                <div>
                    <label for=""> Gender: </label>
                    <h6> Female </h6>
                </div>
                <div>
                    <label for=""> Age: </label>
                    <h6> 31 - 35 </h6>
                </div>
            </div>

            <!-- Get Concerns Section -->

            <div>

                <div>
                    <img src="#" alt=""><img src="#" alt="">
                </div>
                <div>
                    <label> Concern: </label>
                    <p>Fine lines & wrinkles, Puffy eyes/dark circles, Sensitive skin</p>
                </div>

            </div>
        </div>
        <!-- END Customer Review Box 1 -->



        </div>
        </div>
        </div>
        <div></div>
        <div></div>
    </main>

    <!-- Default Footer Paste -->
    <?php
    include("includes/main-footer.php");
    ?>