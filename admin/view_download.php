<?php 
session_start();
include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";

$GetRows="select * from download";
$exe=mysqli_query($mysqli,$GetRows);
$row="";
$cont="";
while($data = mysqli_fetch_array($exe))
{
  $cont +=1; 

  $row .= "<tr>
            <td >$cont.</td>
            <td>{$data['download_title']}</td>
            <td>{$data['download_img']}</td>
            <td>{$data['post_date']}</td>
            <td><a class='btn btn-primary btn-sm edit' data-id='{$data['download_id']}' data-text='{$data['download_img']}' data-title='{$data['download_title']}'><i class='fa fa-pencil'></i> Edit</a></td>
            <td><button class='btn btn-danger btn-sm delete' data-id='{$data['download_id']}'><i class='fa fa-trash' ></i> Delete</button></td>
          </tr>";
}


if(isset($_POST['update']))
{
    $current_date = date("Y-m-d h:i:s");
    $photos = $_FILES['imagefile']['name']; 
    if($photos !="")
    {
        $date_current = date("Y-m-d h:i:s");

        $current_image = $_FILES['imagefile']['name'];
   
        $imageFileType = strtolower(pathinfo($current_image,PATHINFO_EXTENSION));   

        $extension = substr(strrchr($current_image, '.'), 1);

        $time = date("pYhis");

        $new_image = $time . "." . $extension;

        $destination="uploads/download/".$new_image;  

        if($action = move_uploaded_file($_FILES['imagefile']['tmp_name'], $destination))
        {
          $sql ="UPDATE download SET download_title='".$_POST['txttitle']."',download_img='".$new_image."',post_date='".$current_date."' WHERE download_id='".$_POST['update_id']."'";
          $exe = mysqli_query($mysqli,$sql); 
          header("Location:view_download.php?upd");
        }
    }
    else
    {
        $sql ="UPDATE download SET download_title='".$_POST['txttitle']."',post_date='".$current_date."' WHERE download_id='".$_POST['update_id']."'";
        $exe = mysqli_query($mysqli,$sql);
        header("Location:view_download.php?upd");
    }
}



//Delete
if(isset($_REQUEST['get'])){
    switch($_REQUEST['get']){
      case 'deleteRow':
        $Id = $_POST['ID'];

        $find = "select * from download where download_id='".$Id."'";
        $exfind = mysqli_query($mysqli,$find);
        $image=mysqli_fetch_array($exfind);
        unlink("uploads/download/".$image['download_img']); 

        $sql="DELETE FROM download WHERE download_id='".$Id."'";
        $exe = mysqli_query($mysqli,$sql);
        if(mysqli_affected_rows($mysqli) > 0) 
        {
            echo "You have successfully Delete your data.";
        }     
      
      die;
      break;
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
  <!-- Dropzone.js -->
  <link href="vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

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
                                  <strong>Download has been Updated successfully</strong>
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
                    <h2>View Notice <small>View Notice in IPSC Website</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 
                  <div class="x_content">

                   <table id="datatable-buttons" class="table table-striped jambo_table bulk_action table-bordered">
              <thead>
                <tr>
                  <th class="">Sr.No.</th>
                  <th class="">Title</th>
                  <th class="">Document</th>
                  <th>Post date</th>
                  <th class="">Edit</th>
                  <th class="">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $row; ?>
              </tbody>
            </table>

                  </div>
                </div>
              </div>
            </div>
			
			
		
			
			
          </div>
        </div>
        <!-- /page content -->
		
  	   <div id="modalimage" class="modal fade">
          <form id="basicForm" class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="modal-dialog modal-dialog-vertical-center modal-lg" role="document" >
                <div class="modal-content bd-0 tx-14">
                  <div class="modal-header">
                    <h6 style="font-size:15px;">Update Download</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <div class="row">
                  <div class="form-layout form-layout-1">
                  <input type="hidden" id="update_id" name="update_id">
                   <div class="row col-sm-12">
                   <div class="col-lg-5">
                        <label class="form-control-label" style="font-weight:normal;">Download Title: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                        <input type="text" name="txttitle" id="update_txttitle" class="form-control" required="">
                    </div>
        

                    <div class="col-lg-5">
                      <div class="form-group">
                        <label class="form-control-label" style="font-weight:normal;">Download File: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                       <input type="file" class="form-control" name="imagefile"> 
                       
                      </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-2">
                      <label class="form-control-label" style="font-weight:normal;">Previous File</label>
                      <a id="update_doc" class="btn btn-success"><i class="fa fa-download"></i> Download</a>
                    </div>
                  </div> 
              </div>
            </div>
        </div>
        <div class="modal-footer" style="text-align: center;">
          <button class="btn btn-primary" name="update">Update</button>
        </div>
        </div>
      </div>
    </form>

    </div>
      
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
              maxFileCount: 2,
              uploadUrl: "&nbsp;",
              allowedFileExtensions: ["jpg", "png", "gif"],
              mainClass: "input-group-lg",
          });
      });

      $(".delete").click(function(){
        if(confirm("Are you sure you want to delete this?")){
          var ID = $(this).attr("data-id");
          $.post('view_download.php',{get:"deleteRow",ID:ID},function(data){
            alert(data);
            window.location.reload();
          });
        }
        else{
            return false;
        }
      });

       $(".edit").click(function(){
          var ID = $(this).attr("data-id");
          var title = $(this).attr("data-title");
          var doc = $(this).attr("data-text");
          $.post('view_download.php',{get:"edit",ID:ID},function(data){
            $("#modalimage").modal('show');
            $("#update_id").val(ID);
            $("#update_txttitle").val(title);
            $("#update_doc").attr("href","uploads/download/"+doc);
         });
        });


      </script>

      </div>
    </div>

    <style type="text/css">
      .modal-header .close {
    margin-top: -27px;
}
    </style>
  </body>
</html>
<?php }else{ header('Location:index.php');}?>