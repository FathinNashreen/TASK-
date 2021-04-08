<?php 

	include 'model.php';
	$model = new User();
	$ID = $_REQUEST['ID'];
	$delete = $model->delete($ID);

	if ($delete) {
		echo "<script>alert('delete successfully');</script>";
		echo "<script>window.location.href = 'user.php';</script>";
	}

 ?>