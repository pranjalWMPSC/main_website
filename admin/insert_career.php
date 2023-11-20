<?php 
session_start();
include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";



if(isset($_POST['submit'])){
	
	      $from=$_POST['from'];
        $to=$_POST['to'];
        $jobtitle=$_POST['jobtitle'];
        $joblocation=$_POST['joblocation'];
        $jobarea=$_POST['jobarea'];
        $jobdescription=$_POST['jobdescription'];
        $date=$_POST['currentDate'];
        $status=0;


        $currentDate = date('Y-m-d');
                
        $sql="insert into career values('','$from','$to','$jobtitle','$joblocation','$jobarea','$jobdescription','$currentDate','$status')";
        $respass=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
        header("location:view_career.php?ins=msg");
		 
		

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
                    <h2>Insert job <small>Add Job in IPSC Website</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 
                  <div class="x_content">

                   <form id="basicForm" class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
			<div class="col-lg-2">
                <div class="form-group">
                  <label class="form-control-label">From Date: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                      <div class="input-group date" id="myDatepicker1">
                            <input type="text" name="from" class="form-control" readonly="readonly">
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                  
                </div>
              </div>
			  <div class="col-lg-2">
                <div class="form-group">
                    <label>To Date:</label>
                        <div class="input-group date" id="myDatepicker2">
                            <input type="text" class="form-control" name="to" readonly="readonly">
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
              </div>

              <div class="col-lg-5">
                <div class="form-group">
                  <label class="form-control-label">Job Title: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                  <input type="text" name="jobtitle" class="form-control required">
                </div>
              </div><!-- col-4 -->

                <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Job Location: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                  <input type="text" name="joblocation" class="form-control required" onKeyPress="return onlyAlphabets(event,this);" />
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Job Area: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                  <textarea name="jobarea" id="jobarea" class="form-control required large"></textarea>
                </div>
              </div><!-- col-4 -->


             <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Job Description: <span class="tx-danger" style="font-size: 11px; color: red;">* </span></label>
                  <textarea name="jobdescription" id="jobdescription" class="form-control required large"></textarea>
                </div>
              </div><!-- col-4 -->


			 <div class="col-lg-4" style="margin-top: 28px;">
                <div class="form-group">
                  <button class="btn btn-primary" name="submit">Publish Job</button>
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