<?php 
session_start();
include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";




if(isset($_POST['submit']))
{
  $sql = "UPDATE statics SET statics_number='".$_POST['txtlink']."' WHERE statics_id='".$_POST['update_id']."'";
  $exe = mysqli_query($mysqli,$sql);
  header('Location:view_statics.php');
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
                        <th>Statics</th>
                        <th>Number</th>
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
                        <label class="form-control-label">Statics: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                        <input type="text" name="txttitle" id="txttitle" class="form-control" required="" readonly="">
                    </div>
        
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Number: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
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

</script>    



<style type="text/css">
  .modal-header .close {
    margin-top: -28px;
}
</style>



  </body>
</html>
<?php }else{ header('Location:index.php');}?>