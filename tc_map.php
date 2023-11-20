<!DOCTYPE html>

<html>

<head>

<?php include "includes/header.php"; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">



<style>

.dataTables_wrapper .dataTables_paginate .paginate_button {

    box-sizing: border-box;

    display: inline-block;

    min-width: 1.5em;

    padding: 0px;

    margin-left: 2px;

    text-align: center;

    text-decoration: none !important;

    cursor: pointer;

    *cursor: hand;

    color: #333 !important;

    border: 1px solid transparent;

    border-radius: 2px;

}

thead {

    font-size: 15px;

    font-weight: 600;

    color: black;

    text-align: center;

    text-transform: uppercase;

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

            	<div class="title-column col-lg-6 col-md-12 col-sm-12">

                	<h1>Training Centers</h1>

                </div>

                <!--Bread Crumb -->

                <div class="breadcrumb-column col-lg-6 col-md-12 col-sm-12">

                    <ul class="bread-crumb clearfix">

                        <li><a href="index.php"><span class="icon fas fa-home"></span> Home</a></li>

                        <li class="active"><span class="icon fas fa-arrow-alt-circle-right"></span> Training Centers</li>

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

						<h2>Training <span class="theme_color"> Centers on Map</span></h2>

						

						<div class="">

							<div id="map" style="width:100%; height:700px;"></div>


						</div>

						

						<br>

					

					</div>

				</div>

				

				

			</div>

		</div>

	</section>

    <!--Newsleter Section-->

    <?php include "includes/newsletter.php"; ?>

    <!--End Newsleter Section-->

<?php include "includes/footer.php"; ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL_myFpsCy0rvkSqRyYPC2gyQ-7Xsvx4k&v=3.exp&sensor=false"></script>

<script type="text/javascript">
	function mapget()
	{
		 var locations =[['<b>Andaman & Nicobar Island</b> <br/>Training Center : 02','11.66702557','92.73598262'],['<b>Andhra Pradesh</b> <br/>Training Center : 10','14.7504291','78.57002559'],['<b>Assam</b> <br/>Training Center : 18','26.244156','92.537842'],['<b>Bihar</b> <br/>Training Center : 07','25.78541445','87.4799727'],['<b>Chhattisgarh</b> <br/>Training Center : 06','21.295132','81.828232'],['<b>Dadar Nagar Havel</b> <br/>Training Center : 01','20.26657819','73.0166178'],['<b>Daman & Diu</b> <br/>Training Center : 01','20.4283','72.8397'],['<b>Delhi</b> <br/>Training Center : 177','28.6699929','77.23000403'],['<b>Goa</b> <br/>Training Center : 08','15.491997','73.81800065'],['<b>Gujarat</b> <br/>Training Center : 19','22.309425','72.13623'],['<b>Haryana</b> <br/>Training Center : 20','29.238478','76.431885'],['<b>Himachal Pradesh</b> <br/>Training Center : 06','32.084206','77.571167'],['<b>Jammu and Kashmir</b> <br/>Training Center : 42','34.29995933','74.46665849'],['<b>Jharkhand</b> <br/>Training Center : 07','23.80039349','86.41998572'],['<b>Karnataka</b> <br/>Training Center : 04','15.317277','75.71389'],['<b>Kerala</b> <br/>Training Center : 07','10.850516','76.27108'],['<b>Lakshadweep</b> <br/>Training Center : 01','10.56257331','72.63686717'],['<b>Madhya Pradesh</b> <br/>Training Center : 29','23.473324','77.947998'],['<b>Maharashtra</b> <br/>Training Center : 38','19.601194','75.552979'],['<b>Manipur</b> <br/>Training Center : 08','24.79997072','93.95001705'],['<b>Mizoram</b> <br/>Training Center : 01','23.71039899','92.72001461'],['<b>Odisha</b> <br/>Training Center : 15','20.94092','84.803467'],['<b>Pondicherry</b> <br/>Training Center : 02','11.93499371','79.83000037'],['<b>Punjab</b> <br/>Training Center : 25','31.51997398','75.98000281'],['<b>Rajasthan</b> <br/>Training Center : 12','27.391277','73.432617'],['<b>Tamil Nadu</b> <br/>Training Center : 12','11.059821','78.387451'],['<b>Telangana</b> <br/>Training Center : 25','17.123184','79.208824'],['<b>Uttar Pradesh</b> <br/>Training Center : 28','28.207609','79.82666'],['<b>West Bengal</b> <br/>Training Center : 20','22.978624','87.747803']];
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4.8,
          center: new google.maps.LatLng(26.20, 78.17),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
		

		for (i = 0; i < locations.length; i++) {
      //console.log(locations.length);
	  
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
	}
</script>

<script>
  $(document).ready(function() {
   	 mapget();
	});



</script>

</body>

</html>

