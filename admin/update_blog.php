<?php 
session_start();
include "connection/connect.php";
$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";

error_reporting(0);
$id=$_GET['updid'];                           

$viewSecQry = "SELECT * FROM blogs WHERE blog_id ='".$id."'";  
$exeSecQry = mysqli_query($mysqli,$viewSecQry);
while($row = mysqli_fetch_array($exeSecQry)) 
{
     $blog_title= $row['blog_title'];
     $blog_description= $row['blog_description'];
     $blog_image= $row['blog_image'];
     $newDate = date("d-m-Y",strtotime($row['post_date']));
}


if(isset($_POST['submit']))
{
	    $new_image="";
      $current_image = $_FILES['image_file']['name'];
      if($_FILES['image_file']['name'] != "")
      {
        $extension = substr(strrchr($current_image, '.'), 1);
        if (($extension!= "ppt") && ($extension != "pptx") && ($extension != "doc") && ($extension != "docx") && ($extension != "pdf")) 
        {
           $errormsg="<div class='mws-form-message error'>Unknown File extension...</div>";
          
        }
      }
      
     
      if($current_image=="")
      {
        $date_current=date("y-m-d");
        $newDescription =mysqli_real_escape_string($mysqli,$_POST['textAreaDescription']);
         $sql="UPDATE blogs SET blog_title = '".$_POST['txtNoticeTitle']."',post_date='".$date_current."',blog_description='".$_POST['textAreaDescription']."' WHERE blog_id = '{$id}'";
        $res=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
        $errormsg= "<div class='mws-form-message success'>Record Updated Successfully...</div>";
        header("location:update_blog.php?updid=$id&upd=msg");
      } 
      else
      {
        
        $time = date("pYhis");
        $new_image = $time . "." . $extension;
        $date_current=date("y-m-d");
        $destination="uploads/blogs/".$new_image;
        $action = move_uploaded_file($_FILES['image_file']['tmp_name'], $destination);
        
        if(!$action){$errormsg="File copy failed";}
        else{$errormsg= "<div class='mws-form-message success'>Record Inserted Successfully...</div>";}
        
        $date_current   = date("d-m-Y");    
        $newDescription =mysqli_real_escape_string($mysqli,$_POST['textAreaDescription']);
      
        $sql="UPDATE blogs SET blog_title = '".$_POST['txtNoticeTitle']."',blog_image = '$new_image',blog_description='".$_POST['textAreaDescription']."',post_date='".$date_current."' WHERE blog_id = '{$id}'";
        $res=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
        $errormsg= "<div class='mws-form-message success'>Record Updated Successfully...</div>";
        header("location:update_blog.php?updid=$id&upd=msg");
        
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
  <script>
  function validateregform(){
    frm=document.contact_form;  
    
    if (frm.image_file.value==""){
    
    }
    else{
       var allowedFiles = [".jpg",".png",".jpeg",".pdf"];
          var fileUpload = document.getElementById("image_file");
          var lblError = document.getElementById("lblError");
          var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
          if (!regex.test(fileUpload.value.toLowerCase())) {
              lblError.innerHTML = "Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.";
              return false;
          }
          lblError.innerHTML = "";
          return true;
    }
  }
</script>
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
              <?php

              		
              		if(isset($_GET['upd']))
              		{
              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>Blog has been Updated successfully</strong>
                                </div>";
              		}
              		
              		
              		if(isset($_GET['ins']))
              		{
              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>Blog has been inserted Successfully</strong>
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
                                  <strong>Blog has been Deleted Successfully</strong>
                                </div>";
                  }
              		
              		
                   	
              	
              ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Update Blog <small>Update Blog in IPSC Website</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 
                  <div class="x_content">

                    <form onSubmit="javascript:return validateregform();" class="mws-form" id="contact_form" name="contact_form" method="post" enctype="multipart/form-data">
          <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
	

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Blog Title: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                  <textarea name="txtNoticeTitle" id="" class="form-control required large"><?php echo $blog_title; ?></textarea>
                </div>
              </div><!-- col-4 -->


             <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Blog Description: <span class="tx-danger" style="font-size: 11px; color: red;">* </span></label>
                  <textarea name="textAreaDescription" id="jobdescription" class="form-control required large">
                    <?php echo $blog_description; ?>
                  </textarea>
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Blog Image:</label>
                  <input type="file" name="image_file" id="image_file" class="form-control">
                  <br/>
                  <img src="uploads/blogs/<?php echo $blog_image; ?>" width="200">
                </div>
              </div><!-- col-4 -->

              <span id="lblError" style="color: red;"></span>

			       <div class="col-lg-4" style="margin-top: 28px;">
                <div class="form-group">
                  <button class="btn btn-primary" name="submit">Update Blog</button>
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
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
      <script type="text/javascript" src="js/froala_editor.min.js"></script>
      <script>
        (function () {
          const editorInstance = new FroalaEditor('#jobdescription', {
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
        
      </div>
    </div>
  </body>
</html>
<?php }else{ header('Location:index.php');}?>