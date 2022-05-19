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
                        foreach ($_SESSION['cart'] as $key => $value) {
                            # code...
                        ?>
                            <tr>
                                <td>
                                    <p><?php echo $value['item_size'];?> - <?php echo $value['item_name'];?></p>
                                </td>
                                <td>
                                    <p>$<?php echo $value['item_price']?></p>
                                </td>
                                <td class="d-flex">
                                    <button class="btn-sm border-0">
                                        <i class="material-icons">remove</i>
                                    </button>
                                    <input type="number" value="1" class="d-flex text-center" style="width:3rem;"/>
                                    <button class="btn-sm border-0">
                                        <i class="material-icons">add</i>
                                    </button>
                                </td>
                                <td>
                                    <p>$<?php echo $value['item_price']?></p>
                                </td>
                                <td>
                                    <button class="btn-sm btn-danger text-white">Remove</button>
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
                        <label for="">3201</label>

                    </div>

                    <div>

                        <h6>Tax Value</h6>
                        <label for="">6.38$</label>

                    </div>

                </div>
            </div>

            <div>
                <div>
                    <label for="">estimated total</label>
                    <h1>326.381</h1>
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