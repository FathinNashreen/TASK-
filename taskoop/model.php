<?php 

	Class User{

		private $server = "localhost";
		private $name = "root";
		private $password = '';
		private $db = "week3";
		private $conn;

		public function __construct(){
			try {
				
				$this->conn = new mysqli($this->server,$this->name,$this->password,$this->db);
			} catch (Exception $e) {
				echo "Connection Failed" . $e->getMessage();
			}
		}

		public function insert(){

			if (isset($_POST['submit'])) {
				if (isset($_POST['ID']) && isset($_POST['username']) && isset($_POST['email'])) {
					if (!empty($_POST['ID']) && !empty($_POST['username']) && !empty($_POST['email'])) {
						
						$ID = $_POST['ID'];
						$username = $_POST['username'];
						$email = $_POST['email'];

						$query = "INSERT INTO user (ID,username,email) VALUES ('$ID','$username','$email')";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('records added successfully');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}

					}else{
						echo "<script>alert('empty');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
				}
			}
		}

		public function fetch(){
			$data = null;

			$query = "SELECT * FROM user";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function delete($ID){

			$query = "DELETE FROM user where ID = '$ID'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}

		public function fetch_single($ID){

			$data = null;

			$query = "SELECT * FROM user WHERE ID = '$ID'";
			if ($sql = $this->conn->query($query)) {
				while ($row = $sql->fetch_assoc()) {
					$data = $row;
				}
			}
			return $data;
		}

		public function edit($ID){

			$data = null;

			$query = "SELECT * FROM user WHERE ID = '$ID'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function update($data){

			$query = "UPDATE user SET ID='$data[ID]', username='$data[username]', email='$data[email]' WHERE id='$data[id]'";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}
	}

 ?>