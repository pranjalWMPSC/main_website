<?php 
session_start();
error_reporting(0);
include "connection/connect.php";
$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";
$update_id = isset($_GET['upd_id']) ? $_GET['upd_id'] : '';


$viewSecQry = "SELECT * FROM test_center_coverage ORDER by coverage_id DESC";  
$exeSecQry = mysqli_query($mysqli,$viewSecQry);

 $table=""; $count=0;
 while($row = mysqli_fetch_array($exeSecQry)) 
 {

  $count+=1;
  $sql_state = "SELECT * FROM test_center WHERE test_center_id='".$row['test_center_id']."'";
  $exe_state = mysqli_query($mysqli,$sql_state); $test_center="";
  $record_arr = mysqli_fetch_array($exe_state);

  $coverage_id= $row['coverage_id'];
  $test_center_id= $row['test_center_id'];
  $coverage_number= $row['coverage_number'];
  $uploaded_date= $row['post_date'];
  $newDate = date("d-m-Y",strtotime($uploaded_date));
  $table.="<tr>
            <td>$count </td>
            <td>{$record_arr['test_center_name']}</td>
            <td>$coverage_number</td>
            <td>$newDate</td>
            <td>
                <a class='btn btn-info btn-xs' href='insert_test_center_coverage.php?upd_id=$coverage_id'><i class='fa fa-pencil'></i> Update</a> 
                <a class='btn btn-danger btn-xs delete' data-id='$coverage_id'><i class='fa fa-trash'></i> Delete</a>
            </td>
            </tr>";
}


 $get_state = "SELECT * FROM test_center";
 $get_exe = mysqli_query($mysqli,$get_state); $test_center="";
 while($arr = mysqli_fetch_array($get_exe))
 {
    $test_center = "<option value='{$arr['test_center_id']}'>{$arr['test_center_name']}</option>";
 }



if(isset($_POST['save']))
{
    $chek = "SELECT * FROM test_center_coverage WHERE test_center_id='".$_POST['txt_test_center']."'";
    $exe = mysqli_query($mysqli,$chek);
    if(mysqli_affected_rows()>0)
    {
      header('Location:insert_test_center_coverage.php?npdel');
    }

    else
    { 
       $sql = "INSERT test_center_coverage(test_center_id,coverage_number,post_date) VALUES ('".$_POST['txt_test_center']."','".$_POST['txt_count_training']."',now())";
       $exe = mysqli_query($mysqli,$sql);
       if(mysqli_affected_rows($mysqli)>0)
       {
        header('Location:insert_test_center_coverage.php?upd');
       }
    }
}


if(isset($_POST['update']))
{
     $sql = "UPDATE test_center_coverage SET test_center_id='".$_POST['txt_test_center']."',coverage_number='".$_POST['txt_count_training']."' WHERE coverage_id='".$update_id."'";
     $exe = mysqli_query($mysqli,$sql);
     if(mysqli_affected_rows($mysqli)>0)
     {
      header('Location:insert_test_center_coverage.php?upd');
     }
}


if($update_id !="")
{
    $viewSecQry = "SELECT * FROM test_center_coverage WHERE coverage_id='".$update_id."'";  
    $exeSecQry = mysqli_query($mysqli,$viewSecQry);
    $row = mysqli_fetch_array($exeSecQry);
    $get_test_center_id = $row['test_center_id'];
    $get_coverage_number = $row['coverage_number'];
    
}



if(isset($_REQUEST['get']))
{
    switch($_REQUEST['get'])
    {
        case 'deleteRow':

            $Id = $_POST['ID'];

            $sql="DELETE FROM test_center_coverage WHERE coverage_id='".$Id."'";
            $exe = mysqli_query($mysqli,$sql);
            if(mysqli_affected_rows($mysqli) > 0){ echo "You have successfully Delete your data.";}

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
                                  <strong>Record has been Updated successfully</strong>
                                </div>";
              		}
              		
              		
              		
              		if(isset($_GET['ins']))
              		{
              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>Record has been inserted Successfully</strong>
                                </div>";
              		}
              	  
              	  if(isset($_GET['npdel']))
              	  {
              		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>It Already in database.</strong>
                                </div>";
                    }
              	  
              	  if(isset($_GET['del']))
              	  {
              		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>Record has been Deleted Successfully</strong>
                                </div>";
                    }
              ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Insert Test Center Coverage Number <small></small></h2>
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
            <div class="col-lg-4">
              <label>Select Test Center<span>*</span></label>
              <select class="form-control" name="txt_test_center" id="txt_test_center" required="">
                <option value="">--Select--</option>
                <?php echo $test_center; ?>
              </select>
            </div><!-- col -->

            <div class="col-lg-4">
              <label> No of Trained<span>*</span></label>
              <input class="form-control" placeholder="" name="txt_count_training" type="number" id="Cname" required="" value="<?php echo $get_coverage_number; ?>" />
            </div><!-- col -->
        </div>

    
      <div class="col-sm-12">
      <br/>
        <?php if($update_id==""){
            echo "<button class='btn btn-success btn-with-icon' name='save'>
              <div class='ht-40 justify-content-between'>
                <span class='pd-x-15'>Save Data</span>
                <span class='icon wd-40'><i class='fa fa-send'></i></span>
              </div>
            </button>";
            }
            else
            {
              echo "<button class='btn btn-primary btn-with-icon' name='update'>
              <div class='ht-40 justify-content-between'>
                <span class='pd-x-15'>Update Data</span>
                <span class='icon wd-40'><i class='fa fa-send'></i></span>
              </div>
            </button>";
            }
           ?>

      </div></form>
        </div>
      </div>
    </div>
  </div>

          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View <small></small></h2>
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
                        <th>TC Name</th>
                        <th>Number</th>
                        
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
          </div>
        </div>
      <!-- /page content -->
      <!-- footer content -->
      <?php include("include/footer.php");?>
      <!-- Dropzone.js -->
      </div>
    </div>
    <style type="text/css">.mg-t-20{margin-top: 10px; display: inline;}label{margin-top: 10px;}</style>

     <script type="text/javascript">
        $(document).ready(function(){

            var update_id = <?php echo $update_id ?>;
            if(update_id!='')
            {
              $("#txt_test_center option").filter(function() { return this.value == <?php echo $get_test_center_id; ?> }).prop('selected', true);
            }
        });
      </script>

      <script type="text/javascript">
        
         $(".delete").click(function(){
            if(confirm("Are you sure you want to delete this?")){
              var ID = $(this).attr("data-id");
              $.post('insert_test_center_coverage.php',{get:"deleteRow",ID:ID},function(data){
                alert(data);
                window.location.reload();
              });
            }
            else{
                return false;
            }
          });

      </script>




  </body>
</html>
<?php }else{ header('Location:index.php');}?>