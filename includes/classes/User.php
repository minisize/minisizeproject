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
                $orderAmount = $orderData['num_orders'];
                $status = $orderData['status'];

                
                $cart_query = mysqli_query($this->connect, "SELECT * FROM cart WHERE id='$cartID'");
                while($cartData = mysqli_fetch_array($cart_query)){

                }

                $orderString .= "
                <div class='row mb-4'>
                    <h3>Order #$orderID</h3>
                    <div>$status</div>
                    <div>$shipDate</div>
                    <div>$orderDate</div>
                    <div>$orderAmount</div>
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