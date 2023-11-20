<?php
	include "admin/connection/connect.php";
	$GetRowsA="select * from news order by news_id desc limit 1";
	$exeA=mysqli_query($mysqli,$GetRowsA);
	$dataA = mysqli_fetch_array($exeA);
	{
		$first_news = "Latest News:"." <a href='news_details.php?news_id={$dataA['news_id']}'>{$dataA['news_title']}</a>";
	}
?>

<header class="main-header">
		<!--Header Top-->
    	<div class="header-top">
    		<div class="auto-container">
				<div class="row clearfix">
					<!--Top Left-->
					<div class="top-left col-lg-5 col-md-12 col-sm-12">
						<ul>
							<li><marquee><?php echo $first_news; ?></marquee></li>
						</ul>
					</div>
					
					<!--Top Right-->
					<div class="top-right col-lg-7 col-md-12 col-sm-12">
						<div class="question">Contact us: <a href="tel:+91 11 41513580">+91 11 41513580,41400556</a> &nbsp;Email: <a href=''>ipsc@ipssc.in</a></div>
						<!--Social Box-->
						<ul class="social-box">
							<li><a href="https://www.facebook.com/IndianPlumbing/" target="_blank"><span class="fab fa-facebook-f"></span></a></li>
							<li><a href="https://twitter.com/ipscindia" target="_blank"><span class="fab fa-twitter"></span></a></li>
							<li><a href="#"><span class="fab fa-youtube"></span></a></li>
							<li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
							<li><a href="#"><span class="fab fa-instagram"></span></a></li>
							
							
						</ul>
					</div>
				
				</div>
			</div>
		</div>
    	
    	<!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container">
            	<div class="clearfix">
                	
                	<div class="pull-left logo-box">
                    	<div class="logo"><a href="index.html"><img src="images/logo.jpg" alt="" title=""></a></div>
                    </div>
                    
                    <div class="pull-right upper-right">
                    	<div class="info-outer clearfix">
						
                    		


							<div class="upper-column info-box">
								<div class="author-img"><img src="images/top_2.png" alt=""></div>
								<div class="author-name"> <a href="">Shri Narendra Modi</a> <span> Hon'ble Prime Minister of India<br></span> </div>
							</div>

							<div class="upper-column info-box">
								<div class="author-img"><img src="images/top_3.jpg" alt=""></div>
								<div class="author-name"> <a href="">Dr. Mahendra Nath Pandey</a> <span> Hon'ble Minister of Skill <br></span> </div>
							</div>

							<div class="upper-column info-box">
								<div class="author-img"><img src="images/top_1.jpg" alt=""></div>
								<div class="author-name"> <a href="">Shri Raj Kumar Singh</a> <span> Hon'ble Minister of State <br></span> </div>
							</div>
							
							<!-- <div class="upper-column info-box">
								<div class="icon-box"><span class="flaticon-home-1"></span></div>
								<ul>
									<li><span>13AH, San Francisco,</span> <br> New york, United States</li>
								</ul>
							</div> -->
							
							
							<!--div class="upper-column info-box">
								<div class="icon-box"><span class="flaticon-envelope"></span></div>
								<ul>
									<li><span>Indian Plumbing Skills Council</span> <br> ipsc@ipssc.in</li>
								</ul>
							</div-->
							
							
							<!--div class="upper-column info-box">
								<div class="icon-box"><span class="flaticon-stopwatch"></span></div>
								<ul>
									<li><span>Working Hours</span> <br> Mon-Sat:10.00am to 6.00pm</li>
								</ul>
							</div-->


							
                        </div>
						
                    </div>
                    
                </div>
				
            </div>
        </div>
        <!--End Header Upper-->
        
		<!--Header Lower-->
		<div class="header-lower">
			<div class="auto-container">
				<div class="nav-outer clearfix">
					<!-- Main Menu -->
					<nav class="main-menu navbar-expand-md">
						<div class="navbar-header">
							<!-- Toggle Button -->    	
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
						<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
							<ul class="navigation clearfix">
								<li class="current"><a href="index.php">Home</a></li>

								<li class="dropdown"><a href="#">WHO WE ARE</a>
									<ul>
										<li><a href="about.php">About Us</a></li>
										<li><a href="advisors.php">Our Advisors</a></li>
										<li><a href="governing_body.php">Governing Body</a></li>
										<li><a href="all_team.php">Team at IPSC</a></li>
										<li><a href="skill_ecosystem.php">Skill Ecosystem</a></li>
										<!-- <li><a href="#">IPSC'S Commitment</a></li>
										<li><a href="#">IPSC Objectives</a></li>
										<li><a href="#">Secure Certification By Pitney Bowes</a></li> -->
									</ul>
								</li>
								<li class="dropdown"><a href="#">Standards</a>
									<ul>
										<li><a href="#">Job Roles & NOS</a></li>
										<li><a href="#">Curriculum</a></li>
										<li><a href="#">Certification</a></li>
										<li><a href="#">Guidelines</a></li>
									</ul>
								</li>

								<li class="dropdown"><a href="#">Training & Assessment</a>
									<ul>
										<li><a href="test_center.php">Test Center Location</a></li>
										<li><a href="tot_toa_calendar.php">ToT/ToA Calendar</a></li>
										<li><a href="#">STT Training</a></li>
										<li><a href="#">RPL Training </a></li>
										<li><a href="#">Apprenticeships</a></li>
										<li><a href="#">Bridge Training</a></li>
										<li><a href="#">Assessment</a></li>
										
									</ul>

								</li>

								<li class="dropdown"><a href="#">Partner With Us</a>
									<ul>
										<li><a href="#">Become a Trainer/Assessor</a></li>
										<li><a href="#">Become a Training Partner/ Assessment</a></li>
									</ul>
								</li>

								<li class="dropdown"><a href="#">Schemes</a>
									<ul>
										<li><a href="#">PMKVY</a></li>
										<li><a href="#">NBCFDC</a></li>
										<li><a href="#">NULM</a></li>
										<li><a href="#">State Mission</a></li>
									</ul>
								</li>

								<li class="dropdown"><a href="#">Engagements</a>
									<ul>
										<li><a href="#">IPSC Membership</a></li>
										<li><a href="#">PWSTC</a></li>
										<li><a href="#">COE</a></li>
										<li><a href="#">Apprenticeships</a></li>
										<li><a href="#">Industry Partnerships</a></li>
										<li><a href="#">MoUs</a></li>
										<li><a href="#">Placements</a></li>
									</ul>
								</li>

								<li class="dropdown"><a href="#">Media</a>
									<ul>
										<li><a href="#">Gallery</a></li>
										<li><a href="#">News</a></li>
										<li><a href="#">Events</a></li>
										<li><a href="#">Press Release</a></li>
										<li><a href="#">Newsletter</a></li>
									</ul>

								</li>
								<li><a href="contact.php">Contact us</a></li>
							</ul>
						</div>
					</nav>
					
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
        	<div class="auto-container clearfix"  style="max-width: 90%;">
            	<!--Logo-->
            	<div class="logo pull-left">
                	<a href="index.html" class="img-responsive"><img src="images/logo-small.png" alt="" title=""></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                	<!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <ul class="navigation clearfix">
								<li class="current"><a href="index.php">Home</a></li>

								<li class="dropdown"><a href="#">About</a>
									<ul>
										<li><a href="about.php">About Us</a></li>
										<li><a href="#">Our Advisors</a></li>
										<li><a href="#">Governing Body</a></li>
										<li><a href="#">Team at IPSC</a></li>
										<li><a href="#">Skill Ecosystem</a></li>
										<!-- <li><a href="#">IPSC'S Commitment</a></li>
										<li><a href="#">IPSC Objectives</a></li>
										<li><a href="#">Secure Certification By Pitney Bowes</a></li> -->
									</ul>
								</li>
								<li class="dropdown"><a href="#">Standards</a>
									<ul>
										<li><a href="#">Job Roles & NOS</a></li>
										<li><a href="#">Curriculum</a></li>
										<li><a href="#">Certification</a></li>
										<li><a href="#">Guidelines</a></li>
									</ul>
								</li>

								<li class="dropdown"><a href="#">Training & Assessment</a>
									<ul>
										<li><a href="test_center.php">Test Center Location</a></li>
										<li><a href="#">STT Training</a></li>
										<li><a href="#">RPL Training </a></li>
										<li><a href="#">Apprenticeships</a></li>
										<li><a href="#">Bridge Training</a></li>
										<li><a href="#">Assessment</a></li>
										<li><a href="#">ToT/ToA Calendar</a></li>
									</ul>

								</li>

								<li class="dropdown"><a href="#">Partner With Us</a>
									<ul>
										<li><a href="#">Become a Trainer/Assessor</a></li>
										<li><a href="#">Become a Training Partner/ Assessment</a></li>
									</ul>
								</li>

								<li class="dropdown"><a href="#">Schemes</a>
									<ul>
										<li><a href="#">PMKVY</a></li>
										<li><a href="#">NBCFDC</a></li>
										<li><a href="#">NULM</a></li>
										<li><a href="#">State Mission</a></li>
									</ul>
								</li>

								<li class="dropdown"><a href="#">Engagements</a>
									<ul>
										<li><a href="#">IPSC Membership</a></li>
										<li><a href="#">PWSTC</a></li>
										<li><a href="#">COE</a></li>
										<li><a href="#">Apprenticeships</a></li>
										<li><a href="#">Industry Partnerships</a></li>
										<li><a href="#">MoUs</a></li>
										<li><a href="#">Placements</a></li>
									</ul>
								</li>

								<li class="dropdown"><a href="#">Media</a>
									<ul>
										<li><a href="#">Gallery</a></li>
										<li><a href="#">News</a></li>
										<li><a href="#">Events</a></li>
										<li><a href="#">Press Release</a></li>
										<li><a href="#">Newsletter</a></li>
									</ul>

								</li>
								<li><a href="#">Contact us</a></li>
							</ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
    
    </header>