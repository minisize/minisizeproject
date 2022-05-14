<?php
    require "account-index.php";
?>
<script>
    function toggleForm(){
        var edit_form = document.getElementById("user-profile-edit"); 
        var user_info = document.getElementById("user-profile-info");
        var cancel_btn = document.getElementById("cancel-btn");
        console.log("toggle form clicked");
            if (edit_form.style.display === "none"){
            edit_form.style.display = "block";
            cancel_btn.style.display = "block";
            user_info.style.display = "none";
        }else{
            edit_form.style.display = "none";
            cancel_btn.style.display = "none";
            user_info.style.display = "block";
        }
    }

    function updateInfo(){

    }
</script>
        <div id="account-page-content" class="col p-5">
            <h2>User Profile</h2>
            <div class="row mt-4">
                <div class="col-2">
                    <img class="img-fluid" src="<?php echo $user["profile_img"]?>" alt="profile picture">
                    <button class="btn btn-light btn-outline-dark mt-4 w-100">Change Image</button>
                </div>
                <div class="col ms-4">
                    <div id="user-profile-info">   
                        <h3>General Information</h3>
                        <div class="row mb-4">
                            <div class="col">
                                <h4>First Name</h4>
                                <h5><?php echo $user["first_name"]?></h5>
                            </div>
                            <div class="col">
                                <h4>Last Name</h4>
                                <h5><?php echo $user["last_name"]?></h5>
                            </div>
                        </div>
                        <h3>Skin Stuff</h3>
                        <div class="row mb-4">
                            <div class="col">
                                <h4>Skin Type</h4>
                                <h5><?php echo $user["skin_type"]?></h5>
                            </div>
                            <div class="col">
                                <h4>Skin Concern</h4>
                                <h5><?php echo $user["skin_concern"]?></h5>
                            </div>
                        </div>
                        <h3>Security</h3>
                        <div class="row mb-4">
                            <div class="col">
                                <h4>Email</h4>
                                <h5><?php echo $user["email"]?></h5>
                            </div>
                            <div class="col">
                                <h4>Password</h4>
                                <h5>*********</h5>
                            </div>
                        </div>
                        <button class="col btn btn-outline-dark mt-4 w-100" onclick="toggleForm()">Edit Profile</button>
                    </div>
                    <form action="POST"  id="user-profile-edit"  style="display: none;">    
                        <h3>General Information</h3>
                        <div class="row mb-4" >
                            <div class="col">
                                <label for="first-name" class="form-label">First Name</label>
                                <input type="text" name="firstName" id="first-name"class="form-control" placeholder="<?php echo $user["first_name"]?>">
                            </div>
                            <div class="col">
                                <label for="last-name" class="form-label">Last Name</label>
                                <input type="text" name="lastName" id="last-name" class="form-control" placeholder="<?php echo $user["last_name"]?>">
                            </div>
                        </div>
                        <h3>Skin Stuff</h3>
                        <div class="row mb-4">
                            <div>
                                <label for="skin-type" class="form-label">Skin Type</label>
                                <select class="form-select" name="skinType" id="skin-type" aria-label="Default select example">
                                    <option selected>Choose a skin type</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Combination">Combination</option>
                                    <option value="Dry">Dry</option>
                                    <option value="Oily">Oily</option>
                                    <option value="Oily">Oily</option>
                                </select>
                            </div>
                            <div>
                                <label for="skin-concern" class="form-label">Skin Concern</label>
                                <select class="form-select" name="skinConcern" id="skin-concern" aria-label="Default select example">
                                    <option selected>Choose a skin concern</option>
                                    <option value="Hydration">Hydration</option>
                                    <option value="Pore Solutions">Pore Solutions</option>
                                    <option value="Troubled Skin">Troubled Skin</option>
                                    <option value="Dullness & Uneven Skin Tone">Dullness & Uneven Skin Tone</option>
                                    <option value="Sensitive Skin">Sensitive Skin</option>
                                    <option value="Age Prevention">Age Prevention</option>
                                    <option value="Lifting & Firming">Lifting & Firming</option>
                                </select>   
                            </div>
                        </div>
                            <button class="col btn btn-outline-success mt-4 w-100" onclick="updateInfo()">Save Changes</button>
                    </form>
                    <button class="col btn btn-outline-secondary mt-4 w-100" id="cancel-btn" onclick="toggleForm()" style="display: none;">Cancel</button>
                    <h3>Security</h3>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" class="form-control" placeholder="<?php echo $user["email"]?>">
                        </div>
                        <div class="col">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" id="passwork" class="form-control" placeholder="*********">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require "../../includes/sub-footer.php";
?>