<?php

include "admin/connection/connect.php";

$viewSecQry = "SELECT * FROM banner where banner_status = 0 ORDER by banner_id DESC";  

$exeSecQry = mysqli_query($mysqli,$viewSecQry);

$table="";

while($row = mysqli_fetch_array($exeSecQry)) 

{

   

   $banner_id= $row['banner_id'];

   $first_line= $row['first_line'];

   $second_line= $row['second_line'];

   $banner_photo= $row['banner_photo'];

   

   

   $table.="<div class='slide' style='background-image:url(admin/uploads/banner/{$banner_photo}); background-size:100%; background-position:top;'>

            <div class='auto-container'>

            	<div class='content clearfix'>

					<h2>$first_line</h2>

					<div class='text'>$second_line</div>

                	

                </div>

            </div>

        </div>";

}



$GetRows="select * from news order by news_id desc limit 1";

$exe=mysqli_query($mysqli,$GetRows);

while($data = mysqli_fetch_array($exe))

{

  $newsDate = $data['news_date'];

  $firstNews = "<div class='news-block'>

            <div class='inner-box wow fadeInLeft' data-wow-delay='0ms' data-wow-duration='1500ms'>

                <div class='image'>

                    <a href='#'><img src='images/resource/news-1.png' alt='' /></a>

                </div>

                <div class='lower-content'>

                    <div class='content'>

                        <div class='date-outer'>

                            <div class='date'>".date("d", strtotime($newsDate))."</div>

                            <div class='month'>".date("M", strtotime($newsDate))."</div>

                        </div>

                        <h3><a href='news_details.php?news_id=".$data['news_id']."'>".substr($data['news_title'], 0,32)."..</a></h3>

                        <ul class='post-meta'>

                            <li><a href='#'><span class='icon fa fa-calendar'></span>".date("d-M-Y", strtotime($newsDate))."</a></li>

                            <li><a href='#'><span class='icon fa fa-map-marker'></span>{$data['news_location']}</a></li>

                        </ul>

                        <div class='text'>".substr($data['news_desc'], 0,200)."..</div>

                    </div>

                </div>

            </div>

        </div>";

}





$allnews="select * from news where news_id !=(select MAX(news_id) FROM news) limit 4";

$newsexe=mysqli_query($mysqli,$allnews);

$newsrow=""; $cnt =0;

while($datas = mysqli_fetch_array($newsexe))

{

  $cnt +=1;	

  $newsDate = $datas['news_date'];

  $newsrow .= "<div class='news-block-two'>

			    <div class='inner-box wow fadeInUp' data-wow-delay='300ms' data-wow-duration='1500ms'>

			        <div class='image-layer'></div>

			        <div class='content'>

			            <div class='date-outer'>

			                <div class='date'>0$cnt</div>

			            </div>

			            <h3><a href='news_details.php?news_id=".$datas['news_id']."'>".substr($datas['news_title'], 0,30)."..</a></h3>

			            <ul class='post-meta'>

			                <li><a href='#'><span class='icon fa fa-calendar'></span>".date("d-M-Y", strtotime($newsDate))."</a></li>

                            <li><a href='#'><span class='icon fa fa-map-marker'></span>{$datas['news_location']}</a></li>

			            </ul>

			        </div>

			    </div>

			</div>";

}



$GetEvent="select * from event limit 4";

$exeEvent=mysqli_query($mysqli,$GetEvent);

$eventList=""; $cnt =0;

while($dataEvent = mysqli_fetch_array($exeEvent))

{

  $cnt +=1;	

 $newsDate = $dataEvent['event_date'];

  $eventList .= "<div class='news-block-two'>

			    <div class='inner-box wow fadeInUp' data-wow-delay='300ms' data-wow-duration='1500ms'>

			        <div class='image-layer'></div>

			        <div class='content'>

			            <div class='date-outer'>

			                <div class='date'>0$cnt</div>

			            </div>

			            <h3><a href='events_detail.php?event_id=".$dataEvent['event_id']."'>".substr($dataEvent['event_title'], 0,25)."..</a></h3>

			            <ul class='post-meta'>

			                <li><a href='#'><span class='icon fa fa-calendar'></span>".date("d-M-Y", strtotime($newsDate))."</a></li>

                            <li><a href='#'><span class='icon fa fa-asterisk'></span>

							Organized By :IPSSC

							</a></li>

			            </ul>

			        </div>

			    </div>

			</div>";

}













?>



<!DOCTYPE html>

<html>
<script src="https://desk.zoho.in/portal/api/feedbackwidget/130128000000210005?orgId=60025342157&displayType=embeded"></script>

<head>

<?php include "includes/header.php"; ?>

<style type="text/css">

	.owl-carousel .owl-item img {
		width: auto !important;

	}

/* rotator in-page placement */

    div.rotator {

	position:relative;

	height:345px;

	display:none;

}

/* rotator css */

	div.rotator ul {

	margin:0;

	padding:0;

}

	div.rotator ul li {

	float:left;

	position:absolute;

	list-style: none;

}



.grid-item.loaded {

    opacity: 1;

    transition: opacity .5s;

    border: solid #fff 1px !important;

}


.main-slider-two .slide {
    position: relative;
    text-align: center;
    padding: 90px 0px 280px !important;
	}



@media (min-width: 1100px) {

	div.rotator ul li img {

	height: 497px;

	width: 100%

	}



}



/* rotator image style */	

	div.rotator ul li img {

	

	background: #FFF;

}

    div.rotator ul li.show {

	

}

