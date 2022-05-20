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

                <?php
                    if(isset($_SESSION['cart'])){
                        $cartTotal = 0;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $name = $value['item_name'];
                            $itemTotal = $value['item_price'] * $value['quantity'];
                            $cartTotal = $cartTotal + $itemTotal;

                            $query = mysqli_query($connect, "SELECT images FROM products WHERE name='$name'");
                            $row = mysqli_fetch_array($query);

                            $jsonobjImg = $row["images"];
                            $objImg = json_decode($jsonobjImg);

                            $img1 = $objImg->images->image1; 

                            $img = "../../" . $img1;
                        ?>
                            <tr>
                                <td scope="row">
                                    <img src="<?php echo $img;?>" alt="" class="col img-fluid cart-image">
                                </td>

                                <td>
                                    <p class="col m-0 p-0"><?php echo $value['item_size'];?> - <?php echo $value['item_name'];?></p>
                                </td>

                                <td>
                                    <p class="m-0 p-0">$<?php echo $value['item_price']?></p>
                                </td>

                                <td>
                                    <div class="input-group mb-3 d-flex justify-content-center">
                                        <input type="button" name="update-qty-<?php echo $key;?>" value="-" onClick="decrementQuantity(<?php echo $key; ?>)" class="btn btn-sm btn-outline-secondary">
                                        <input type="text" id="input-quantity-<?php echo $key;?>" name="quantity" step="1" value="<?php echo $value['quantity'];?>" min="1" onchange="updateQuantity()" class="input-quantity w-25 border border-secondary d-flex text-center">
                                        <input type="button" name="update-qty-<?php echo $key;?>" value="+" onClick="incrementQuantity(<?php echo $key; ?>)" class="btn btn-sm btn-outline-secondary">
                                    </div>
                                </td>

                                <td>
                                    <p id="itemSubtotal" class="m-0 p-0">$<?php echo $itemTotal?></p>
                                </td>

                                <td>
                                    <!-- <form action="../../includes/handlers/cart-update.php" method="POST"> -->
                                        <!-- <div>
                                            <button type="submit" name="update" class="btn btn-sm btn-outline-danger text-danger">Update</button>
                                            <input type="hidden" name="item_name" value="<?php echo $value['item_name']; ?>">
                                        </div> -->
                                    <!-- </form> -->

                                    <form action="../../includes/handlers/cart-remove.php" method="POST">
                                        <button type="submit" name="remove" class="btn btn-sm btn-danger text-white">Remove</button>
                                        <input type="hidden" name="item_name" value="<?php echo $value['item_name']; ?>">
                                    </form>
                                </td>
                                
                            </tr>

                        <?php
                        }
                    }
                ?>

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
                        <p><?php if(isset($_SESSION['cart'])){ echo "$" . $cartTotal; } ?></p>
                    </div>

                    <div>
                        <h6>Shipping Fee</h6>
                        <p>$0</p>
                    </div>

                </div>
            </div>

            <div>
                <div>
                    <p class="fw-bold">Estimated total</p>
                    <p class="fs-1 fw-bold"><?php if(isset($_SESSION['cart'])){ echo "$" . $cartTotal; } ?></p>
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