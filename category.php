    <!-- Default Header Paste-->
    <?php
        include_once '/wamp64/www/phpservers/minisizeproject/includes/main-header.php';
    ?>

    <main>
        <div class="container position-relative w-100">
            <div class="d-flex vh-100 position-relative bottom-50 end-0 justify-content-end">
                <img src="./assets/images/products/bundles/acne-cleanser.jpg" class="w-75">
            </div>
            <div class="d-inline container w-25 bg-success bg-opacity-10 position-absolute top-25 start-0 rounded-3 shadow">
                <div class="d-flex flex-column justify-content-start container p-5">
                    <h3 class="row">Category</h3>
                    <a href="" class="row">Bundles</a>
                    <a href="" class="row">Moisterizer</a>
                    <a href="" class="row">Toners</a>
                    <a href="" class="row">Serum & Essence</a>
                    <a href="" class="row">Cleanser</a>
                    <a href="" class="row">Masks</a>
                </div>
            </div>
        </div>
        <div class="container ">
            <div class="row py-5 border-bottom">
                <div class="col-2">
                    <h3>Bundles</h3>
                    <p>small set of skincare products for 1 time use</p>
                    <button>View All</button>
                </div>
                <!-- PHP CODE FOR LISTING -->
            <?php

                //Limit the items to display
                $Item_Display_Limit=0;

                //Gets data from minisize_db
                if ($result -> num_rows > 0){

                    while (($row = $result -> fetch_assoc()) && ($Item_Display_Limit <= 2)){

                        //set $jsonobj to the value of input of the array "images" from $row;
                        $jsonobj = $row["images"];
                        //set $obj to the value of a php object converted from the string of $jsonobj
                        $obj = json_decode($jsonobj);
                        // Set $img to the value of image1 from images by php object $obj
                        $img = $obj->images->image1;

                        //Creation of HTML
                        echo "
                        <div class='col'>
                            <div>
                                <img src='".$img."' alt='' class='img-fluid display-item-dimension'>
                                <h5>". $row["name"] ."</h5>
                                <p>". "By ".$row["brand"]."</p>
                            </div>
                            <div class='d-flex justify-content-between'><label for=''>". $row["base_price"]. " dhs" ."</label><a href='#'>16 reviews</a></div>
                        </div>
                        ";
                        $Item_Display_Limit += 1;
                    }
                } else {
                    echo "0 results";
                }
                ?>
                <!--COMMENTED OUT
            <div class="col">
                    <div>
                        <img src="#" alt="">
                        <h3>Item Name</h3>
                        <p>Sub content</p>
                    </div>
                    <div class="d-flex justify-content-between"><label for="">12 dhs</label><a href="#">16 reviews</a></div>
                </div>
                <div class="col">
                    <div>
                        <img src="#" alt="">
                        <h3>Item Name</h3>
                        <p>Sub content</p>
                    </div>
                    <div><label for="">12 dhs</label><a href="#">16 reviews</a></div>
                </div>
                <div class="col">
                    <div>
                        <img src="#" alt="">
                        <h3>Item Name</h3>
                        <p>Sub content</p>
                    </div>
                    <div><label for="">12 dhs</label><a href="#">16 reviews</a></div>
                </div>
            -->
                
            </div>
            <div class="row py-5">
                <div class="col-2">
                    <div></div>
                    <h3>Moisture</h3>
                    <p>Lock in hydration all day long</p>
                    <button>View All</button>
                </div>
                <div class="col">
                    <div>
                        <img src="#" alt="">
                        <h3>Item Name</h3>
                        <p>Sub content</p>
                    </div>
                    <div><label for="">12 dhs</label><a href="#">20 reviews</a></div>
                </div>
                <div class="col">
                    <div>
                        <img src="#" alt="">
                        <h3>Item Name</h3>
                        <p>Sub content</p>
                    </div>
                    <div><label for="">12 dhs</label><a href="#">160 reviews</a></div>
                </div>
                <div class="col">
                    <div>
                        <img src="#" alt="">
                        <h3>Item Name</h3>
                        <p>Sub content</p>
                    </div>
                    <div><label for="">12 dhs</label><a href="#">222 reviews</a></div>
                </div>
            </div>
            <div class="row py-5 border-top">
                <div class="col-2">
                    <h3>Toner</h3>
                    <p>soften and rebalance the skin</p>
                    <button>View all</button>
                </div>
                <div class="col">
                    <div>
                        <img src="#" alt="">
                        <h3>Item Name</h3>
                        <p>Sub content</p>
                    </div>
                    <div><label for="">12 dhs</label><a href="#">5 reviews</a></div>
                </div>
                <div class="col">
                    <div>
                        <img src="#" alt="">
                        <h3>Item Name</h3>
                        <p>Sub content</p>
                    </div>
                    <div><label for="">12 dhs</label><a href="#">12 reviews</a></div>
                </div>
                <div class="col">
                    <div>
                        <img src="#" alt="">
                        <h3>Item Name</h3>
                        <p>Sub content</p>
                    </div>
                    <div><label for="">12 dhs</label><a href="#">16 reviews</a></div>
                </div>
            </div>
        </div>
    </main>

        <!-- Default Footer Paste -->
        <?php
        include_once '/wamp64/www/phpservers/minisizeproject/includes/main-footer.php';
    ?>