<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: filter.php');
}
else{
    $uname=$_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project Repository</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    
    <!-- bootstarp -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!--bootstrap-->
    <!-- data tables-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="media/css/dataTable.css" />
    <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
    <!-- end table-->
    <script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
	    $('#dtable').dataTable({
                "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                "iDisplayLength": 15
            });
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
          <a class="brand" href="home.php">Project Repository</a>
          <div class="nav-collapse">
            <ul class="nav">
                <li class="active"><a href="home.php">Home</a></li>
                <!-- <li><a href="about.php">About</a></li> -->
                <!-- <li><a href="contact.php">Contact</a></li>               -->
	    </ul>
	    <a class="btn btn-primary pull-right" href="logout.php" title="Click to logout"><i class="icon-off"></i><?=$_SESSION['username']?> (Logout)</a>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>  
    <div id="mainsection">
        <div class="main">
           <a href="addfile.php"><button class="btn btn-success"><i class="icon-upload icon-white"></i>Add File</button></a>
            <hr>
            <table id="dtable" width="100%">
                    <?php
                            include "db.php";
							echo "
					<thead>
					    <th>File Name</th>
					    <th>File Size</th>
						<th>Domain</th>
					    <th>DOWNLOAD</th>
						<th>DELETE</th>
						<th>VIEW</th>
					</thead>
					<tbody>
				    ";
				    $query="SELECT * FROM upload_data WHERE UPLOADED_BY='$uname'";
				    $result=mysqli_query($conn,$query);
				    while($rs=mysqli_fetch_array($result)){
					 $fname=$rs['FILE_NAME'];
					 $size=$rs['FILE_SIZE'];
					 $domain=$rs['DOMAIN'];
					 $path=$rs['PATH'];
					 
					 echo "
					 <tr>
					     <td align='left'>$fname</td>
					     <td align='center'>$size KB</td>
						 <td align='center'>$domain</td>
					     <td align='center'><a href='download.php?pth=$path' target='_blank'><button class='btn btn-primary'><i class='icon-download-alt icon-white'></button></a></td>
						 <td align='center'><a href='delete.php?name=$fname' class='btn btn-danger' onclick='confirm('sure?');'><i class='icon-trash icon-white'></a></td>
						 <td align='center'><a href='".$rs['PATH']."' target='_blank'><button class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'></button></a></td>
					 </tr>";
				    }
				// $thelist .= '<a href="user/'.$file.'">'.$file.'</a>';
				// if($uname!='admin'){
				//     echo "
				// 	<thead>
				// 	    <th>File Name</th>
				// 	    <th>File Size</th>
				// 	    <th>DOWNLOAD</th>
				// 		<th>DELETE</th>
				// 	</thead>
				// 	<tbody>
				//     ";
				//     $query="SELECT * FROM upload_data WHERE UPLOADED_BY='$uname'";
				//     $result=mysqli_query($conn,$query);
				//     while($rs=mysqli_fetch_array($result)){
				// 	 $fname=$rs['FILE_NAME'];
				// 	 $size=$rs['FILE_SIZE'];
				// 	 $path=$rs['PATH'];
					 
				// 	 echo "
				// 	 <tr>
				// 	     <td align='center'>$fname</td>
				// 	     <td align='center'>$size KB</td>
				// 	     <td align='center'><a href='$path'><button class='btn btn-primary'><i class='icon-download-alt icon-white'></button></a></td>
				// 		 <td align='center'><a href='delete.php?name=$fname' class='btn btn-danger' onclick='confirm('sure?');'><i class='icon-trash icon-white'></a></td>
				// 	 </tr>";
				//     }
				// }
				// else{
				//     echo "
				// 	<thead>
				// 	    <th>File Name</th>
				// 	    <th>File Size</th>
				// 	    <th>DOWNLOAD</th>
				// 	    <th>DELETE</th>
				// 	</thead>
				// 	<tbody>
				//     ";
				//     $query="SELECT * FROM upload_data WHERE UPLOADED_BY='admin'";
				//     $result=mysqli_query($conn,$query);
				//     while($rs=mysqli_fetch_array($result)){
				// 	 $fname=$rs['FILE_NAME'];
				// 	 $size=$rs['FILE_SIZE'];
				// 	 $path=$rs['PATH'];
					 
				// 	 echo "
				// 	 <tr>
				// 	     <td>$fname</td>
				// 	     <td>$size KB</td>
				// 	     <td align='right'><a href='$path'><button class='btn btn-primary'><i class='icon-download-alt icon-white'></button></a></td>
				// 	     <td align='right'><a href='delete.php?name=$fname' class='btn btn-danger' onclick='confirm('sure?');'><i class='icon-trash icon-white'></a></td>
				// 	 </tr>";
				//     }
				// }
                    ?>
                    </tbody>
                </table>
        </div>
    </div>
</body>
</html>
