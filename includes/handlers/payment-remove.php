<?php require '../../includes/server.php';

    if(isset($_POST['delete'])){
        $paymentID = $_POST['payment_id'];

        $removeMethod = "DELETE FROM payments WHERE id='$paymentID'";

        if (mysqli_query($connect, $removeMethod)) {

            // redirect to previous page
            echo "<script>window.history.back();</script>";

        }
    }
?>