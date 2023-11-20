<?php
error_reporting(0);
session_start();
include "admin/connection/connect.php";
$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";

$dateTime = date("Y-m-d H:i:s");
$viewSecQry = "SELECT * FROM toa_tot_calendar"; 

$exeSecQry = mysqli_query($mysqli,$viewSecQry);
$list=""; $cnt ="";
while($row = mysqli_fetch_array($exeSecQry))
{
	if($dateTime = $row['start_date'] and $dateTime = $row['end_date']){
		
		

	  $cnt +=1;
	  $state_id= $row['state_id'];
   	  $city_id= $row['city_id'];

	  $staten = "SELECT * FROM states WHERE id='".$state_id."'";
	  $qurstaten = mysqli_query($mysqli,$staten); 
	  $arresstaten = mysqli_fetch_assoc($qurstaten);
	 
	  $sqln = "SELECT * FROM cities WHERE id = '".$city_id."'";
	  $exen = mysqli_query($mysqli,$sqln);
	  $arrn = mysqli_fetch_array($exen);

	  $sqlJ = "SELECT * FROM jobrole WHERE jobrole_id = '".$row['jobrole_id']."'";
	  $exeJ = mysqli_query($mysqli,$sqlJ);
	  $arrJ = mysqli_fetch_array($exeJ);

	  $anndate = date("d-m-Y", strtotime($row['annoc_date'])); 

	  if($row['tot_toa']=="TOT"){$fee = $arrJ['tot_fee'];} else{$fee = $arrJ['toa_fee'];}

	  if($row['tot_toa']=="TOT"){$quali = $arrJ['tot_qualification'];} else{$quali = $arrJ['toa_qualification'];}


	  $list .="<div class='col-sm-6'>
	  <div class='icon-outers'><a class='apply' data-id='{$row['calendar_id']}'><span class='icons icon-plus fa fa-plus' style='width: 100px;'> APPLY</span></a>
	  </div>
	  <div class='fee-outers'><a style='display:block; padding-top:104px; text-align:center;'>Fee: <br/>$fee/-</a></div>
	  <span class='tab_ram'>
	  {$row['title']} ({$arresstaten['name']}/{$arrn['name']}) <br/> 
	  	<span style='font-size:12px;'>Jobrole: {$arrJ['jobrole_name']} 
	  	<button type='button' class='' data-toggle='tooltip' data-placement='top' title='Qualification: {$quali}' style='padding:1px;'><i class='fas fa-question-circle'></i>
		</button>
	  	 <br/>Announcement Date: $anndate <br/>Start Date: ".date('d-m-Y', strtotime($row['start_date'])).", End Date: ".date('d-m-Y', strtotime($row['end_date']))."<br/> Address: {$row['adress']} <br/> <a class='btn btn-success btn-xs' style='   padding: 1px 5px 1px 5px;font-size: 12px;color: #fff;'>Available Seat: {$row['seat']}</a></span> </span>
	  </div>";

	}

	  
	
}


$SecQry = "SELECT * FROM tpmaster";  
$exeSec = mysqli_query($mysqli$SecQry);
$tp_list="";
while($rows = mysqli_fetch_array($exeSec)) 
{
	$tp_list .="<option value='{$rows['tp_id']}'>{$rows['tp_name']}</option>";

}



if(isset($_POST['submit']))
{

	$check = "SELECT * FROM apply_toa_tot_calendar WHERE adhar='".$_POST['adhar']."' AND toa_tot_calendar_id='".$_POST['calendar_id']."'";
	$chexe = mysqli_query($mysqli,$check);
	if(mysqli_affected_rows($mysqli)>0)
	{
		echo "<script>";
			echo "alert('You have already Apply for this Training.')";	
		echo "</script>";
	}
	else
	{
		$sql = "INSERT INTO apply_toa_tot_calendar(toa_tot_calendar_id,name,father_name,adhar,mobile_number,address,tp_status,tp_id,certificate_status,certificate_number,expiry_date,payment_mode,fee_paid,transaction_id,post_date) VALUES ('".$_POST['calendar_id']."','".$_POST['name']."','".$_POST['fname']."','".$_POST['adhar']."','".$_POST['mobile_number']."','".$_POST['address']."','".$_POST['tp-group']."','".$_POST['slt_tp']."','".$_POST['Certificate-group']."','".$_POST['cert_no']."','".$_POST['expire_date']."','Bank','".$_POST['fee']."','".$_POST['transaction']."',now())";
		$exe = mysqli_query($mysqli,$sql);

		echo "<script>";
			echo "alert('Your Application has been Submitted!')";	
		echo "</script>";
	}


	
}
 
  



?>



