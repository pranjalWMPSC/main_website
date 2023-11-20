<?php 
session_start();
include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";

$id = $_GET['id'];
    
  
$getdata="select * from team where mainid='".$id."'";
$exedata = mysqli_query($mysqli,$getdata);
while($data = mysqli_fetch_array($exedata))
{
  $fname = $data['fname'];
  $email = $data['email'];
  $quali = $data['qualification'];
  $contact = $data['c_no'];
  $designation = $data['designation'];
  $details = $data['f_details'];
  $img = "<img src='{$data['photo']}' width='100%'/>";
 
}


  $sucessMsg ="";
  $photos = array();
  if(isset($_POST['save']))
  {
      $photos = $_FILES['file']['name']; 
      if($photos !="")
      {
          $target_dir = 'uploads/team/';
      
          $original_filename = $_FILES['file']['name'];
          $ext = substr($original_filename, strpos($original_filename,'.'), strlen($original_filename)-1);
          if($ext=='.jpg' || $ext=='.gif' || $ext=='.jpeg' || $ext=='.png')
            {
              $ext = pathinfo($original_filename, PATHINFO_EXTENSION);  
              $filename_without_ext = basename($original_filename, '.'.$ext);
              $new_filename = str_replace(' ', '_', $filename_without_ext) . '_' . time() . '.' . $ext; 
              move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $new_filename);
              $updatedata = "update team set fname='".$_POST['Fname']."',email='".$_POST['email']."',qualification='".$_POST['qualification']."',f_details='".mysqli_real_escape_string($mysqli,$_POST['details'])."',c_no='".$_POST['contact']."',designation='".$_POST['designation']."',photo='"."uploads/team/".$new_filename."',post_date=now() where mainid=$id"; 
              $exe = mysqli_query($mysqli,$updatedata);
             header('Location:view_team.php?upd');
           
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

      else
      {

       $updatedata = "update team set fname='".$_POST['Fname']."',email='".$_POST['email']."',qualification='".$_POST['qualification']."',f_details='".mysqli_real_escape_string($mysqli,$_POST['details'])."',c_no='".$_POST['contact']."',designation='".$_POST['designation']."',post_date=now() where mainid=$id"; 
       $exe = mysqli_query($mysqli,$updatedata);
       header('Location:view_team.php?upd');

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
                                  <strong>Team Member has been Updated successfully</strong>
                                </div>";
              		}
              		
              		
              		
              		if(isset($_GET['ins']))
              		{
              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>Team Member has been inserted Successfully</strong>
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
                                  <strong>Team Member has been Deleted Successfully</strong>
                                </div>";
                    }
              		
              		
                   	
              	
              ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Update Team <small>Add Member in IPSC Website</small></h2>
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
          <div class="row">

            <div class="col-lg-4">
               <label>Team Member Name</label>
              <input class="form-control" placeholder="" name="Fname" value="<?php echo $fname;?>" type="text" id="Cname" required>
            </div><!-- col -->

            <div class="col-lg-4">
            <label>Email</label>
              <input class="form-control" placeholder="" name="email" value="<?php echo $email;?>" type="text" id="Cname" required>
            </div><!-- col -->

            <div class="col-lg-4">
              <label>Twitter URL</label>
              <input class="form-control" placeholder="" name="contact" value="<?php echo $contact;?>" type="text" id="heading" required>
            </div>
            
          </div>  


          <div class="row mg-t-20">

              <div class="col-lg-4">
                 <label>LinkedIn URL</label>
              <input class="form-control" placeholder="Company Name" name="qualification" type="text" id="Cname" value="<?php echo $quali ;?>" required>
            </div>
             <div class="col-lg-4">
               <label>Designation</label>
              <input class="form-control" placeholder="Package" name="designation" type="text" id="Package" value="<?php echo $designation ;?>" required>
            </div>

            <div class="col-lg-4">
               <label>Upload Photo</label>
              <input type="file" class="form-control" placeholder="logo" name="file" id="logo"  />
            </div>

          </div>

           <div class="row mg-t-20">
             <div class="col-lg-8">
               <label>Member Details</label>
              <textarea class="form-control" name="details" rows="10" required><?php echo $details ;?></textarea>
                 
             </div>

             <div class="col-lg-4">
              <label>Photo</label>
              <?php echo $img; ?>
             </div>

           </div>

    </div>


      <div class="row mg-t-20 pd-l-20">

        <button class="btn btn-success btn-with-icon" name="save">
          <div class="ht-40 justify-content-between">
            <span class="pd-x-15">Update Entry</span>
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