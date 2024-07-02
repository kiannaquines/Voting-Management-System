<?php
	session_start();
	include 'includes/conn.php';

	$parse = parse_ini_file('./admin/config.ini', FALSE, INI_SCANNER_RAW);

	if($parse['election_ended'] == 'true'){
		$_SESSION['error'] = 'Election is already finished, casting of vote is now closed';
	}else{
		if(isset($_POST['login'])){
			$voter = $_POST['voter'];
			$password = $_POST['password'];
	
			if(empty($voter)){
				$_SESSION['error'] = "Sorry, voter's ID is required";
			}else if(empty($password)){
				$_SESSION['error'] = "Sorry, password is required";
			}else{
				$sql = "SELECT * FROM voters WHERE voters_id = '$voter'";
				$query = $conn->query($sql);
	
				if($query->num_rows < 1){
					$_SESSION['error'] = "Sorry, we cannot find your voter's ID";
				}else{
					$row = $query->fetch_assoc();
					if(password_verify($password, $row['password'])){
						$_SESSION['voter'] = $row['id'];
					}
					else{
						$_SESSION['error'] = 'Sorry, incorrect password';
					}
				}
			}
		}else{
			$_SESSION['error'] = 'Input voter credentials first';
		}
	}
	
	header('location: index.php');
?>