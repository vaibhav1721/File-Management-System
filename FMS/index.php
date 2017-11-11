<?php
error_reporting(E_WARNING);
include (__DIR__ .'/db.php');

if(isset($_POST['submit'])){
    
    $userName=$_POST['userName'];
    $password=$_POST['password']  	;

    $sql="select * from userdetail where userName='".$userName."';";
    $result=mysqli_query($conn,$sql);  
$rows=mysqli_fetch_assoc($result); 
   
if(mysqli_num_rows($result)<=0)
    { echo"<script>";
        echo "alert('Invalid username or password');";
        echo "</script>";
    }
    else
    {
        if($rows["password"]==$password )
        {
            session_start();
            $_SESSION['uid']=$rows["uid"];
            $_SESSION['userName']=$rows["userName"];
            if($rows['userType']=="Admin")
            header("location:dashboard.php");
            else
            header("Location:userdashboard.php");
        }
        else
        {
            echo"<script>";
            echo "alert('Invalid password');";
            echo "</script>";
        }
    }

}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Appointment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .btn{
            border-radius: 0;
            background-color: #191970;
        }
        .loginform{
            box-shadow: 0 19px 38px rgba(0,0,0,0.2), 0 15px 12px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .lgform{
            padding: 2% 2% 2% 2%;
        }
        .form-group input{
            border-radius: 0;
        }
        .input-group-addon{
            border-radius: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <center><h2 style="color: #191970">Sign In</h2></center>
        <div class="col-md-4 col-md-offset-4 loginform">
            <form class="form-horizontal lgform" method="post">
                <div class="form-group">
                    <label class="control-label" for="dr">User Name</label>
                    <div class="input-group input-append email">
                        <input type="text" class="form-control"  name="userName"  required />
                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-user"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <div class="input-group input-append pass" >
                        <input type="password" class="form-control" name="password" required />
                        <span class="input-group-addon add-on"><span class="glyphicon glyphicon-eye-close"></span></span>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" name="submit" >Login</button>
                <div class="form-group">
                    <span>Forget Password? </span><span><a href="#" style="text-decoration: none">Click here</a></span>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

