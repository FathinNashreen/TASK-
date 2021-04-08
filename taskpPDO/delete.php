<?php
require 'db.php';
$id = $_GET['ID'];
$sql = 'DELETE FROM user WHERE ID=:ID';
$statement = $connection->prepare($sql);
if ($statement->execute([':ID' => $ID])) {
  header("Location: /");
}