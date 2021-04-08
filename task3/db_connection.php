<?php 

$servername = "localhost";
$user = "root";
$password = "";
$db_name = "week3";

//untuk connection
$conn = mysqli_connect($servername, $user, $password, $db_name);

//check connection
if(!$conn) {
    die ("Connection Failed: " . mysqli_connect_error());
}
?>