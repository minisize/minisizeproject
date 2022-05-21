<?php
    class Cart {
        private $connect;

        public function __construct($connect){
            $this->connect = $connect;
        }

        public function getCartSubtotal(){
            $cartSubtotal = 0;

            if(isset($_SESSION['cart'])){

                foreach ($_SESSION['cart'] as $key => $value) {
                    $price = $value['item_price'];
                    $qty = $value['quantity'];

                    $itemTotal = $price * $qty;
                    $cartSubtotal = $cartSubtotal + $itemTotal;

                }
            
            }

            return $cartSubtotal;

        }

        public function getShippingFee(){
            $shippingFee = 7.95;
            $cartSubtotal = $this->getCartSubtotal();

            if($cartSubtotal > 50){
                $shippingFee = 0;
            }

            return $shippingFee;

        }

        public function getCartTotal(){
            $cartTotal = 0;
            $cartSubtotal = $this->getCartSubtotal();
            $shippingFee = $this->getShippingFee();

            if(isset($_SESSION['cart'])){

                $cartTotal = $cartSubtotal + $shippingFee;
            
            }

            return $cartTotal;

        }

        public function getNumItems(){
            $i = 0;
            if(isset($_SESSION['cart'])){
                foreach ($_SESSION['cart'] as $key => $value) {
                    $qty = $value['quantity'];
                    $i = $i + $qty;
                }
            }
            return $i;
        }

        public function displayCartItems(){
            $cartString = "";

            if(isset($_SESSION['cart'])){
                $cartSubtotal = 0;
                $cartTotal = 0;
                $shippingFee = 7.95;

                foreach ($_SESSION['cart'] as $key => $value) {
                    $name = $value['item_name'];
                    $size = $value['item_size'];
                    $price = $value['item_price'];
                    $qty = $value['quantity'];
                    $image = $value['image'];

                    $itemTotal = $price * $qty;
                    $cartSubtotal = $cartSubtotal + $itemTotal;

                    $img = "../../" . $image;

                    $cartString .= "<tr>
                                        <td scope='row'>
                                            <img src='$img' alt='' class='col img-fluid cart-image'>
                                        </td>

                                        <td>
                                            <p class='col m-0 p-0'>$size - $name</p>
                                        </td>

                                        <td>
                                            <p class='m-0 p-0'>$$price</p>
                                        </td>

                                        <td>
                                            <div class='input-group mb-3 d-flex justify-content-center'>
                                                <input type='button' name='update-qty-$key' value='-' onClick='decrementQuantity($key)' class='btn btn-sm btn-outline-secondary'>
                                                <input type='text' id='input-quantity-$key' name='quantity' step='1' value='$qty' min='1' onchange='updateQuantity()' class='input-quantity w-25 border border-secondary d-flex text-center'>
                                                <input type='button' name='update-qty-$key' value='+' onClick='incrementQuantity($key)' class='btn btn-sm btn-outline-secondary'>
                                            </div>
                                        </td>

                                        <td>
                                            <p id='itemSubtotal' class='m-0 p-0'>$$itemTotal</p>
                                        </td>

                                        <td>
                                            <form action='../../includes/handlers/cart-remove.php' method='POST'>
                                                <button type='submit' name='remove' class='btn btn-sm btn-danger text-white'>Remove</button>
                                                <input type='hidden' name='item_name' value='$name'>
                                            </form>
                                        </td>
                                        
                                    </tr>";
                }

                if($cartSubtotal < 50){
                    $cartTotal = $cartSubtotal + $shippingFee;
                } else {
                    $shippingFee = 0;
                    $cartTotal = $cartSubtotal + $shippingFee;
                }

            }

            echo $cartString;
        }

        public function displayOrderSummary(){
            $orderSummary = "";

            if(isset($_SESSION['cart'])){
                
                foreach ($_SESSION['cart'] as $key => $value) {
                    $name = $value['item_name'];
                    $size = $value['item_size'];
                    $price = $value['item_price'];
                    $qty = $value['quantity'];

                    $item = $size." ".$name;

                    $itemTotal = $price * $qty;

                    $orderSummary .= "<div class='row my-3'>
                                        <div class='col-8'><p>$item</p></div>
                                        <div class='col'><p>$$price</p></div>
                                        <div class='col'><p>x$qty</p></div>
                                    </div>";
                }
            }

            echo $orderSummary;
        }
    }
?>