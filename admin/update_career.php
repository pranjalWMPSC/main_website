<?php 
session_start();
include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";

$id=$_GET['updid'];



$viewSecQry = "SELECT * FROM career WHERE career_id ='".$id."'";  
$exeSecQry = mysqli_query($mysqli,$viewSecQry);
while($row = mysqli_fetch_array($exeSecQry)) 
{
     
     
     $jobfrom= $row['jobfrom'];
     $jobto= $row['jobto'];
     $jobtitle= $row['jobtitle'];
     $joblocation= $row['joblocation'];
     $jobarea= $row['jobarea'];
     $jobdescription = $row['jobdescription'];
     $newDate = date("d-m-Y",strtotime($row['date']));
     if($row['status']==0){$chk="checked";}else{$chk="unchecked";}

}





if(isset($_POST['submit'])){
	
      $from=$_POST['from'];
      $to=$_POST['to'];
      $jobtitle=$_POST['jobtitle'];
      $joblocation=$_POST['joblocation'];
      $jobarea=$_POST['jobarea'];
      $jobdescription=$_POST['jobdescription'];
      $currentDate = date('Y-m-d h:i:s');
      //$checked = $_POST['status_chk']; 
      
      //if($checked =="on"){$chk="checked";}else{$chk="";}        
       
     $sql = "UPDATE career SET jobfrom='".$from."',jobto='".$to."',jobtitle='".$jobtitle."',joblocation='".$joblocation."',jobarea='".$jobarea."',jobdescription='".$jobdescription."',date='".$currentDate."'";
     $exe = mysqli_query($mysqli,$sql);
     if(mysqli_affected_rows($mysqli)>0)
     {
      header("location:view_career.php?upd=msg");
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
  <link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
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
          <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Insert job <small>Add Job in IPSC Website</small></h2>
                   <label class="pull-right">
                        <input type="checkbox" name="status_chk" class="js-switch" <?php echo $chk; ?> value="0" /> Status

                        
                   </label>
                    <div class="clearfix"></div>
                  </div>
                 
                  <div class="x_content">

                    

                  
          <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
			<div class="col-lg-2">
                <div class="form-group">
                  <label class="form-control-label">From Date: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                      <div class="input-group date" id="myDatepicker1">
                            <input type="text" name="from" class="form-control" readonly="readonly" value="<?php echo $jobfrom; ?>">
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
                            <input type="text" class="form-control" name="to" readonly="readonly" value="<?php echo $jobto; ?>">
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
              </div>

              <div class="col-lg-5">
                <div class="form-group">
                  <label class="form-control-label">Job Title: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                  <input type="text" name="jobtitle" class="form-control required" value="<?php echo $jobtitle; ?>">
                </div>
              </div><!-- col-4 -->

                <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">Job Location: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                  <input type="text" name="joblocation" class="form-control required" onKeyPress="return onlyAlphabets(event,this);" value="<?php echo $joblocation; ?>" />
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Job Area: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                  <textarea name="jobarea" id="jobarea" class="form-control required large"><?php echo $jobarea; ?></textarea>
                </div>
              </div><!-- col-4 -->


             <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Job Description: <span class="tx-danger" style="font-size: 11px; color: red;">* </span></label>
                  <textarea name="jobdescription" id="jobdescription" class="form-control required large"><?php echo $jobdescription; ?></textarea>
                </div>
              </div><!-- col-4 -->


			       <div class="col-lg-4" style="margin-top: 28px;">
                <div class="form-group">
                  <button class="btn btn-primary" name="submit">Update Job</button>
                </div>
              </div><!-- col-4 -->
			  
            </div><!-- row -->

           
          </div><!-- form-layout -->
		  
                  </div>
                </div>
              </div>
            </div>
			
			</form>
		
			
			
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
    <script src="vendors/switchery/dist/switchery.min.js"></script>
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