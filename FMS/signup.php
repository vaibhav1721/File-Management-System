<?php
session_start();
include (__DIR__ .'/db.php');
if(isset($_POST['submit'])){
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$password = $_POST['password'];
$usertype = $_POST['usertype'];
$db = "insert into userdetail (firstName,lastName,userName,password,userType) values ('$firstname','$lastname','$username','$password','$usertype');";
$aftersubmit = mysqli_query($conn,$db);
if($aftersubmit){
	echo "<script>alert('Successfully signup')</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>File Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="adminstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div  class="row" id="main">
            <div class="col-md-12 ">
  	<div class="col-md-6">
    
          <form class="form-horizontal" action="" method="POST">
          <fieldset>
            <div id="legend">
              <legend class="">Register</legend>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">First Name</label>
              <div class="controls">
                <input type="text" id="firstname" name="firstname" placeholder="" class="form-control input-lg">
                <p class="help-block">Fisrt Name of your Name</p>
              </div>
            </div>
            
	    <div class="control-group">
              <label class="control-label" for="lastname">Last Name</label>
              <div class="controls">
                <input type="text" id="lastname" name="lastname" placeholder="" class="form-control input-lg">
                <p class="help-block">Last Name of your Name</p>
              </div>
            </div>
                 

            <div class="control-group">
              <label class="control-label" for="username">User Name</label>
              <div class="controls">
                <input type="text" id="username" name="username" placeholder="" class="form-control input-lg">
                <p class="help-block">Fill the user name</p>
              </div>
            </div>
         
            <div class="control-group">
              <label class="control-label" for="password">Password</label>
              <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="form-control input-lg">
                <p class="help-block">Password should be at least 6 characters</p>
              </div>
            </div>
         
	<div class="control-group">
                <label for="sel1">User Type</label>
  			<select class="form-control" id="sel1" name = "usertype">
    			<option value="admin">Admin</option>
    			<option value="user">User</option>
            </div>
  		<div class="control-group">
                <input type="submit" class="btn btn-primary btn-block" value="Register" name="submit" style="margin-top:5%">
             </div>
          </fieldset>
        </form>
    
    </div> 
  </div>
</div>

</body>
</html>
