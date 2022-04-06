<?php
    if(isset($_POST['login_btn'])){
        $email = filter_var($_POST['login_email'], FILTER_SANITIZE_EMAIL); //verify email is in correct format
        $_SESSION['login_email'] = $email;

        $password = $_POST['login_pass'];

        // check if email is in the database
        $checkDB = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");
        
        $row = mysqli_fetch_array($checkDB);
        $hashedPass = $row['encrypted_pass']; 

        if(password_verify($password, $hashedPass)) {

            // Return no. of results from checking database
            $checkLogin = mysqli_num_rows($checkDB);

            if($checkLogin == 1){

                // access results from query into $row
                $row = mysqli_fetch_array($checkDB);

                $userID = $row['id'];
                $_SESSION['id'] = $userID;
            }
            else {
                array_push($errorListLogin, "Email or password is incorrect.");
            }
            
        }

    }
?>