<?php 
    include("includes/main-header.php");

    // get id
    if (isset($_GET['id'])) {
        $itemID = $_GET['id'];
    }

    $queryProductDetails = mysqli_query($connect, "SELECT * FROM products WHERE id = '$itemID'");
    $productDetails = mysqli_fetch_array($queryProductDetails);
    
    $jsonobj = $productDetails["images"];
    $obj = json_decode($jsonobj);
    $img = $obj->images->image1;
    
    $error_msg = array();

    if(isset($_POST["submit_review"])){
        $valid = 1; //check if submission is in correct format, 1 = yes, 0 = no
        $rating = $_POST["rating"];
        $title = $_POST["title"];
        $current_date = date("Y-m-d");
        $body = $_POST["body"];

        $title = mysqli_real_escape_string($connect, $title); //remove quotes to avoid query failure
        $body = mysqli_real_escape_string($connect, $body); 

        $rev_img = array_filter($_FILES['rev_img']['name']);
        $total_img = count($_FILES["rev_img"]["name"]); 
        $rev_img_json = ""; //json string

        if(empty($rev_img)){ //when no images submitted
            // echo "img array empty";
            $rev_img_json = "null";
        }else{
            // echo "appending images to json";
            $rev_img_json = '{"images": {';
            $comma_count = $total_img - 1;
            for($i = 0; $i < $total_img ; $i++){
                
                $dir = "assets/images/reviews/"; //new file path
                $file_path = $_FILES['rev_img']['name'][$i]; //get current file path
                $new_file_path = $dir . uniqid() . basename($file_path); //make unique file name
                $size = $_FILES["rev_img"]["size"][$i];
                // echo $i. " image: " . $size . "<br>";

                if($size > 10000000 || $size == 0 ){ //check file size
                    array_push($error_msg, "Image too big, must be less than 2MB each.");
                    $valid = 0;
                }
                
                $img_file_type = pathinfo($new_file_path, PATHINFO_EXTENSION);

                if (strtolower($img_file_type) != "jpeg" && strtolower($img_file_type) != "jpg" && strtolower($img_file_type) != "png"){
                    $errormsg = "File type not allowed. Only upload jpeg, jpg and png. " . $img_file_type;
                    $valid = 0;
                }

                $rev_img_json .= '"image'.$i.'": "'.$new_file_path; //append to json string

                if($i != $comma_count){
                    $rev_img_json .= '",'; 
                } else{
                    $rev_img_json .= '"'; //format for last image in json
                }
                
                // array_replace($_FILES['rev_img']['name'][$i],$new_file_path);
                
                if(move_uploaded_file($_FILES['rev_img']['tmp_name'][$i], $new_file_path)){
                    //post okay to upload
                    // echo "image uplaod to dir";
                    
                }else{

                }
            } 
            $rev_img_json .= '}}'; //enclosing json string
        }
        
        if($valid){
            $query = "INSERT INTO reviews (product_id, user_id, timestamp, title, body, images, rating, likes, dislikes) VALUES ('$itemID', '$userLoggedIn','$current_date','$title','$body','$rev_img_json','$rating',0,0)";
            
            if(mysqli_query($connect,$query)){
                mysqli_query($connect,"UPDATE products SET num_reviews = num_reviews + 1 WHERE id = $itemID");
                // echo "|| write-review successful! ";
                header("Location: product-item.php?id=$itemID");
            }else{
                array_push($error_msg, "Unsuccessful. Cannot Connect to Server.");
                echo "cannot connnect to server";
            }
        }else{
            array_push($error_msg, "Incorrect Format. Try Again.");
            echo "incorrect format";
        }
    }
?>

