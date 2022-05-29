<?php require '../../includes/server.php';

    if(isset($_POST['save_address'])){

        // Address
        $building = $_POST['address_bldg']; 
        $street = $_POST['address_street'];
        $city = $_POST['address_city'];
        $country = $_POST['address_country'];

        $userID = $_SESSION['id'];

        $insertAddress = "INSERT INTO addresses (user_id, building, street, city, country) VALUES ('$userID', '$building', '$street', '$city', '$country')";

        if (mysqli_query($connect, $insertAddress)) { // If successful
            // redirect to previous page
            echo "<script>window.history.back();</script>";

        } else {
            echo "Error: " . $insertAddress . "<br>" . mysqli_error($connect);
        }
    }

    if(isset($_POST['update_address'])){
        $id = $_POST['id'];
        $building = $_POST["building"];
        $street = $_POST["street"];
        $city = $_POST["city"];
        $country = $_POST["country"];

        $addressEditQuery = "UPDATE addresses SET building='$building', street='$street', city='$city', country='$country' WHERE id='$id'";

        if (mysqli_query($connect, $addressEditQuery)) { 
            // redirect to previous page
            echo "<script>window.history.back();</script>";
        }
    }
?>