<?php
    $errorListLogin = array();

    if(isset($_POST['login_btn'])){
        $email = filter_var($_POST['login_email'], FILTER_SANITIZE_EMAIL); //verify email is in correct format
        $_SESSION['login_email'] = $email;

        $password = md5($_POST['login_pass']);

        // check if email and password is in the database
        $checkDB = mysqli_query($connect, "SELECT * FROM users WHERE email='$email' AND encrypted_pass='$password'");
        
        // return no. of results from checking database
        $checkLogin = mysqli_num_rows($checkDB);

        if($checkLogin == 1){

            // access results from query into $row
            $row = mysqli_fetch_array($checkDB);

            $user_id = $row['id'];
            $_SESSION['id'] = $user_id;

            // redirect to index.php
            header("Location: index.php");
            
            exit();
        }
        else {
            //Error message
			array_push($errorListLogin, "Email or password is incorrect."); 
            // clear session variable
            $_SESSION['login_email'] = "";
        }

    }
?>