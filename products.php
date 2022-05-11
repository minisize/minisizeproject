<!-- Default Header Paste-->
<?php
    include("includes/main-header.php");

    // get id
    if(isset($_GET['category_id'])){
        $itemID = $_GET['category_id'];
        $tab = "categories";
    } else if(isset($_GET['key_ingredient_id'])){
        $itemID = $_GET['key_ingredient_id'];
        $tab = "key_ingredient";
    } else if(isset($_GET['skin_concern_id'])){
        $itemID = $_GET['skin_concern_id'];
        $tab = "skin_concern";
    }
    
    $product_obj->loadHeader($tab, $itemID);
?>

</header>

<main class="">
    <div class="products-maincontent">

        <div class="maincontent-header container">
            <div class="maincontent-filter1 row">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <?php echo $product_obj->getItemCategory($tab, $itemID);?></li>
                    </ol>
                </nav>
            </div>

            <div class="maincontent-filter2">
                    <div class="row d-flex flex-wrap justify-content-between">
                        <div class="col-md-5 col-sm-8 d-flex align-items-center justify-content-between">
                            <p class="fs-5 mt-3">Filter by</p>

                            <select name="skin-type" id="skinType" onchange="selectFilter()" class="btn-outline-pink form-select form-select-sm w-25 text-dark">
                                <option selected disabled>Skin Types</option>
                                <option value="All">All</option>
                                <option value="Normal">Normal</option>
                                <option value="Combination">Combination</option>
                                <option value="Oily">Oily</option>
                                <option value="Dry">Dry</option>
                                <option value="Sensitive">Sensitive</option>
                            </select>

                            <select name="benefit" id="benefit" onchange="selectFilter()" class="btn-outline-pink form-select form-select-sm w-25 text-dark">
                                <option selected disabled>Benefits</option>
                                <option value="Hydration">Hydration</option>
                                <option value="Pore Solutions">Pores</option>
                                <option value="Troubled Skin">Troubled Skin</option>
                                <option value="Dullness & Uneven Skin Tone">Dullness & Uneven</option>
                                <option value="Sensitive Skin">Sensitive</option>
                                <option value="Age Prevention">Age Prevention</option>
                                <option value="Lifting & Firming">Lifting & Firming</option>
                            </select>
                        </div>

                        <div class="col-md-3 col-sm-4 d-flex align-items-center justify-content-evenly">
                            <p class="fs-5 mt-3">Sort by</p>
                            <select name="ingredient" id="" class="btn-outline-pink form-select form-select-sm w-50 text-dark">
                                <option value="Featured">Featured</option>
                                <option value="PriceHigh">Price: High to Low</option>
                                <option value="PriceLow">Price: Low to High</option>
                                <option value="HighRated">Highest Rated</option>
                            </select>
                        </div>
                    </div>
            </div>

        </div>
        <div class="maincontent-container2">
            <div class="container">
                <div id="loadProducts" class="maincontent-container2 row row-cols-1 row-cols-sm-2 row-cols-md-4">
                    <?php 
                        if($tab == "categories"){ $tab = "category"; }
                        $tabID = $tab . "_id";

                        $query = "SELECT * FROM products WHERE $tabID='$itemID'";
                        $result = mysqli_query($connect, $query);

                        echo $product_obj->loadProducts($result);
                    ?>
                </div>
            </div>

</main>

<script>
    function selectFilter() {
        var skinType = document.getElementById("skinType").value;
        var benefit = document.getElementById("benefit").value;
        var tab = '<?=$tab?>';
        var item = '<?=$itemID?>';

        $.ajax({
            url:"includes/handlers/filter-handler.php",
            method: "POST",
            data:{
                skin : skinType,
                benefit : benefit,
                tab : tab,
                item : item
            },
            success:function(data){
                $("#loadProducts").html(data);
            }
        });
    }
</script>

<!-- Default Footer Paste -->
<?php
    include("includes/main-footer.php");
?>