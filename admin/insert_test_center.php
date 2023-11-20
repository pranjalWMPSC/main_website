<?php 
session_start();
error_reporting(0);
include "connection/connect.php";
$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";
$update_id = isset($_GET['upd_id']) ? $_GET['upd_id'] : '';


$viewSecQry = "SELECT * FROM test_center ORDER by test_center_id DESC";  
$exeSecQry = mysqli_query($mysqli,$viewSecQry);

 $table=""; $count=0;
 while($row = mysqli_fetch_array($exeSecQry)) 
 {
   $count+=1;
   $test_center_id= $row['test_center_id'];
   $test_center_name= $row['test_center_name'];
   $state_id= $row['state_id'];
   $city_id= $row['city_id'];


  $staten = "SELECT * FROM states WHERE id='".$state_id."'";
  $qurstaten = mysqli_query($mysqli,$staten); 
  $arresstaten = mysqli_fetch_assoc($qurstaten);
 
  $sqln = "SELECT * FROM cities WHERE id = '".$city_id."'";
  $exen = mysqli_query($mysqli,$sqln);
  $arrn = mysqli_fetch_array($exen);


   $uploaded_date= $row['post_date'];
   $newDate = date("d-m-Y",strtotime($uploaded_date));
   $table.="<tr>
                  <td>$count </td>
                  <td>$test_center_name</td>
                  <td>{$arresstaten['name']}</td>
                  <td>{$arrn['name']}</td>
                  <td>$newDate</td>
                  <td><a class='btn btn-info btn-xs' href='insert_test_center.php?upd_id=$test_center_id'><i class='fa fa-pencil'></i> Update</a> 
                   <a class='btn btn-danger btn-xs delete' data-id='$test_center_id'><i class='fa fa-trash'></i> Delete</a></td>
              </tr>";
}



$sql_state = "SELECT * FROM states";
$exe_state = mysqli_query($mysqli,$sql_state); $state_list="";
while($record_arr = mysqli_fetch_array($exe_state))
{
  $state_list .="<option value='{$record_arr['id']}'>{$record_arr['name']}</option>";
}


if(isset($_POST['save']))
{
     $date = date('Y-m-d h:m:s');

     $sql = "INSERT test_center(test_center_name,state_id,city_id,post_date) VALUES ('".$_POST['txtname']."','".$_POST['txtstate']."','".$_POST['txtcity']."',now())";
     $exe = mysqli_query($mysqli,$sql);
     if(mysqli_affected_rows($mysqli)>0)
     {
      header('Location:insert_test_center.php?upd');
     }
}


if(isset($_POST['update']))
{
     $sql = "UPDATE test_center SET test_center_name='".$_POST['txtname']."',state_id='".$_POST['txtstate']."',city_id='".$_POST['txtcity']."' WHERE test_center_id='".$update_id."'";
     $exe = mysqli_query($mysqli,$sql);
     if(mysqli_affected_rows($mysqli)>0)
     {
      header('Location:insert_test_center.php?upd');
     }
}


if($update_id !="")
{
    $viewSecQry = "SELECT * FROM test_center WHERE test_center_id='".$update_id."'";  
    $exeSecQry = mysqli_query($mysqli,$viewSecQry);
    $row = mysqli_fetch_array($exeSecQry);
    $get_name = $row['test_center_name'];
    $get_stateid = $row['state_id'];
    $get_cityid = $row['city_id'];
}


if(isset($_REQUEST['get']))
{
    switch($_REQUEST['get'])
    {
        case 'cities':


            $sql_city = "SELECT * FROM cities WHERE state_id = '".$_POST['ID']."'";
            $exe_city = mysqli_query($mysqli,$sql_city); $city_list="";
            while($city_arr = mysqli_fetch_array($exe_city))
            {
              $city_list .="<option value='{$city_arr['id']}'>{$city_arr['name']}</option>";
            }

            echo $city_list;

        die;
        break;



        case 'select_cities':


            $sql_city = "SELECT * FROM cities WHERE state_id = '".$_POST['ID']."'";
            $exe_city = mysqli_query($mysqli,$sql_city); $city_list="";
            while($city_arr = mysqli_fetch_array($exe_city))
            {
              if($city_arr['id']==$_POST['cityid']){$sel = "selected";} else{$sel="";}
              $city_list .="<option value='{$city_arr['id']}' $sel>{$city_arr['name']}</option>";
            }

            echo $city_list;

        die;
        break;



        case 'deleteRow':

            $Id = $_POST['ID'];

            $sql="DELETE FROM test_center WHERE test_center_id='".$Id."'";
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
                    <h2>Insert Test Center <small></small></h2>
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
              <label>Test Center Name <span>*</span></label>
              <input class="form-control" placeholder="" name="txtname" type="text" id="Cname" required="" value="<?php echo $get_name; ?>">
            </div><!-- col -->

            <div class="col-lg-4">
              <label> State<span>*</span></label>
              <select class="form-control" name="txtstate" id="txtstate" required="">
                <option value="">--Select--</option>
                <?php echo $state_list; ?>
              </select>
            </div><!-- col -->

            <div class="col-lg-4">
              <label>City <span>*</span></label>
               <select class="form-control" name="txtcity" id="txtcity" required="">
                <option value="">--Select--</option>
              </select>

              <a href="city_master.php" target="_blank" class="btn btn-primary" style="padding:1px 5px 1px 5px; margin-top: 5px;">Add city if not there</a>
            </div>

          
        
         


            
          </div>  

       
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
                    <h2>View Jobrole <small></small></h2>
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
                        <th>State</th>
                        <th>City</th>
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
              $("#txtstate option").filter(function() { return this.value == <?php echo $get_stateid; ?> }).prop('selected', true);
              fillstate(<?php echo $get_stateid; ?>);
              
            }

        });

         function fillstate(sid)
         {
            var ID = sid;
            var cityid = <?php echo $get_cityid; ?>;
             $.post('insert_test_center.php',{get:"select_cities",ID:ID,cityid:cityid},function(data){
                $("#txtcity").html(data);
             });
         } 
 
      </script>

      <script type="text/javascript">
         $("#txtstate").change(function(){
            var ID = $(this).val();
            $.post('insert_test_center.php',{get:"cities",ID:ID},function(data){
                $("#txtcity").html(data);
             });
        });

         $(".delete").click(function(){
            if(confirm("Are you sure you want to delete this?")){
              var ID = $(this).attr("data-id");
              $.post('insert_test_center.php',{get:"deleteRow",ID:ID},function(data){
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