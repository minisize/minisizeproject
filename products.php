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
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $product_obj->getItemCategory($tab, $itemID);?></li>
                        </ol>
                    </nav>
                </div>
                
                <div class="maincontent-filter2">
                    <div class="filter-section">
                        <h6> Filter by </h6>
                        <select name="skin-type" id="" >
                            <option value="select1">Option 1</option>
                            <option value="select2">Option 1</option>
                            <option value="select3">Option 1</option>
                            <option value="select4">Option 1</option>
                            <option value="select5">Option 1</option>
                        </select>

                        <select name="benefit" id="" >
                            <option value="select1">Option 1</option>
                            <option value="select2">Option 1</option>
                            <option value="select3">Option 1</option>
                            <option value="select4">Option 1</option>
                            <option value="select5">Option 1</option>
                        </select>
                    </div>

                    <div class="sort-section">
                        <h6> Sort by </h6>  
                        <select name="ingredient" id="" >
                            <option value="select1">Option 1</option>
                            <option value="select2">Option 1</option>
                            <option value="select3">Option 1</option>
                            <option value="select4">Option 1</option>
                            <option value="select5">Option 1</option>
                        </select>
                    </div>
                </div>

        </div>
        <div class="maincontent-container2">
            <div class="container">
                <div class="maincontent-container2 row row-cols-5">
                    <?php $product_obj->loadProducts($tab, $itemID);?>
                </div>
            </div>
            
    </main>

<!-- Default Footer Paste -->
<?php
    include("includes/main-footer.php");
?>