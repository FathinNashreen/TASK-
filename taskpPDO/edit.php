<?php
require 'db.php';
$ID = $_GET['ID'];
$sql = 'SELECT * FROM user WHERE ID=:ID';
$statement = $connection->prepare($sql);
$statement->execute([':ID' => $ID ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['ID']) && isset ($_POST['name'])  && isset($_POST['email']) ) {
  $ID = $_POST['ID'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $sql = 'UPDATE user SET ID=:ID, username=:username, email=:email WHERE ID=:ID';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':ID' => $ID, ':username' => $username, ':email' => $email,])) {
    header("Location: /");
  }
}
?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update User</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
        <?= $message;?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="ID">ID</label>
          <input value="<?= $user->ID; ?>" type="text" name="ID" id="ID" class="form-control">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input value="<?= $user->username; ?>" type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $user->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update User</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>