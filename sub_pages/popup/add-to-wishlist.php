<?php require '../../includes/server.php';
    include("../../includes/classes/User.php");
    include("../../includes/classes/Product.php");
    
    if (isset($_SESSION['id'])){
        $userLoggedIn = $_SESSION['id'];
        $userDetailsQuery = mysqli_query($connect, "SELECT * FROM users WHERE id='$userLoggedIn'");
        $user = mysqli_fetch_array($userDetailsQuery);

        $user_obj = new User($connect, $userLoggedIn);
    }

    // TODO: Add login-alert.php when clicking wishlist when no user logged in

    $sql = "SELECT * FROM `products`";
    $result = $connect->query($sql);

    $product_obj = new Product($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
        echo "heart";
    ?>
</body>
</html>