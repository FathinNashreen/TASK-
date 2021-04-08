<?php 
require 'db_connection.php';

//function get data from database
function get_all_data($conn){
    $get_data = mysqli_query($conn, "SELECT * FROM `user`");
    if(mysqli_num_rows($get_data) > 0){
        echo '<table>
              <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Name</th>
                <th>Action</th>
              </tr>';
        
       while($row = mysqli_fetch_assoc($get_data)){
            echo '<tr>
            <td>'.$row['ID'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['username'].'</td>
            <td>
            <br><a href="update.php?ID='.$row['ID'].'">UPDATE</a><br>
            <br>
            <a href="delete.php?ID='.$row['ID'].'">DELETE</a><br>
            </td>
            </tr>';
        }
        echo '<table>';
    }else{
        echo "No Record Found. Please insert new record.";
    }
}
?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEEK 3</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
      
       <!-- INSERT DATA -->
        <div class="form">
            <h2>Insert Your Data</h2>
            <form action="insert.php" method="post">
                <strong>ID</strong><br>
                <input type="text" name="ID" placeholder="Enter your ID number" required><br>
                <strong>Email</strong><br>
                <input type="email" name="email" placeholder="Enter your email" required><br>
                <strong>Name</strong><br>
                <input type="text" name="username" placeholder="Enter your name" required><br>
                <input type="submit" value="INSERT">
            </form>
        </div>
        <!-- END OF INSERT DATA SECTION -->
        <hr>
        <!-- SHOW DATA -->
        <h2>List of Student</h2>

        <?php 
        //call get_all_data
        get_all_data($conn);
        ?>
     </div>
</body>

</html>       