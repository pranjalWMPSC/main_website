<?php 
session_start();
include "connection/connect.php";
$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";


$sqlst="select * from states";
$exest=mysqli_query($mysqli,$sqlst);
$data="";
while($arrdata=mysqli_fetch_array($exest))
{
	$id = $arrdata['id'];
	$name = $arrdata['name'];
	$data.= "<option value=$id>$name</option>";
}	

	 
$sqlsh="select * from  cities";
$exesh=mysqli_query($sqlsh);	
$dash="";
$cnt=0;
while($arrsh=mysqli_fetch_array($exesh))
{
	$cnt+=1;
	$id=$arrsh['id'];
	$city_name=$arrsh['name'];
	$lat=$arrsh['latitude'];
	$longt=$arrsh['longitude'];
	
	$dash.="<tr>
	<td>$cnt</td>
	<td>$city_name</td>
	<td>$lat</td>
	<td>$longt</td>
	<td> 
	<a href='edit_city.php?id=$id&city=$city_name' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-edit fa-lg'></i></a>
	</td>
	</tr>";
}	
	 


if($adminRole !=""){

if(isset($_POST['submit']))
{
 		
		$successMessage =0;
					
			$city_name = mysqli_real_escape_string($mysqli,$_POST['city_name']);
			$lat = mysqli_real_escape_string($mysqli,$_POST['lat']);
			$longt = mysqli_real_escape_string($mysqli,$_POST['longt']);
			$state = mysqli_real_escape_string($mysqli,$_POST['state']);
			
			$sql="INSERT INTO cities(city_name, latitude, longitude, state_id)
			values('$city_name','$lat','$longt','$state')";
			
			
			
			$exe=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
			
		header("Location: city_master.php?InsertMessage=msg"); // redirent after updating
}

	

 


?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Add City </title>
  <?php include("include/header.php");?>
	<style>
	.p
	{
	font-size: 22px;
    color: red;
    font-weight: 700;
	}
	</style>
	
	<script>

<!--
function validateregform(){
	frm=document.contact_form;	
	
	if (frm.image_file.value==""){
	
	}
	else{
		 var allowedFiles = [".jpg",".png",".jpeg"];
        var fileUpload = document.getElementById("image_file");
        var lblError = document.getElementById("lblError");
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        if (!regex.test(fileUpload.value.toLowerCase())) {
            lblError.innerHTML = "Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.";
            return false;
        }
        lblError.innerHTML = "";
        return true;
	}
}


//-->
</script>
	
	
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
                <h3>Add City</h3>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">

                    <form method="post" class="form-horizontal" enctype="multipart/form-data" id="contact_form" name="contact_form" onSubmit="javascript:return validateregform();">

                      <div class="item form-group">
                       
                        <div class="col-md-3 col-sm-3 col-xs-12">
						 <label class="control-label">State <span class="required">*</span>
                        </label>
						<select class="form-control"required="required" name="state">
							<option value="">Select State</option>
							<?php echo $data;?>
						</select>
						
                        </div>
												
						 <div class="col-md-3 col-sm-3 col-xs-12">
						 <label class="control-label">City Name <span class="required">*</span>
                        </label>
                          <input type="text" name="city_name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
						
						 <div class="col-md-3 col-sm-3 col-xs-12">
						 <label class="control-label">Latitudes <span class="required">*</span>
                        </label>
                          <input type="text" name="lat" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
						
						 <div class="col-md-3 col-sm-3 col-xs-12">
						 <label class="control-label">Longitudes <span class="required">*</span>
                        </label>
                          <input type="text" name="longt" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
						
						 <div class="col-md-6 col-sm-12 col-xs-12">
						 
          <a href="https://www.latlong.net/" target="_blank"><br>
		  <strong><p class="p">For Latitudes and Longitudes. Click Here</p></strong></a>
                        </div>
						
                      </div>
					  
					   <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-6 col-md-offset-3">
		<input type="submit" class="btn btn-success" name="submit">
        <button type="submit" class="btn btn-primary">Cancel</button>
                        </div>
                      </div>
					  
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
			
			
			 <div class="page-title">
              <div class="title_left">
                <h3>View City</h3>
              </div>
            </div>
            <div class="clearfix"></div>
			
			<div class="row">
              

             

              <div class="col-md-12 col-sm-12 col-xs-12">
			  
                <div class="x_panel">
				
				<?php

		if(isset($_GET['InsertMessage']))
		{
			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Product has been inserted successfully</strong>
                  </div>";
		}
		
		if(isset($_GET['upd']))
		{
			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Product has been Updated successfully</strong>
                  </div>";
		}
		
		
		
		if(isset($_GET['ins']))
		{
			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Product Type has been enabled successfully</strong>
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
                    <strong>Product has been Deleted Successfully</strong>
                  </div>";
      }
		
		
     	
	
?>
                  
                  <div class="x_content">
                    
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr.No</th>
						   <th>City Name</th>
                          <th>Latitude</th>
                          <th>Longitude</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                       <?php echo $dash;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
			
          </div>
        </div>
        <!-- /page content -->
		<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
		

   <?php include("include/footer.php");?>

  </body>
</html>
<?php }else{ header('Location:index.php');}?>