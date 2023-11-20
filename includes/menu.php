<?php

	include "admin/connection/connect.php";

	$GetRowsA="select * from scroll_news";

	$exeA=mysqli_query($mysqli,$GetRowsA);

	$first_news="";

	$dataA = mysqli_fetch_array($exeA);

	{

		$first_news .= "<a href='admin/uploads/scroll/{$dataA['attachment_path']}' target='_blank' style='font-size:18px;'>{$dataA['title']}</a>";

	}

?>



<header class="main-header">

		<!--Header Top-->

    	<div class="header-top">

    		<div class="auto-container">

				<div class="row clearfix">

					<!--Top Left-->

					<div class="top-left col-lg-9 col-md-12 col-sm-12">

						<ul>

							<li><marquee onmouseover="this.stop()" onmouseout="this.start()">
								<?php echo $first_news; ?>
								<!-- <a href="RFP_for_Uberization_of_Plumbing_Workforce.pdf" target="_blank" style="font-size:18px;">Click here to read RFP (Request For Proposal) for Uberization of Plumbing Workforce Using a Technology Platform</a> -->
								</marquee></li>

						</ul>

					</div>

					

				

					<!--Top Right-->

					<div class="top-right col-lg-3 col-md-12 col-sm-12">

						<div class="question"><a href="contact.php">Contact Us</a></div>

						<!--Social Box-->

					<ul class="social-box">

							<li><a href="https://www.facebook.com/WMPSC" target="_blank"><span class="fab fa-facebook-f"></span></a></li>

							<li><a href="https://twitter.com/WMPSkillCouncil" target="_blank"><span class="fab fa-twitter"></span></a></li>

							<li><a href="https://www.youtube.com/c/WaterManagementPlumbingSkillCouncil" target="_blank"><span class="fab fa-youtube"></span></a></li>

							<li><a href="https://www.linkedin.com/company/wmpsc" target="_blank"><span class="fab fa-linkedin-in"></span></a></li>

							 <li><a href="https://www.instagram.com/wmp_skillcouncil/" target="_blank"><span class="fab fa-instagram"></span></a></li>
							

							

						</ul>

					</div>

				

				</div>

			</div>

		</div>

    	

    	<!--Header-Upper-->

        <div class="header-upper">

        	<div class="auto-container" style="max-width:99%">

            	<div class="clearfix">

                	

                	<div class="pull-left logo-box" style="max-width:20%">

                    	<div class="logo"><a href="index.php"><img src="images/logo-2.jpg" alt="" title=""></a></div>

                    </div>

                    

                    <div class="pull-right upper-right" style="max-width:17%; padding-top:38px;">

                    	<div class="info-outer clearfix">

							

							<div class="upper-column info-box">

								<img src="images/nsdc-new.jpg">

							</div>

							

						

							

                        </div>

						

                    </div>

                    

                    <div style="margin-left: auto; margin-right: auto; max-width: 66%; text-align: center;">

                        

                        	<nav class="main-menu navbar-expand-md" style="margin-top: 35px; width:98%;">

						<div class="navbar-header">

							<!-- Toggle Button -->    	

							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

								<span class="icon-bar"></span>

								<span class="icon-bar"></span>

								<span class="icon-bar"></span>

							</button>

						</div>

						

						<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
							<!--div style='position:absolute; top:8px; width:59%;'><a href="AA_Empanelment_Document.pdf" target="_blank"><img src="ipsc_text.gif" /></a></div-->
							<ul class="navigation clearfix">

								<li class="current"><a href="index.php">Home</a></li>



								<li class="dropdown"><a href="#">Who We Are</a>

									<ul>

										<li><a href="about.php">WMPSC </a></li>

										<li><a href="msde_nsdc.php">About MSDE, NCVET & NSDC</a></li>

										<li><a href="indian_plumbing.php">About Industry</a></li>

										<li><a href="governing_body.php">WMPSC Governing & Advisory Board</a> </li>

										<li><a href="all_team.php">WMPSC Team </a></li>

									</ul>

								</li>

									<li class="dropdown"><a href="#">What We Do</a>

										<ul>

						<!--	<li><a href="standards.php?show=0">National Occupational Standards / Qualification Packs</a></li>  -->

											

											<li><a href="assessments.php">Assessments</a></li>

											<li><a href="certificate.php">Certification</a> </li>

									<!-- <li><a href="lrt.php">Learning Resources & Technology </a></li> -->

											<li class="dropdown"><a href="#">Training of Trainers/ Assessors </a>

											<ul>

											<!--	<li><a href="tot.php">Training of Trainers</a></li>  -->
       
											<!--	<li><a href="toa.php">Training of Assessors</a></li> -->

												<li><a href="Training_Calendar.pdf">ToT/ ToA Calendar</a></li>

												<li><a href="results.php">Results</a></li>

												<li><a href="https://nsdcindia.org/national-portal-trainers-and-assessors" target="_new">Takshashila Portal</a></li>

											</ul>

											</li>

											<li class="dropdown"><a href="#">Industry Partnerships & CSR </a>

											

											<ul>

											

											<li><a href="csr.php">Industry Engagements & CSR Models</a></li>

											<li><a href="membership.php">Membership </a></li>

											

											</ul>

											</li>

											<li><a href="monitoring.php">Monitoring </a></li>

											<li><a href="worldskill.php">WorldSkills/ IndiaSkills Competition </a></li>

											<li><a href="#">International Engagements </a></li>

											<li><a href="water.php">Water Conservation </a></li>

											

											<li><a href="philanthropic.php">Philanthropic Work </a></li>

											

										</ul>

									</li>

									<li class="dropdown"><a href="#">Partners</a>

									<ul>

										

										<li><a href="tc.php">Training Centers</a></li>

										<li><a href="assessment_bodies.php">Assessment Bodies </a></li>

										<!-- <li><a href="knowledge_partner.php">Knowledge Partners</a></li> -->

										<!-- <li><a href="#">Industry Partners</a></li> -->

										<li><a href="industry_trade_members.php">Our Partners</a></li>

										<!-- <li><a href="#">Employment Partners</a></li> -->

										

									</ul>



								</li>

									<li class="dropdown"><a href="#">Schemes</a>

									<ul>

										<li><a href="central_scheme.php">Central Schemes</a></li>

										<li><a href="state_scheme.php">State Schemes</a></li>

										<li><a href="self_funded.php">Self-Funded</a></li>

									</ul>

								</li>

								<li class="dropdown"><a href="#">Placement</a>

									<ul>

										<li><a href="employer_registration.php">Employer and Job Seeker Registration</a></li>

										<li><a href="rozgar.php">Rozgar Mela / Job Fair</a></li>

										<li><a href="apprentice.php">Apprenticeships</a></li>

										<!-- <li><a href="entrepreneurship.php">Entrepreneurship</a></li> -->

									</ul>

								</li>

								
