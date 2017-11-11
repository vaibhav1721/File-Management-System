<?php
session_start();
include (__DIR__ .'/db.php');
if(isset($_GET['id'])){
  if($_GET['action']=="delete"){
    $sql="delete from filedetail where fileid=$_GET[id];";

    $run=mysqli_query($conn,$sql);
  }

  if($_GET['action']=="archive"){
    $sql = "update filedetail set filestatus = 1 where fileid = $_GET[id];";

    $run = mysqli_query($conn, $sql);
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
<?php include 'userheader.php'?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div  class="row" id="main">
            <div class="col-md-12 ">
  <h2>Document</h2>
       
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>File</th>
        <th>Revision</th>
	<th>Date</th>
	<th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $selectQuery = 'Select * from filedetail where filestatus = 0'; 
      if(!($selectRes = mysqli_query($conn,$selectQuery))){
        echo 'Retrieval of data from Database Failed - #'.mysqli_errno($conn).': '.mysqli_error();
      }else{
        if(mysqli_num_rows($selectRes) == 0){
          echo '<tr><td colspan="4">No Rows Returned</td></tr>';
        }else{
            while($rows = mysqli_fetch_assoc($selectRes)){
      echo"<tr>
        <td>{$rows['fileTitle']}</td>
        <td>{$rows['fileName']}</td>
        <td>1</td>
        <td>{$rows['date']}</td>
        <td><a href='manageDocument.php?id=$rows[fileid]&action=delete'><button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></a>
            <a href='manageDocument.php?id=$rows[fileid]&action=archive'><button class='btn btn-primary'><span class='glyphicon glyphicon-trash'></span></button></a>
        </td>
      </tr>";
              
            }
          }
        }
       ?>
    </tbody>
  </table>
</div>

</body>
</html>

