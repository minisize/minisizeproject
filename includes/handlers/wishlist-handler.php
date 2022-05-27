<?php require '../../includes/server.php';

    if(isset($_POST['remove'])){
        $wishlistID = $_POST['wishlist_id'];

        $removeMethod = "DELETE FROM wishlist WHERE id='$wishlistID'";

        if (mysqli_query($connect, $removeMethod)) {

            // redirect to previous page
            echo "<script>window.history.back();</script>";

        }
    }


?>