<?php
session_start();
include (__DIR__ .'/db.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>LostnFound</title>
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
        <div class="row" id="main" >
            <div class="col-sm-12 col-md-12 well" id="content">
                <center><h1 style="font-family: Impact,Charcol,sans-serif; color: red">Welcome to Admin Dashboard </h1></center>
            </div>
        </div>
        
</div>
</div>
</body>
</html>
