<?php

    $errorListRegister = array();
    $errorListLogin = array();

    if(isset($_POST['sign_up_btn'])){

        // Remove html tags from form values
        $firstName = strip_tags($_POST['sign_up_fname']);
        $lastName = strip_tags($_POST['sign_up_lname']); 
        $email = strip_tags($_POST['sign_up_email']); 
        $pass = strip_tags($_POST['sign_up_pass']);
        $passConfirm = strip_tags($_POST['sign_up_cpass']); 

        // Get registered date
        $registeredDate = date("Y-m-d");

        // Store values into session variable
        $_SESSION['sign_up_fname'] = $firstName; 
        $_SESSION['sign_up_lname'] = $lastName; 
        $_SESSION['sign_up_email'] = $email; 

        // Check if email is in valid format
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            // If email already exists
            $emailCheck = mysqli_query($connect, "SELECT email FROM users WHERE email='$email'");
            $numRows = mysqli_num_rows($emailCheck);

            if($numRows > 0){
                array_push($errorListRegister, "Email already in use."); // store error message into array
            }

        }
        else {
            array_push($errorListRegister, "Invalid email format.");
        }

        // Check if passwords match
        if($pass != $passConfirm){
            array_push($errorListRegister, "Passwords don't match.");
        }

        if(empty($errorListRegister)){
            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

            // Generate username
            $username = strtolower($firstName . $lastName);

            // Check if username is already in the database
            $checkUsernameQuery = mysqli_query($connect, "SELECT username FROM users WHERE username='$username'");
 
            // Add number to the username if it exists
            for($i = 0; mysqli_num_rows($checkUsernameQuery) != 0; $i++){
                $username = $username . "_" . $i;
                $checkUsernameQuery = mysqli_query($connect, "SELECT username FROM users WHERE username='$username'");
            }

            // Assign profile pic to the user
            $profilePic = "assets/images/profile_pics/default.png";

            // Send values into the database
            $sql = "INSERT INTO users (username, encrypted_pass, first_name, last_name, email, skin_type, skin_concern, points, registered_on, profile_img) VALUES ('$username', '$hashedPass', '$firstName', '$lastName', '$email', 'None', 'None', '0', '$registeredDate', '$profilePic')";
            if (mysqli_query($connect, $sql)) {
                echo "New record created successfully";

                // Clear session variables
                $_SESSION['sign_up_fname'] = ""; 
                $_SESSION['sign_up_lname'] = ""; 
                $_SESSION['sign_up_email'] = ""; 

            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connect);
            }

        } else {
            echo "fail";

            // Clear session variables
            $_SESSION['sign_up_fname'] = ""; 
            $_SESSION['sign_up_lname'] = ""; 
            $_SESSION['sign_up_email'] = ""; 
        }

    }

?>