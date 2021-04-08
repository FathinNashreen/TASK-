<?php
require 'db.php';
$message = '';
if (isset ($_POST['ID']) && isset($_POST['username']) && $_POST['email']) {
  $ID = $_POST['ID'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $sql = 'INSERT INTO user (ID,username,email) VALUES(:ID, :username, :email)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':ID' => $ID,':username' => $username, ':email' => $email])) {
    $message = 'data inserted successfully';
  }
}
?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a User</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="ID">ID</label>
          <input type="text" name="ID" id="ID" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a User</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>