<?php session_start();
error_reporting(0);
include "connection/connect.php";
$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";
$id = $_GET['id'];
$viewSecQry = "SELECT * FROM apply_toa_tot_calendar WHERE toa_tot_calendar_id='".$id."' AND tot_type='1'"; 
 $exeSecQry = mysqli_query($mysqli,$viewSecQry);
 $table="";
 $count=0;
 while($row = mysqli_fetch_array($exeSecQry)) {
	 $count+=1; 
	 $apply_id= $row['apply_id']; 
	 $name= $row['name']; 
	 $father_name= $row['father_name'];
	 $adhar = $row['adhar']; 
	 $address= $row['address']; 
	 $expiry_date = $row['expiry_date']; 
	 $uploaded_date= $row['post_date'];
	 $newDate = date("d-m-Y h:i:s",strtotime($uploaded_date)); 
	 $action = "<a class='btn btn-success update btn-sm delete example2' data-id='$apply_id'>Pass</a>";
	 if($row['candidate_status']==1){
		 $sela = 'selected';
	} else{$sela="";} 
	 if($row['candidate_status']==2){
		 $selb = 'selected';
		 } else{$selb="";}
		 if($row['candidate_status']==0){
			 $selc = 'selected';
		} else{$selc="";} 
		$staten = "SELECT * FROM states WHERE id='".$row['state_id']."'";
		$qurstaten = mysqli_query($mysqli,$staten); 
			 $arresstaten = mysqli_fetch_assoc($qurstaten);
			 $sqln = "SELECT * FROM cities WHERE id = '".$row['city_id']."'"; 
			 $exen = mysqli_query($mysqli,$sqln); 
			 $arrn = mysqli_fetch_array($exen); 
			 $table.="<tr>          <td>$count </td>          <td>{$row['unique_number']}</td>          <td>$name<br/>{$row['mobile_number']}</td>          <td>$father_name</td>          <td>{$row['dob']}/<br/>{$row['email']}</td>         <td>{$arresstaten['name']}/<br/>{$arrn['name']}</td>          <td>$adhar</td>                  <td><a href='uploads/tot_document/{$row['resume']}' class='btn btn-primary btn-sm' target='_blank'>Download</a></td>          <td><select class='form-control delete'><option $selc>Status</option><option value='1' data-id='$apply_id' $sela>Pass</option><option value='2' data-id='$apply_id' $selb>Fail</option></select> </td>      </tr>";
			 }
			 if(isset($_REQUEST['get'])){ 
			 switch($_REQUEST['get']){  
			 case 'confirmation':   
			 $applyid = $_POST['applyid']; 
			 $sts = $_POST['sts'];    
			 $find = "UPDATE apply_toa_tot_calendar SET candidate_status='".$sts."' where apply_id='".$applyid."'";   
			 $exeFind = mysqli_query($mysqli,$find); 
			 if (mysqli_affected_rows($mysqli) > 0) { 
			 echo "Successfully Done!";   
			 }     
			 die;      break;   
			 } 
			 }
			 if($adminRole !=""){?>
			 <!DOCTYPE html>
			 <html lang="en">  <head>	<?php include("include/header.php");?>  <link rel="stylesheet" href="css/froala_editor.css">  <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">  </head>  <body class="nav-md">    <div class="container body">      <div class="main_container">	          <?php include("include/left-menu.php");?>        <!-- top navigation -->        		<?php include("include/top_nav.php");?>	        <!-- page content -->        <div class="right_col" role="main">          <div class="">            <div class="page-title">              <div class="title_left">                              </div>            </div>            <div class="clearfix"></div>              <?php              		              		if(isset($_GET['upd']))              		{              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>                                  </button>                                  <strong>Calendar has been Updated successfully</strong>                                </div>";              		}              		              		if(isset($_GET['ins']))              		{              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>                                  </button>                                  <strong>Calendar has been inserted Successfully</strong>                                </div>";              		}              	                	  if(isset($_GET['npdel']))              	  {              		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>                                  </button>                                  <strong>It can't be deleted.This Product is linked.</strong>                                </div>";                    }              	                	  if(isset($_GET['del']))              	  {              		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>                                  </button>                                  <strong>Banner has been Deleted Successfully</strong>                                </div>";                    }              	              ?>          			    <div class="row">              <div class="col-md-12 col-sm-12 col-xs-12">                <div class="x_panel">                  <div class="x_title">                    <h2>Screening Application <small>View All Application IPSC Website</small></h2>                    <ul class="nav navbar-right panel_toolbox">                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>                      </li>                                           <li><a class="close-link"><i class="fa fa-close"></i></a>                      </li>                    </ul>                    <div class="clearfix"></div>                  </div>                                   <div class="x_content">                    <table id="datatable-buttons" class="table table-striped jambo_table bulk_action table-bordered">                      <thead>                        <tr>                        <th>Sr.</th>                        <th>Unique Number</th>                        <th>Name/<br/>Mobile</th>                        <th>Father Name</th>                        <th>DOB/<br/>Email</th>                        <th>State/<br/>City</th>                        <th>Adhar Number</th>                        <th>Resume</th>                        <th>Action</th>                        </tr>                      </thead>                      <tbody>                       <?php echo $table;?>                      </tbody>                    </table>                  </div>                </div>              </div>            </div>			          </div>        </div>        <!-- /page content -->			      <!-- footer content -->      <?php include("include/footer.php");?>        <!-- bootstrap-daterangepicker -->    <script src="vendors/moment/min/moment.min.js"></script>    <!-- bootstrap-datetimepicker -->        <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>    <script type="text/javascript">      $('#myDatepicker1,#myDatepicker2').datetimepicker({        ignoreReadonly: true,        allowInputToggle: true,        format: 'YYYY-MM-DD HH:mm A'    });    </script>                <script type="text/javascript">          $('.delete').on('change', function(){             if(confirm('Change Status')){                var sts = $(this).val();                var applyid = $(this).find(':selected').data('id');                $.post('application.php',{get:"confirmation",applyid:applyid,sts:sts},function(data){                  alert(data);                  window.location.reload();                });             }              else              {                return false;              }          });        </script>      </div>    </div>  </body></html><?php }else{ header('Location:index.php');}?>