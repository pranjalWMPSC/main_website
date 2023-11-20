<?php 
session_start();
include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";



$viewSecQry = "SELECT * FROM tpmaster";  
$exeSecQry = mysqli_query($mysqli,$viewSecQry);

   $table=""; $count=0;
   while($row = mysqli_fetch_array($exeSecQry)) 
   {
     $count+=1;
     $tp_id = $row['tp_id'];
     $tp_name = $row['tp_name'];
     $uploaded_date= $row['post_date'];
     $newDate = date("d-m-Y",strtotime($uploaded_date));
     $table.="<tr>
                <td>$count </td>
                <td>$tp_name</td>
                <td>$newDate</td>
                <td><a class='btn btn-info update' data-id='$tp_id' data-text='$tp_name' ><i class='fa fa-pencil'></i> Update</a> 
                 <a class='btn btn-danger delete' data-id='$tp_id'><i class='fa fa-trash'></i> Delete</a></td>
             </tr>";
  }



if(isset($_POST['save']))
{
        $date = date('Y-m-d h:m:s');
        $insertdata = "INSERT INTO tpmaster(tp_name,post_date) VALUES ('".$_POST['txtname']."','".$date."')";
        $exe = mysqli_query($mysqli,$insertdata);
        $sucessMsg = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button><strong class='d-block d-sm-inline-block-force'>Well done!</strong> Data upload successfully!.</div>";
       
}


if(isset($_POST['update_btn']))
{

  $sql = "UPDATE tpmaster SET tp_name='".$_POST['update_name']."' WHERE tp_id='".$_POST['update_id']."'";
  $exe = mysqli_query($mysqli,$sql);
  $sucessMsg = "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong class='d-block d-sm-inline-block-force'>Well done!</strong> Data Update successfully!.</div>";

}



if(isset($_REQUEST['get']))
{
    switch($_REQUEST['get'])
    {

     case 'delete':


        $ID = $_POST['ID'];
          
        $sql="DELETE FROM tpmaster WHERE tp_id='".$ID."'";
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
                    <h2>Insert Training Partner <small></small></h2>
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
              <label>Training Partner Name <span>*</span></label>
              <input class="form-control" placeholder="" name="txtname" type="text" id="Cname" required="">
            </div><!-- col -->


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



          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Training Partner <small></small></h2>
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
                        <th>Name</th>
                        <th>Date</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php echo $table; ?>
                  </tbody>
                </table>

                  </div>
                </div>
              </div>
            </div>

			
			
		 <div id="modalimage" class="modal fade">
      <form method="POST">
              <div class="modal-dialog modal-dialog-vertical-center modal-lg" role="document" style='width:700px;'>
                <div class="modal-content bd-0 tx-14">
                  <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold" style="font-size: 15px;">Update Training Partner</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body pd-25">
                    
                   <div class="row" id="data">
                    <div class="col-sm-6">
                        <label>Training Partner Name</label>
                        <input type="text" name="update_name" value="" id="update_name" class="form-control" />
                        <input type="hidden" id="update_id" name="update_id">
                      </div>
                  </div>
                
              </div>

              <div class="modal-footer" style="text-align: left;">
                <input type="submit" name="update_btn" value="Update" class="btn btn-success">
              </div>
              </div>
            </div>
          </form>
          </div>

			
			
          </div>
        </div>


        
      <!-- /page content -->
      <!-- footer content -->
      <?php include("include/footer.php");?>
      <!-- Dropzone.js -->
    

       <script type="text/javascript">
        $(".delete").click(function(){
        if(confirm("Are you sure you want to delete this?")){
          var ID = $(this).attr("data-id");
          $.post('insert_tp_master.php',{get:"delete",ID:ID},function(data){
            alert(data);
            window.location.reload();
          });
        }
        else{
            return false;
        }
      });



      $(".update").click(function(){
        var ID = $(this).attr("data-id");
        var text = $(this).attr("data-text");
        $("#update_name").val(text);
        $("#update_id").val(ID);
        $("#modalimage").modal('show');
        
      });

      </script>

    
      </div>
    </div>

    <style type="text/css">
      .mg-t-20{margin-top: 10px; display: inline;} label{margin-top: 10px;}
      .modal-header .close { margin-top: -26px; }
    </style>
  </body>
</html>
<?php }else{ header('Location:index.php');}?>