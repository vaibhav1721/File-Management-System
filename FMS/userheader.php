<?php
session_start();
error_reporting(E_WARNING);
include (__DIR__ .'/db.php');
?>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="userdashboard.php">File Management System</a>

        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['vol_name']?> <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="userdashboard.php"><i class="fa fa-fw fa-tachometer "></i>  DashBoard</a>
                </li>
                <li>              
		<div class="collapse navbar-collapse" id="myNavbar">
	 <ul class="nav navbar-nav">            
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Document <span class="caret"></span></a>	
	   <ul class="dropdown-menu">
              <li><a href="addDocument.php">Add Document</a></li>
              <li><a href="manageDocument.php">Manage Document</a></li>
		<li><a href="archiveDocument.php">Archive Document</a></li>     
            </ul>
          </li>
	</ul>
		</li>
                <li>
                    <a href="logout.php"><i class="fa fa-fw fa-users "></i>  Logout</a>
                </li>
            </ul>
        </div>
    </nav>
