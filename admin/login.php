<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		
		if(empty($username)){
			$_SESSION['error'] = "Sorry, username is required";
		}else if(empty($password)){
			$_SESSION['error'] = "Sorry, password is required";
		}else{
			$sql = "SELECT * FROM admin WHERE username = '$username'";
			$query = $conn->query($sql);
	
			if($query->num_rows < 1){
				$_SESSION['error'] = 'Sorry, cannot find account with that username';
			}
			else{
				$row = $query->fetch_assoc();
				if(password_verify($password, $row['password'])){
					$_SESSION['admin'] = $row['id'];
				}
				else{
					$_SESSION['error'] = 'Sorry, incorrect password';
				}
			}
		}
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: index.php');

?>