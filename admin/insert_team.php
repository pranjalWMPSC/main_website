<?php 
session_start();
include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";

if(isset($_POST['save']))
{
    $date = date('Y-m-d h:m:s');
    $target_dir = 'uploads/team/';
  
    $original_filename = $_FILES['file']['name'];
    $ext = substr($original_filename, strpos($original_filename,'.'), strlen($original_filename)-1);
    if($ext=='.jpg' || $ext=='.gif' || $ext=='.jpeg' || $ext=='.png')
    {
        $ext = pathinfo($original_filename, PATHINFO_EXTENSION);  
        $filename_without_ext = basename($original_filename, '.'.$ext);
        $new_filename = str_replace(' ', '_', $filename_without_ext) . '_' . time() . '.' . $ext; 
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $new_filename);
        
        $insertdata = "INSERT INTO team(fname,email,photo,f_details,qualification,c_no,designation,post_date) 
        VALUES ('".$_POST['Fname']."','".$_POST['email']."','"."uploads/team/".$new_filename."','".mysqli_real_escape_string($mysqli,$_POST['details'])."','".$_POST['qualification']."','".$_POST['contactNo']."','".$_POST['designation']."','".$date."')";
        $exe = mysqli_query($mysqli,$insertdata);

        $sucessMsg = "<div class='alert alert-success' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>×</span>
                </button>
                <strong class='d-block d-sm-inline-block-force'>Well done!</strong> Data upload successfully!.
              </div>";
    }
    else
    {
          $sucessMsg ="<div class='alert alert-danger' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>×</span>
                </button>
                <strong class='d-block d-sm-inline-block-force'>Photo Should be png, jpg, jpeg, gif!</div>";
    }
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
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Insert Team <small>Add Member in IPSC Website</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 
                  <div class="x_content">

        <form action="" method="post" data-parsley-validate="" enctype="multipart/form-data">
    
        <div class="" id="addSubjects">
           <div class="">

            <div class="col-lg-4">
              <label>Team Member Name</label>
              <input class="form-control" placeholder="" name="Fname" type="text" id="Cname" required>
            </div><!-- col -->

            <div class="col-lg-4">
              <label>Email Id (Multiple Email)</label>
              <input class="form-control" placeholder="" name="email" type="text" id="Cname" required>
            </div><!-- col -->

            <div class="col-lg-4">
              <label>Twitter URL</label>
              <input class="form-control" placeholder="" name="Twitter URL" type="text" id="heading" required>
            </div>
            
          </div>  
<br/>

        <div class="row mg-t-20">
            <div class="col-lg-4">
              <label>LinkedIn Url</label>
              <input class="form-control" placeholder="" name="LinkedIn URL" type="text" id="Cname" required>
            </div>
            <div class="col-lg-4">
              <label>Contact No.</label>
              <input class="form-control" placeholder="" name="contactNo" type="text" id="Package" required>
            </div>
            <div class="col-lg-4">
              <label>Photo</label>
              <input type="file" class="form-control" placeholder="logo" name="file" id="logo" required />
            </div>
        </div>

          <div class="mg-t-20">
            <div class="col-lg-12">
              <label>About Team Member</label>
              <textarea class="form-control" name="details" required></textarea>
            </div>
          </div>
    </div>

    
      <div class="col-sm-12">
<br/>
        <button class="btn btn-success btn-with-icon" name="save">
          <div class="ht-40 justify-content-between">
            <span class="pd-x-15">Save Data</span>
            <span class="icon wd-40"><i class="fa fa-send"></i></span>
          </div>
        </button>
       
      </div></form>
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
              mainClass: "input-group-lg",
          });
      });
      </script>
      </div>
    </div>

    <style type="text/css">
      .mg-t-20{margin-top: 10px; display: inline;}
      label{margin-top: 10px;}
    </style>
  </body>
</html>
<?php }else{ header('Location:index.php');}?>