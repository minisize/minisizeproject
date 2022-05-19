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
                        <th scope="col"><h6 class="fw-bold">Cost</h6></th>
                        <th scope="col"><h6 class="fw-bold">Qty</h6></th>
                        <th scope="col"><h6 class="fw-bold">Subtotal</h6></th>
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
                                    <form action="../../includes/handlers/cart-update.php" method="POST">
                                        <div class="input-group mb-3">
                                            <input type="button" name="update" value="-" class="button-minus btn btn-sm btn-outline-secondary" data-field="quantity" onclick="updateQuantity()">
                                            <input type="text" id="itemQuantity" name="quantity" step="1" value="<?php echo $value['quantity'];?>" min="1" onchange="updateQuantity()" class="quantity-field w-25 border border-secondary d-flex text-center">
                                            <input type="hidden" id="itemPrice" name="price" value="<?php echo $value['item_price']?>">
                                            <input type="button" name="update" value="+" class="button-plus btn btn-sm btn-outline-secondary" data-field="quantity" onclick="updateQuantity()">
                                        </div>
                                </td>

                                <td>
                                    <p class="m-0 p-0">$<?php echo $itemTotal?></p>
                                </td>

                                <td>
                                    <!-- <form action="../../includes/handlers/cart-update.php" method="POST"> -->
                                        <div>
                                            <button type="submit" name="update" class="btn btn-sm btn-outline-danger text-danger">Update</button>
                                            <input type="hidden" name="item_name" value="<?php echo $value['item_name']; ?>">
                                        </div>
                                    </form>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal)) {
            parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
        
        updateQuantity();
    }

    function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal) && currentVal > 1) {
            parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(1);
        }

        
        updateQuantity();
    }

    $('.input-group').on('click', '.button-plus', function(e) {
        incrementValue(e);
    });

    $('.input-group').on('click', '.button-minus', function(e) {
        decrementValue(e);
    });

    function updateQuantity() {
        var itemQuantity = document.getElementById("itemQuantity");
        var itemNumber = document.getElementById('itemNumber');
    }

    
</script>

<?php include("../../includes/sub-footer.php"); ?>