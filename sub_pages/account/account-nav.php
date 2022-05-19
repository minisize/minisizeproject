<?php require "../../includes/sub-header.php";
?>

    <div class="row" id="acc-body" style="padding-right: 6rem !important; padding-left: 6rem !important;" >
        <div class="col-3 p-5" style="border-right: 1px solid #dee2e6 !important;">
            <h2>Account</h2>
            <nav class="mt-4" id="side-nav">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="account-profile.php" class="nav-link text-decoration-none link-dark ">
                        <span class="material-icons me-3">person</span>
                        Profile</a></li>
                    <li class="nav-item"><a href="account-orders.php" class="nav-link text-decoration-none link-dark ">
                        <span class="material-icons me-3">history</span>
                        Orders</a></li>
                    <li class="nav-item"><a href="account-wishlist.php" class="nav-link text-decoration-none link-dark ">
                    <span class="material-icons me-3">favorite</span>
                        Wishlist</a></li>
                    <li class="nav-item"><a href="account-address.php" class="nav-link text-decoration-none link-dark ">
                        <span class="material-icons me-3">pin_drop</span>
                        Address</a></li>
                    <li class="nav-item"><a href="account-payment.php" class="nav-link text-decoration-none link-dark ">
                        <span class="material-icons me-3">payments</span>
                        Payment & Points</a></li>
                </ul>
            </nav>
            <button onclick="window.location.href='../../includes/handlers/logout-handler.php';" class="btn btn-link text-decoration-none link-dark" type="button"> 
                <span class="material-icons me-3">logout</span>
                Log Out</button>
        </div>
        
