<?php 

session_start();

include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";





if(isset($_POST['submit'])){



    $current_date = date("Y-m-d h:i:s");

    $txttitle = count($_POST["txttitle"]);

    for($i=0;$i<$txttitle;$i++) 

    {



      $chk = "SELECT * FROM statics WHERE statics_title='".$_POST['txttitle'][$i]."'";

      $chkexe = mysqli_query($mysqli,$chk);

      if(mysqli_affected_rows($mysqli)>0)

      {

        header("Location:insert_statics.php?npdel"); 

      }

      else

      {

        $sql = "INSERT statics(statics_title,statics_number,post_date)VALUES('".$_POST['txttitle'][$i]."','".$_POST['txtlink'][$i]."','".$current_date."')";

        $exe = mysqli_query($mysqli,$sql);

        header("Location:insert_statics.php?upd");

      }



    }

    

    

  }





$viewSecQry = "SELECT * FROM employer_registration ORDER by employer_id DESC";  

$exeSecQry = mysqli_query($mysqli,$viewSecQry);

 $table=""; $count=0;

 while($row = mysqli_fetch_array($exeSecQry)) 

 {

   $count+=1;

   $employer_id= $row['employer_id'];

   $organization= $row['organization'];

   $location= $row['location'];

   $jobrole= $row['jobrole'];

   $qualification= $row['qualification'];

   $experiance= $row['experiance'];

   $contact_name= $row['contact_name'];

   $email= $row['email'];

   $address= $row['address'];

   $no_requirement= $row['no_requirement'];

   $newDate = date("d-m-Y h:i:s",strtotime($row['post_date']));

   $table.="<tr>

            <td>$count </td>

            <td>$organization</td>

            <td>$location</td>

            <td>$jobrole</td>

            <td>$qualification</td>

            <td>$experiance</td>

            <td>$contact_name</td>

            <td>$email</td>

            <td>$no_requirement</td>

            <td>$address</td>

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

                    <h2>View Employers <small></small></h2>

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

                        <th>organization</th>

                        <th>location</th>

                        <th>jobrole</th>

                        <th>qualification</th>

                        <th>experiance</th>

                        <th>contact_name</th>

                        <th>email</th>

                        <th>no_requirement</th>

                        <th>address</th>

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