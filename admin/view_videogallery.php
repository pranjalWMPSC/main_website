<?php 
session_start();
include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";

$viewSecQry = "SELECT * FROM video_gallery ORDER by video_gallery_id DESC";  
$exeSecQry = mysqli_query($mysqli,$viewSecQry);

 $table=""; $count=0;
 while($row = mysqli_fetch_array($exeSecQry)) 
 {
   $count+=1;
   $video_gallery_id= $row['video_gallery_id'];
   $video_gallery_title= $row['video_gallery_title'];
   $video_gallery_link= $row['video_gallery_link'];
   $uploaded_date= $row['post_date'];
   $newDate = date("d-m-Y",strtotime($uploaded_date));
   $table.="<tr>
            <td>$count </td>
            <td>$video_gallery_title</td>
            <td><iframe width='350' height='200' src='".$video_gallery_link."' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></td>
            <td>$newDate</td>
            <td><a class='btn btn-info update' data-id='$video_gallery_id' data-title='$video_gallery_title' data-text='$video_gallery_link'><i class='fa fa-pencil'></i> Update</a> 
	           <a class='btn btn-danger delete' data-id='$video_gallery_id'><i class='fa fa-trash'></i> Delete</a></td>
        </tr>";
}




if(isset($_POST['submit']))
{
  $sql = "UPDATE video_gallery SET video_gallery_title='".$_POST['txttitle']."',video_gallery_link='".$_POST['txtlink']."' WHERE video_gallery_id='".$_POST['update_id']."'";
  $exe = mysqli_query($mysqli,$sql);
  header('Location:view_videogallery.php');
}

if(isset($_REQUEST['get'])){
    switch($_REQUEST['get']){

      case 'deleteRow':

        $Id = $_POST['ID'];
        $sql="DELETE FROM video_gallery WHERE video_gallery_id ='".$Id."'";
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
                    <h2>View Video Gallery <small>View Front Page Video Gallery</small></h2>
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
                        <th>Sr.</th>
                        <th>Title</th>
                        <th>Video</th>
                        <th>Date</th>
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
		
	    <div id="modalimage" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center modal-lg" role="document" style='width:700px;'>
          <div class="modal-content bd-0 tx-14">
            <form id="basicForm" class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="modal-header pd-y-20 pd-x-25">
              <h4 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <div class="modal-body pd-25">
             <div class="row">
                  <input type="hidden" value="" id="update_id" name="update_id">
                  <div class="form-layout form-layout-1">
                   <div class="mg-b-25" id="addSubjects">
                   <div class="col-lg-6">
                        <label class="form-control-label">Video Title: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                        <input type="text" name="txttitle" id="txttitle" class="form-control" required="">
                    </div>
        
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Youtube Link: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                        <input type="text" class="form-control required large" name="txtlink" id="txtlink" required="" placeholder="http://youtube.com">
                      </div>
                    </div><!-- col-4 -->
                  </div> 
                </div>
             </div>
        </div>

        <div class="modal-footer text-center">
          <button class="btn btn-primary" name="submit">Update</button>
        </div>
        </form>
        </div>
      </div>
    </div>


      <!-- footer content -->
      <?php include("include/footer.php");?>
        <!-- /footer content -->
      </div>
    </div>
	

<script type="text/javascript">
    $(".update").click(function(){
       var id = $(this).attr("data-id"); 
       var title = $(this).attr("data-title");
       var link = $(this).attr("data-text");
       $("#modalimage").modal('show'); 
       $("#update_id").val(id);
       $("#txttitle").val(title);
       $("#txtlink").val(link); 

      });


  $(".delete").click(function(){
    if(confirm("Are you sure you want to delete this?")){
      var ID = $(this).attr("data-id");
      $.post('view_videogallery.php',{get:"deleteRow",ID:ID},function(data){
        alert(data);
        window.location.reload();
      });
    }
    else{
        return false;
    }
  });
</script>    



<style type="text/css">
  .modal-header .close {
    margin-top: -28px;
}
</style>



  </body>
</html>
<?php }else{ header('Location:index.php');}?>