</style>

<link rel="stylesheet" type="text/css" href="css/style.css" />

<script type="text/javascript" src="ImageGrid/js/modernizr.custom.26633.js"></script>		

<script>
  (function (s, e, n, d, er) {
    s['Sender'] = er;
    s[er] = s[er] || function () {
      (s[er].q = s[er].q || []).push(arguments)
    }, s[er].l = 1 * new Date();
    var a = e.createElement(n),
        m = e.getElementsByTagName(n)[0];
    a.async = 1;
    a.src = d;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', 'https://cdn.sender.net/accounts_resources/universal.js', 'sender');
  sender('3d5754ba226920')
</script>

</head>



<body class="hidden-bar-wrapper">

	

<div class="modal" id="modal_video">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    
      <!-- Modal body -->
      <div class="modal-body">
        <iframe width="100%" height="500" src="https://www.youtube.com/embed/pGFLIOpspWw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>

    

    </div>
  </div>
</div>	
	
	
	
	
	

<div class="page-wrapper">


    <div class="preloader"></div>

 	

 	<!-- Main Header-->

    <?php include "includes/menu.php"; ?>

    <!--End Main Header -->

	

	 <section class="main-slider-two">

    	

        <div class="main-slider-carousel-two owl-carousel owl-theme">

             <?php echo $table; ?>

        </div>

		

		<!--Scroll Dwwn Btn-->

        <div class="mouse-btn-down scroll-to-target" data-target=".welcome-section"></div>

    </section>

    <!--End Main Slider-->



	

	<section class="call-to-action-section">

		<div class="auto-container">

			<!-- <div class="clearfix">

				<div class="pull-left">

					<h2>PLUMBACHARYA - Digital School of Plumbing</h2>

					

				</div>

				<div class="pull-right">

					<a href="https://ipssc.in/plumbacharya" class="theme-btn btn-style-two" target="_blank">View More</a>

				</div>

			</div> -->

		</div>

	</section>

		

	<!-- Call To Action Section -->

	

	<!-- End Call To Action Section -->

	

	

	<!-- Call To Action Section -->

	

	<!-- End Call To Action Section -->

	

	<!-- Welcome Section -->

	<section class="welcome-section">

		<div class="auto-container">

			<div class="row clearfix">

				<!-- Content Column -->

				<div class="content-column col-lg-7 col-md-12 col-sm-12">

					<div class="inner-column">

						<h2>Welcome to <span class="theme_color">Water Management & Plumbing Skill Council </span> </h2>

						<div class="bold-text">Creating a Robust and Effective Skill Development Eco-System for the Indian Plumbing Sector !</div>

						<div class="text">WMPSC (formerly Water Management & Plumbing Skill Council - WMPSC) is the apex Sector Skill Council for the Water & Plumbing Industry, operating under the aegis of National Council for Vocational Education & Training (NCVET) & National Skills Development Corporation (NSDC), initiative of the Government of India, Ministry of Skill Development and Entrepreneurship (MoSDE) to transform India as a hub for skilled manpower, as envisioned by our Prime Minister Shri Narendra Modi.</div>

						<a href="about.php" class="theme-btn btn-style-three">Read More</a>

					</div>
					<div id="zsfeedbackwidgetdiv"></div>
				</div>

				

				<!-- Video Column -->

				<div class="video-column col-lg-5 col-md-12 col-sm-12">



					<div class="inner-column">

						

						<!--Video Box-->

                        <div class="video-box wow fadeInRight animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInRight;">

                            <figure class="video-image">

                                <img src="images/right_img.png" alt="">

                            </figure>

                            <a href="https://youtu.be/dMvqob34FQM" class="lightbox-image overlay-box"><span class="flaticon-play-button"><i class="ripple"></i></span></a>

                        </div>

						

					</div>



				</div>

				

			</div>

		</div>

	</section>

	<!-- End Welcome Section -->

	

	<!-- Counter Section -->

	<section class="counter-section" style="background-image:url(images/grad-bg.png);">

		<div class="auto-container">

		

			<!-- Fact Counter -->

			<div class="fact-counter">

				



					<?php include "includes/statics.php"; ?>



				



				





				

			</div>

			

		</div>

	</section>

	<!-- End Counter Section -->

	

		<section class="services-section" style="display:none;">

		<div class="auto-container">

			<div class="row clearfix">

				

				<!-- Service Block -->

				<div class="service-block col-lg-4 col-md-6 col-sm-12">

					<div class="inner-box wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">

						<div class="icon-box">

							<!-- <span class="icon flaticon-donation-1"></span> -->

							<img src="images/people.png">

						</div>

						<h3><a href="https://ipssc.in/plumbacharya">Become a plumber</a></h3>

						<div class="text">Click here to understand the different ways you can get trained and become a Plumber</div>

					</div>

				</div>

				

				<!-- Service Block -->

				<div class="service-block col-lg-4 col-md-6 col-sm-12">

					<div class="inner-box wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">

						<div class="icon-box">

							<!-- <span class="icon flaticon-money-bag"></span> -->

							<img src="images/hands-and-gestures.png" />

						</div>

						<h3><a href="https://ipssc.in/membership.php">Partner with us</a></h3>

						<div class="text">Click here to understand different way of how you can partner with WMPSC</div>

					</div>

				</div>

				

				<!-- Service Block -->

				<div class="service-block col-lg-4 col-md-6 col-sm-12">

					<div class="inner-box wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 600ms; animation-name: fadeInUp;">

						<div class="icon-box">

							<!-- <span class="icon flaticon-heart-3"></span> -->

							<img src="images/degree.png" />

						</div>

						<h3><a href="https://ipssc.in/assessments.php">Get Certified</a></h3>

						<div class="text">Click here to understand the different kinds of certifications available through WMPSC</div>

					</div>

				</div>

				

			</div>

		</div>

	</section>	







		<section class="services-section-two" style="display: none">

		<div class="auto-container">

			

			<div class="row clearfix">

				

				<!-- Service Block Two -->

				<div class="service-block-two col-lg-4 col-md-12 col-sm-12">

					<div class="inner-box wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInLeft;">

						<div class="icon-box">

							<!-- <span class="icon flaticon-user"></span> -->

							<img src="plumber.png" width="80">

						</div>

						<h3><a href="causes-single.html">Become a Plumber</a></h3>

						<div class="text">Default text for Box Content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>

					</div>

				</div>

				

				<!-- Service Block Two -->

				<div class="service-block-two col-lg-4 col-md-12 col-sm-12">

					<div class="inner-box wow fadeInRight animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInRight;">

						<div class="icon-box">

							<span class="icon fa fa-handshake-o"></span>

							<!-- <img src="membership.png" width="80"> -->

						</div>

						<h3><a href="causes-single.html">Partner with us</a></h3>

						<div class="text">Default text for Box Content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>

					</div>

				</div>

				

				<!-- Service Block Two -->

				<div class="service-block-two col-lg-4 col-md-12 col-sm-12">

					<div class="inner-box wow fadeInLeft animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInLeft;">

						<div class="icon-box">

							<!--span class="icon flaticon-house-1"></span-->

							<img src="exam.png" width="80">

						</div>

						<h3><a href="causes-single.html">Get Certified</a></h3>

						<div class="text">Default text for Box Content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>

					</div>

				</div>

				

			

			

			</div>

		</div>

	</section>





	<section class="clients-section" style="background-color:#fff; margin-bottom:0px;">

		<div class="auto-container">

		

		<div class="sec-title centered">

				<h2><span class="theme_color">Plumbing Skills </span> Mahotsav</h2>

			</div>

		

			<div class="row clearfix">

				

				<!-- Image Column -->

				<div class="image-column col-lg-3 col-md-12 col-sm-12">

					<div class="inner-column wow slideInLeft text-center" data-wow-delay="0ms" data-wow-duration="1500ms">

						<div class="psmtext" style="font-size: 14px; line-height: 24px; text-align:center;">

							<img src="images/psm.png" width="100%"  /><br/>

						Flagship Event of Indian Plumbing Skills Council which Aims to Host the Entire Plumbing Fraternity under One Roof for the Purpose of Enhancement of Skills & Exchange of Knowledge.<br/>

					<a href="plumbing_mahostava.php" class="theme-btn btn-style-three btn-sm" style="padding: 10px; border-radius:10px; font-size:17px; margin-top: 15px;">View More</a></div>

					</div>

				</div>

				

				<!-- Form Column -->

				<div class="image-column col-lg-4 col-md-12 col-sm-12" style="padding-right: 1px;">



					<div class="rotator">

  						<ul>



			            	<li class="show"><img src="images/plumbing/1.jpg"/></li>

			            	<li><img src="images/plumbing/2.jpg"/></li>

			            </ul>

			           

					</div>


			         <div id="cfifo">

				            

				      </div>

					

				</div>

				

				<div class="col-lg-5 col-md-12 col-sm-12" style="padding-left: 0px;">

					

				<!-- 	 <iframe src="ImageGrid/index.html" width="100%" frameborder="0" height="515"></iframe>  -->

					





					<link href="css/jquerysctipttop.css" rel="stylesheet" type="text/css">

      				<link href="collarge/dist/css/justified.css" rel="stylesheet">

					

					<div id="grid-container">

						<img class="grid-item" src="images/plumbing/01.jpg">

				        <img class="grid-item" src="images/plumbing/02.jpg">

				        <img class="grid-item" src="images/plumbing/03.jpg">

				    	

				       

				        <img class="grid-item" src="images/plumbing/04.jpg">

				    	<img class="grid-item" src="images/plumbing/05.jpg">

						<img class="grid-item" src="images/plumbing/06.jpg">

				   		



				        <img class="grid-item" src="images/plumbing/07.jpg">

				        <img class="grid-item" src="images/plumbing/08.jpg">

				        <img class="grid-item" src="images/plumbing/09.jpg">

				        

				        <img class="grid-item" src="images/plumbing/010.jpg">

				        <img class="grid-item" src="images/plumbing/011.jpg">

				        <img class="grid-item" src="images/plumbing/012.jpg"> 

				      </div>

				      

				      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

				      <script src="collarge/imagesloaded.pkgd.min.js"></script>

				      <script src="collarge/dist/js/justified.js"></script>

				      <script>

				        var parameters = {

				          gridContainer: '#grid-container',

				          gridItems: '.grid-item',

				          enableImagesLoaded: true,

				          width:'200'

				        };

				        var grid = new justifiedGrid(parameters);

						$('body').imagesLoaded( function() {

				   			grid.initGrid();

						});

				       

				      </script>







					

				</div>

				

			</div>



		

		</div>

	</section>





	<section class="causes-section" id="special">

		<div class="auto-container">

			<!-- Sec Title -->

			<div class="sec-title centered">

				<div class="clearfix">

					<div class="">

						<h2 style="text-transform:none;"><span class="theme_color">Special Initiatives of</span>&nbsp; WMPSC</h2>

						<!-- <div class="text">Poor people are at high risk of severe malnutrition &amp; no education</div> -->

					</div>

					<!-- <div class="pull-right">

						<a href="causes.html" class="theme-btn btn-style-four">View All Causes</a>

					</div> -->

				</div>

			</div>

			

			<div class="row clearfix">

				

				<!--Causes Block-->


                

                <div class="causes-block col-lg-4 col-md-6 col-sm-12" style="display:none;">

                	<div class="inner-box wow fadeInRight animated" data-wow-delay="600ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 600ms; animation-name: fadeInRight;">

                    	<div class="image">

                    	    <div class="ribbon">Recent</div>

                        	<a href="plumbacharya"><img src="images/plumbacharya.jpg" alt=""></a>

							<!-- <a href="causes-single.html" class="like-icon"><span class="icon flaticon-heart"></span></a> -->

                        </div>

                        <div class="lower-content">

                        	<h3><a href="#">Digital School of Plumbing</a></h3>

                            <div class="content">

                            	<div class="text">Online Learning Management System, a move towards Digitisation of Learning, Development and Assessments...</div>

                            </div>

                             <div class="btns-box">

                                <a href="plumbacharya" class="theme-btn btn-style-two">More Detail</a>

                            </div>

                           

                        </div>

                    </div>

                </div>

				

				

				

				<!--Causes Block-->

                <div class="causes-block col-lg-4 col-md-6 col-sm-12" style="display:none;">

                	<div class="inner-box wow fadeInRight animated" data-wow-delay="600ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 600ms; animation-name: fadeInRight;">

                    	<div class="image">

                        	<a href="water.php"><img src="images/project-3.jpg" alt=""></a>

							<!-- <a href="causes-single.html" class="like-icon"><span class="icon flaticon-heart"></span></a> -->

                        </div>

                        <div class="lower-content">

                        	<h3><a href="water.php">Jal Jeevan Mission</a></h3>

                            <div class="content">

                            	<div class="text">Skill2Save Project aimed towards bringing all stakeholders from  plumbing industry together...</div>

                            </div>

                             <div class="btns-box">

                                <a href="water.php" class="theme-btn btn-style-two">More Detail</a>

                            </div>

                           

                        </div>

                    </div>

                </div>

			</div>

		

			

			<div class="row clearfix">
				

				
                <div class="causes-block col-lg-4 col-md-6 col-sm-12">

                	<div class="inner-box wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInLeft;">

                    	<div class="image">

                    		

                        	<a href="covid" target="_blank"><img src="images/project-1.jpg" alt=""></a>

							<!-- <a href="causes-single.html" class="like-icon"><span class="icon flaticon-heart"></span></a> -->

                        </div>

                        <div class="lower-content">

                        	<h3><a href="covid">WMPSC fighting Covid-19</a></h3>

                            <div class="content">

                            	<div class="text">Health & Safety Guidelines for Plumbers, Distribution of Food & Essentail Supplies, Releasing a List of Plumbers... </div>

                            </div>



                            <div class="btns-box">

                                <a href="covid" class="theme-btn btn-style-two">More Detail</a>

                            </div>

                          

                        </div>

                    </div>

                </div>
			<!--Causes Block-->

                <div class="causes-block col-lg-4 col-md-6 col-sm-12">

                	<div class="inner-box wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInLeft;">

                    	<div class="image">

                    		

                        	<a href="VocalForLocal" target="_blank"><img src="images/vocal.jpg" alt=""></a>

							<!-- <a href="causes-single.html" class="like-icon"><span class="icon flaticon-heart"></span></a> -->

                        </div>

                        <div class="lower-content">

                        	<h3><a href="VocalForLocal">Vocal For Local</a></h3>

                            <div class="content">

                            	<div class="text">Supporting the Vision of Atmanirbhar Bharat, highlighting the message of being Vocal for Local...</div>

                            </div>



                            <div class="btns-box">

                                <a href="VocalForLocal" class="theme-btn btn-style-two">More Detail</a>

                            </div>

                          

                        </div>

                    </div>

                </div>

                

                

                <!--Causes Block-->

                <div class="causes-block col-lg-4 col-md-6 col-sm-12">

                	<div class="inner-box wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">

                    	<div class="image">

							<!-- <div class="ribbon">URGENT</div> -->

                        	<a href="worldskill.php"><img src="images/project-2.jpg" alt=""></a>

							<!-- <a href="causes-single.html" class="like-icon"><span class="icon flaticon-heart"></span></a> -->

                        </div>

                        <div class="lower-content">

                        	<h3><a href="worldskill.php">Road to World Skills</a></h3>

                            <div class="content">

                            	<div class="text">Olympics of Skills i.e. World Skills Competitions, taking place every 2 Years. See India's Journey and Participation...</div>

                            </div>

                             <div class="btns-box">

                                <a href="worldskill.php" class="theme-btn btn-style-two">More Detail</a>

                            </div>

                           

                        </div>

                    </div>

                </div>

				

				<!--Causes Block-->

                <div class="causes-block col-lg-4 col-md-6 col-sm-12" style="display:none;">

                	<div class="inner-box wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">

                    	<div class="image">

							<!-- <div class="ribbon">URGENT</div> -->

                        	<a href="virtual_lab/index.html"><img src="images/virtual.jpeg" alt=""></a>

							<!-- <a href="causes-single.html" class="like-icon"><span class="icon flaticon-heart"></span></a> -->

                        </div>

                        <div class="lower-content">

                        	<h3><a href="virtual_lab/index.html">Virtual Lab</a></h3>

                            <div class="content">

                            	<div class="text">Virtual Tour of the Iconic Plumbing Lab (Centre of Excellence) Located at Chitkara University, Punjab...</div>

                            </div>

                             <div class="btns-box">

                                <a href="virtual_lab/index.html" class="theme-btn btn-style-two">Visit Virtual Lab</a>

                            </div>

                           

                        </div>

                    </div>

                </div>

				

			

				

			</div>

			

			

			

		</div>

	</section>





	<section class="services-section" style="display: none;" >

		<div class="auto-container">

			<div class="row clearfix">

				

				<!-- Service Block -->

			

				


				

			</div>

		</div>

	</section>







	<section class="team-section" style="background-color:#f6f6f6; display: none;">

		<div class="auto-container">

			<!-- Sec Title -->

			<div class="sec-title centered">

				<h2><span class="theme_color">What Our</span> Leaders Says</h2>

				<!-- <div class="text">We have successfully for Poor Peoples <br> completed 500+ projects</div> -->

			</div>

			

			<div class="team-carousel owl-carousel owl-theme">

				

				<!-- Team Block -->

				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

							<!-- Image Column -->

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/members/Somany_Sir.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							<!-- Content Column -->

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Dr. R.K. Somany</a></h3>

									<div class="text">Mr. R. K. Somany is Chairman and Managing Director of HSIL Limited; (Formerly Hindustan Sanitary ware& Industries Ltd). An entrepreneur of class, he was instrumental in bringing vitreous China technology to India in the 1960s, ushering in a new chapter in the sanitary ware industry with iconic brand 'hindware'. </div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>

			

				<!-- Team Block -->

				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

							<!-- Image Column -->

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/members/Vinay_Gupta.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							<!-- Content Column -->

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Mr. Vinay Gupta</a></h3>

									

									<div class="text">He is a technocrat from IIT Delhi and started manufacturing premium range of tapware in Delhi since last 35 years. He is pioneer in bringing the latest global technology in the Industry to India. Mr. Gupta was instrumental in commencing the first ever production of Single Lever Mixers with ceramic cartridges in the year 1986</div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>

				

				<!-- Team Block -->

				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

							<!-- Image Column -->

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/members/MKGupta.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							<!-- Content Column -->

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Mr. MK Gupta</a></h3>

									

									<div class="text">Mr. M.K. Gupta is a Consulting Engineer in Public Health Engineering, Fire Fighting & Allied Services and having more than 42 years of experience. Mr. Gupta founded the consulting firm M/s MKG Consultants located in New Delhi during which he has been involved in various prestigious projects in India & Abroad.</div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>

			

				<!-- Team Block -->

				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

							<!-- Image Column -->

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/members/Gurmit_Singh.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							<!-- Content Column -->

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Mr. Gurmit Singh Arora</a></h3>

									

									<div class="text">Mr. Singh is the National President Indian Plumbing Association, having its headquarters in New Delhi and also a Founding Trustee of the Indian Institute of Plumbing, Founding & Board Member & Vice Chairman of the Indian Green Building Council, Mumbai Chapter (IGBC MC).</div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>

				

				<!-- Team Block -->

				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

							<!-- Image Column -->

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/members/SKRchodhury.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							<!-- Content Column -->

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Mr. Sandip K Roy</a></h3>

									

									<div class="text">A techno commercial person heading one of the leading plumbing and contracting company as Director. Under his able leadership the company has set a new standard in plumbing projects ranging from hospitals, hotels, airports, prestigious housing complex and so on Mr. Roy Choudhury is the former </div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>

			

				<!-- Team Block -->

				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

							<!-- Image Column -->

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/members/deepak.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							<!-- Content Column -->

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Mr. Deepak Mehrotra</a></h3>

									

									<div class="text">Mr. Deepak brings over 28 years of experience in Consumer Durables, FMCG and the telecom service industry. Before joining Aliaxis in 2017, he was working with Pearson India as Managing Director. He has also gained valuable experience with companies including Airtel and Asian Paints.</div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>

			

			</div>

		</div>

	</section>



	



	



	<section class="team-section" >

		<div class="auto-container">

			<!-- Sec Title -->

			<div class="sec-title centered">

				<h2><span class="theme_color">Media</span> Corner</h2>

				<!-- <div class="text">We have successfully for Poor Peoples <br> completed 500+ projects</div> -->

			</div>





			<div class="row" style="padding: 10px;border: 1px solid #c3bcbc;">

				<div class="col-sm-4">

						<div id="fb-root"></div>

						<script>(function(d, s, id) {

						  var js, fjs = d.getElementsByTagName(s)[0];

						  if (d.getElementById(id)) return;

						  js = d.createElement(s); js.id = id;

						  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";

						  fjs.parentNode.insertBefore(js, fjs);

						}(document, 'script', 'facebook-jssdk'));</script>

					<div class="fb-page" data-href="https://www.facebook.com/WMPSC" data-tabs="timeline" data-width="400" data-height="225" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" style="width:100%;"></div>

					



					<br/>



					<a class="twitter-timeline" data-width="100%" data-height="225" href="https://twitter.com/WMPSkillCouncil">Tweets by WMPSkillCouncil</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>



				</div>



				<div class="col-sm-5" style="padding-right: 5px;">

					

					<iframe width="100%" height="450" src="https://www.youtube.com/embed/dMvqob34FQM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



				</div>



				<div class="col-sm-3" style="padding-left: 0px;">

					

					<iframe width="100%" height="145" src="https://www.youtube.com/embed/8zr13nFVGbs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



					<iframe width="100%" height="145" src="https://www.youtube.com/embed/_te-QcxBWgw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



					<iframe width="100%" height="145" src="https://www.youtube.com/embed/oCOZv8Q4qMg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



				</div>

			</div>



		</div>

	</section>


	<!-- <section class="team-section" style="background-color:#f6f6f6;">

		<div class="auto-container">

			

			<div class="sec-title centered">

				<h2><span class="theme_color">Success</span> Stories</h2>

				<div class="text">We have successfully for Poor Peoples <br> completed 500+ projects</div>

			</div>

			

			<div class="story-carousel owl-carousel owl-theme">

				

			

				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

					

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/success/success1.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Siva Siddhu</a> <div class="location"> (Bangalore)</div></h3>

									

									<div class="texts">“Where there's a will there's a way”, “Hard work pays off”... </div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>

			

			

				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

							

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/success/success2.jpg" alt="" /></a>

									</div>

								</div>

							</div>

						

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Kiran Kumari</a> <div class="location"> (Silchar, Assam)</div></h3>

									

									<div class="texts">They think plumbing is a man’s job. I am glad to have proved them wrong by ...

</div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>

				

				

				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

							

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/success/success3.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Nirmala Nishad</a> <div class="location"> (Chattisgarh)</div></h3>

									

									<div class="texts">After deciding to take up training in plumbing, Nirmala is now helping ...

 </div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>

			

			

				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

							

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/success/success4.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Raju Pandey</a> <div class="location"> (South West Delhi)</div></h3>

									

									<div class="texts">Raju is from a rural village, who enrolled under RPL. Now he is a Skilled ... </div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>

				

				

				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

							

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/success/success5.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Ms. Amruta Ran</a> <div class="location"> (Shahapur, Maharashtra)</div></h3>

									

									<div class="texts">After getting trained in Plumbing through Pratham Plumbing ...

</div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>

			

				

				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

							

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/success/success6.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Mahesh Marothiya</a> <div class="location"> (Indore, MP)</div></h3>

									

									<div class="texts">Mahesh worked as a Plumber. Came to know about RPL ...

</div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>



				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

							

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/success/success7.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Jitendra Mukati</a> <div class="location"> (Indore, MP)</div></h3>

									

									<div class="texts">Jitendra has 4 members in his family. He was very happy to enroll in the training...</div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>





				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

						

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/success/success8.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">Sudarsahan Bharati</a> <div class="location"> (Puri, Odisha)</div></h3>

									

									<div class="texts">Sudarshan Bharti native of Sakhhigopal , Puri District, Odisha. Enrolled under ...</div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>



				<div class="team-block">

					<div class="inner-box">

						<div class="clearfix">

							

							<div class="image-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<div class="image">

										<a href="#"><img src="images/success/success9.jpg" alt="" /></a>

									</div>

								</div>

							</div>

							

							<div class="content-column col-lg-6 col-md-6 col-sm-12">

								<div class="inner-column">

									<h3><a href="#">MD Ayub</a> <div class="location"> (Jodhpur, Rajasthan)</div></h3>

									

									<div class="texts">MD Ayub lives with 6 family members. He is 52 years old and has 25 years work ...

</div>

									<div class="quote-icon flaticon-right-quote-sign"></div>

								</div>

							</div>

						</div>

					</div>

				</div>



			

			</div>

		</div>

	</section> -->

	<style type="text/css">

		.testimonial-section::before {

  				content: "";

    background-color: #00000080;

    width: 100%;

    height: 100%;

    position: absolute;

    top: 0px;

}

	</style>



	<!-- Testimonial Section -->

	<section class="testimonial-section" style="background-image:url(images/banner_success_4.jpg)">

		<div class="auto-container clearfix">

			<div class="content-box">

				<!-- Sec Title -->

				<div class="sec-title light">

					<h2 style="color:#fff;"><span class="theme_color">Success</span> Stories</h2>

				</div>

				

				<div class="testimonial-carousel owl-carousel owl-theme">

					

					<!-- Testimonial Block -->

					<div class="testimonial-block">

						<div class="inner-box">

							<div class="upper-box">

								<div class="upper-inner">

									<div class="image">

										<img src="images/success/success2.jpg" alt="" />

									</div>

									<h3>Kiran Kumari</h3>

									<div class="location">Silchar, Assam</div>

									<div class="quote-icon flaticon-quote"></div>

								</div>

							</div>

							<div class="text">They think plumbing is a man’s job. I am glad to have proved them wrong by getting trained in Plumbing at PMKK Silchar, Assam. I have been able to break stereotypes and also improve the drainage system in my society.</div>

						</div>

					</div>

					

					<!-- Testimonial Block -->

					<div class="testimonial-block">

						<div class="inner-box">

							<div class="upper-box">

								<div class="upper-inner">

									<div class="image">

										<img src="images/success/success3.jpg" alt="" />

									</div>

									<h3>Nirmala Nishad</h3>

									<div class="location">Chattisgarh</div>

									<div class="quote-icon flaticon-quote"></div>

								</div>

							</div>

							<div class="text">After deciding to take up training in plumbing, Nirmala is now helping her husband proudly as an earning member of the family.</div>

						</div>

					</div>

					

					<!-- Testimonial Block -->

					<div class="testimonial-block">

						<div class="inner-box">

							<div class="upper-box">

								<div class="upper-inner">

									<div class="image">

										<img src="images/success/success4.jpg" alt="" />

									</div>

									<h3>Raju Pandey</h3>

									<div class="location">South West Delhi</div>

									<div class="quote-icon flaticon-quote"></div>

								</div>

							</div>

							<div class="text">Raju is from a rural village, who enrolled under RPL. Now he is a Skilled and Certified Plumber earning over 20 Thousand every month.</div>

						</div>

					</div>





					<!-- Testimonial Block -->

					<div class="testimonial-block">

						<div class="inner-box">

							<div class="upper-box">

								<div class="upper-inner">

									<div class="image">

										<img src="images/success/success5.jpg" alt="" />

									</div>

									<h3>Ms. Amruta Ran</h3>

									<div class="location">Shahapur, Maharashtra</div>

									<div class="quote-icon flaticon-quote"></div>

								</div>

							</div>

							<div class="text">After getting trained in Plumbing through Pratham Plumbing Training Centre, Panvel. Now works with an Authorized Service Provider of Eureka Forbes in Navi Mumbai with a salary of Rs. 15,000/- per month + Accommodation.</div>

						</div>

					</div>

					<!-- Testimonial Block -->

					<div class="testimonial-block">

						<div class="inner-box">

							<div class="upper-box">

								<div class="upper-inner">

									<div class="image">

										<img src="images/success/success6.jpg" alt="" />

									</div>

									<h3>Mahesh Marothiya</h3>

									<div class="location">Indore, Madhya Pradesh</div>

									<div class="quote-icon flaticon-quote"></div>

								</div>

							</div>

							<div class="text">Mahesh worked as a Plumber. Came to know about RPL program of WMPSC through Skipper Pipes’ Distributor in Indore. After successfully  completing  his training  he got a Certificate & Skill Card which helped to increase his earnings by almost Rs.5,000 every month.</div>

						</div>

					</div>



					<!-- Testimonial Block -->

					<div class="testimonial-block">

						<div class="inner-box">

							<div class="upper-box">

								<div class="upper-inner">

									<div class="image">

										<img src="images/success/success7.jpg" alt="" />

									</div>

									<h3>Jitendra Mukati</h3>

									<div class="location">Indore, Madhya Pradesh</div>

									<div class="quote-icon flaticon-quote"></div>

								</div>

							</div>

							<div class="text">Jitendra has 4 members in his family. He was very happy to enroll in the training program supported by a corporate with WMPSC and immediately grabbed the opportunity to join the Plumber General Level 3 RPL Program. </div>

						</div>

					</div>



					<!-- Testimonial Block -->

					<div class="testimonial-block">

						<div class="inner-box">

							<div class="upper-box">

								<div class="upper-inner">

									<div class="image">

										<img src="images/success/success8.jpg" alt="" />

									</div>

									<h3>Sudarsahan Bharati</h3>

									<div class="location">Puri, Odisha</div>

									<div class="quote-icon flaticon-quote"></div>

								</div>

							</div>

							<div class="text">Sudarshan Bharti native of Sakhhigopal , Puri District, Odisha. Enrolled under PMKVY scheme to learn and upgrade his skills in plumbing. Now work confidently as an independent plumber in his area.</div>

						</div>

					</div>





					<!-- Testimonial Block -->

					<div class="testimonial-block">

						<div class="inner-box">

							<div class="upper-box">

								<div class="upper-inner">

									<div class="image">

										<img src="images/success/success9.jpg" alt="" />

									</div>

									<h3>MD Ayub</h3>

									<div class="location">Jodhpur, Rajasthan</div>

									<div class="quote-icon flaticon-quote"></div>

								</div>

							</div>

							<div class="text">MD Ayub lives with 6 family members. He is 52 years old and has 25 years work experience in plumbing but no formal training or certification. During RPL program, he learned about the new tools & equipments and overall importance of using safety kits while working. After certification he has started to build his network with different distributors/dealers and is getting more jobs making him financially strong.</div>

						</div>

					</div>

					

				</div>

				

			</div>

		</div>

	</section>

	<!-- End Testimonial Section -->





	<!-- News Section -->

	<section class="news-section" style="margin-bottom:0px; display:none;">

		<div class="auto-container">

		

		

		<div class="row">

		<div class="col-lg-4 text-center causes-block">

			<!-- Sec Title -->

			<div class="sec-title centered">

				<h2><span class="theme_color">News </span> Letter</h2>

			</div>

			<div class="inner-box">

			<div class="image">

				<a><img src="images/news_letter.jpg" width="100%"></a>

			</div>

			</div>

			<a href="newsletter.php" class="theme-btn btn-style-three btn-sm" style="padding: 9px 22px 9px; font-size: 13px; margin-top: 10px;">Download</a>

			</div>

			

			<div class="col-lg-8">

			<!-- Sec Title -->

				<div class="sec-title centered">

				<h2><span class="theme_color">News </span> & <span class="theme_color">Events </span></h2>

			</div>

				<div class="row">

					<div class="column col-lg-6 col-md-6 col-sm-6">

						<?php echo $newsrow; ?>

							<div class="row clearfix">

								<div class="column col-md-12 col-sm-12 text-center">

									<a href="all_news.php" class="theme-btn btn-style-three" style="padding: 9px 22px 9px; font-size: 13px;">VIEW MORE</a>

								</div>

							</div>



					</div>



					<div class="column col-lg-6 col-md-6 col-sm-6">

						<?php echo $eventList; ?>

						<div class="row clearfix">

							<div class="column col-md-12 col-sm-12 text-center">

								<a href="all_events.php" class="theme-btn btn-style-three btn-sm" style="padding: 9px 22px 9px; font-size: 13px;">VIEW MORE</a>

							</div>

						</div>

					</div>

				</div>



			

			



			</div>

			</div>

			</div>

		</div>

	</section>



	











	<!-- End News Section -->

	<!-- Donate Form Section -->

	

	<!-- End Donate Form Section -->

	<!-- Services Section -->

	

	<section class="news-section-two" style="padding-bottom: 0px;">

		<div class="auto-container">







			<div class="row">

				<div class="col-sm-2">

					<div class="tp-title light" >

						<h2 style="padding:0px;"><span class="theme_color">Our </span> <span style="color:#333333;">Partners</span></h2>

					</div>

				</div>

				<div class="col-sm-10">



				<?php include "includes/partners.php"; ?>





				</div>

			</div>

			<!-- Sec Title -->

			

			









		</div>

	</section>

	









	

	<section class="news-section-two" style="margin-bottom:40px; display: none;">

		<div class="auto-container">







			<div class="row">

				<div class="col-sm-2">

					<div class="tp-title light" >

						<h2 style="padding:0px;"><span class="theme_color">Training </span> <span style="color:#333333;">Partners</span></h2>

					</div>

				</div>

				<div class="col-sm-10">



					<div class="news-carousel owl-carousel owl-theme">

						<div class="news-block-three">

							<div class="inner-box">

								<div class="image">

									<a href="javascript:void(0);"><img src="rotate/images/logo1.jpg" alt="" /></a>

								</div>

							</div>

						</div>	

						

						<div class="news-block-three">

							<div class="inner-box">

								<div class="image">

									<a href="javascript:void(0);"><img src="rotate/images/logo2.jpg" alt="" /></a>

								</div>

							</div>

						</div>	



						<div class="news-block-three">

							<div class="inner-box">

								<div class="image">

									<a href="javascript:void(0);"><img src="rotate/images/logo3.jpg" alt="" /></a>

								</div>

							</div>

						</div>	



						<div class="news-block-three">

							<div class="inner-box">

								<div class="image">

									<a href="javascript:void(0);"><img src="rotate/images/logo4.jpg" alt="" /></a>

								</div>

							</div>

						</div>	



						<div class="news-block-three">

							<div class="inner-box">

								<div class="image">

									<a href="javascript:void(0);"><img src="rotate/images/logo5.jpg" alt="" /></a>

								</div>

							</div>

						</div>	



						<div class="news-block-three">

							<div class="inner-box">

								<div class="image">

									<a href="javascript:void(0);"><img src="rotate/images/logo6.jpg" alt="" /></a>

								</div>

							</div>

						</div>	



						<div class="news-block-three">

							<div class="inner-box">

								<div class="image">

									<a href="javascript:void(0);"><img src="rotate/images/logo7.jpg" alt="" /></a>

								</div>

							</div>

						</div>	



						<div class="news-block-three">

							<div class="inner-box">

								<div class="image">

									<a href="javascript:void(0);"><img src="rotate/images/logo8.jpg" alt="" /></a>

								</div>

							</div>

						</div>	



						<div class="news-block-three">

							<div class="inner-box">

								<div class="image">

									<a href="javascript:void(0);"><img src="rotate/images/logo9.jpg" alt="" /></a>

								</div>

							</div>

						</div>	

						

								

					</div>





				</div>

			</div>

			<!-- Sec Title -->

					</div>

	</section>

	<!-- End Services Section -->

	

	<!--Clients Section-->

	

	



    <!--End Clients Section-->

	



    <!--Newsleter Section-->

    <?php include "includes/newsletter.php"; ?>

    <!--End Newsleter Section-->



	<?php include "includes/footer.php"; ?>

		 



<script type="text/javascript">

	function theRotator() 

	{

	//Set the opacity of all images to 0

	$('div.rotator ul li').css({opacity: 0.0});

	

	//Get the first image and display it (gets set to full opacity)

	$('div.rotator ul li:first').css({opacity: 1.0});

		

	//Call the rotator function to run the slideshow, 6000 = change to next image after 6 seconds

	

    if ($('div.rotator ul li').length > 1) {

    setTimeout('rotate()', 6000);

		}

	}



	function rotate() {	

	//Get the first image

	var current = ($('div.rotator ul li.show')? $('div.rotator ul li.show') : $('div.rotator ul li:first'));



    if ( current.length == 0 ) current = $('div.rotator ul li:first');



	//Get next image, when it reaches the end, rotate it back to the first image

	var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('div.rotator ul li:first') :current.next()) : $('div.rotator ul li:first'));

	

	//Un-comment the 3 lines below to get the images in random order

	

	//var sibs = current.siblings();

    //var rndNum = Math.floor(Math.random() * sibs.length );

    //var next = $( sibs[ rndNum ] );

			



	//Set the fade in effect for the next image, the show class has higher z-index

	next.css({opacity: 0.0}).addClass('show').animate({opacity: 1.0}, 1000);



	//Hide the current image

	current.animate({opacity: 0.0}, 1000, function(){setTimeout('rotate()', 6000);}) .removeClass('show');

	

};

</script>

	

	

	<script>

		$(document).ready(function() {		

			//Load the slideshow
			
			//$("#modal_video").modal('show');

			theRotator();

			$('div.rotator').fadeIn(1000);

		    $('div.rotator ul li').fadeIn(1000); // tweek for IE

		});

	</script>





	

	





</body>

</html>