<!-- Default Header Paste-->
<?php include("../../includes/sub-header.php"); ?>

<!-- Main Content Is here -->

<main>

    
<div class="container">
    <div class="row">
        <!-- LEFT SEGMENT -->
        <div class="col">

            <table class="mt-4">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"><h4 class="fs-6 fw-bold">Item</h4></th>
                        <th scope="col"><h4 class="fs-6 fw-bold text-center">Cost</h4></th>
                        <th scope="col"><h4 class="fs-6 fw-bold text-center">Qty</h4></th>
                        <th scope="col"><h4 class="fs-6 fw-bold text-center">Subtotal</h4></th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <!-- Items List -->

                <tbody class="cart-table">
                    <div class="items">
                        <?php $cart_obj->displayCartItems(); ?>
                    </div>
                </tbody>
            </table>

        </div>

        <!-- RIGHT SEGMENT -->
        <div class="col-4 d-flex flex-column justify-content-between">

            <div class="mt-4">
                <div class="row">
                    <h4 class="fs-6 fw-bold text-center">Order</h4>
                </div>

                <div class="container mt-4">
                    <div class="">
                        <div class="row">
                            <p class="col fs-5 fw-light">Cart Subtotal</p>
                            <p class="col fs-5 fw-light text-end"><?php echo "$".$cart_obj->getCartSubtotal(); ?></p>
                        </div>

                        <div class="row">
                            <p class="col fs-5  fw-light">Shipping Fee</p>
                            <p class="col fs-5 fw-light text-end"><?php echo "$".$cart_obj->getShippingFee(); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mb-4">
                <div class="row">
                    <p class="fw-bold">Estimated total</p>
                    <p class="fs-1 fw-bold"><?php echo "$".$cart_obj->getCartTotal(); ?></p>
                </div class="row">

                <div class="row">
                    <a href="checkout.php" class="btn btn-primary text-white fw-bold">Proceed to Checkout</a>
                </div>
            </div>

        </div>
    </div>
</div>
</main>


<script>

    function incrementQuantity(cartKey) {
        var inputQuantityElement = $("#input-quantity-"+cartKey);
        var newQuantity = parseInt($(inputQuantityElement).val())+1;
        updateQuantity(cartKey, newQuantity);
    }

    function decrementQuantity(cartKey) {
        var inputQuantityElement = $("#input-quantity-"+cartKey);
        if($(inputQuantityElement).val() > 1) {
            var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
            updateQuantity(cartKey, newQuantity);
        }
    }

    function updateQuantity(cartKey, newQuantity) {
        var inputQuantityElement = $("#input-quantity-"+cartKey);

        $.ajax({
            url : "../../includes/handlers/cart-update.php",
            method: "POST",
            data : {
                index : cartKey,
                qty : newQuantity
            },
            success : function(data) {
                $(inputQuantityElement).val(newQuantity);
                $("#itemSubtotal").html(data);
            }
        });
    }

</script>

<?php include("../../includes/sub-footer.php"); ?>