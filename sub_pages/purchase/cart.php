<!-- Default Header Paste-->
<?php include("../../includes/sub-header.php"); ?>

<!-- Main Content Is here -->

<main>

    
<div class="container">
    <div class="row">
        <!-- LEFT SEGMENT -->
        <div class="col">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"><h6 class="fw-bold">Item</h6></th>
                        <th scope="col"><h6 class="fw-bold text-center">Cost</h6></th>
                        <th scope="col"><h6 class="fw-bold text-center">Qty</h6></th>
                        <th scope="col"><h6 class="fw-bold text-center">Subtotal</h6></th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <!-- Items List -->

                <tbody>
                    <?php $cart_obj->displayCartItems(); ?>
                </tbody>
            </table>

        </div>

        <!-- RIGHT SEGMENT -->
        <div class="col-4">

            <div>
                <div>
                    <h5>Order</h5>
                </div>

                <div>
                    <div>
                        <h6>Cart Subtotal</h6>
                        <p><?php echo $cart_obj->getCartSubtotal(); ?></p>
                    </div>

                    <div>
                        <h6>Shipping Fee</h6>
                        <p><?php echo $cart_obj->getShippingFee(); ?></p>
                    </div>

                </div>
            </div>

            <div>
                <div>
                    <p class="fw-bold">Estimated total</p>
                    <p class="fs-1 fw-bold"><?php echo $cart_obj->getCartTotal(); ?></p>
                </div>
                <div>
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