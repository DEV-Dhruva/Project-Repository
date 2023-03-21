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
          <a class="brand" href="index.php">Project Repository</a>
          <div class="nav-collapse">
            <ul class="nav">
                <li class="active"><a href="index.php">Home</a></li>
                
	    </ul>
	    <a class="btn btn-primary pull-right" href="filter.php" title="Click to login"><i class="icon-user icon-red"></i> Login</a>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>  
    <div id="mainsection">
        <div class="main">
           
           <a href="index.php?categ=Media"><button class="btn btn-inverse"><i class=" icon-picture icon-white"></i>Media</button></a>
           <a href="index.php?categ=Documents"><button class="btn btn-info"><i class="icon-file icon-white"></i>Documents</button></a>
           <a href="index.php?categ=Code Files"><button class="btn btn-warning"><i class="icon-file icon-white"></i>Code Files</button></a>
           <a href="index.php?categ=all"><button class="btn"><i class="icon-check"></i>All Files</button></a>
           <br><br>
           <a href="index.php?dcateg=AI&ML"><button class="btn btn-inverse"><i class=""></i>AI&ML</button></a>
           <a href="index.php?dcateg=IOT"><button class="btn btn-info"><i class=""></i>IOT</button></a>
           <a href="index.php?dcateg=Data Science"><button class="btn btn-warning"><i class=""></i>Data Science</button></a>
           <a href="index.php?dcateg=Web Technology"><button class="btn btn-danger"><i class=""></i>Web Technology</button></a>
           <hr>
            <table id="dtable" width="100%">
                    <thead>
                        <th>File Name</th>
                        <th>File Size</th>
                        <th>Uploader</th>
                        <th>Domain</th>
                        <th>DOWNLOAD</th>
                        <th>VIEW</th>
                    </thead>
                    <tbody>
                        <?php
                            include "db.php";
                            if (isset($_GET['categ'])) {
                            $categ="all";
                            $categ=$_GET['categ'];
                            if($categ=="all"){
                                $q="select * from upload_data";
                            }
                            
                            else{
                                $q="select * from upload_data where CATEGORY='$categ'";
                            }
                            $result=mysqli_query($conn,$q);
                            while($rs=mysqli_fetch_array($result)){
                                echo "
                                <tr>
                                <td align='left'>".$rs['FILE_NAME']."</td>
                                <td align='center'>".$rs['FILE_SIZE']." KB</td>
                                <td align='center'>".$rs['UPLOADED_BY']."</td>
                                <td align='center'>".$rs['DOMAIN']."</td>
                                <td align='center'><a href='download.php?pth=".$rs['PATH']."' target='_blank'><button class='btn btn-primary'><i class='icon-download-alt icon-white'></button></a></td>
                                <td align='center'><a href='".$rs['PATH']."' target='_blank'><button class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'></button></a></td>
                            </tr>
                                ";
                            }
                            }
                            elseif (isset($_GET['dcateg'])) {
                                
                                $dcateg=$_GET['dcateg'];
                                
                                $q="select * from upload_data where DOMAIN='$dcateg'";
                                $result=mysqli_query($conn,$q);
                                while($rs=mysqli_fetch_array($result)){
                                    echo "
                                    <tr>
                                    <td align='left'>".$rs['FILE_NAME']."</td>
                                    <td align='center'>".$rs['FILE_SIZE']." KB</td>
                                    <td align='center'>".$rs['UPLOADED_BY']."</td>
                                    <td align='center'>".$rs['DOMAIN']."</td>
                                    <td align='center'><a href='download.php?pth=".$rs['PATH']."' target='_blank'><button class='btn btn-primary'><i class='icon-download-alt icon-white'></button></a></td>
                                    <td align='center'><a href='".$rs['PATH']."' target='_blank'><button class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'></button></a></td>
                                </tr>
                                    ";
                                }
                                }
                            else{
                                $q="select * from upload_data";
                            $result=mysqli_query($conn,$q);
                            while($rs=mysqli_fetch_array($result)){
                                echo "
                                    <tr>
                                        <td align='left'>".$rs['FILE_NAME']."</td>
                                        <td align='center'>".$rs['FILE_SIZE']." KB</td>
                                        <td align='center'>".$rs['UPLOADED_BY']."</td>
                                        <td align='center'>".$rs['DOMAIN']."</td>
                                        <td align='center'><a href='download.php?pth=".$rs['PATH']."' target='_blank'><button class='btn btn-primary'><i class='icon-download-alt icon-white'></button></a></td>
                                        <td align='center'><a href='".$rs['PATH']."' target='_blank'><button class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'></button></a></td>
                                    </tr>
                                ";
                            }
                            }

                        ?>

                        
                        
                    </tbody>
                </table>
        </div>
    </div>
</body>
</html>