<div class="px-6">

    <?php 
        if(in_array("Incorrect Format. Try Again.",$error_msg)){
            echo "<div class='alert alert-danger'>Incorrect Format. Try Again.</div>";
        }
        if(in_array("Unsuccessful. Cannot Connect to Server.",$error_msg)){
            echo "<div class='alert alert-danger'>Unsuccessful. Cannot Connect to Server.</div>";
        }
    ?>

    <div class="d-flex flex-row">
        <h2 class='fw-bold text-darkgreen pe-5'>Create a Review</h2>
        <p class="fs-5 m-0 text-dark align-self-center"><i class="text-danger bi bi-asterisk"></i> Indicates it???s a required field</p>
    </div>
    <div class="d-flex flex-row">
        <img src="<?php echo $img;?>" alt="" class="img-fluid product-img">
        <div class="flex-grow-1 align-self-center">
            <p class="fs-4 m-0"><?php echo $productDetails['name']?> with <?php echo $productDetails['main_ingredient']?></p>
            <p class="fs-6 m-0 text-dark">Product from <?php echo $productDetails['brand']?></p>
        </div>
    </div>

    <hr>

    <form action="write-review.php?id=<?php echo $itemID;?>" method="POST" enctype="multipart/form-data">
        <div class="py-3">
            <p class=" m-0 fw-bold">Score: <i class="text-danger bi bi-asterisk"></i></p>
            <div class="d-flex flex-row justify-content-between" >
                <div class="d-flex flex-row gap-3">
                    <div class="position-relative star-btn">
                        <input type="radio" name="rating" id="rating-1" value="1" class="position-absolute" onclick="updateRating(1)" checked>
                        <label for="rating-1"><i class="bi bi-star-fill fs-1 make-gray"></i></label>
                    </div>
                    <div class="position-relative star-btn">
                        <input type="radio" name="rating" id="rating-2" value="2" class="position-absolute" onclick="updateRating(2)">
                        <label for="rating-2"><i class="bi bi-star-fill fs-1 make-gray"></i></label>
                    </div>
                    <div class="position-relative star-btn">
                        <input type="radio" name="rating" id="rating-3" value="3" class="position-absolute" onclick="updateRating(3)">
                        <label for="rating-3"><i class="bi bi-star-fill fs-1 make-gray"></i></label>                    
                    </div>
                    <div class="position-relative star-btn">
                        <input type="radio" name="rating" id="rating-4" value="4" class="position-absolute" onclick="updateRating(4)">
                        <label for="rating-4"><i class="bi bi-star-fill fs-1 make-gray"></i></label>
                    </div>
                    <div class="position-relative star-btn">
                        <input type="radio" name="rating" id="rating-5" value="5" class="position-absolute" onclick="updateRating(5)">
                        <label for="rating-5"><i class="bi bi-star-fill fs-1 make-gray"></i></label>
                    </div>
                </div>

                <p class='fs-1 mb-0' id="rating-text">1/5</p>
            </div>
            
        </div>
        <hr>
        <div class="py-3">
            
            <label for="review-title" class="form-label"><p class="m-0 fw-bold">Review Title: <i class="text-danger bi bi-asterisk"></i></p></label>
            <input type="text" class="form-control" name="title" required>
            <p class="fs-7 mb-0 mt-2 text-dark"><i class="text-primary bi bi-info-circle-fill"></i> Your overall impression (150 characters or less)</p>
             <hr>
            <label for="review-body" class="form-label"><p class="m-0 fw-bold">Review: <i class="text-danger bi bi-asterisk"></i></p></label>
            <textarea id="" class="form-control h-25" name="body" required></textarea>
            <p class="fs-7 mb-0 mt-2 text-dark"><i class="text-primary bi bi-info-circle-fill"></i> Make your review great: Describe what you liked, what you didn???t like, and other key things shoppers should know (minimum 5 characters)</p>
           
        </div>
        <hr>
        <div class="py-3">
            <div>
                <label for="rev_img" class="form-label"><p class=" m-0 fw-bold">Photos: (optional)</p></label>
                <p class="fs-7 m-0 text-dark"><i class="text-primary bi bi-info-circle-fill"></i> You can add up to 5 Photos</p>
                <span id="img-warning"></span>
                <?php 
                    if(in_array("Too many images. 5 max.",$error_msg)){
                        echo "<div class='alert alert-danger'>Too many images. 5 max.</div>";
                    }
                    if(in_array("Image too big, must be less than 2MB each.",$error_msg)){
                        echo "<div class='alert alert-danger'>Image too big, must be less than 2MB each.</div>";
                    }
                ?>
                <div class="d-flex flex-row mt-3">
                    <label class="btn btn-outline-dark p-3" for="rev-img">
                        <input type="file" name="rev_img[]" id="rev-img" class="d-none" multiple="multiple" accept="image/*">
                        <p class="fs-4 mb-0 mx-3"><i class="bi bi-camera-fill pe-3"></i>Upload Photo</p>
                    </label>
                    <p class="align-self-center me-auto mb-0 px-3 fs-4" id="img-count">0 files selected</p>
                    <button class="btn btn-light p-3" onclick="window.history.back()"><p class="fs-4 m-0">Cancel</p></button>
                    <label  class="btn btn-primary p-3 text-white" for="submit-review">
                        <input class="d-none" type="submit" name="submit_review" id="submit-review" >
                        <p class="fs-4 mb-0 mx-3">Publish Review</p>
                    </label>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $("#rev-img").on("change", function() {
        if ($("#rev-img")[0].files.length > 5) {
            imgwarning = ("<div class='alert alert-danger'>You can select only 5 images. Resetting selection.</div>");
            $("#img-warning").append(imgwarning);
            // alert("You can select only 5 images");
            $("#rev-img").val("");
        } else {
            $("#img-warning").html("");
        }
        $("#img-count").html($("#rev-img")[0].files.length + " files selected");
    });

    function updateRating(rate){
        var star_radios = document.getElementsByName('rating');
        for(var i=0; i < star_radios.length; i++){
            var star_icon = star_radios[i].nextElementSibling.firstChild;
            if(star_radios[i].value < rate){ //if star value is LOWER than selected
                //make icon yellow
                star_icon.setAttribute("class","bi bi-star-fill fs-1 make-yellow");
            }else if(star_radios[i].value > rate){ //if star value is HIGHER than selected
                //make icon gray
                star_icon.setAttribute("class","bi bi-star-fill fs-1 make-gray");
            }
        }
        var rating_text = document.getElementById('rating-text');
        rating_text.textContent = rate + "/5";
    }
</script>

<!-- Default Footer Paste -->
<?php
    include("includes/main-footer.php");
?>