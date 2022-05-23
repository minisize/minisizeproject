<?php require '../server.php';

    $qty = $_POST['qty'];
    $index = $_POST['index'];

    foreach ($_SESSION['cart'] as $key => $value) {
            if ($key==$index) {
                $_SESSION['cart'][$key]['quantity']=$qty;

                echo "<script>
                        alert('Item updated');
                        window.location.href='../../sub_pages/purchase/cart.php';
                    </script>";
            }
        }

?>