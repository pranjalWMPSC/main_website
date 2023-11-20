<?php 

session_start();

include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";


$viewSecQry = "SELECT * FROM candidate_registration ORDER by candidate_id DESC";  

$exeSecQry = mysqli_query($mysqli,$viewSecQry);

 $table=""; $count=0;

 while($row = mysqli_fetch_array($exeSecQry)) 

 {

   $count+=1;

   $employer_id= $row['candidate_id'];

   $organization= $row['candidate_name'];

   $location= $row['candidate_age'];

   $jobrole= $row['candidate_mobile'];

   $qualification= $row['candidate_email'];

   

   $contact_name= $row['candidate_city'];

   $email= $row['candidate_qualification'];

   if($row['candidate_experiance']==1){$st = "Fresher";} else{$st="Experiance";}

   $address= $st." Year ".$row['candidate_experiance_total'];

   $no_requirement= $row['candidate_jobrole'];

   $candidate_certified= $row['candidate_certified'];

   $newDate = date("d-m-Y h:i:s",strtotime($row['post_date']));

   $staten = "SELECT * FROM states WHERE id='".$row['candidate_state']."'"; 
   $qurstaten = mysqli_query($mysqli,$staten); 
   $arresstaten = mysqli_fetch_assoc($qurstaten);
   $experiance= $arresstaten['name'];

   $table.="<tr>

            <td>$count </td>

            <td>$organization</td>

            <td>$location</td>

            <td>$jobrole</td>

            <td>$qualification</td>

            <td>$experiance</td>

            <td>$contact_name</td>

            <td>$email</td>

            <td>$address</td>

            <td>$no_requirement</td>

            <td>$candidate_certified</td>

            <td>$newDate</td>

           

        </tr>";

}




if($adminRole !=""){

?>



<!DOCTYPE html>

<html lang="en">

  <head>

	<?php include("include/header.php");?>

  <link rel="stylesheet" href="css/froala_editor.css">

  

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

                                  <strong>Statics has been Updated successfully</strong>

                                </div>";

              		}

              		

              		

              		

              		if(isset($_GET['ins']))

              		{

              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>

                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>

                                  </button>

                                  <strong>Statics has been inserted Successfully</strong>

                                </div>";

              		}

              	  

              	  if(isset($_GET['npdel']))

              	  {

              		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>

                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>

                                  </button>

                                  <strong>Already in Database</strong>

                                </div>";

                    }

              	  

              	  if(isset($_GET['del']))

              	  {

              		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>

                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>

                                  </button>

                                  <strong>Statics has been Deleted Successfully</strong>

                                </div>";

                    }

              		

              		

                   	

              	

              ?>

            
			

			

		        <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="x_title">

                    <h2>View Job Seeker <small></small></h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content" style="overflow-x: scroll;">

                     <table id="datatable-buttons" class="table table-striped jambo_table bulk_action table-bordered">

                      <thead>

                        <tr>

                        <th>Sr.</th>

                        <th>Name</th>

                        <th>Age</th>

                        <th>Mobile</th>

                        <th>Email</th>

                        <th>State</th>

                        <th>City</th>

                        <th>Qualification</th>

                        <th>Experiance</th>

                        <th>Jobrole</th>

                        <th>Certified</th>

                        <th>Date</th>

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

      <style type="text/css">.modal-header .close {margin-top: -28px;}</style>

      </div>

    </div>

  </body>

</html>

<?php }else{ header('Location:index.php');}?>