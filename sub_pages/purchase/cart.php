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
                        <th scope="col">Item</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Subtotal</th>
                        <th></th>
                    </tr>
                </thead>

                <!-- Items List -->

                <tbody>

                <?php
                    if(isset($_SESSION['cart'])){
                        $total = 0;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $total = $total + $value['item_price'];
                        ?>
                            <tr>
                                <td>
                                    <p class="fw-light"><?php echo $value['item_size'];?> - <?php echo $value['item_name'];?></p>
                                </td>
                                <td>
                                    <p>$<?php echo $value['item_price']?></p>
                                </td>
                                <td>
                                    <button class="btn-sm border-0">
                                        <i class="material-icons">remove</i>
                                    </button>
                                    <input type="number" value="<?php echo $value['quantity'];?>" class="d-flex text-center" style="width:3rem;"/>
                                    <button class="btn-sm border-0">
                                        <i class="material-icons">add</i>
                                    </button>
                                </td>
                                <td>
                                    <p>$<?php echo $value['item_price']?></p>
                                </td>
                                <td>
                                    <form action="../../includes/handlers/cart-remove.php" method="POST">
                                        <button type="submit" name="remove" class="btn-sm btn-danger text-white">Remove</button>
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
                        <p><?php if(isset($_SESSION['cart'])){ echo "$" . $total; } ?></p>

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
                    <p class="fs-1 fw-bold"><?php if(isset($_SESSION['cart'])){ echo "$" . $total; } ?></p>
                </div>
                <div>
                    <button> View All </button>
                    <button> Proceed To Checkout</button>
                </div>
            </div>

        </div>
    </div>
</div>
</main>

<?php include("../../includes/sub-footer.php"); ?>