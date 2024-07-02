<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location: admin/home.php');
  	}

    if(isset($_SESSION['voter'])){
      header('location: home.php');
    }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
<div class="login-box">
  	<div class="login-logo">
  		<b class="roboto-bold" style="color: #fafafa;">USG & LSG Voting System</b>
  	</div>
	<?php
		if(isset($_SESSION['error'])){
			echo "
				<div class='callout mt8 mb5'>
					<p>".$_SESSION['error']."</p> 
				</div>
			";
			unset($_SESSION['error']);
		}
	?>
  	<div class="login-box-body mb8">
    	<p class="login-box-msg roboto-regular">Welcome, start by authenticating your account.</p>
    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control roboto-regular" name="voter" placeholder="Voter's ID">
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control roboto-regular" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-success btn-glass btn-block btn-flat roboto-regular" name="login">
						<i class="fa fa-sign-in"></i> Login
					</button>
        		</div>
      		</div>
    	</form>
  	</div>
	<br>
	<?php
		$config = parse_ini_file("./admin/config.ini",true);

		$already_finished = $config['election_ended']
	?>

	<?php
	if(!$already_finished){
		echo '
		<div class="timer-box-body text-center">
			<b id="electionTitle" style="display: block;"></b>
			<small id="Mytimer" style="display: block;"></small>
		</div>
		';
	}
	?>


</div>
<?php include 'includes/scripts.php' ?>

<?php
if(!$already_finished){
	echo "<script>
		setInterval(() => {
		fetch('timer.php')
		.then(response => response.json())
		.then(data => {
			document.getElementById('electionTitle').innerHTML = data.election_title;
				if (data.alreadyFinished == false){
					document.getElementById('Mytimer').innerHTML = data.time_until_end;
				}else{
					if(data.election_status){
						setTimeout(() => {						
							window.location.reload()
						}, 3000);
					}
				}
		})
		.catch(error => {
			console.error('Error fetching timer data:', error);
		});
	}, 2000);
	</script>";
}
?>
</body>
</html>