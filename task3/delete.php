<?php
require 'db_connection.php';
if(isset($_GET['ID']) && is_numeric($_GET['ID'])){
    
    $ID = $_GET['ID'];
    $delete_user = mysqli_query($conn,"DELETE FROM `user` WHERE ID='$ID'");
    
    if($delete_user){
        echo "<script>
        alert('Data Deleted');
        window.location.href = 'index.php';
        </script>";
        exit;
    }else{
       echo "Something Wrong!"; 
    }
}else{
    // set header response code
    http_response_code(404);
    echo "<h1>404 Page Not Found!</h1>";
}
?>