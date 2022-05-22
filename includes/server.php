<?php
    ob_start(); // turn on output buffering
    session_start(); // start session

    $timezone = date_default_timezone_set("Asia/Dubai"); //time

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "minisize_db";

    $connect = mysqli_connect($servername, $username, $password, $database);

    if(mysqli_connect_errno()) {
        echo "Failed to connect: " . mysqli_connect_errno();
    }

?>