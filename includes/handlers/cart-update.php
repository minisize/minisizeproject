<?php
require '../server.php';

$qty = $_POST['quantity'];


if(isset($_POST['update'])){
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['item_name']==$_POST['item_name']) {
            $_SESSION['cart'][$key]['quantity']=$qty;

            echo "<script>
                    alert('Item updated');
                    window.location.href='../../sub_pages/purchase/cart.php';
                </script>";
        }
        // print_r($key);
    }
}
    

?>