<!--
								<li class="dropdown"><a href="#">Flagship Events</a>

									<span style="position: absolute;; top:0px; right:0px"><img src="images/new.gif"></span>

									<ul>
											
										<li><a href="plumbing_mahostava.php">Plumbing Mahotsav 2019</a></li>
										<li><a href="https://plumbskillsexpo.com" target="_blank">Water & Plumb Skills Expo 2023</a></li>
									</ul>

								</li>
-->
								
								<li class="dropdown"><a href="#">QUALIFICATIONS </a>

								<ul>
									<li><a href="active-aualifications.php">Active Qualifications</a></li>
									<li><a href="draft-qualifications-for-public-view.php">Draft Qualifications for Public Review</a></li>
									<li><a href="archived-or-inactive-qualifications.php">Archived or Inactive Qualifications</a></li>
									<li><a href="qualifications-under-PMKVY-4-0.php"> Qualifications under PMKVY 4.0</a></li>
								</ul>

								</li>
								

								<li class="dropdown"><a href="#">Media</a>

									<ul>

										<li><a href="photo_gallery.php">Photo Gallery</a></li>

										<li><a href="video_gallery.php">Video Gallery</a></li>

										<!-- <li><a href="press.php">Press Coverage</a></li> -->
										<!-- <li><a href="publication.php">Publications</a></li> -->

										<li><a href="newsletter.php">Newsletters</a></li>

										<!-- <li><a href="success_stories.php">Success Stories</a></li> -->

										<!-- <li><a href="blogs.php">Blog</a></li> -->

									</ul>



								</li>

								<li class="dropdown"><a href="#">Information</a>

									<ul>

									<!--	<li><a href="event_calendar.php">Events Calendar</a></li> -->

										<li><a href="branding_collaterals.php">Branding Collaterals</a></li>

										<li><a href="guidlines.php">Guidelines & Policies</a></li>

										<li><a href="circular.php">Important Notices and Circulars</a></li>

									</ul>



								</li>

								



							



							



								

								

							</ul>

						</div>

					</nav>

                        

                    </div>

                    

                    

                    

                </div>

				

            </div>

        </div>

        <!--End Header Upper-->

        

		<!--Header Lower-->

		<div class="header-lower" style="display:none;">

			<div class="auto-container">

				<div class="nav-outer clearfix">

					<!-- Main Menu -->

				

					

					<!-- Main Menu End-->

					<div class="outer-box clearfix">

						

						<!-- Main Menu End-->

						<div class="nav-box">

							<div class="nav-btn nav-toggler navSidebar-button"><span class="icon flaticon-menu-1"></span></div>

						</div>						

					</div>

				</div>

			</div>

		</div>

		<!--End Header Lower-->

		

		<!--Sticky Header-->

        <div class="sticky-header">

        	<div class="auto-container clearfix"  style="max-width: 99%;">

            	<!--Logo-->

            	<div class="logo pull-left" style="max-width:13%">

                	<a href="index.php" class="img-responsive"><img src="images/logo-2.jpg" alt="" title=""></a>

                </div>



                 <div class="pull-right upper-right" style="max-width:12%">

                    	<div class="info-outer clearfix">

							

							<div class="upper-column info-box" style="padding-top:15px;">

								<img src="images/nsdc-new.jpg" >

							</div>

							

						

							

                        </div>

						

                    </div>

                

                <!--Right Col-->

                 <div style="margin-left: auto; margin-right: auto; max-width: 75%; text-align: center;">

                	<!-- Main Menu -->

                    <nav class="main-menu navbar-expand-md" style="margin-top:5px; width:98%;">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                        </button>

                        

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">

                            <ul class="navigation clearfix">

								<li class="current"><a href="index.php">Home</a></li>



								<li class="dropdown"><a href="#">Who We Are</a>

									<ul>

										<li><a href="about.php">WMPSC </a></li>

										<li><a href="msde_nsdc.php">About MSDE, NCVET & NSDC</a></li>

										<li><a href="indian_plumbing.php">About Industry</a></li>

										<li><a href="governing_body.php"> WMPSC Governing & Advisory Board</a> </li>

										<li><a href="all_team.php">WMPSC Team </a></li>

									</ul>

								</li>

								<li class="dropdown"><a href="#">What We Do</a>

									<ul>

			<!--		<li><a href="standards.php?show=0">National Occupational Standards / Qualification Packs</a></li>  -->

										

										<li><a href="assessments.php">Assessments</a></li>

										<li><a href="certificate.php">Certification</a> </li>

									<!--		<li><a href="lrt.php">Learning Resources & Technology </a></li> -->

										<li class="dropdown"><a href="#">Training of Trainers/ Assessors </a>

										<ul>

										<!--	<li><a href="tot.php">Training of Trainers</a></li> -->

										<!--	<li><a href="toa.php">Training of Assessors</a></li> -->

											<li><a href="Training_Calendar.pdf">ToT/ ToA Calendar</a></li>

											<li><a href="results.php">Results</a></li>

											<li><a href="https://nsdcindia.org/national-portal-trainers-and-assessors" target="_new">Takshashila Portal</a></li>

										</ul>

										</li>

										<li class="dropdown"><a href="#">Industry Partnerships & CSR </a>

										

										<ul>

										

										<li><a href="csr.php">Industry Engagements & CSR Models</a></li>

										<li><a href="membership.php">Membership </a></li>

										

										</ul>

										</li>

										<li><a href="monitoring.php">Monitoring </a></li>

										<li><a href="worldskill.php">WorldSkills/ IndiaSkills Competition </a></li>

										<li><a href="#">International Engagements </a></li>

										<li><a href="water.php">Water Conservation </a></li>

										

										<li><a href="philanthropic.php">Philanthropic Work </a></li>

										

									</ul>

								</li>

									<li class="dropdown"><a href="#">Partners</a>

									<ul>

										

										<li><a href="tc.php">Training Centers</a></li>

										<li><a href="assessment_bodies.php">Assessment Bodies </a></li>

										<!-- <li><a href="knowledge_partner.php">Knowledge Partners</a></li> -->

										<!-- <li><a href="#">Industry Partners</a></li> -->

										<li><a href="industry_trade_members.php">Our Partners</a></li>

										<!-- <li><a href="#">Employment Partners</a></li> -->

										

									</ul>



								</li>

									<li class="dropdown"><a href="#">Schemes</a>

									<ul>

										<li><a href="central_scheme.php">Central Schemes</a></li>

										<li><a href="state_scheme.php">State Schemes</a></li>

										<li><a href="self_funded.php">Self-Funded</a></li>

									</ul>

								</li>

								<li class="dropdown"><a href="#">Placement</a>

									<ul>

										<li><a href="employer_registration.php">Employer and Job Seeker Registration</a></li>

										<li><a href="rozgar.php">Rozgar Mela / Job Fair</a></li>

										<li><a href="apprentice.php">Apprenticeships</a></li>

										<!-- <li><a href="entrepreneurship.php">Entrepreneurship</a></li> -->

									</ul>

								</li>

								
