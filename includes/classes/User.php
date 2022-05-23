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
            $user = $this->user["id"];
            $query = mysqli_query($this->connect, "SELECT * FROM orders WHERE user_id='$user'");

            while($orderData = mysqli_fetch_array($query)){
                $orderID = $orderData['id'];
                $cartID = $orderData['cart_id'];
                $orderDate = $orderData['ordered_on'];
                $shipDate = $orderData['shipped_on'];
                $orderNum = $orderData['num_orders'];
                $status = $orderData['status'];

                
                $cart_query = mysqli_query($this->connect, "SELECT * FROM cart WHERE id='$cartID'");
                while($cartData = mysqli_fetch_array($cart_query)){

                }

                $orderString .= "
                <div class='row d-flex mb-4 p-4 rounded-3' style='background-color: #FFFBF8;'>
                    <div class='d-flex flex-row justify-content-between'> 
                        <div>
                            <div class='d-flex flex-row flex-grow-1'>
                                <h3 class='m-0'>Order #$orderNum</h3>
                                <div class='ms-3 d-flex flex-row align-items-center'>
                                    <div class='rounded-circle me-3' style='width: 1rem; height: 1rem; background-color: green;'></div>
                                    $status
                                </div>  
                            </div>
                            <div>Address of delivery</div>
                        </div>
                        <div>
                            <div>Delivered on: $shipDate</div>
                            <div>Placed On: $orderDate</div>
                        </div>
                    </div>
                    <div class='d-flex flex-row justify-content-between'>
                        <div style='width: parent-height;'>img</div>
                        <div>
                            <div>Total Item(s): </div>
                            <div>Subtotal: </div>
                            <div>Shipping Fee: </div>
                            <div>Order Total: </div>
                        </div>
                        <button class='ms-auto align-self-end btn btn-light btn-outline-dark mt-4'>View Order Details</button>
                    </div>
                </div>";
            }

            echo $orderString;
        }

        public function getOrderDetails(){

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
                $building = $addressData['building'];
                $street = $addressData['street'];
                $city = $addressData['city'];
                $country = $addressData['country'];
                $fullname = $this->getFullName();

                $addressString .= "
                <div class='row d-flex mb-4 p-4 rounded-3' style='background-color: #FFFBF8;'>
                    <div class='d-flex flex-row justify-content-between'>
                        <div>
                            <h5 class='fs-7 fw-bold'>Name:</h5>
                            <h5 class='fs-7 fw-bold'>$fullname</h5>
                        </div>
                        <div>
                            <h5 class='fs-7 fw-bold'>Address:</h5>
                            <h5 class='fs-7 fw-bold'>$building, $street, $city, $country</h5>
                        </div>
                        <button class='btn btn-outline-dark'><p class='m-0 p-0'>Edit</p></button>
                    </div>
                </div>";

            }

            echo $addressString;
        }

        public function loadPaymentList(){

        }
    }
?>