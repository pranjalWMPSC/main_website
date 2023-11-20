<?php 
session_start();
include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";



if(isset($_POST['submit'])){
	

		 $current_image=$_FILES['banner_pic']['name'];
		 
		 $imageFileType = strtolower(pathinfo($current_image,PATHINFO_EXTENSION));
		 
		 $extension = substr(strrchr($current_image, '.'), 1);
		 $time = date("pYhis");
		 $new_image = $time . "." . $extension;
		 $destination="uploads/banner/".$new_image;
		 
		 if($imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png")
		 {
			 
		echo '<script language="javascript">';
        echo 'alert("Check the File Type Before Uploading.");
			 location.href="add_banner.php"';
        echo '</script>';
			 
		 }
		 
		 else
		 {
		$action = move_uploaded_file($_FILES['banner_pic']['tmp_name'], $destination);
		 $date_current   = date("d-m-Y");
		
		
		 $sql= "INSERT INTO banner(banner_photo,uploaded_date,banner_status) VALUES ('".$new_image."',now(),0)";
				
		$res=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
		header("location:insert_banner.php?ins=msg");
		
		 }
		 
}


$viewSecQry = "SELECT * FROM banner where banner_status = 0 ORDER by banner_id DESC";  
 $exeSecQry = mysqli_query($mysqli,$viewSecQry);

 $table=""; $count=0;
   while($row = mysqli_fetch_array($exeSecQry)) 
   {
	   $count+=1;
	   $banner_id= $row['banner_id'];
	   $banner_photo= $row['banner_photo'];
	   $uploaded_date= $row['uploaded_date'];
	   $newDate = date("d-m-Y",strtotime($uploaded_date));
	   $table.="<tr>
                    <td>$count</td>
					<td><img src='uploads/banner/$banner_photo' width='50px;'></td>
                    <td><a class='btn btn-info' href='update_banner.php?updid=$banner_id'><i class='fa fa-pencil' aria-hidden='true'></i></a><a class='btn btn-danger' href='deleteBanner.php?delid=$banner_id' onclick='return confirm_Delete()'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
                </tr>";
	}

if($adminRole !=""){


?>

<!DOCTYPE html>
<html lang="en">
  <head>
  
	<?php include("include/header.php");?>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="css/froala_editor.css">
  <link rel="stylesheet" href="css/froala_style.css">
  <link rel="stylesheet" href="css/plugins/code_view.css">
  <link rel="stylesheet" href="css/plugins/colors.css">
  <link rel="stylesheet" href="css/plugins/draggable.css">
  <link rel="stylesheet" href="css/plugins/emoticons.css">
  <link rel="stylesheet" href="css/plugins/image_manager.css">
  <link rel="stylesheet" href="css/plugins/image.css">
  <link rel="stylesheet" href="css/plugins/line_breaker.css">
  <link rel="stylesheet" href="css/plugins/table.css">
  <link rel="stylesheet" href="css/plugins/char_counter.css">
  <link rel="stylesheet" href="css/plugins/video.css">
  <link rel="stylesheet" href="css/plugins/fullscreen.css">
  <link rel="stylesheet" href="css/plugins/file.css">
  <link rel="stylesheet" href="css/plugins/quick_insert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
  


<link href="css/fileinput.min.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.1/angular.min.js"></script>
</head>
	
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
	  
        <?php include("include/left-menu.php");?>

        <!-- top navigation -->
        
	<?php include("include/top_nav.php");?>	

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Products</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">

                     <form id="basicForm" class="dropzone" method="post" enctype="multipart/form-data">

                      <div class="row">
                       
                        <div class="col-md-4">
						 <label class="control-label">Event Title: <span class="required">*</span>
                        </label>
						 <input class="form-control" placeholder="Heading" name="heading" type="text" id="heading" required>
						
                        </div>
						
						<div class="col-md-4">
						 <label class="control-label">Event From: <span class="required">*</span>
                        </label>
						 <input type="text" class="form-control fc-datepicker" placeholder="Event FromDate" name="from" id="from" required>
						
                        </div>
						
						
						<div class="col-md-4">
						 <label class="control-label">Event Till: <span class="required">*</span>
                        </label>
						 <input type="text" class="form-control fc-datepicker" placeholder="Event TillDate" name="till" id="till" required>
						
                        </div>
						
						</div>
						
						<br>
						
						<div class="row">
						
						<div class="col-lg-12">
						
						<label class="control-label">Event Description: <span class="required">*</span>
                        </label>
						
						<textarea class="large" id="edit" name="desc" placeholder="Description"></textarea>
						</div>
						
						</div>
						
						<br>
						
						
						
						
		 
						

						
						
						
						<div class="col-md-6" style="padding-top:25px;">
						<input type="submit" class="btn btn-success" name="submit">
						<button type="submit" class="btn btn-primary">Cancel</button>
                        </div>
						
						
                      </div>
					  
					 
					  
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
			
			
			 <div class="page-title">
              <div class="title_left">
                <h3>All Products </h3>
              </div>
            </div>
            <div class="clearfix"></div>
			
			<div class="row">
              

             

              <div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="x_panel">
				
				<?php

		
		if(isset($_GET['upd']))
		{
			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Banner has been Updated successfully</strong>
                  </div>";
		}
		
		
		
		if(isset($_GET['ins']))
		{
			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Banner has been inserted Successfully</strong>
                  </div>";
		}
	  
	  if(isset($_GET['npdel']))
	  {
		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>It can't be deleted.This Product is linked.</strong>
                  </div>";
      }
	  
	  if(isset($_GET['del']))
	  {
		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Banner has been Deleted Successfully</strong>
                  </div>";
      }
		
		
     	
	
?>
                  
                  <div class="x_content">
                   
					
					
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
						   <th>Sr.No</th>
						   <th>Banner Image</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                       <?php echo $table;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
			
          </div>
        </div>
        <!-- /page content -->
		
	
 <!-- footer content -->
      <?php include("include/footer.php");?>
	  
	  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
  <script type="text/javascript" src="js/froala_editor.min.js"></script>

  <script type="text/javascript" src="js/plugins/align.min.js"></script>
  <script type="text/javascript" src="js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="js/plugins/image.min.js"></script>
  <script type="text/javascript" src="js/plugins/file.min.js"></script>
  <script type="text/javascript" src="js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="js/plugins/link.min.js"></script>
  <script type="text/javascript" src="js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="js/plugins/video.min.js"></script>
  <script type="text/javascript" src="js/plugins/table.min.js"></script>
  <script type="text/javascript" src="js/plugins/url.min.js"></script>
  <script type="text/javascript" src="js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="js/plugins/save.min.js"></script>
  <script type="text/javascript" src="js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="js/plugins/quick_insert.min.js"></script>

	<script>
    (function () {
      const editorInstance = new FroalaEditor('#edit', {
        enter: FroalaEditor.ENTER_P,
        placeholderText: null,
        events: {
         
        }
      })
    })()
  </script>


<script src="js/fileinput.min.js"></script>
        <!-- /footer content -->
      </div>
    </div>
	
	

<!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	

	
	 <!-- Datatables -->
   

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
</html>
<?php }else{ header('Location:index.php');}?>