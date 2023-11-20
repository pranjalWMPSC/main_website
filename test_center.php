<?php
include "admin/connection/connect.php";

$sql = "SELECT ct.latitude as latitude, ct.longitude as longitude,ct.name,tcc.coverage_number,tc.test_center_name FROM test_center tc inner join cities ct on ct.id = tc.city_id left join test_center_coverage tcc on tcc.test_center_id=tc.test_center_id";
$execute = mysqli_query($mysqli,$sql);$arr="";
while($result = mysqli_fetch_assoc($execute))
{
    $arr .= "['<b>{$result['name']}</b> <br/>{$result['test_center_name']} : {$result['coverage_number']}','{$result['latitude']}','{$result['longitude']}']".",";
}
$data =  trim($arr, ",");	


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
                	<h1>Test Center</h1>
                </div>
                <!--Bread Crumb -->
                <div class="breadcrumb-column col-lg-6 col-md-12 col-sm-12">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php"><span class="icon fas fa-home"></span> Home</a></li>
                        <li class="active"><span class="icon fas fa-arrow-alt-circle-right"></span> About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Page Title-->

	<!-- End Welcome Section -->
	<section class="services-section-two style-two" >
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered" style="margin-bottom: 20px;">
				<h2><span class="theme_color">Test Center in </span> India</h2>
				<div class="text" style="margin-top: 10px;">IPSSC Test Center Location In India</div>
			</div>
			<div class="row clearfix" id="map" style="height: 800px;">
				
				
			</div>
		</div>
	</section>

	
    <!--Newsleter Section-->
    <?php include "includes/newsletter.php"; ?>
    <!--End Newsleter Section-->

	<?php include "includes/footer.php"; ?>

	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL_myFpsCy0rvkSqRyYPC2gyQ-7Xsvx4k&v=3.exp&sensor=false"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".loader").hide();
			var locations=[<?= $data ?>];
			var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 4.7,
					center: new google.maps.LatLng(22.72, 75.83),mapTypeId: google.maps.MapTypeId.ROADMAP
				});
				var infowindow = new google.maps.InfoWindow();
                var marker, i;
				for (i = 0; i < locations.length; i++) {
					console.log(locations.length);
					marker = new google.maps.Marker({
						position: new google.maps.LatLng(locations[i][1], locations[i][2]),map: map
                    });
					google.maps.event.addListener(marker, 'mouseover', (function (marker, i) {
                        return function () {
							infowindow.setContent(locations[i][0]);
							infowindow.open(map, marker);
						}
                    })(marker, i));
                }
		});
	
	</script>


</body>
</html>