<!--
									<li class="dropdown"><a href="#">Flagship Events</a>

									<span style="position: absolute;; top:0px; right:0px"><img src="images/new.gif"></span>

									<ul>

										<li><a href="plumbing_mahostava.php">Plumbing Mahotsav 2019</a></li>
										<li><a href="https://plumbskillsexpo.com" target="_blank">Water & Plumb Skills Expo 2023</a></li>

									</ul>

									</li>

<span style="position: absolute;; top:0px; right:0px"><img src="images/new.gif"></span>
-->
								
									
								<li class="dropdown"><a href="#">QUALIFICATIONS </a>

									

									<ul>
									<li><a href="active-aualifications.php">Active Qualifications</a></li>
									<li><a href="draft-qualifications-for-public-view.php">Draft Qualifications for Public Review</a></li>
									<li><a href="archived-or-inactive-qualifications.php">Archived or Inactive Qualifications</a></li>
									<li><a href="qualifications-under-PMKVY-4-0.php"> Qualifications under PMKVY 4.0</a></li>
									</ul>

								</li>
				

<script>
function myFunction() {
  alert("Sample Question Paper Comming Soon");
}
</script>				
								
								

								<li class="dropdown"><a href="#">Media</a>

									<ul>

										<li><a href="photo_gallery.php">Photo Gallery</a></li>

										<li><a href="video_gallery.php">Video Gallery</a></li>

									<!--	<li><a href="press.php">Press Coverage</a></li> -->
								<!--		<li><a href="Publication.php">Publications</a></li> -->

										<li><a href="newsletter.php">Newsletters</a></li>

										<!-- <li><a href="success_stories.php">Success Stories</a></li> -->

										<!-- <li><a href="blogs.php">Blog</a></li> -->

									</ul>



								</li>

								<li class="dropdown"><a href="#">Information</a>

									<ul>

									<!--	<li><a href="event_calendar.php">Events Calendar</a></li> -->

										<li><a href="branding_collaterals.php">Branding Collaterals</a></li>

										<li><a href="guidlines.php" target="_new">Guidelines & Policies</a></li>

										<li><a href="circular.php">Important Notices and Circulars</a></li>

									</ul>



								</li>

								



							</ul>

                        </div>

                    </nav><!-- Main Menu End-->

                </div>

                

            </div>

        </div>

        <!--End Sticky Header-->

    

    </header>