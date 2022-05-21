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
                                    <h3>General Information</h3>
                                    <div class='row mb-4'>
                                        <div class='col'>
                                            <h4>First Name</h4>
                                            <h5>$firstName</h5>
                                        </div>
                                        <div class='col'>
                                            <h4>Last Name</h4>
                                            <h5>$lastName</h5>
                                        </div>
                                    </div>
                                    <h3>Skin Stuff</h3>
                                    <div class='row mb-4'>
                                        <div class='col'>
                                            <h4>Skin Type</h4>
                                            <h5>$skinType</h5>
                                        </div>
                                        <div class='col'>
                                            <h4>Skin Concern</h4>
                                            <h5>$skinConcern</h5>
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
                $product_img = $productData["images"];
                $product_brand = $productData["brand"];
                $product_name = $productData["name"];
                $product_price = $productData["base_price"];

                $wishlistString .= "
                <div class='row d-flex mb-4 p-4 rounded-3' style='background-color: #FFFBF8;'>
                    <div class='d-flex flex-row justify-content-between'>
                        <div style='width: parent-height;'><img src='$product_img'></div>
                        <div>
                            <div>$product_brand (brand)</div>
                            <div>$product_name</div>
                        </div>
                        <div>$product_price USD</div>
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

                $addressString .= "
                <div class='row d-flex mb-4 p-4 rounded-3' style='background-color: #FFFBF8;'>
                    <div class='d-flex flex-row justify-content-between'>
                        <div>
                            <div>Name:</div>
                            <div>userloggedin</div>
                        </div>
                        <div>
                            <div>Address:</div>
                            <div>$building, $street, $city, $country</div>
                        </div>
                        <button class='btn btn-outline-dark'>Edit</button>
                    </div>
                </div>";

            }

            echo $addressString;
        }

        public function loadPaymentList(){

        }
    }
?>