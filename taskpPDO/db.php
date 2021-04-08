<?php
$dsn = 'mysql:host=localhost;dbname=week3';
$name = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $name, $password, $options);
} catch(PDOException $e) {

}