<!DOCTYPE html>
<html>
<head>
<?php include "includes/header.php"; ?>
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
            	<div class="title-column col-lg-6 col-md-12 col-sm-12">
                	<h1>TOA/TOT Calendar</h1>
                </div>
                <!--Bread Crumb -->
                <div class="breadcrumb-column col-lg-6 col-md-12 col-sm-12">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php"><span class="icon fas fa-home"></span> Home</a></li>
                        <li class="active"><span class="icon fas fa-arrow-alt-circle-right"></span> TOA/TOT Calendar</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- Volunter Section -->
	<section class="faq-page-section" style="padding-top: 40px;">
		<div class="auto-container">
			<!-- Title Box -->
			
			<!--Accordian Box-->
			<ul class="row">

				<!--Block-->
				<?php echo $list; ?>
			
			</ul>
			
		</div>
	</section>






	<div class="sec-title centered">
		<h2><span class="theme_color">Fee </span> Payment Details</h2>
		<div class="" style="padding: 5px; margin-top: 10px;"><img src="images/bank.png" /></div>
	</div>	
    			


				<div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
				       <!--Content Side-->
                <div class='content-side col-lg-12 col-md-12 col-sm-12'>
					<div class='donation-section'>
						<!-- Sec Title -->
						<div class='sec-title'>
							<h2><span class='theme_color'>Candidate </span> Details</h2>
						</div>
						
						<!-- Default Form -->
						<div class='default-form style-two'>
							<form method="post">
								<input type="hidden" name="calendar_id" id="calendar_id">
								<div class='row clearfix'>
									
									<!-- Form Group -->
									<div class='form-group col-lg-6 col-md-6 col-sm-12'>
										<input type='text' name='name' value='' placeholder='Full Name' required autocomplete="off">
									</div>
									
									<!-- Form Group -->
									<div class='form-group col-lg-6 col-md-6 col-sm-12'>
										<input type='text' name='fname' value='' placeholder='Father Name' required autocomplete="off">
									</div>

									<!-- Form Group -->
									<div class='form-group col-lg-6 col-md-6 col-sm-12'>
										<input type='text' name='adhar' value='' placeholder='Adhar Number' required autocomplete="off">
									</div>


									<div class='form-group col-lg-6 col-md-6 col-sm-12'>
										<input type='text' name='mobile_number' value='' placeholder='Mobile Number' required autocomplete="off">
									</div>
									
									<!-- Form Group -->
									<div class='form-group col-lg-12 col-md-12 col-sm-12'>
										<textarea placeholder='Full Address' required autocomplete="off" name="address"></textarea>
									</div>
									
									
									<div class='form-group col-lg-5 col-md-5 col-sm-12'>
										<div class="select-box">
											<input type="radio" name="tp-group" id="radio-tp" value="Training Partner" required="">
											<label for="radio-tp">
												Training Partner
											</label>
										</div>

										<div class="select-box">
											<input type="radio" name="tp-group" id="radio-tpa" value="Individual" required="">
											<label for="radio-tpa">
												Individual
											</label>
										</div>
									</div>

									<!-- Form Group -->
									<div class='form-group col-lg-7 col-md-7 col-sm-12'>
										<select id="slt_tp" name="slt_tp" required="">
											<option value="">--Select Training Partner--</option>
											<?php echo $tp_list; ?>
										</select>
									</div>
								</div>

								<!-- Sec Title -->
								<div class='sec-title'>
									<h2><span class='theme_color'>if Already </span> Certified</h2>
								</div>

								<div class='row clearfix'>

									<div class='form-group col-lg-4 col-md-4 col-sm-12'>
										<div class="select-box">
											<input type="radio" name="Certificate-group" id="radio-yes" value="Yes" required="">
											<label for="radio-yes">
												Yes
											</label>
										</div>

										<div class="select-box">
											<input type="radio" name="Certificate-group" id="radio-no" value="No" required="">
											<label for="radio-no">
												No
											</label>
										</div>
									</div>

									<div class='form-group col-lg-4 col-md-4 col-sm-12'>
										<input type="text" name="cert_no" placeholder="Certificate no." id="txt_cert_no" autocomplete="off" required="">
									</div>

									<div class='form-group col-lg-4 col-md-4 col-sm-12'>
										<input type="text" name="expire_date" placeholder="Expiry Date" id="txt_expire_date" autocomplete="off" required="">
									</div>



								</div>
							
								<!-- Sec Title -->
								<div class='sec-title'>
									<h2><span class='theme_color'>Payment </span> method</h2>
								</div>
							
								
								<div class='row clearfix'>
									
									<!-- Form Group -->
									<div class='form-group col-lg-6 col-md-12 col-sm-12'>
										<input type='text' name='fee' value='' placeholder='Fee Amount Paid' id="txt_fee" autocomplete="off" required="">
									</div>
									
									<!-- Form Group -->
									<div class='form-group col-lg-6 col-md-12 col-sm-12'>
										<input type='text' name='transaction' value='' placeholder='Transaction No.' id="txt_transaction" autocomplete="off" required="">
									</div>
									
								</div>
								
								<div class='form-group'>
									<button type='submit' name="submit" class='theme-btn btn-style-three'><span class='txt'>Apply now</span></button>
								</div>  
								
							</form>
						</div>
						<!--End Default Form-->
					</div>
				</div>
				      </div>
				     
				    </div>
				  </div>
				</div>



    <!--End Clients Section-->
	
    <!--Newsleter Section-->
    <?php include "includes/newsletter.php"; ?>
    <!--End Newsleter Section-->

	<?php include "includes/footer.php"; ?>

	<style type="text/css">
