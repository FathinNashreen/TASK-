<?php
require 'db_connection.php';

if(isset($_POST['ID']) && isset($_POST['email']) && isset($_POST['username'])){
    
    // check username and email empty or not
    if(!empty($_POST['ID']) && !empty($_POST['email']) && !empty($_POST['username'])){
        
        // Escape special characters.
        $ID = mysqli_real_escape_string($conn, htmlspecialchars($_POST['ID']));
        $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
        $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));

        //CHECK EMAIL IS VALID OR NOT
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            // CHECK IF EMAIL IS ALREADY INSERTED OR NOT
            $check_email = mysqli_query($conn, "SELECT `email` FROM `user` WHERE email = '$email'");
            
            if(mysqli_num_rows($check_email) > 0){    
                
                echo "<h3>This Email is already registered. Please Try Again.</h3>";
                
            }else{
                
                // INSERT USERS DATA INTO THE DATABASE
                $insert_query = mysqli_query($conn,"INSERT INTO `user`(ID,email,username) VALUES('$ID','$email','$username')");

                //CHECK DATA INSERTED OR NOT
                if($insert_query){
                    echo "<script>
                    alert('Data inserted');
                    window.location.href = 'index.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Something Wrong!</h3>";
                }  
            }  
        }else{
            echo "Invalid email address. Please enter valid email address";
        }  
    }else{
        echo "<h4>Please fill all fields</h4>";
    }
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>