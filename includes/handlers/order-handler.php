<?php require '../../includes/server.php';
    include("../../includes/classes/Cart.php");
    include("../../includes/classes/User.php");

    $userLoggedIn = $_SESSION['id'];

    $user_obj = new User($connect, $userLoggedIn);
    $cart_obj = new Cart($connect);

    if(isset($_POST['confirm_payment'])){

        // User Details
        $userID = $_SESSION['id'];
        $userTel = $_POST['user_tel']; 
        $userAddress = $_POST['user_address']; // address id
        $userPoints = $user_obj->getPoints();

        // Payment Details
        $paymentName = $_POST['payment_name'];
        $paymentCard = substr($_POST['payment_card_no'], -4); // get only last 4 digits

        // Current Date
        $date = date("Y-m-d");

        // If save card checkbox is ticked
        if (isset($_POST['save_card'])) {

            // Insert in payments table
            $paymentQuery = mysqli_query($connect, "INSERT INTO payments (user_id, name_on_card, card_number, added_at) VALUES ('$userID', '$paymentName', '$paymentCard', '$date')");
        }

        // Cart Order Details
        $orderTotal = $cart_obj->getCartTotal();
        $orderSubtotal = $cart_obj->getCartSubtotal();
        $shippingFee = $cart_obj->getShippingFee();
        $numItems = $cart_obj->getNumItems();
        $status = "Confirmed";
        $image = $_SESSION['cart'][0]['image'];

        // Insert in orders table
        $insertOrders = mysqli_query($connect, "INSERT INTO orders (user_id, address_id, payment_method, shipping_fee, total, subtotal, num_items, ordered_on, order_status, image) VALUES ('$userID', '$userAddress', '$paymentCard', '$shippingFee', '$orderTotal', '$orderSubtotal', '$numItems', '$date', '$status', '$image')");

        // Get recent order id
        $selectOrders = mysqli_query($connect, "SELECT id FROM orders ORDER BY id DESC LIMIT 1");
        $result = mysqli_fetch_array($selectOrders);
        $orderID = $result['id'];

        // Order Item Details
        foreach ($_SESSION['cart'] as $key => $value) {
            $itemName = $value['item_name'];
            $itemPrice = $value['item_price'];
            $itemSize = $value['item_size'];
            $itemQty = $value['quantity'];
            $itemTotal = $itemPrice * $itemQty;

            // Insert in order_items table
            $itemQuery = "INSERT INTO order_items (order_id, name, size, quantity, subtotal) VALUES ('$orderID', '$itemName', '$itemSize', '$itemQty', '$itemTotal')";
            
            if(mysqli_query($connect, $itemQuery)){
                unset($_SESSION['cart']); // destroy cart session

                // Update User's Points
                $userPoints = $userPoints + $numItems * 2;
                $updatePoints = mysqli_query($connect, "UPDATE users SET points='$userPoints' WHERE id='$userID'");

                echo "<script>alert('Successful Order!')
                    window.location.href='../../index.php';
                </script>";

            } else {
                echo "Error: " . $itemQuery . "<br>" . mysqli_error($connect);
            }

        }
        
    }


?>