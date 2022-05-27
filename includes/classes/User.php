<?php
    class User {
        private $user;
        private $connect;

        public function __construct($connect, $user){
            $this->connect = $connect;
            $userDetailsQuery = mysqli_query($connect, "SELECT * FROM users WHERE id='$user'");
            $this->user = mysqli_fetch_array($userDetailsQuery);
        }

        public function getFullName(){
            $fullname = $this->user['first_name'] ." ". $this->user['last_name'];
            return $fullname;
        }

        public function getEmail(){
            return $this->user['email'];
        }

        public function getPoints(){
            return $this->user['points'];
        }

        public function getUserDetails(){
            $username = $this->user["username"];
            $query = mysqli_query($this->connect, "SELECT * FROM users WHERE username='$username'");
            $userData = mysqli_fetch_array($query);
            return $userData;
        }

        public function loadUserDetails(){
            $userString = "";
            $username = $this->user["username"];
            $query = mysqli_query($this->connect, "SELECT * FROM users WHERE username='$username'");

            while($userData = mysqli_fetch_array($query)){
                $firstName = $userData['first_name'];
                $lastName = $userData['last_name'];
                $skinType = $userData['skin_type'];
                $skinConcern = $userData['skin_concern'];

                $userString = "<div id='user-profile-info'>   
                                    <p class='m-0 p-0 fs-3'>General Information</p>
                                    <div class='row mb-4'>
                                        <div class='col'>
                                            <h5 class='fs-7 fw-bold'>First Name</h5>
                                            <h6 class='fw-normal'>$firstName</h6>
                                        </div>
                                        <div class='col'>
                                            <h5 class='fs-7 fw-bold'>Last Name</h5>
                                            <h6 class='fw-normal'>$lastName</h6>
                                        </div>
                                    </div>
                                    <p class='m-0 p-0 fs-3'>Skin Information</p>
                                    <div class='row mb-4'>
                                        <div class='col'>
                                            <h5 class='fs-7 fw-bold'>Skin Type</h5>
                                            <h6 class='fw-normal'>$skinType</h6>
                                        </div>
                                        <div class='col'>
                                            <h5 class='fs-7 fw-bold'>Skin Concern</h5>
                                            <h6 class='fw-normal'>$skinConcern</h6>
                                        </div>
                                    </div>
                                </div>";    
            }

            echo $userString;
        }

        public function loadOrdersList(){
            $orderString = "";
            $orderModal = "";
            $user = $this->user["id"];
            $query = mysqli_query($this->connect, "SELECT * FROM orders WHERE user_id='$user'");

            while($orderData = mysqli_fetch_array($query)){
                $orderID = $orderData['id'];
                $addressID = $orderData['address_id'];
                $paymentMethod = $orderData['payment_method'];
                $orderDate = $orderData['ordered_on'];

                $orderSubtotal = $orderData['subtotal'];
                $shippingFee = $orderData['shipping_fee'];
                $orderTotal = $orderData['total'];
                
                $orderNum = $orderData['num_items'];
                $status = $orderData['order_status'];
                $imgPath = $orderData['image'];

                $img = "../../" . $imgPath;

                $address_query = mysqli_query($this->connect, "SELECT * FROM addresses WHERE id='$addressID'");
                while($row = mysqli_fetch_array($address_query)){
                    $building = $row['building'];
                    $city = $row['city'];
                    $street = $row['street'];
                    $country = $row['country'];

                    $address = $building . ", " . $street . ", " . $city . ", " . $country;

                    // $loadOrderModal = $this->loadOrderModal($orderID, $orderDate, $paymentMethod, $address);
                    $getOrderDetails = $this->getOrderDetails($orderID);

                    $orderString .= "
                    <div class='row d-flex mb-4 p-4 rounded-3' style='background-color: #FFFBF8;'>
                        <div class='d-flex flex-row justify-content-between'> 
                            <div>
                                <div class='d-flex flex-row flex-grow-1'>
                                    <h5 class='m-0 fw-bold'>Order #$orderID</h5>
                                    <div class='ms-3 d-flex flex-row align-items-center'>
                                        <div class='rounded-circle me-3' style='width: 1rem; height: 1rem; background-color: green;'></div>
                                        <h5 class='fs-6 fw-light mb-0'>$status</h5>
                                    </div>  
                                </div>
                                <div><h5 class='fs-7 fw-light'>$address</h5></div>
                            </div>
                            <div>
                                <h5 class='fs-6 fw-light'>Placed On: $orderDate</h5>
                            </div>
                        </div>
                        <div class='d-flex flex-row justify-content-between mt-2'>
                            <div class='col d-flex'>
                                <img src='$img' class='img-fluid w-25 bg-pink rounded'>
                                <div class='d-flex flex-column justify-content-end ps-4'>
                                    <h5 class='fs-7 fw-bold'>Total Item(s): $orderNum</h5>
                                    <h5 class='fs-7 fw-bold'>Subtotal: $$orderSubtotal</h5>
                                    <h5 class='fs-7 fw-bold'>Shipping Fee: $$shippingFee</h5>
                                    <h5 class='fs-7 fw-bold'>Order Total: $$orderTotal </h5>
                                </div>
                            </div>
                            <div class='col d-flex align-self-end justify-content-end'>
                                <div>
                                    <button type='button' class='btn btn-primary text-light fw-bold mt-4'  data-bs-toggle='modal' data-bs-target='#orderDetailsModal$orderID'>View Order Details</button>
                                </div>
                            </div>
                        </div>
                    </div>";

                    $orderModal .= "
                    <div class='modal fade' id='orderDetailsModal$orderID' tabindex='-1' aria-labelledby='orderDetailsModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                                <div class='d-flex flex-column align-items-center w-100'>
                                    <h5 class='modal-title' id='orderDetailsModalLabel'>Order #$orderID</h5>
                                    <h5 class='fs-7 fw-light'>Placed on: $orderDate</h5>
                                </div>
                                <button type='button' class='btn-close ms-0' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <div class='container bg-light py-3 mb-3'>
                                    <h5 class='fs-6 fw-bold'>Shipping Address</h5>
                                    <h5 class='fs-7 fw-bold mb-3'>$address</h5>
                                    <h5 class='fs-6 fw-bold'>Payment Method</h5>
                                    <h5 class='fs-7 fw-bold mb-0'>**** **** **** $paymentMethod</h5>
                                </div>
                                <div class='container'>
                                    <h5 class='fs-6 fw-bold'>Items</h5>
                                    $getOrderDetails
                                    <h5 class='fs-6 fw-bold mt-4'>Order Summary</h5>
                                    <div class='row'>
                                        <h5 class='col fs-7 fw-bold'>Subtotal:</h5>
                                        <h5 class='col fs-7 fw-bold text-end'>$$orderSubtotal</h5>
                                    </div>
                                    <div class='row'>
                                        <h5 class='col fs-7 fw-bold'>Shipping fee:</h5>
                                        <h5 class='col fs-7 fw-bold text-end'>$$shippingFee</h5>
                                    </div>
                                    <div class='row'>
                                        <h5 class='col fs-7 fw-bold'>Order Total:</h5>
                                        <h5 class='col fs-7 fw-bold text-end'>$$orderTotal</h5>
                                    </div>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='modal'>Close</button>
                            </div>
                            </div>
                        </div>
                    </div>";
                }
            }

            echo $orderString . $orderModal;
        }

        public function getOrderDetails($orderID){
            $detailString = "";
            $query = mysqli_query($this->connect, "SELECT * FROM order_items WHERE order_id='$orderID'");

            while($detailsData = mysqli_fetch_array($query)){
                $id = $detailsData['id'];
                $name = $detailsData['name'];
                $size = $detailsData['size'];
                $quantity = $detailsData['quantity'];
                $subtotal = $detailsData['subtotal']; 

                $item = "";
                if($size != null){
                    $item = $size ." ". $name;
                } else {
                    $item = $name;
                }
            
                $detailString .="
                <div class='row'>
                    <div class='col'>
                    <h5 class='fs-7 fw-bold'>$item ($quantity)</h5>
                    </div>
                    <div class='col-3'>
                    <h5 class='fs-7 fw-bold text-end'>$$subtotal</h5>
                    </div>
                </div>";
            
            }

            return $detailString;
        }

        public function loadWishList(){
            $wishlistString = "";
            $user = $this->user["id"];
            $query = mysqli_query($this->connect, "SELECT * FROM wishlist WHERE user_id='$user'");

            while($wishlistData = mysqli_fetch_array($query)){
                $productID = $wishlistData['product_id'];
                $product_query = mysqli_query($this->connect, "SELECT * FROM products WHERE id='$productID'");
                while($productData = mysqli_fetch_array($product_query)){
                $product_images = $productData["images"];
                $product_brand = $productData["brand"];
                $product_name = $productData["name"];
                $product_price = $productData["base_price"];

                $object_images = json_decode($product_images);
                $img = $object_images->images->image1; 

                $product_img = "../../" . $img;

                $wishlistString .= "
                <div class='row d-flex mb-4 px-4 py-3 rounded-3' style='background-color: #FFFBF8;'>
                    <div class='d-flex flex-row justify-content-between'>
                        
                            <img src='$product_img' class='col-1 img-fluid me-2' style='width: 20%;'>
                            <div class='col d-flex flex-column justify-content-between'>
                                <div class='row'>
                                    <h5 class='fs-6 fw-light'>$product_brand (brand)</h5>
                                
                                    <h5 class='fs-6 fw-bold'>$product_name</h5>
                                </div>
                                <div class='row'>
                                    <h5 class='col-4 fs-7 fw-light'>
                                        <i class='bi bi-cart-fill'></i>
                                        Add to Cart
                                    </h5>
                                    <h5 class='col fs-7 fw-light'>
                                        <i class='bi bi-trash-fill'></i>
                                        Remove
                                    </h5>
                                </div>
                            </div>
                        
                        <h5 class='col-2 fs-4 fw-bold text-end text-darkgreen'>$product_price USD</h5>
                    </div>
                </div>";
                }

            }

            echo $wishlistString;
        }

        public function loadAddressList(){
            $addressString = "";
            $user = $this->user["id"];
            $query = mysqli_query($this->connect, "SELECT * FROM addresses WHERE user_id='$user'");

            while($addressData = mysqli_fetch_array($query)){
                $id = $addressData['id'];
                $building = $addressData['building'];
                $street = $addressData['street'];
                $city = $addressData['city'];
                $country = $addressData['country'];
                $fullname = $this->getFullName();

                ?>
                <script>
                    function toggleEdit<?php echo $id; ?>() {
                        var form = document.getElementById("editAddressForm<?php echo $id; ?>");
                        var button = document.getElementById("editBtn<?php echo $id; ?>");

                        if (form.style.display == "none") {
                            form.style.display = "block";
                            button.innerHTML = "Cancel";
                        } else {
                            form.style.display = "none";
                            button.innerHTML = "Edit";
                        }
                    }
                </script>
                <?php

                $addressString .= "
                <div class='row d-flex mb-4 p-4 rounded-3' style='background-color: #FFFBF8;'>
                    <div class='row'>
                        <div class='col-3'>
                            <h5 class='fs-7 fw-bold'>Name:</h5>
                            <h5 class='fs-7 fw-bold'>$fullname</h5>
                        </div>
                        <div class='col'>
                            <h5 class='fs-7 fw-bold'>Address:</h5>
                            <h5 class='fs-7 fw-bold'>$building, $street, $city, $country</h5>
                        </div>
                        <button class='col-2 btn btn-outline-dark edit-btn' onclick='toggleEdit$id()'><p id='editBtn$id' class='m-0 p-0'>Edit</p></button>
                    </div>

                    <div class='row' id='editAddressForm$id' style='display:none;'>
                        <form action='../../includes/handlers/address-handler.php' method='POST'>
                        <p class='m-0 mt-3 p-0 pt-2 fs-4 border-top'>Edit Details</p>
                            <div class='row'>
                                <div class='col'>
                                    <label for='editBldg'><h5 class='fs-7 fw-bold'>Building:</h5></label>
                                    <input type='text' name='building' for='editBldg' class='form-control form-control-sm' value='$building'>
                                </div>
                                <div class='col pe-0'>
                                    <label for='editStreet'><h5 class='fs-7 fw-bold'>Street:</h5></label>
                                    <input type='text' name='street' for='editStreet' class='form-control form-control-sm' value='$street'>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col'>
                                    <label for='editCity'><h5 class='fs-7 fw-bold'>City:</h5></label>
                                    <input type='text' name='city' for='editCity' class='form-control form-control-sm' value='$city'>
                                </div>
                                <div class='col pe-0'>
                                    <label for='editCountry'><h5 class='fs-7 fw-bold'>Country:</h5></label>
                                    <input type='text' name='country' for='editCountry' class='form-control form-control-sm' value='$country'>
                                </div>
                            </div>
                            <input type='hidden' name='id' value='$id'>
                            <button type='submit' name='update_address' class='col btn btn-sm btn-dark text-white mt-4'>
                                <p class='m-0 p-0'>Save Changes</p>
                            </button>
                        </form>
                    </div>
                </div>";

            }

            echo $addressString;
        }

        public function loadPaymentList(){

        }
    }
?>