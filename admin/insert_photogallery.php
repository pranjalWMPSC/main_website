<?php 
session_start();
include "connection/connect.php";
$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";

if(isset($_POST['submit']))
{

    $sqlQuery = "select photo_title_id from photo_title where photo_title ='".$_POST['txtPhotoTitle']."'";
    $sqlResult = mysqli_query($mysqli,$sqlQuery) or die(mysqli_error($mysqli));    
    if(mysqli_affected_rows($mysqli)== 0)
    {     
          $date_current = date("Y-m-d h:i:s");

          $current_image = $_FILES['imagefile']['name'];
     
          $imageFileType = strtolower(pathinfo($current_image,PATHINFO_EXTENSION));   

          $extension = substr(strrchr($current_image, '.'), 1);

          $time = date("pYhis");

          $new_image = $time . "." . $extension;

          $destination="uploads/photo_gallery/".$new_image;  

          if($action = move_uploaded_file($_FILES['imagefile']['tmp_name'], $destination))
          {

              $sqlPhotoTitle = "insert into photo_title(photo_title,image,post_date) values('".$_POST['txtPhotoTitle']."','".$new_image."','$date_current')";         
            
              $res = mysqli_query($mysqli,$sqlPhotoTitle) or die(mysqli_error($mysqli));

              $successMessage="1";

              header("Location:insert_photogallery.php?ins={$successMessage}"); // redirent after updating   

          }         
    
    }
    else
      {
        $sucessMsg="<div class='mws-form-message warning'>Warning! This Photo Title is already Inserted!!! </div>";
      }  
}



if(isset($_POST['submit_photo']))
{
  
   $photos = $_FILES['input-b6']['name']; 
   $original_filename = $_FILES['input-b6']['name'];

   if(count(array_filter($photos)) == count($photos)) 
   {
    
    $images = $_FILES['input-b6'];
    $filenames = $images['name'];
    $sltphototitle = empty($_POST['sltphototitle']) ? '' : $_POST['sltphototitle'];
    $date = date('Y-m-d h:m:s');

    $vaild_types = array("image/jpg", "image/jpeg", "image/bmp", "image/gif","image/png");

    // loop and process files
    for($i=0; $i < count($filenames); $i++){
        
        if(!in_array($_FILES['input-b6']['type'][$i], $vaild_types)) 
        {
            $sucessMsg = "<div class='alert alert-danger' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>×</span>
                    </button>
                    <strong class='d-block d-sm-inline-block-force'>File Type Not valid!
                  </div>";
        }
        else
        {
            $ext = explode('.', basename($filenames[$i]));
            $target = "uploads/photo_gallery/" . DIRECTORY_SEPARATOR . md5(uniqid()) . "." . array_pop($ext);
            if(move_uploaded_file($images['tmp_name'][$i], $target)) {
              $success = true;
              $paths[] = $target;
              $sql="INSERT INTO gallery_photo(photo_title_id,image,post_date) VALUES ('".$sltphototitle."','".$paths[$i]."','".$date."')";
              $execute = mysqli_query($mysqli,$sql);
              $sucessMsg = "<div class='alert alert-success' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>×</span>
                    </button>
                    <strong class='d-block d-sm-inline-block-force'>Well done!</strong> Photos upload successfully!.
                  </div>";
            } else {
              $sucessMsg = "<div class='alert alert-warning' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>×</span>
                    </button>
                    <strong class='d-block d-sm-inline-block-force'>Well done!</strong> Error while upload photos.
                  </div>";
       
      }
        }


    }
    
   } 

  }





$sql = "SELECT * FROM photo_title order by photo_title_id DESC";
$exe = mysqli_query($mysqli,$sql); $list="";
while($arr = mysqli_fetch_array($exe))
{
    $list .="<option value='{$arr['photo_title_id']}'>{$arr['photo_title']}</option>";
}











if($adminRole !=""){
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("include/header.php");?>
  <link rel="stylesheet" href="css/froala_editor.css">
  <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">  
  <link href="vendors/fileinput.min.css" rel="stylesheet" type="text/css">
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
                
              </div>
            </div>
            <div class="clearfix"></div>

             <?php if(isset($sucessMsg)) {echo $sucessMsg;}?>

              <?php

              		
              		if(isset($_GET['upd']))
              		{
              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>Photo Album has been Updated successfully</strong>
                                </div>";
              		}
              		
              		
              		
              		if(isset($_GET['ins']))
              		{
              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>Photo Album has been inserted Successfully</strong>
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
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Insert Photo Album <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 
                  <div class="x_content">

         <form id="basicForm" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="form-layout form-layout-1">
             <div class="row mg-b-25">
             <div class="col-lg-6">
                  <label class="form-control-label">Album Title: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                  <input type="text" name="txtPhotoTitle" class="form-control" required="">
              </div>
	

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Album Main Photo: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                  <input type="file" class="form-control required large" name="imagefile" id="imagefile" required="" >
                </div>
              </div><!-- col-4 -->



			       <div class="col-lg-12" style="margin-top: 0px;">
                <div class="form-group">
                  
                  <button class="btn btn-primary" name="submit" >Submit Album</button>
                </div>
              </div><!-- col-4 -->
			  
            </div><!-- row -->

           
          </div><!-- form-layout -->
		  </form>



                  </div>
                </div>
              </div>
            </div>
			
			
		
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Upload Album Photos <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 
                  <div class="x_content">

                   <form id="basicForm" class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="form-layout form-layout-1">
            <div class="row mg-b-25">           

             <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Select Album: <span class="tx-danger" style="font-size: 11px; color: red;">* </span></label>
                  <select class="form-control" name="sltphototitle">
                    <option>----Select----</option>
                    <?php echo $list; ?>
                  </select>
                </div>
              </div><!-- col-4 -->


              <div class="col-sm-12">
                <div class="file-loading"> 
                        <input id="input-b6" name="input-b6[]" value="0" type="file" multiple data-browse-on-zone-click="true">
                    </div>
                   
                  <!-- <form action="form_upload.html" class="dropzone"></form> -->
              </div>


             <div class="col-lg-4" style="margin-top: 0px;">
                <div class="form-group">
                  
                  <button class="btn btn-primary" name="submit_photo">Upload Photos</button>
                </div>
              </div><!-- col-4 -->
        
            </div><!-- row -->

           
          </div><!-- form-layout -->
      </form>



                  </div>
                </div>
              </div>
            </div>
			
          </div>
        </div>
        <!-- /page content -->
		
	
      <!-- footer content -->
      <?php include("include/footer.php");?>

      
      <!-- Dropzone.js -->
      <script src="vendors/fileinput.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
      <script type="text/javascript" src="js/froala_editor.min.js"></script>
      <script>
        (function () {
          const editorInstance = new FroalaEditor('#jobarea, #jobdescription', {
            enter: FroalaEditor.ENTER_P,
            placeholderText: null,
            events: {
             
            }
          })
        })()
      </script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
      $('#myDatepicker1,#myDatepicker2').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true,
        format: 'YYYY-MM-DD'
    });
    </script>

     <script>
      $(document).on('ready', function() {
          $("#input-b6").fileinput({
              showUpload: true,
              maxFileCount:10,
              uploadUrl: "&nbsp;",
              allowedFileExtensions: ["jpg", "png", "gif"],
              mainClass: "input-group-lg",
          });
      });
      </script>
      </div>
    </div>
  </body>
</html>
<?php }else{ header('Location:index.php');}?>