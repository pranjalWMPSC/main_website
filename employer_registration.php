<?php

include "admin/connection/connect.php";


if(isset($_POST["submit_employer"]))
{

	$organization = $_POST['organization'];
	$location = $_POST['location'];
	$jobrole = $_POST['jobrole'];
	$qualification = $_POST['qualification'];
	$experiance = $_POST['experiance'];
	$contact_name = $_POST['contact_name'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$no_requirement = $_POST['no_requirement'];

	$sql= "INSERT INTO employer_registration (organization,location,jobrole,qualification,experiance,contact_name,email,address,no_requirement,post_date) VALUES ('".$organization."','".$location."','".$jobrole."','".$qualification."','".$experiance."','".$contact_name."','".$email."','".$address."','".$no_requirement."',now())";
	$res=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
	header("location:employer_registration.php?ins=msg");
}



if(isset($_POST["submit_candidate"]))
{

	$candidate_name = $_POST['candidate_name'];
	$candidate_age = $_POST['candidate_age'];
	$candidate_mobile = $_POST['candidate_mobile'];
	$candidate_email = $_POST['candidate_email'];
	$candidate_state = $_POST['candidate_state'];
	$candidate_city = $_POST['candidate_city'];
	$candidate_qualification = $_POST['candidate_qualification'];
	$candidate_experiance = $_POST['candidate_experiance'];
	$candidate_experiance_total = $_POST['candidate_experiance_total'];
	$candidate_jobrole = $_POST['candidate_jobrole'];
	$candidate_certified = $_POST['candidate_certified'];

	$sql= "INSERT INTO candidate_registration (candidate_name,candidate_age,candidate_mobile,candidate_email,candidate_state,candidate_city,candidate_qualification,candidate_experiance,candidate_experiance_total,candidate_jobrole,candidate_certified,post_date) VALUES ('".$candidate_name."','".$candidate_age."','".$candidate_mobile."','".$candidate_email."','".$candidate_state."','".$candidate_city."','".$candidate_qualification."','".$candidate_experiance."','".$candidate_experiance_total."','".$candidate_jobrole."','".$candidate_certified."',now())";
	$res=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
	header("location:employer_registration.php?ins=msg");
}


$qry = "SELECT * FROM states ORDER BY id ASC";

	$rst = mysqli_query($mysqli,$qry);

	$slist="";

		while($arrprotype=mysqli_fetch_array($rst))

		{

			$id=$arrprotype['id'];

			$name=$arrprotype['name'];

			

			$slist.="<option value='$id'>$name</option>";

			

		}

		

if(isset($_REQUEST['get']))

    {

	

        switch($_REQUEST['get'])

        {

			case 'getCities':

            {

				$sql = "select * from cities where state_id='".$_POST['stateID']."'";

                $execute = mysqli_query($sql);

				while($arrCities=mysqli_fetch_array($execute))

					{

						$id=$arrCities['id'];

						$city_name=$arrCities['name'];

						

						

						echo '<option value="'.$arrCities['id'].'">'.$arrCities['name'].'</option>';

       

						

					}

                die;

                break;

            }

			

    }

}		

?>

<!DOCTYPE html>

<html>

<head>

<?php include "includes/header.php"; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>

.valid

{

	color: red;

    font-weight: 700;

    font-size: 16px;

}

label {

    font-size: 16px;

    color: black;

    text-transform: capitalize;

}

.default-form input[type="text"], .default-form input[type="email"], .default-form input[type="password"], .default-form select, .default-form textarea {

    display: block;

    width: 100%;

    line-height: 28px;

    height: 50px;

    font-size: 15px;

    padding: 10px 20px;

    background: #ffffff;

    color: #222222;

    border-radius: 50px;

    border: 1px solid #dddddd;

    transition: all 500ms ease;

    -webkit-transition: all 500ms ease;

    -ms-transition: all 500ms ease;

    -o-transition: all 500ms ease;

}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px;
    display: block;
    width: 100%;
    line-height: 28px;
    height: 50px;
    font-size: 15px;
    padding: 10px 20px;
    background: #ffffff;
    color: #222222;
    border-radius: 50px;
    border: 1px solid #dddddd;
    transition: all 500ms ease;
    -webkit-transition: all 500ms ease;
    -ms-transition: all 5;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
     border: 0px solid !important; 
    border-radius: 4px;
}
.select2-container--default .select2-selection--single .select2-selection__arrow b {
    border-color: #888 transparent transparent transparent;
    border-style: solid;
    border-width: 5px 4px 0 4px;
    height: 0;
    left: 0%!important;
    margin-left: -4px;
    margin-top: 8px!important;
    position: absolute;
    top: 50%;
    width: 0;

</style>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css



">

</head>



<body class="hidden-bar-wrapper">



<div class="page-wrapper">

 	

    <!-- Preloader -->

    <div class="preloader"></div>

 	

 	<!-- Main Header-->

    <?php include "includes/menu.php"; ?>

    <!--End Main Header -->

	

	<!--Page Title-->

    <section class="page-title" style="background-image:url(images/background/12.jpg);">

    	<div class="auto-container">

        	<div class="row clearfix">

            	<!--Title -->

            	<div class="title-column col-lg-7 col-md-12 col-sm-12">

                	<h1>Employer & Job Seeker Registration</h1>

                </div>

                <!--Bread Crumb -->

                <div class="breadcrumb-column col-lg-5 col-md-12 col-sm-12">

                    <ul class="bread-crumb clearfix">

                        <li><a href="index.php"><span class="icon fas fa-home"></span> Home</a></li>

                        <li class="active"><span class="icon fas fa-arrow-alt-circle-right"></span> Employer & Job Seeker Registration</li>

                    </ul>

                </div>

            </div>

        </div>

    </section>

    <!--End Page Title-->

	

	<!-- Welcome Section -->

	<section class="welcome-section">

		<div class="auto-container">

			<div class="row clearfix">

				

				<!-- Content Column -->

				<div class="content-column col-lg-12 col-md-12 col-sm-12">

					<div class="inner-column">

						<h2><span class="theme_color">Employer</span>  & <span class="theme_color">Job Seeker Registration</span></h2>

						<div class="">

							<p class="ptext">Indian Plumbing Skills Council is providing a common platform to both, employers and candidates for registering themselves as to make India the Skills Capital of the World and meet industry’s requirement of skilled manpower and attract potential candidates and equip them with the necessary skills to meet the requirement of the industry as well as their own aspirations. WMPSC Aims to make skills aspirational and integrated with academic and career pathways as also celebrate the skilling achievements.</p>


							<br/><br/>

							<?php
							if(isset($_GET['ins'])){
								echo '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Thanks!</strong> We will get back to you soon </div>';
								} 
							?>

						</div>

						<section class="services-section">

		<div class="auto-container">

			<div class="row clearfix">

				

				<!-- Service Block -->

				<div class="service-block col-lg-6 col-md-6 col-sm-12">

					<div class="inner-box wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">

						<div class="icon-box">

							<!-- <span class="icon flaticon-donation-1"></span> -->

							<img src="images/employee.png">

						</div>

						<h3><a href="javascript:void(0);" id="pmkvy">Employer Registration Form</a></h3>

						

					</div>

				</div>

				

				<!-- Service Block -->

				<div class="service-block col-lg-6 col-md-6 col-sm-12">

					<div class="inner-box wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">

						<div class="icon-box">

							<!-- <span class="icon flaticon-money-bag"></span> -->

							<img src="images/candidate.png" />

						</div>

						<h3><a href="javascript:void(0);" id="ddu">Candidate Registration Form</a></h3>

						

					</div>

				</div>

				

				

			</div>

		</div>

	</section>	

				

		<div id="about" class="default-form style-two">

	

							<form method="post">

								<div class="row clearfix">

									<!-- Form Group -->
									


									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Organization Name  <span class="valid">*</span></label>

										<input type="text" name="organization" value=""  required class="form-control">

									</div>

									

									<!-- Form Group -->

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Preferred Location <span class="valid">*</span></label>

										<input type="text" name="location" value="" required class="form-control">

									</div>

									

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Specialization/ Job Role <span class="valid">*</span><input list="browsers" type="text" name="myBrowser" class="jobrole form-control" style="margin-top: 6px; width: 128%" / ></label>


										<datalist id="browsers"  required="" name="jobrole" >

											<option value="">Select</option>

											<optionm value="Plumber (General)">Plumber (General)</option>

											<option value="Plumber (General) Assistant">Plumber (General) Assistant</option>

											<option value="Plumber (General) Helper">Plumber (General) Helper</option>

											<option value="Plumber (General) - II">Plumber (General) - II</option>

											<option value="Plumber (Maintenance & Servicing)">Plumber (Maintenance & Servicing)</option>

											<option value="Plumber (Maintenance & Servicing) Assistant">Plumber (Maintenance & Servicing) Assistant</option>

											<option value="Plumber (Operations)">Plumber (Operations)</option>

											<option value="Plumber Pipeline">Plumber Pipeline</option>

											<option value="Plumber (Pumps & E/M Mechanic)">Plumber (Pumps & E/M Mechanic)</option>

											<option value="Plumbing Site Engineer">Plumbing Site Engineer</option>

											<option value="Plumbing Supervisor">Plumbing Supervisor</option>

											<option>Plumber (Welder)</option>

											<option value="Plumber (Welder) Assistant">Plumber (Welder) Assistant</option>

											<option value="Plumbing Foreman">Plumbing Foreman</option>

											<option value="Plumbing Mason">Plumbing Mason</option>

											<option value="Plumber After Sales Service">Plumber After Sales Service</option>

											<option value="Plumbing Products Sales Assistant">Plumbing Products Sales Assistant</option>

											<option value="Plumbing Products Sales Officer">Plumbing Products Sales Officer</option>

											<option value="Bathroom & Kitchen Designer">Bathroom & Kitchen Designer</option>

											<option value="Fire Protection Systems Design Engineer">Fire Protection Systems Design Engineer</option>

											<option value="Groundwater Engineer">Groundwater Engineer</option>

											<option value="Municipal Water and Sewage Assessor">Municipal Water and Sewage Assessor</option>

											<option value="Plumbing Draftsman">Plumbing Draftsman</option>

											<option value="Public Health Systems Design Engineer">Public Health Systems Design Engineer</option>

											<option value="Wastewater Systems Design Engineer">Wastewater Systems Design Engineer</option>

										</datalist>

									</div>

																		

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>No. of Requirements <span class="valid">*</span></label></label>

										<input type="text" name="no_requirement" value="" required class="form-control">

									</div>

									

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Qualification required <span class="valid">*</span></label></label>

										<input type="text" name="qualification" value="" required class="form-control">

									</div>

									

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Experience required</label>

										<input type="text" name="experiance" value="" required >

									</div>

									

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Candidate Name</label><span class="valid">*</span>

										<input type="text" name="organization" value=""  required class="form-control">

									</div>

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Mobile</label><span class="valid">*</span>

										<input type="text" name="organization" value=""  required class="form-control">

									</div>


									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Email</label><span class="valid">*</span>
									<input type="text" name="organization" value=""  required class="form-control">

									

									</div>	
									<div class="form-group col-lg-3 col-md-6 col-sm-6">

									<label>Address</label>

										<textarea name="address" value="" required style="height: 50px; border-radius: 50px;"></textarea>

									</div>
								

									<!-- Form Group -->

									<div class="form-group col-lg-12 col-md-12 col-sm-12">

									<label>Organisation Postal Address</label>

										<textarea name="address" value="" required ></textarea>

									</div>

									

									

									<!-- Form Group -->

									

								</div>

								

								<div class="form-group">

									<input type="submit" class="theme-btn btn-style-three" name="submit_employer">

								</div>  

								

							</form>



</div>





<div id="ddugky" class="default-form style-two">

	

<form method="post">

							

								<div class="row clearfix">

									

									<!-- Form Group -->

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Candidate Name  <span class="valid">*</span></label>

										<input type="text" name="candidate_name" value=""  required class="form-control">

									</div>

									

									<!-- Form Group -->

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Age <span class="valid">*</span></label>

										<input type="text" name="candidate_age" value="" required class="form-control">

									</div>

									

									<!-- Form Group -->

											<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Mobile</label><span class="valid">*</span>

										<input type="text" name="organization" value=""  required class="form-control">

									</div>


									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Email</label><span class="valid">*</span>
									<input type="text" name="organization" value=""  required class="form-control">

									

									</div>	
									<div class="form-group col-lg-3 col-md-6 col-sm-6">

									<label>Address</label>

										<textarea name="address" value="" required style="height: 50px; border-radius: 50px;"></textarea>

									</div>

									

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>State</label>

										<select required="" id="state" name="candidate_state"> 

											<option value="">Select</option>

											<?php echo $slist;?>

										</select>

									</div>

									

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>District</label>

										<input type="text" name="candidate_city">

										
									</div>

									

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Qualification <span class="valid">*</span></label></label>

										<input type="text" name="candidate_qualification" value="" required>

									</div>

									

									<div class="form-group col-lg-3 col-md-6 col-sm-12" id="unit_type">

									<label>Work Experience</label>

										<select required="" id="unitty" name="candidate_experiance">

											<option value=''>Select</option>

											<option value="1">Fresher</option>

											<option  value="2">Experience</option>

										</select>

									</div>

                                  
									

									<div class="form-group col-lg-3 col-md-6 col-sm-12" id="mexp">

									<label>How Much Experience <span class="valid">*</span></label></label>

										<input type="text" name="candidate_experiance_total" value="" required>

									</div>

									

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>Specialization/ Job Role <span class="valid"></span><input list="browsers" type="text" name="myBrowser" class="jobrole form-control" style="margin-top: 6px; width: 128%" / ></label>
									   <datalist id="browsers"  required="" name="jobrole" >


										

											<option value="">Select</option>

											<optionm value="Plumber (General)">Plumber (General)</option>

											<option value="Plumber (General) Assistant">Plumber (General) Assistant</option>

											<option value="Plumber (General) Helper">Plumber (General) Helper</option>

											<option value="Plumber (General) - II">Plumber (General) - II</option>

											<option value="Plumber (Maintenance & Servicing)">Plumber (Maintenance & Servicing)</option>

											<option value="Plumber (Maintenance & Servicing) Assistant">Plumber (Maintenance & Servicing) Assistant</option>

											<option value="Plumber (Operations)">Plumber (Operations)</option>

											<option value="Plumber Pipeline">Plumber Pipeline</option>

											<option value="Plumber (Pumps & E/M Mechanic)">Plumber (Pumps & E/M Mechanic)</option>

											<option value="Plumbing Site Engineer">Plumbing Site Engineer</option>

											<option value="Plumbing Supervisor">Plumbing Supervisor</option>

											<option>Plumber (Welder)</option>

											<option value="Plumber (Welder) Assistant">Plumber (Welder) Assistant</option>

											<option value="Plumbing Foreman">Plumbing Foreman</option>

											<option value="Plumbing Mason">Plumbing Mason</option>

											<option value="Plumber After Sales Service">Plumber After Sales Service</option>

											<option value="Plumbing Products Sales Assistant">Plumbing Products Sales Assistant</option>

											<option value="Plumbing Products Sales Officer">Plumbing Products Sales Officer</option>

											<option value="Bathroom & Kitchen Designer">Bathroom & Kitchen Designer</option>

											<option value="Fire Protection Systems Design Engineer">Fire Protection Systems Design Engineer</option>

											<option value="Groundwater Engineer">Groundwater Engineer</option>

											<option value="Municipal Water and Sewage Assessor">Municipal Water and Sewage Assessor</option>

											<option value="Plumbing Draftsman">Plumbing Draftsman</option>

											<option value="Public Health Systems Design Engineer">Public Health Systems Design Engineer</option>

											<option value="Wastewater Systems Design Engineer">Wastewater Systems Design Engineer</option>

										</datalist>

									</div>

									

									

									<div class="form-group col-lg-3 col-md-6 col-sm-12">

									<label>WMPSC Certified</label>

										<select class="custom-select-box" required="" name="candidate_certified">

											<option value="">Select</option>

											<option value="yes">Yes</option>

											<option value="no">No</option>

										</select>

									</div>

									<!-- Form Group -->

								</div>


								<div class="form-group">

									<input type="submit" class="theme-btn btn-style-three" name="submit_candidate">

								</div>  

							</form>

						</div>

					</div>

				</div>

				

				

			</div>

		</div>

	</section>

    <!--Newsleter Section-->

    <?php include "includes/newsletter.php"; ?>

    <!--End Newsleter Section-->

	<script>

$(document).ready(function(){

	$("#about").hide();

	$("#ddugky").hide();

	$("#mexp").hide();

	

	$("#pmkvy").click(function(){

		$("#about").show();

		$("#ddugky").hide();

	});

	

	$("#ddu").click(function(){

		$("#about").hide();

		$("#ddugky").show();

	});

	

	

	});

	

	$("#unit_type").change(function () {

			var unitselectable=$("#unitty option:selected").val();

			//alert(unitselectable);

			

			if(unitselectable==1)

			{

				$("#mexp").hide();

			}

			else if(unitselectable==2)

			{

				$("#mexp").show();

				

			}

			

		 });

	

</script>



<script>

$(document).ready(function(){

	

    $('#state').on('change',function(){

        var stateID = $(this).val();

		//alert(stateID);

		

		 

		  $.post('employer_registration.php',{get:'getCities',stateID:stateID}, function(data) {

               //alert(data);

			 $('#city').html(data);   

			  // location.reload(true);

               

            });

		

		

	});

});

</script>




	<?php include "includes/footer.php"; ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
	<script type="text/javascript">
$(document).ready(function() {
  $(".jobrole").select2();
});
</script>

</body>

</html>