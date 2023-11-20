<!DOCTYPE html><html><head><?php include "includes/header.php"; ?><style type="text/css">   .welcome-section ul{margin-left: 30px; margin-bottom: 30px;}   .welcome-section ul li{list-style: circle; line-height: 30px; }</style></head><body class="hidden-bar-wrapper"><div class="page-wrapper">    <div class="preloader"></div>    <?php include "includes/menu.php"; ?>    <section class="page-title" style="background-image:url(images/background/12.jpg);">    	<div class="auto-container">        	<div class="row clearfix">            	<div class="title-column col-lg-6 col-md-12 col-sm-12">                	<h1>Career In WMPSC</h1>                </div>                <div class="breadcrumb-column col-lg-6 col-md-12 col-sm-12">                    <ul class="bread-crumb clearfix">                        <li><a href="index.php"><span class="icon fas fa-home"></span> Home</a></li>                        <li class="active"><span class="icon fas fa-arrow-alt-circle-right"></span> Career</li>                    </ul>                </div>            </div>        </div>    </section>  <!--	<section class="sidebar-page-container welcome-section">		<div class="auto-container">			<div class="row clearfix">				<div class="content-column col-lg-12 col-md-12 col-sm-12">				<div class="inner-column">                    <h2><span class="theme_color">WMPSC is Hiring for CHIEF EXECUTIVE OFFICER / CHIEF OPERATING OFFICER</span></h2>				    <div class="clearfix">					                       <p class="ptext">                      The objective of this position is to lead the team towards bridging the gap of skilled labour and assist the governing board to formulate strategy for enhancement of skills and professionalism in Plumbing Industry.                    </p>                    <h3 style="color: #000;">Key Skills:</h3>                    <ul class="ptext"><li>Liaoning with various state/semi government bodies</li><li>People Management/ Relationship Management</li><li>Persuasive & passionate communicator</li><li>Leveraging technology advancements & leading transformation</li><li> Understanding of Accounting principles and processes</li><li>Understanding of Company law & its application</li>						<li>High ethical standards</li></ul> <h3 style="color: #000;">Experience:</h3>						<p class="ptext">The position requires the person to have technical & Management background with 20 – 25 years of work experience out of which minimum 2 years as CEO/COO having Profit/Loss responsibilities. Exposure in skills development or similar operations will be preferred.</p>						<h3 style="color: #000;">Age:</h3>						<p class="ptext">							As on 30th June 2022 less than 60 Years.						</p>												<h3 style="color: #000;">Key Responsibilities will include:</h3>						 <ul class="ptext">							 <li>Coordinate with the Ministry of Skill Development & Entrepreneurship (MScDE) & National Skills Development Corporation (NSDC) for the effective implementation of the skilling modules</li>							 <li>Get industry stakeholder engagement through signing of MOUs and implementing the same.</li>							 <li>Promote accreditations, examinations and certifications of training courses</li>							 <li>Represent WMPSC in various forums</li>							 <li>Connect with various states/semi government bodies & sign MOUs on skills development</li>							 <li>Excellent pay for an entrepreneurial chief executive who will report to the Chairman/Vice Chairman of the governing council.</li>						</ul>						<h3><span style="color: red;">Location: <span style="color: #000;">Delhi/NCR</span></span><br/><span style="color: red;">How to apply : Applicants must submit a resume to: </span> <span style="color: #000;"><u>hr@ipssc.in</u></span></h3>						<br><h3 style="color: #000;">Last date to apply for the above position is <u>15th May 2022.</u></h3>					</div>					</div>            </div>            </div>		</div>	</section>				<section class="sidebar-page-container welcome-section" style="display:none;">		<div class="auto-container">			<div class="row clearfix">				<div class="content-column col-lg-12 col-md-12 col-sm-12">				<div class="inner-column">                    <h2><span class="theme_color">Opening</span> for the <span class="theme_color">Position of CEO</span></h2>				    <div class="clearfix">					   <p class="ptext">Indian Plumbing Skills Council, A Not For Profit Organization With A New & Innovative Operating Model Is Looking For Young Energetic Person For CEO Position In The Age Group Of 40-45 Years. The Position Requires The Person To Have Technical & Management Background With Approx.15 Years Of Work Experience Out Of Which Minimum 2 Years As President/CEO Having Profit/Loss Responsibilities. Experience In Skills Development Or Similar Operations Will Be Preferred.</p>                       <p class="ptext">                        The Objective Of This Position Is To Lead The Team Towards Bridging The Gap Of Skilled Labour And Assist The Governing Board To Formulate Strategy For Enhancement Of Skills And Professionalism In Plumbing Industry.                    </p>                    <h3 style="color: #000;">Key Responsibilities Will Include:</h3>                    <ul class="ptext"><li>Coordinate with the Ministry of Skill Development &amp; Entrepreneurship  (MScDE) &amp; National Skills Development Corporation (NSDC) for the effective implementation of the skilling modules</li><li>Get industry stakeholder engagement through signing of MOUs and implementing the same.</li><li>Promote accreditations, examinations and certifications of training courses</li><li>Represent WMPSC in various forums</li><li> Connect with various states/semi government bodies &amp; sign MOUs on skills development.</li><li>Excellent pay and equity position for an entrepreneurial chief executive who will report to the Chairman/Vice Chairman of the governing body.</li></ul><h3><span style="color: red;">Location: <span style="color: #000;">Delhi/NCR</span></span><br/><span style="color: red;">Applicants Must Submit A Resume To:</span> <span style="color: #000;">ipschrd@gmail.com</span></h3>					</div>					</div>            </div>            </div>		</div>	</section>  -->    <!--Newsleter Section-->    <?php include "includes/newsletter.php"; ?>    <!--End Newsleter Section-->	<?php include "includes/footer.php"; ?>    <script type="text/javascript">        $(function(){ $('[data-toggle="tooltip"]').tooltip()});        $(".apply").click(function(){            var clid = $(this).attr("data-id");            $("#calendar_id").val(clid);            $("#choice_modal").modal('show');        });        $("#screening").click(function(){            $("#choice_modal").modal('hide');            $("#modal_screening").modal('show');        });        $(document).ready(function(){            $("#slt_tp").attr("disabled","disabled");            $("#txt_cert_no").attr("disabled","disabled");            $("#txt_expire_date").attr("disabled","disabled");            $("#radio-tp").click(function(){                $("#slt_tp").removeAttr("disabled");            });            $("#radio-tpa").click(function(){                $("#slt_tp").attr("disabled","disabled");            });            $("#radio-yes").click(function(){                $("#txt_cert_no").removeAttr("disabled");                $("#txt_expire_date").removeAttr("disabled");            });            $("#radio-no").click(function(){                $("#txt_cert_no").attr("disabled","disabled");                $("#txt_expire_date").attr("disabled","disabled");            });        });    </script></body></html>