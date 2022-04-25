<?php
    class Product {
        private $connect;

        public function __construct($connect){
            $this->connect = $connect;
        }

        public function getItemCategory($tab, $itemID) {

            $query = "SELECT * FROM $tab WHERE id='$itemID'";
            $result = mysqli_query($this->connect, $query);
            
            $this->row = mysqli_fetch_array($result);

            return $this->row['name'];
        }

        public function loadHeader($tab, $itemID){

            $query = "SELECT * FROM $tab WHERE id='$itemID'";
            $result = mysqli_query($this->connect, $query);

            $row = mysqli_fetch_array($result);

            $name = $row['name'];
            $description = $row['description'];
            $image = $row['image'];

            $headerString = "<div class='container'>
                                <div class='products-header row'>
                                    <div class='container1 col'>
                                    <h1> $name </h1>
                                    <p> $description </p>
                                    </div>
                                    <div class='container2 col'> Picture Product </div>
                                </div>
                            </div>";

            echo $headerString;
        }

        public function loadProducts($tab, $itemID){

            if($tab == "categories"){
                $tab = "category";
            }

            $tabID = $tab . "_id";
            $productString = "";

            $productDataQuery = mysqli_query($this->connect, "SELECT * FROM products WHERE $tabID='$itemID'");

            while($row = mysqli_fetch_array($productDataQuery)){
                $id = $row['id'];
                $name = $row['name'];
                $mainIngredient = $row['main_ingredient'];
                $basePrice = $row['base_price'];
                $numReviews = $row['num_reviews'];

                // $productString .= "$id <br><br> $name <br><br> $description <br><br><br>";
                $productString .= "<div class='col'>
                                        <label for=''></label><img src='#' alt=''>
                                        <div class='product-display'>
                                            <h6>$name</h6>
                                            <p>with $mainIngredient</p>
                                        </div>
                                        <div class='product-price'>
                                            <label for=''>$basePrice AED</label>
                                            <a href=''>$numReviews reviews </a>
                                        </div>
                                    </div>";
            }

            echo $productString;
        }
    }
?>