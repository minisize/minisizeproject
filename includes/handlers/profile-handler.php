<?php
    require "../../sub_pages/account/account-profile.php";

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $skinType = $_POST["skinType"];
    $skinConcern = $_POST["skinConcern"];

    $userEditQuery = "UPDATE users SET first_name='$firstName', last_name='$lastName', skin_type='$skinType', skin_concern='$skinConcern' where id='$userLoggedIn'";
    mysqli_query($connect, $userEditQuery);
?>