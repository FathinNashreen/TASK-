<?php
require 'db_connection.php';
if(isset($_GET['ID']) && is_numeric($_GET['ID'])){
    
    $ID = $_GET['ID'];
    $ID = mysqli_query($conn,"SELECT * FROM `user` WHERE id='$ID'");
    
    if(mysqli_num_rows($ID) === 1){
        
        $row = mysqli_fetch_assoc($ID);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
     <div class="container">
      
       <!-- UPDATE DATA -->
        <div class="form">
            <h2>Update Data</h2>
            <form action="" method="post">
                <strong>ID</strong><br>
                <input type="text" autocomplete="off" name="ID" placeholder="Enter your ID" value="<?php echo $row['ID'];?>" required><br>
                <strong>Email</strong><br>
                <input type="email" autocomplete="off" name="email" placeholder="Enter your email" value="<?php echo $row['email'];?>" required><br>
                <strong>Name</strong><br>
                <input type="text" autocomplete="off" name="username" placeholder="Enter your name" value="<?php echo $row['username'];?>" required><br>
                <input type="submit" value="Update">
            </form>
        </div>
        <!-- END OF UPDATE DATA SECTION -->
    </div>
</body>
</html>
<?php

    }else{
        // set header response code
        http_response_code(404);
        echo "<h1>404 Page Not Found!</h1>";
    }
    
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}


/* ---------------------------------------------------------------------------
------------------------------------------------------------------------------ */


// UPDATING DATA

if(isset($_POST['ID']) && isset($_POST['email']) && isset($_POST['username'])){
    
    // check username and email empty or not
    if(!empty($_POST['ID']) && !empty($_POST['email']) && !empty($_POST['username'])){
        
        // Escape special characters.
        $ID = mysqli_real_escape_string($conn, htmlspecialchars($_POST['ID']));
        $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
        $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username']));

        //CHECK EMAIL IS VALID OR NOT
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $ID = $_GET['ID'];
            // CHECK IF EMAIL IS ALREADY INSERTED OR NOT
            $check_email = mysqli_query($conn, "SELECT `email` FROM `user` WHERE email = '$email' AND ID != '$ID'");
            
            if(mysqli_num_rows($check_email) > 0){    
                
                echo "<h3>This Email is already registered. Please Try Again.</h3>";
            }else{
                
                // UPDATE USER DATA               
                $update_query = mysqli_query($conn,"UPDATE `user` SET ID='$ID',email='$email', username='$username'  WHERE ID=$ID");

                //CHECK DATA UPDATED OR NOT
                if($update_query){
                    echo "<script>
                    alert('Data Updated');
                    window.location.href = 'index.php';
                    </script>";
                    exit;
                }else{
                    echo "<h3>Opps something wrong!</h3>";
                }
            }
        }else{
            echo "Invalid email address. Please enter valid email address";
        }
        
    }else{
        echo "<h4>Please fill all fields</h4>";
    }   
}

// END OF UPDATING DATA

?>