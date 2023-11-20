<?php 
session_start();
include "connection/connect.php";
$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";

$c_id=$_GET['id'];

$c_name = $_GET['city'];



	 
$sqlsh="select * from  cities as c inner join states as s on c.state_id=s.id where c.id=$c_id";
$exesh=mysqli_query($mysqli,$sqlsh);	
$cnt=0;
$arrsh=mysqli_fetch_array($exesh);

$cnt+=1;
$id=$arrsh['id'];
$name=$arrsh['name'];
$lat=$arrsh['latitude'];
$longt=$arrsh['longitude'];
$state_id=$arrsh['state_id'];
	
	
$sqlst="select * from states";
$exest=mysqli_query($mysqli,$sqlst);
$data="";
while($arrdata=mysqli_fetch_array($exest))
{
	$id=$arrdata['id'];
	$name=$arrdata['name'];
	
	if($id==$state_id)
	{
		$sltd="selected";
		$data.="<option $sltd value=$id>$name</option>";
	}
	else
	{
			$data.="<option value=$id>$name</option>";
	}
	
	
}		 


 if($adminRole !=""){

if(isset($_POST['submit']))
{
 		
		$successMessage =0;
					
			$name = mysqli_real_escape_string($mysqli,$_POST['name']);
			$lat = mysqli_real_escape_string($mysqli,$_POST['lat']);
			$longt = mysqli_real_escape_string($mysqli,$_POST['longt']);
			$state = mysqli_real_escape_string($mysqli,$_POST['state']);
			
			$sql="update cities set name='$name',latitude='$lat',longitude='$longt',state_id='$state' where id=$c_id";
			
			
			
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
                          <input type="text" name="name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $c_name;?>">
                        </div>
						
						 <div class="col-md-3 col-sm-3 col-xs-12">
						 <label class="control-label">Latitudes <span class="required">*</span>
                        </label>
                          <input type="text" name="lat" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $lat;?>">
                        </div>
						
						 <div class="col-md-3 col-sm-3 col-xs-12">
						 <label class="control-label">Longitudes <span class="required">*</span>
                        </label>
                          <input type="text" name="longt" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $longt;?>">
                        </div>
						
						 <div class="col-md-12 col-sm-12 col-xs-12">
						 
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