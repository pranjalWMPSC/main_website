<?php 
session_start();
include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";



$viewSecQry = "SELECT * FROM career ORDER by career_id DESC";  
$exeSecQry = mysqli_query($mysqli,$viewSecQry);

 $table=""; $count=0;
   while($row = mysqli_fetch_array($exeSecQry)) 
   {
     $count+=1;
     $career_id= $row['career_id'];
     $jobfrom= $row['jobfrom'];
     $jobto= $row['jobto'];
     $jobtitle= $row['jobtitle'];
     $joblocation= $row['joblocation'];
     $jobarea= $row['jobarea'];
     $jobdescription = $row['jobdescription'];
     $newDate = date("d-m-Y",strtotime($row['date']));

     if($row['status']==0){$status="Active";}else{$status="Inactive";}

     $table.="<tr>
                  <td>$count </td>
                  <td><b>From Date-</b><br/>$jobfrom<br/><b>ToDate-</b><br/>$jobto</td>
                  <td>$jobtitle</td>
                  <td>$joblocation</td>
                  <td>$jobarea</td>
                  <td>$jobdescription</td>
                  <td>$newDate</td>
                  <td>$status</td>
                  <td><a class='btn btn-info' href='update_career.php?updid=$career_id'><i class='fa fa-pencil'></i> Update</a> 
                   <a class='btn btn-danger' href='delete_career.php?delid=$career_id' onclick='return confirm_Delete()'><i class='fa fa-trash'></i> Delete</a></td>
              </tr>";
  }


if($adminRole !=""){


?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("include/header.php");?>
  <link rel="stylesheet" href="css/froala_editor.css">
  <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
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
                                  <strong>Job has been Updated successfully</strong>
                                </div>";
              		}
              		
              		
              		
              		if(isset($_GET['ins']))
              		{
              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>Job has been post Successfully</strong>
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
                                  <strong>Job has been Deleted Successfully</strong>
                                </div>";
                    }
              		
              		
                   	
              	
              ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>View job <small>View Job in IPSC Website</small></h2>
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
                        <th>Duration</th>
                        <th>Job Title</th>
                        <th>Job Location</th>
                        <th>Job Area</th>
                        <th>Job Description</th>
                        <th>PostDate</th>
                        <th>Status</th>
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
		
	
      <!-- footer content -->
      <?php include("include/footer.php");?>
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
        
      </div>
    </div>
  </body>
</html>
<?php }else{ header('Location:index.php');}?>