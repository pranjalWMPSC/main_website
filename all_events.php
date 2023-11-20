<?php
include "admin/connection/connect.php";
$GetRows="select * from event order by event_id desc";
$exe=mysqli_query($mysqli,$GetRows); $firstNews="";
while($data = mysqli_fetch_array($exe))
{
  $newsDate = $data['event_date'];
  $newsid = $data['event_id'];
  $firstNews .= "<div class='content-side col-lg-6 col-md-6 col-sm-6'><div class='news-block-four'>
						<div class='inner-box'>
							
							<div class='lower-content'>
								<div class='content'>
									<div class='date-outer'>
										<div class='date'>".date("d", strtotime($newsDate))."</div>
										<div class='month'>".date("M", strtotime($newsDate))."</div>
									</div>
									<h3><a href='events_detail.php?event_id=$newsid' >".substr($data['event_title'], 0,32)."..</a></h3>
									<ul class='post-meta'>
										<li><a href='#'><span class='icon fa fa-calendar'></span>".date("d-M-Y", strtotime($newsDate))."</a></li>
                    <li><a href='#'><span class='icon fa fa-map-marker'></span>{$data['event_location']}</a></li>
									</ul>
									<div class='text'>".substr($data['event_desc'], 0,200)."</div>
								</div>
							</div>
						</div>
					</div></div>";
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
    <section class="page-title" style="background-image:url(images/background/banner_image.jpg);">
    	<div class="auto-container">
        	<div class="row clearfix">
            	<!--Title -->
            	<div class="title-column col-lg-6 col-md-12 col-sm-12">
                	<h1>All News</h1>
                </div>
                <!--Bread Crumb -->
                <div class="breadcrumb-column col-lg-6 col-md-12 col-sm-12">
                    <ul class="bread-crumb clearfix">
                        <li><a href="index.php"><span class="icon fas fa-home"></span> Home</a></li>
                        <li class="active"><span class="icon fas fa-arrow-alt-circle-right"></span> Latest News</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Page Title-->
	
	<!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
                <!--Content Side-->
				<!-- News Block Four -->
					<?php echo $firstNews; ?>
				<!--Sidebar Side-->
			</div>
		</div>
	</div>
	
	 <!--Newsleter Section-->
    <?php include "includes/newsletter.php"; ?>
    <!--End Newsleter Section-->
	
	<!--Main Footer-->
  <?php include "includes/footer.php"; ?>

  <style type="text/css">
  	.news-block-four .inner-box {padding-bottom: 0px;}
  	.news-block-four .inner-box .lower-content {position: relative; padding: 0px 0px 0px;}
  	.news-block-four .inner-box .lower-content h3{font-size: 22px; color: #5a5959 !important;}
  </style>

</body>
</html>