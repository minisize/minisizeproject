<?php require '../server.php';
    include("../classes/Product.php");
    $product_obj = new Product($connect);

    // add to cart
    if(isset($_POST['add_item'])){
        $itemName = $_POST['item'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        $img = $_POST['img'];

        if(isset($_SESSION['cart'])){
            $checkForItem = array_column($_SESSION['cart'], 'item_name');
            $checkForSize = array_column($_SESSION['cart'], 'item_size');

            if(in_array($itemName, $checkForItem) && in_array($size, $checkForSize)){
                echo "<script>
                alert('Product is already in cart!');
                window.history.back();</script>";

            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('item_name'=>$itemName, 'item_size'=>$size, 'item_price'=>$price, 'quantity'=>1, 'image'=>$img);

                echo "<script>alert('Product Added');
                window.history.back();</script>";
            }
            
        } else {
            $_SESSION['cart'][0]=array('item_name'=>$itemName, 'item_size'=>$size, 'item_price'=>$price, 'quantity'=>1, 'image'=>$img);

            echo "<script>alert('Product Added');
            window.history.back();</script>";
        }
    }

    // remove from cart
    if(isset($_POST['remove'])){
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['item_name']==$_POST['item_name']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);

                echo "<script>
                    alert('Product removed.');
                    window.location.href='../../sub_pages/purchase/cart.php';
                    </script>";
            }
            // print_r($key);
        }
    }
?>