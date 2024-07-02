<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Voting System using PHP</title>
  	<!-- Tell the browser to be responsive to screen width -->
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="dist/css/AdminLTE.css">
  	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="dist/css/skins/_all-skins.css">

  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  	<style>
      body{
        height: 100vh;
      }
      .roboto-bold {
        font-family: "Roboto", sans-serif !important;
        font-weight: 700;
        font-style: normal;
      }

  		.mt8{
        margin-top: 8px;
      }

      .mb5{
        margin-bottom: 5px;
      }

      .title{
        font-size: 50px;
      }
      #candidate_list{
        margin-top:20px;
      }

      #candidate_list ul{
        list-style-type:none;
      }

      #candidate_list ul li{ 
        margin:0 30px 30px 0; 
        vertical-align:top
      }

      .clist{
        margin-left: 20px;
      }

      .cname{
        font-size: 25px;
      }

      .votelist{
        font-size: 17px;
      }

      .login-page {
        background: linear-gradient(rgba(0, 128, 0, 0.5), rgba(0, 128, 0, 0.4)),url('./images/banner.jpg') no-repeat center center fixed;
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

      .timer-box-body {
          background: rgba(255, 255, 255, 0.2);
          backdrop-filter: blur(10px);
          border-radius: 10px;
          padding: 5px;
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
          display: 'flex';
          align-items: 'center';

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
</head>