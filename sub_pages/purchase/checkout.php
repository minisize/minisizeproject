    <!-- Default Header Paste-->
    <?php
        include("../../includes/sub-header.php");
    ?>
        <!-- bootstrap link -->
        <link rel="stylesheet" href="../../assets/styles/header_footer/header_n_footer.css">

        <!-- bootstrap link -->
        <link rel="stylesheet" href="../../assets/styles/main.css">

    <!-- Main Content Is here -->

    <main>

    <div>
        <h1>Payment Details</h1>
        <div>

            <h5>Shaine Fahardo</h5>
            <label for="">+971 231-231-444</label>
            <button>change</button></div>

        <form action="Checkout_Details.php" method="post">

            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>

            Delivery method <input type="text">
            <input type="text">
            <input type="text">
            <input type="text">
            <div>
                <input type="text">
                <input type="text">   
            </div>
            
        
        </form>
        <button>CONFIRM PAYMENT:</button>

        <div>
            <h1>Order Summary</h1>
            <div></div>
            <form action=""><input type="text"><input type="text"></form>
        </div>
    </div>

    </main>

<!-- Default Footer Paste -->
<?php
    include("../../includes/main-footer.php");
?>