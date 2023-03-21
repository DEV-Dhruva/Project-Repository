<?php
// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: filter.php');
}
 else{
  	$usname=$_GET['usname'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project Repository</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link href="css/jquery-ui-1.10.0.custom.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/myjquery.js"></script>
    <!-- data tables-->
    <link rel="stylesheet" type="text/css" href="media/css/demo_table.css" />
    <link rel="stylesheet" type="text/css" href="media/themes/smoothness/jquery-ui-1.8.4.custom.css" />
    <!--<script src="media/js/jquery.js" type="text/javascript"></script>-->
    <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
    <!-- end table-->
    <script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
	    $('#dtable').dataTable();
	})
    </script>
</head>
<body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php">Project Repository</a>
          <div class="nav-collapse">
            <ul class="nav">
                <li class="active"><a href="admin.php">Home</a></li>
                <!-- <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>               -->
	    </ul>
	    <a id="aw" class="btn btn-primary pull-right" href="logout.php">Logout</a>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>  
    <div id="mainsection">
       <hr>
           <div id="container">
		<?php
        $name='';
        if(isset($_GET['name'])){
            //$usname=$_GET['usname']
		    $name=$_GET['name']; }
		?>
		<div class="form_head">DELETE FORM</div><br>
		<form method="post" action="">
		    <div class="control-group">
				<label class="control-label">Are You Sure To Delete <?=$name?>?? This will totally remove the file in the database. .  </label>
		    </div>
		     <div class="controls">
				<button class="btn btn-primary" name="delete">DELETE</button>
				<a href="home.php" type="reset" class="btn btn-warning">CANCEL</a>
				<?php
				    if(isset($_POST['delete'])){
					include "db.php";
					$dir = "user_data/$usname/".$name;
					unlink($dir);
					$q="DELETE FROM upload_data where FILE_NAME='$name' and UPLOADED_BY='$usname'";
					if(mysqli_query($conn,$q)){
					    echo "<h4 style='color:red'>File DELETED</h4>";
					    header('Refresh: 1;url=admin.php');
					}
					else{
					    echo "<h4 style='color:red'>Error Deleting File</h4>";
					    header('Refresh: 1;url=home.php');
					}
				    }
				?>
		    </div>
		</form>
	   </div>
        </div>
    </div>
</body>
</html>
