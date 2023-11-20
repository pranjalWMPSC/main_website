<!DOCTYPE html>
<html>
<head>
<?php include "includes/header.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
.list-style-two li
{
    position: relative;
    margin-bottom: 15px;
    color: #777777;
    font-size: 14px;
    display: inline-block;
    padding-left: 25px;
    width: 30%;
    line-height: 1.8em;
}

.service-block .inner-box .text {
    position: relative;
    font-weight: 400;
    color: black;
    font-size: 20px;
    line-height: 23px;
    margin-top: 4px;
    text-align: center;
}
</style>
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
                	<h1>Master & Super Trainers / Assessorss</h1>
                </div>
                <!--Bread Crumb -->
                <div class="breadcrumb-column col-lg-5 col-md-12 col-sm-12">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php"><span class="icon fas fa-home"></span> Home</a></li>
                        <li class="active"><span class="icon fas fa-arrow-alt-circle-right"></span> Master & Super Trainers / Assessors</li>
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
				<section class="services-section">
		<div class="auto-container">
			<div class="row clearfix">
				
				<!-- Service Block -->
				<div class="service-block col-lg-6 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
						<div class="icon-box">
							<!-- <span class="icon flaticon-donation-1"></span> -->
							<img src="images/people.png">
						</div>
						<h3><a href="javascript:void(0);" id="pmkvy">Master Trainer/ Assessors</a></h3>
					</div>
				</div>
				
				<!-- Service Block -->
				<div class="service-block col-lg-6 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
						<div class="icon-box">
							<!-- <span class="icon flaticon-money-bag"></span> -->
							<img src="images/hands-and-gestures.png" />
						</div>
						<h3><a href="javascript:void(0);" id="ddu">Super Trainer/ Assessors</a></h3>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>	
					
					<div id="about">
					<h2>About Master <span class="theme_color"> Trainer/ Assessors</span></h2>
					<p class="ptext">
					
					Master Trainers/ Assessors are professionals who are highly competent in teaching pedagogy and are responsible for training the trainers/ assessors.
					</p>
					
					
					<ul class="list-style-two">
						<li class="ptext">Mr. Jaswinder Singh – Delhi</li>
<li class="ptext">Mr. Akhilesh Kumar Srivastav – Noida</li>
<li class="ptext">Mr. Sridhar Chakrawarthy – Bangalore</li>
<li class="ptext">Mr. RD Sharma – Delhi</li>
<li class="ptext">Mr. MK Garg – Delhi</li>
<li class="ptext">Mr. VB Gokhle – Pune</li>
<li class="ptext">Mr. Chetan Apte – Pune</li>
<li class="ptext">Md. Qutubuddin – Hyderabad</li>
					</ul>
					
</div>			
<div id="ddugky">
<h2>Super Trainer/<span class="theme_color"> Assessors</span></h2>	

	
					<ul class="list-style-two">
<li class="ptext">Mr. Sridhar Chakrawarthy</li>
<li class="ptext">Mr. Virappan</li>
<li class="ptext">Md. Hasan Khan</li>
					</ul>

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
	$("#nulm").hide();
	
	$("#pmkvy").click(function(){
		$("#about").show();
		$("#ddugky").hide();
		$("#nulm").hide();
	});
	
	$("#ddu").click(function(){
		$("#about").hide();
		$("#ddugky").show();
		$("#nulm").hide();
	});
	
	$("#daynu").click(function(){
		$("#about").hide();
		$("#ddugky").hide();
		$("#nulm").show();
	});
	
	});
</script>
	<?php include "includes/footer.php"; ?>
</body>
</html>