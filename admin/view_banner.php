<?php ob_start();session_start();include "connection/connect.php";$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";$viewSecQry = "SELECT * FROM banner where banner_status = 0 ORDER by banner_id DESC";  $exeSecQry = mysqli_query($mysqli,$viewSecQry); $table=""; $count=0;   while($row = mysqli_fetch_array($exeSecQry))    {	   $count+=1;	   $banner_id= $row['banner_id'];	   $first_line= $row['first_line'];	   $second_line= $row['second_line'];	   $banner_photo= $row['banner_photo'];	   $uploaded_date= $row['uploaded_date'];	   $newDate = date("d-m-Y",strtotime($uploaded_date));	   $table.="<tr>                    <td>$count </td>                    <td>$first_line</td>                    <td>$second_line</td>					           <td><img src='uploads/banner/$banner_photo' width='80px;'></td>                    <td>$newDate</td>                    <td><a class='btn btn-info' href='update_banner.php?updid=$banner_id'><i class='fa fa-pencil'></i> Update</a> 					           <a class='btn btn-danger' href='deleteBanner.php?delid=$banner_id' onclick='return confirm_Delete()'><i class='fa fa-trash'></i> Delete</a></td>                </tr>";	}if($adminRole !=""){?><!DOCTYPE html><html lang="en">  <head>  	<?php include("include/header.php");?>	  </head>  <body class="nav-md">    <div class="container body">      <div class="main_container">	          <?php include("include/left-menu.php");?>        <!-- top navigation -->        		<?php include("include/top_nav.php");?>	        <!-- page content -->        <div class="right_col" role="main">          <div class="">            <div class="page-title">              <div class="title_left">                              </div>            </div>            <div class="clearfix"></div>              <?php              		              		if(isset($_GET['upd']))              		{              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>                                  </button>                                  <strong>Banner has been Updated successfully</strong>                                </div>";              		}              		              		              		              		if(isset($_GET['ins']))              		{              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>                                  </button>                                  <strong>Banner has been inserted Successfully</strong>                                </div>";              		}              	                	  if(isset($_GET['npdel']))              	  {              		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>                                  </button>                                  <strong>It can't be deleted.This Product is linked.</strong>                                </div>";                    }              	                	  if(isset($_GET['del']))              	  {              		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>                                  </button>                                  <strong>Banner has been Deleted Successfully</strong>                                </div>";                    }              		              		                   	              	              ?>            <div class="row">              <div class="col-md-12 col-sm-12 col-xs-12">                <div class="x_panel">                  <div class="x_title">                    <h2>View Banner <small>View Front Page Banner Images</small></h2>                    <ul class="nav navbar-right panel_toolbox">                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>                      </li>                                           <li><a class="close-link"><i class="fa fa-close"></i></a>                      </li>                    </ul>                    <div class="clearfix"></div>                  </div>                                   <div class="x_content">                    <table id="datatable-buttons" class="table table-striped jambo_table bulk_action table-bordered">                      <thead>                        <tr>                        <th>Sr.</th>                        <th>First Line</th>                        <th>Second Line</th>                        <th>Image</th>                        <th>Date</th>                        <th>Action</th>                        </tr>                      </thead>                      <tbody>                       <?php echo $table;?>                      </tbody>                    </table>                                     </div>                </div>              </div>            </div>								          </div>        </div>        <!-- /page content -->			 <!-- footer content -->      <?php include("include/footer.php");?>        <!-- /footer content -->      </div>    </div>	  </body></html><?php }else{ header('Location:index.php');}?>