<?php 
session_start();
include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";

$GetRows="select * from notice";
$exe=mysqli_query($mysqli,$GetRows);
$row="";
$cont=0;
while($data = mysqli_fetch_array($exe))
{
  $cont +=1; 

  $row .= "<tr>
            <td >$cont.</td>
            <td>{$data['notice_date']}</td>
            <td>{$data['notice_title']}</td>
            <td>{$data['notice_desc']}</td>
            <td>{$data['post_date']}</td>
            <td><button class='btn btn-success btn-sm show' data-id='{$data['notice_id']}' ><i class='fa fa-eye'></i> Image</button></td>
            <td><a href='update_notice.php?id={$data['notice_id']}' class='btn btn-primary btn-sm' data-id='{$data['notice_id']}' ><i class='fa fa-pencil'></i> Edit</a></td>
            <td><button class='btn btn-danger btn-sm delete' data-id='{$data['notice_id']}'><i class='fa fa-trash' ></i> Delete</button></td>
          </tr>";
}

//Delete
if(isset($_REQUEST['get'])){
    switch($_REQUEST['get']){
      case 'deleteRow':
      $Id = $_POST['ID'];
    
      $find = "select * from notice_images where notice_id='".$Id."'";
      $exeFind = mysqli_query($mysqli,$find);
      if (mysqli_affected_rows($mysqli) > 0) {
        echo "Please delete first related images";
      }
      else
      {
        $sql="DELETE from notice WHERE notice_id='".$Id."'";
        $exe = mysqli_query($mysqli,$sql);
        if(mysqli_affected_rows($mysqli) > 0) 
        {
        echo "You have successfully Delete your data.";
        }
      }
      
      
      die;
      break;
    
    case 'showImage':
    $Id = $_POST['ID']; 
    $sh = "select * from notice_images where notice_id='".$Id."'";
    $shexe=mysqli_query($mysqli,$sh);
    while($data=mysqli_fetch_array($shexe))
    {
      echo $img = "<div class='col-sm-3 text-center'><img src='{$data['images']}' width='100%'/>
      <br>
     <button data-id ='{$data['notice_image_id']}' class='del btn btn-danger btn-sm' style='margin-top:10px;'>Delete</button>
      </div>";
    }
    die;
    break;


    case 'deleteImage':
    $DELID = $_POST['DELID'];
      
    $find = "select * from notice_images where notice_image_id='".$DELID."'";
    $exfind =mysqli_query($mysqli,$find);
    $image=mysqli_fetch_array($exfind);
    unlink($image['images']); 

    $sql="DELETE FROM notice_images WHERE notice_image_id='".$DELID."'";
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
                  <th class="">Notice Date</th>
                  <th class="">Title</th>
                  <th class="">Description</th>
                  <th class="">DateTime</th>
                  <th>Image</th>
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
              <div class="modal-dialog modal-dialog-vertical-center modal-lg" role="document" style='width:700px;'>
                <div class="modal-content bd-0 tx-14">
                  <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Images</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body pd-25">
                    <p class="mg-b-5" >
                   <div class="row" id="data">
            
                  </div>
                  </p>  
        </div>
        </div>
      </div>
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


      $(".show").click(function(){
       var ID = $(this).attr("data-id");
        $.post('view_notice.php',{get:"showImage",ID:ID},function(data){
        $("#data").html(data);
        $("#modalimage").modal('show');
         });
        });

  $(document).on('click','.del',function(){
    if(confirm("Are you sure you want to delete this?")){
      var DELID = $(this).attr("data-id");
    //alert(DELID);
    //return false;
      $.post('view_notice.php',{get:"deleteImage",DELID:DELID},function(data){
        alert(data);
        window.location.reload();
    //$("#modalimage").modal('show');
      });
    }
    else{
        return false;
    }
  });


  $(".delete").click(function(){
    if(confirm("Are you sure you want to delete this?")){
      var ID = $(this).attr("data-id");
      $.post('view_notice.php',{get:"deleteRow",ID:ID},function(data){
        alert(data);
        window.location.reload();
      });
    }
    else{
        return false;
    }
  });
      </script>

      </div>
    </div>
  </body>
</html>
<?php }else{ header('Location:index.php');}?>