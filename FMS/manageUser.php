<?php
session_start();
include (__DIR__ .'/db.php');
if(isset($_GET['id'])){
  if($_GET['action']="delete"){
    $sql="delete from userdetail where uid=$_GET[id];";

    $run=mysqli_query($conn,$sql);
  }
}
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
        <div  class="row" id="main">
            <div class="col-md-12 ">
  <h2>Bordered Table</h2>
       
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>FirstName</th>
        <th>LastName</th>
        <th>UserName</th>
        <th>Action</th>
	      <th>UserType</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $selectQuery = 'Select * from userdetail'; 
      if(!($selectRes = mysqli_query($conn,$selectQuery))){
        echo 'Retrieval of data from Database Failed - #'.mysqli_errno($conn).': '.mysqli_error();
      }else{
        if(mysqli_num_rows($selectRes) == 0){
          echo '<tr><td colspan="4">No Rows Returned</td></tr>';
        }else{
            while($rows = mysqli_fetch_assoc($selectRes)){
                if($rows['userType'] == "user"){
      echo"<tr>
        <td>{$rows['firstName']}</td>
        <td>{$rows['lastName']}</td>
        <td>{$rows['userName']}</td>
        <td><a href='manageUser.php?id=$rows[uid]&action=delete'><button class='btn btn-success'><span class='glyphicon glyphicon-trash'></span></button></a>
       
        </td>
      	<td>{$rows['userType']}</td>
      </tr>";
                }
            }
          }
        }
       ?>
    </tbody>
  </table>
</div>

</body>
</html>

