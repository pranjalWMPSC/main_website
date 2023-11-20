<?php ob_start();
session_start();
include "connection/connect.php";
$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";
if($adminRole !=""){
	$sql ="SELECT * FROM toa_tot_calendar";
	$exe = mysqli_query($mysqli,$sql); 
	$list="";
	while ($arr = mysqli_fetch_array($exe)) { 
	$list .="<option value='{$arr['calendar_id']}'>{$arr['title']}</option>";
	}
	$get="SELECT * FROM results";
	$ex_get = mysqli_query($mysqli,$get);
	$n=0; 
	$tr="";
	while ($arr_get = mysqli_fetch_array($ex_get)) { 
	$tot_qry = "SELECT * FROM toa_tot_calendar WHERE calendar_id='".$arr_get['tot_id']."'"; 
	$tot_exe = mysqli_query($mysqli,$tot_qry); 
	$tot_arr =  mysqli_fetch_array($tot_exe);
	$n+=1;  
	$tr .= "<tr><td>".$n."</td>        <td>".$tot_arr['title']."</td>        <td><a href=uploads/tot_result/".$arr_get['result']." class='btn btn-success' target='_blank'>View</a></td>        <td>".$arr_get['post_date']."</td><td><a class='btn btn-danger' href='upload_results.php?delete={$arr_get['result_id']}'>Delete</a></td></tr>";
	}
	if(isset($_GET['delete'])){ 
	$result_id = $_GET['delete'];  
	$sqlImage="SELECT * FROM results WHERE result_id=".$result_id;  
	$res=mysqli_query($mysqli,$sqlImage) or die(mysqli_error($mysqli));
    $row=mysqli_fetch_array($res);  
	if($row['result'] != ""){  
		unlink("uploads/tot_result/{$row['result']}");
		} 
		$del = "DELETE FROM results WHERE result_id=".$result_id;   
		$del_exe = mysqli_query($del); 
		if(mysqli_affected_rows($mysqli)>0)    {   
		header("location:upload_results.php?del=msg");
		}
		}
		if(isset($_POST['but_import'])){
			$target_dir = "uploads/tot_result/";
			$target_file = $target_dir . basename($_FILES["importfile"]["name"]); 
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); 
			$uploadOk = 1; 
			if($imageFileType != "pdf" ) {
				$uploadOk = 0; 
			}
			if($uploadOk != 0)   {  
				$date = date('Y-m-d h:i:s');  
				$current_pdf = $_FILES['importfile']['name'];  
				$extension = substr(strrchr($current_pdf, '.'), 1);   
				$time = date("pYhis"); 
				$new_pdf = $time . "." . $extension;   
				$destination=$target_dir.$new_pdf;   
				if(move_uploaded_file($_FILES['importfile']['tmp_name'], $destination))    {    
				$sql_es = "INSERT INTO results(tot_id,result,post_date) VALUES('".$_POST['tot_id']."','".$new_pdf."','".$date."')";  
				$exe_es = mysqli_query($mysqli,$sql_es);      
				if(mysqli_affected_rows($mysqli)>0)        { 
				header("location:upload_results.php?ins=msg"); 
				}
				}  
				}  else  { 
				header("location:upload_results.php?war=msg");  
				}
				}
				?><!DOCTYPE html><html lang="en">  <head>	<?php include("include/header.php");?>  <link rel="stylesheet" href="css/froala_editor.css">  <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">  </head>  <body class="nav-md">    <div class="container body">      <div class="main_container">	          <?php include("include/left-menu.php");?>        <!-- top navigation -->        		<?php include("include/top_nav.php");?>	        <!-- page content -->        <div class="right_col" role="main">          <div class="">            <div class="page-title">              <div class="title_left">                              </div>            </div>            <div class="clearfix"></div>              <?php              		if(isset($_GET['ins']))              		{              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>                                  </button>                                  <strong>Result has been inserted Successfully</strong>                                </div>";              		}              	                	  if(isset($_GET['del']))              	  {              		echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>                                  </button>                                  <strong>Result Delete Successfully!</strong> </div>";                    }              	                	  if(isset($_GET['war']))              	  {              		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>                                  </button>                                  <strong>Please Select only file .pdf</strong>                                </div>";                    }              	              ?>          			    <div class="row">              <div class="col-md-12 col-sm-12 col-xs-12">                <div class="x_panel">                  <div class="x_title">                    <h2>Upload Results <small>ToT & ToA Result upload</small></h2>                    <ul class="nav navbar-right panel_toolbox">                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>                      </li>                                           <li><a class="close-link"><i class="fa fa-close"></i></a>                      </li>                    </ul>                    <div class="clearfix"></div>                  </div>                                   <div class="x_content">                    <form id="basicForm" class="form-horizontal" method="post" enctype="multipart/form-data">                        <div class="form-layout form-layout-1">                          <div class="row mg-b-25">                             <div class="col-lg-3">                              <div class="form-group">                              <label class="form-control-label">Select ToT/ToA <span class="tx-danger">*</span></label>                               <select class="form-control" name="tot_id" required="">                                 <option>--Select--</option>                                 <?php echo $list; ?>                               </select>                              </div>                            </div><!-- col-4 -->                                                                             <div class="col-lg-3">                              <div class="form-group">                              <label class="form-control-label">Browse PDF file: <span class="tx-danger">*</span></label>                               <input type='file' name="importfile" id="importfile" class="form-control" required="">                              </div>                            </div><!-- col-4 -->                                                                                                  <div class="col-lg-3" style="margin-top: 22px;">                              <div class="form-group">                                <input type="submit" class="btn btn-primary" id="but_import" name="but_import" value="Upload File">                              </div>                            </div><!-- col-4 -->                                                       </div><!-- row -->                                                 </div><!-- form-layout -->                    </form>                                      </div>                </div>              </div>            </div>             <div class="row">              <div class="col-md-12 col-sm-12 col-xs-12">                <div class="x_panel">                  <div class="x_title">                    <h2>All Results <small>view results</small></h2>                    <ul class="nav navbar-right panel_toolbox">                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                      <li><a class="close-link"><i class="fa fa-close"></i></a></li>                    </ul>                    <div class="clearfix"></div>                  </div>                  <div class="x_content">                    <table class="table table-bordred">                      <thead>                        <tr>                          <th>Sr.</th>                          <th>TOT Name</th>                          <th>Result(pdf)</th>                          <th>Post Date</th>                        </tr>                      </thead>                      <tbody>                        <?php echo  $tr; ?>                      </tbody>                    </table>                  </div>                </div>              </div>            </div>          </div>        </div>        <!-- /page content -->      <?php include("include/footer.php");?>      </div>    </div>  </body></html><?php }else{ header('Location:index.php');}?>