.tab_ram {
    position: relative;
    font-size: 16px;
    line-height: 24px;
    color: #333333;
    font-weight: 700;
    background-color: #f2f3f6;
    padding: 17px; margin-bottom: 10px;
    transition: all 500ms ease;
    -ms-transition: all 500ms ease;
    -o-transition: all 500ms ease;
    -moz-transition: all 500ms ease;
    -webkit-transition: all 500ms ease;
    font-family: 'Roboto Slab', serif;
    display: block;
}

.icon-outers {
    position: absolute;
    right: 29px;
    top: 18px;
    font-size: 20px;
    color: #262626;
    transition: all 500ms ease;
    -moz-transition: all 500ms ease;
    -webkit-transition: all 500ms ease;
    -ms-transition: all 500ms ease;
    -o-transition: all 500ms ease;
    z-index: 9;
}


.fee-outers {
    position: absolute;
    right: 29px;
    top: 18px;
    font-size: 20px;
    color: #262626;
    transition: all 500ms ease;
    -moz-transition: all 500ms ease;
    -webkit-transition: all 500ms ease;
    -ms-transition: all 500ms ease;
    -o-transition: all 500ms ease;
    z-index: 1;
}

.icon-outers .icons {
    position: relative;
    color: #ffffff;
    font-size: 14px;
    text-align: center;
    line-height: 68px;
    background-color: #0074d9;
     
}

.sec-title h2 {
    position: relative;
    font-size: 24px;
    color: #333333;
    font-weight: 700;
    line-height: 1.3em;
    padding-bottom: 22px;
    text-transform: capitalize;
}	

.sec-title h2:before {
    position: absolute;
    content: '';
    left: 0px;
    bottom: 0px;
    height: 2px;
    width: 42px;
    background-color: #4398e3;
}

.sec-title {
    position: relative;
    margin-bottom: 20px;
}

.default-form.style-two input {
    border-radius: 0;
    height: 37px;
    padding: 6px 10px;
    font-size: 12px;
}

.default-form.style-two textarea{
 	border-radius: 0;
    height: 60px;
    padding: 6px 10px;
    font-size: 12px;
}

.default-form select
{
	height: 37px;
    border-radius: 0px;
    padding-left: 10px;
    font-size: 12px;
}

.select-box{
	float: left;
    margin-right: 20px;
    margin-top: 5px;
}

.default-form .form-group .select-box input[type="radio"]
{
    position: absolute;
    left: 0px;
    top: 2px;
    width: 19px;
    height: 19px;
    background-color: #ffffff;
}

.default-form .form-group .select-box .default-check
{
	position: absolute;
    left: 0px;
    top: 2px;
    width: 19px;
    height: 19px;
    background-color: #ffffff;
    border: 1px solid #cfcfcf;
    border-radius: 10px;	
}

.default-form .form-group .select-box label
{
	padding-left: 24px;
}

input:disabled {
  background: #f3f3f3;
}

.bs-tooltip-auto[x-placement^=bottom] .arrow::before,
.bs-tooltip-bottom .arrow::before {
  border-bottom-color: #f00; /* Red */
}
	</style>


	<script type="text/javascript">

		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		});


		$(".apply").click(function(){
			var clid = $(this).attr("data-id");
			$("#calendar_id").val(clid);
			$("#modal").modal('show');
		});

		$(document).ready(function(){
			
			$("#slt_tp").attr("disabled","disabled");
			$("#txt_cert_no").attr("disabled","disabled");
			$("#txt_expire_date").attr("disabled","disabled");


			$("#radio-tp").click(function(){
				$("#slt_tp").removeAttr("disabled");
			});

			$("#radio-tpa").click(function(){
				$("#slt_tp").attr("disabled","disabled");
			});


			$("#radio-yes").click(function(){
				$("#txt_cert_no").removeAttr("disabled");
				$("#txt_expire_date").removeAttr("disabled");
			});

			$("#radio-no").click(function(){
				$("#txt_cert_no").attr("disabled","disabled");
				$("#txt_expire_date").attr("disabled","disabled");
			});


			
		});
	</script>
</body>
</html>