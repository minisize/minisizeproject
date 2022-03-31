<?php
    require "account-index.php";
?>
        <div id="account-page-content" class="col">
            <h2>User Profile</h2>
            <div class="row">
                <div class="col-2">
                    <img src="" alt="profile picture">
                    <button>Edit Image</button>
                </div>
                <div class="col">
                    <form action="">
                        <h3>General Information</h3>
                        <div class="row">
                            <div class="col">
                                <label for="first-name" class="form-label">First Name</label>
                                <input type="text" id="first-name" class="form-control" placeholder="Marites">
                            </div>
                            <div class="col">
                                <label for="last-name" class="form-label">Last Name</label>
                                <input type="text" id="last-name" class="form-control" placeholder="Anochika">
                            </div>
                        </div>
                        <h3>Skin Stuff</h3>
                        <div class="row">
                            <div>
                                <label for="skin-type" class="form-label">Skin Type</label>
                                <select class="form-select" id="skin-type" aria-label="Default select example">
                                    <option selected>Choose a skin type</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div>
                                <label for="skin-concern" class="form-label">Skin Concern</label>
                                <select class="form-select" id="skin-concern" aria-label="Default select example">
                                    <option selected>Choose a skin concern</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>   
                            </div>
                            <div>
                                <label for="skin-condition" class="form-label">Skin Condition</label>
                                <select class="form-select" id="skin-ccondition" aria-label="Default select example">
                                    <option selected>Choose a skin condition</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>   
                            </div>
                        </div>
                        <h3>Security</h3>
                        <div class="row">
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" id="email" class="form-control" placeholder="maritesanochika@gmail.com">
                            </div>
                            <div class="col">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" id="passwork" class="form-control" placeholder="*********">
                            </div>
                        </div>
                        <div>
                            <button>Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>