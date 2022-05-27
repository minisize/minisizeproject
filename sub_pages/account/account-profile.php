<?php
    require "account-nav.php";
?>
<script>
    function toggleForm(){
        var edit_form = document.getElementById("user-profile-edit"); 
        var user_info = document.getElementById("user-profile-info");
        var edit_btn = document.getElementById("edit-btn");
        var cancel_btn = document.getElementById("cancel-btn");
        console.log("toggle form clicked");
            if (edit_form.style.display === "none"){
            edit_form.style.display = "block";
            cancel_btn.style.display = "block";
            user_info.style.display = "none";
            edit_btn.style.display = "none";
        }else{
            edit_form.style.display = "none";
            cancel_btn.style.display = "none";
            user_info.style.display = "block";
            edit_btn.style.display = "block";
        }
    }

    $(document).ready(function(){
        $("#submit").click(function(){
            var firstName = $("#first-name").val();
            var lastName = $("#last-name").val();
            var skinType = $("#skin-type").val();
            var skinConcern = $("#skin-concern").val();

            $.ajax({
                type: "POST",
                url: "../../includes/handlers/profile-handler.php",
                data: {
                    firstName : firstName,
                    lastName : lastName, 
                    skinType : skinType,
                    skinConcern : skinConcern
                },
                success: function(response){
                    toggleForm();
                    $("#user-data").load(location.href + " #user-data");
                }
            })
        })
    })
</script>
        <div id="account-page-content" class="col p-5">
            <h2>User Profile</h2>
            <div class="row mt-4">
                <div class="col-2">
                    <img class="img-fluid" src="<?php echo $user["profile_img"]?>" alt="profile picture">
                    <button class="btn btn-light btn-outline-dark mt-4 w-100"><p class="m-0 p-0">Change Image</p></button>
                </div>
                <div class="col ms-4" id = "data-field">
                    <div id="user-data">
                        <?php $user_obj -> loadUserDetails();?>
                    </div>
                    <button class='col btn btn-outline-dark w-100' id="edit-btn" onclick='toggleForm()'><p class="m-0 p-0">Edit Profile</p></button>
                    <form id="user-profile-edit" style="display: none;">    
                        <p class="m-0 p-0 fs-3">General Information</p>
                        <div class="row mb-4" >
                            <div class="col">
                                <label for="first-name" class="form-label">First Name</label>
                                <input type="text" name="firstName" id="first-name"class="form-control" value="<?php echo $user["first_name"]?>">
                            </div>
                            <div class="col">
                                <label for="last-name" class="form-label">Last Name</label>
                                <input type="text" name="lastName" id="last-name" class="form-control" value="<?php echo $user["last_name"]?>">
                            </div>
                        </div>
                        <p class="m-0 p-0 fs-3">Skin Information</p>
                        <div class="row mb-4">
                            <div>
                                <label for="skin-type" class="form-label">Skin Type</label>
                                <select class="form-select" name="skinType" id="skin-type" aria-label="Default select example">
                                    <?php
                                        $userSkinType = $user["skin_type"];
                                        $skinTypes = array("Normal", "Combination", "Dry", "Sensitive", "Oily");
                                        foreach ($skinTypes as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value;?>"
                                            <?php
                                                if ($value == $userSkinType){
                                                    echo 'selected';
                                                } 
                                            ?> >
                                                <?php echo $value;?>
                                            </option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div>
                                <label for="skin-concern" class="form-label">Skin Concern</label>
                                <select class="form-select" name="skinConcern" id="skin-concern" aria-label="Default select example">
                                    <?php
                                        $userSkinConcern = $user["skin_type"];
                                        $query = mysqli_query($connect, "SELECT name FROM skin_concern");
                                        while($row = mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?php echo $row['name']?>"
                                            <?php
                                                if ($row['name'] == $userSkinType){
                                                    echo 'selected';
                                                } 
                                            ?> >
                                                <?php echo $row['name']?>
                                            </option>
                                            <?php
                                        }
                                    ?>
                                </select>   
                            </div>
                        </div>
                        <input type="button" id="submit" class="col btn btn-outline-success mt-4 w-100" value="Save Changes">
                    </form>
                    <button class="col btn mt-4 w-100" id="cancel-btn" onclick="toggleForm()" style="display: none;">Cancel</button>

                    <!-- Form fields for email and pass -->
                    <!-- <h3>Security</h3>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" class="form-control" placeholder="<?php echo $user["email"]?>">
                        </div>
                        <div class="col">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" id="passwork" class="form-control" placeholder="*********">
                        </div>
                    </div> -->

                    <p class="mt-4 mb-0 p-0 fs-3">Security</p>
                    <div class="row mb-4">
                        <div class="col">
                            <h5 class="fs-7 fw-bold">Email</h5>
                            <h6 class="fw-normal"><?php echo $user["email"]?></h6>
                        </div>
                        <div class="col">
                            <h5 class="fs-7 fw-bold">Password</h5>
                            <h6 class="fw-normal">*********</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require "../../includes/sub-footer.php";
?>