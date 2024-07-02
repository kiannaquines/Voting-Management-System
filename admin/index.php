<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location:home.php');
  	}
?>
<?php include 'includes/header.php'; ?>
<style>
	  .login-page {
        background: linear-gradient(rgba(0, 128, 0, 0.5), rgba(0, 128, 0, 0.4)),url('./../images/banner.jpg') no-repeat center center fixed;
        background-size: cover;       
      }

      .login-box-body {
          background: rgba(255, 255, 255, 0.2);
          backdrop-filter: blur(10px);
          border-radius: 10px;
          padding: 20px;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          width: 100%;
          color: #fff;
      }

      .login-box-msg {
          color: #fff;
          text-align: center;
          font-size: 15px;
      }

      .form-control {
          background: rgba(255, 255, 255, 0.7);
          border: none;
          color: #333;
          padding: 10px 20px !important;
          height: 15%;
          border-radius: 5px;
          align-items: center;
      }


      button, .viewButton {
          border-radius: 5px !important;
      }

      .form-control:focus {
          box-shadow: none;
          border: none;
      }

      .has-feedback .form-control-feedback {
          color: #fff;
      }

      .callout {
          background: rgba(255, 0, 0, 0.2);
          backdrop-filter: blur(10px);
          border-radius: 5px;
          padding: 10px;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          color: #fff;
          width: 100%;
      }

      .btn-glass {
          background: rgba(255, 255, 255, 0.2);
          backdrop-filter: blur(10px);
          border: 1px solid rgba(255, 255, 255, 0.3);
          border-radius: 5px;
          color: #fff;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          padding: 10px 20px;
          transition: background 0.3s, border 0.3s;
      }

      .btn-glass:hover {
          background: rgba(255, 255, 255, 0.3);
          border: 1px solid rgba(255, 255, 255, 0.5);
      }

      .btn-glass i {
          color: #fff;
      }
</style>
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
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to start your session</p>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="Username">
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-success btn-glass btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Login</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>