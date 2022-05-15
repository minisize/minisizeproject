<?php
    class User {
        private $user;
        private $connect;

        public function __construct($connect, $user){
            $this->connect = $connect;
            $userDetailsQuery = mysqli_query($connect, "SELECT * FROM users WHERE id='$user'");
            $this->user = mysqli_fetch_array($userDetailsQuery);
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

        }

        public function loadAddressList(){

        }

        public function loadPaymentList(){

        }
    }
?>