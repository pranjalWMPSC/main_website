<?php 
session_start();
include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";

$viewSecQry = "SELECT * FROM plumbacharya order by form_id DESC";  
$exeSecQry = mysqli_query($mysqli,$viewSecQry);
$table=""; $count=0;


   while($row = mysqli_fetch_array($exeSecQry)) 
   {

	   $count+=1;
	    $type= $row['type'];
	   $name= $row['name'];
	   $dob= $row['dob'];
	   $mobile= $row['mobile'];
	   $email= $row['email'];
	   $adhar= $row['adhar'];
     $jobrole = $row['jobrole'];
     $work = $row['work'];
     $state = $row['state'];
     $city = $row['city'];
     $pincode = $row['pincode'];
     $address = $row['address'];
     $uploaded_date = $row['post_date'];
	   $newDate = date("d-m-Y",strtotime($uploaded_date));

    $staten = "SELECT * FROM states WHERE id='".$state."'";
    $qurstaten = mysqli_query($mysqli,$staten); 
    $arresstaten = mysqli_fetch_assoc($qurstaten);
   
    $sqln = "SELECT * FROM cities WHERE id = '".$city."'";
    $exen =mysqli_query($mysqli,$sqln);
    $arrn = mysqli_fetch_array($exen);



	   $table.="<tr>
                   <td>$count </td>
                   <td>$type</td>
                   <td>$name</td>
                   <td>$dob</td>
					         <td>$mobile</td>
                   <td>$email</td>
                   <td>$adhar</td>
                   <td>$jobrole</td>
                   <td>$work</td>
                   <td>{$arresstaten['name']}</td>
                   <td>{$arrn['name']}</td>
                   <td>$pincode</td>
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
            
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>View Form Entries </h2>
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
                        <th>Type</th>
                        <th>Full Name</th>
                        <th>DOB</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Adhaar</th>
                        <th>Jobrole</th>
                        <th>Work Experiance</th>
                        <th>State</th>
                        <th>City</th>
                        
                        <th>Pincode</th>
                        <th>Address</th>
                        <th>PostDate</th>
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
        <!-- /footer content -->
      </div>
    </div>
	
  </body>
</html>
<?php }else{ header('Location:index.php');}?>