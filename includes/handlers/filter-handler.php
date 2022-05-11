<?php require '../server.php';

    $tab = $_POST['tab'];
    $itemID = $_POST['item'];

    if($tab == "categories"){
        $tab = "category";
    }

    $tabID = $tab . "_id";
    $productString = "";
    
    $query = "SELECT * FROM products WHERE $tabID='$itemID'";
    $result = mysqli_query($connect, $query);

    while($row = mysqli_fetch_array($result)){
        $id = $row['id'];
        $name = $row['name'];
        $mainIngredient = $row['main_ingredient'];
        $basePrice = $row['base_price'];
        $numReviews = $row['num_reviews'];

        $jsonobj = $row["images"];
        $obj = json_decode($jsonobj);
        $img = $obj->images->image1;

        $skinTypes = $row['for_skin_type'];
        $skinTypeArray = explode(",",$skinTypes);

        $concerns = $row['for_skin_concern'];
        $concernArray = explode(",",$concerns);

        if(isset($_POST['skin']) || isset($_POST['benefit'])){
            $filterSkinType = $_POST['skin'];
            $filterBenefit = $_POST['benefit'];

            if ((in_array($filterSkinType, $skinTypeArray)) && ($filterBenefit == "Benefits")) {

                $productString .= "<div class='col product-display'>
                                    <label for=''></label><img src='$img' alt='product image' class='img-fluid display-item-dimension'>
                                    <div class='product-name'>
                                        <p><strong>$name</strong> <br> with $mainIngredient</p>
                                    </div>
                                    <div class='product-price'>
                                        <label for=''>$basePrice AED</label>
                                        <a href=''>$numReviews reviews </a>
                                    </div>
                                    <div class='overlay-product'></div>
                                    <a href='product-item.php?id=$id' class='product-view btn btn-outline-primary'>View</a>
                                </div>";

            } else if ((in_array($filterBenefit, $concernArray)) && ($filterSkinType == "Skin Types")) {

                $productString .= "<div class='col product-display'>
                                    <label for=''></label><img src='$img' alt='product image' class='img-fluid display-item-dimension'>
                                    <div class='product-name'>
                                        <p><strong>$name</strong> <br> with $mainIngredient</p>
                                    </div>
                                    <div class='product-price'>
                                        <label for=''>$basePrice AED</label>
                                        <a href=''>$numReviews reviews </a>
                                    </div>
                                    <div class='overlay-product'></div>
                                    <a href='product-item.php?id=$id' class='product-view btn btn-outline-primary'>View</a>
                                </div>";

            } else if (in_array($filterSkinType, $skinTypeArray) && in_array($filterBenefit, $concernArray)) {

                $productString .= "<div class='col product-display'>
                                    <label for=''></label><img src='$img' alt='product image' class='img-fluid display-item-dimension'>
                                    <div class='product-name'>
                                        <p><strong>$name</strong> <br> with $mainIngredient</p>
                                    </div>
                                    <div class='product-price'>
                                        <label for=''>$basePrice AED</label>
                                        <a href=''>$numReviews reviews </a>
                                    </div>
                                    <div class='overlay-product'></div>
                                    <a href='product-item.php?id=$id' class='product-view btn btn-outline-primary'>View</a>
                                </div>";

            }
        }

    }

    echo $productString;
?>