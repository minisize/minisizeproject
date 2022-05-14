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
    }
?>