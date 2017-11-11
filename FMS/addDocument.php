<?php
session_start();
include (__DIR__ .'/db.php');
if(isset($_POST['btn-upload']))
{    
  if (isset($_FILES["fileUrl"]) && $_FILES["fileUrl"]["error"] == 0) {
    echo "<script>alert('entered');</script>";
		$allowedExts = array("jpg", "jpeg", "gif", "png", "mov", "mp4", "3gp", "ogg", "mkv", "pdf", "doc");
		$extension = pathinfo($_FILES['fileUrl']['name'], PATHINFO_EXTENSION);

		if ((($_FILES["fileUrl"]["type"] == "video/mov")
				|| ($_FILES["fileUrl"]["type"] == "video/mkv")
				|| ($_FILES["fileUrl"]["type"] == "video/mp4")
				|| ($_FILES["fileUrl"]["type"] == "video/3gp")
				|| ($_FILES["fileUrl"]["type"] == "video/ogg")
				|| ($_FILES["fileUrl"]["type"] == "application/pdf")
				|| ($_FILES["fileUrl"]["type"] == "application/doc")
				|| ($_FILES["fileUrl"]["type"] == "image/gif")
				|| ($_FILES["fileUrl"]["type"] == "image/jpeg")
				|| ($_FILES["fileUrl"]["type"] == "image/png")
        || ($_FILES["fileUrl"]["type"] == "image/jpg")
        || ($_FILES["fileUrl"]["type"] == "application/txt")
				)

			&& ($_FILES["fileUrl"]["size"] < 10 * 1024 * 1024)
			&& in_array($extension, $allowedExts)
		) {
		$count=1;
		while(true){
              
               if(file_exists("files/" . $_FILES["fileUrl"]["name"])){
                $_FILES["fileUrl"]["name"]=$count.$_FILES["fileUrl"]["name"];
                $count=$count+1;
            }
            else
            break;
            }
			if(move_uploaded_file($_FILES["fileUrl"]["tmp_name"],
      __DIR__."/files/" . $_FILES["fileUrl"]["name"])){
        $title=$_REQUEST['title'];
			$url = "files/" . $_FILES["fileUrl"]["name"];
			$name=$_FILES['fileUrl']['name'];
      $sql="insert into filedetail(fileTitle,fileName,fileUrl) values('$title','$name','$url');";
      mysqli_query($conn,$sql);
      }
      else
      {
        echo "<script>alert('unable to upload file');</script>";
      }

		} 
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
<div class="container">
  <h2>Panels with Contextual Classes</h2>
<div class="row">
<div class="col-md-7">
<div class="panel-group" action="" method="POST">
    <div class="panel panel-default">
      <div class="panel-heading">Add Document</div>
      <div class="panel-body">
      <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
          <fieldset>
          
	               <div class="control-group">
                  <label class="control-label" for="filename">Title</label>
                  <div class="controls">
                        <input type="text" id="title" name="title" placeholder="" class="form-control">
                           </div>
                 </div>
	                  <div class="control-group">
                              <label class="control-label" for="fileUrl">Choose File</label>
                              <div class="controls">
                                  <input type="file"  name="fileUrl" placeholder="Choose File.." class="form-control">	
                              </div>
                          </div>

                  <div class="control-group">
                      <label class="control-label" for="filename">Upload File</label>
                      <div class="controls">
                          <input type="submit" class="btn btn-primary btn-block" value="Upload" name="btn-upload" style="margin-top:5%">
                      </div>
          </div>
          </fieldset>
          </form>
	        </div>
        </div>
      <div>
    </div>
  

    </div> 
  </div>
</div>

</body>
</html>
