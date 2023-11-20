.<?php
session_start();
include "connection/connect.php";

if(isset($_SESSION['admin_name'])){
//$id=$_SESSION['admin_id'];
$username=$_SESSION['admin_name'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}


if(isset($_POST['submit'])){
	
	
	$first_line=$_POST['first_line'];
	$second_line=$_POST['second_line'];

		 $current_image=$_FILES['banner_pic']['name'];
		 
		 $imageFileType = strtolower(pathinfo($current_image,PATHINFO_EXTENSION));
		 
		 $extension = substr(strrchr($current_image, '.'), 1);
		 $time = date("pYhis");
		 $new_image = $time . "." . $extension;
		 $destination="uploads/banner/".$new_image;
		 
		 if($imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png")
		 {
			 
		echo '<script language="javascript">';
        echo 'alert("Check the File Type Before Uploading.");
			 location.href="add_banner.php"';
        echo '</script>';
			 
		 }
		 
		 else
		 {
			  $action = move_uploaded_file($_FILES['banner_pic']['tmp_name'], $destination);
		 $date_current   = date("d-m-Y");
		
		
		 $sql= "INSERT INTO banner(banner_photo,first_line,second_line,uploaded_date,banner_status) VALUES ('".$new_image."','$first_line','$second_line',now(),0)";
				
				$res=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
		header("location:view_banner.php?ins=msg");
		
		 }
		 
		

}

?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themepixels.me/bracket/app/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jan 2018 06:07:23 GMT -->
<?php include("include/header.php");?>

  <body>

     <!-- ########## START: LEFT PANEL ########## -->
   
    <?php include("includes/menu.php");?>
	
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href="#"><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href="#"><i class="icon ion-navicon-round"></i></a></div>
       
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down">Admin</span>
              <img src="img/img1.jpg" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="logout.php"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        
      </div><!-- br-pageheader -->
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Add Banner</h6>
		  
		  <form id="basicForm" class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="form-layout form-layout-1">
            <div class="row mg-b-25">
			<div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">First Line:</label>
                  <input class="form-control" type="text" name="first_line" placeholder="First Line">
                </div>
              </div>
			  <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Second Line:</label>
                  <input class="form-control" type="text" name="second_line" placeholder="Second Line">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Banner Photo: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="banner_pic" placeholder="Banner Photo" required>
                </div>
              </div><!-- col-4 -->
			 <div class="col-lg-4" style="margin-top: 28px;">
                <div class="form-group">
                  <button class="btn btn-primary" name="submit">Add Banner</button>
                </div>
              </div><!-- col-4 -->
			  
            </div><!-- row -->

           
          </div><!-- form-layout -->
		  </form>
		  
		  
        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
      <footer class="br-footer">
        <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; 2017. Alfanzo.All Rights Reserved.</div>
          <div>Attentively and carefully made by e-Biz Technocrats Pvt. Ltd..</div>
        </div>
        
      </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/moment/moment.js"></script>
    <script src="lib/jquery-ui/jquery-ui.js"></script>
    <script src="lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="lib/peity/jquery.peity.js"></script>
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>

    <script src="js/bracket.js"></script>
    <script>
      $(function(){
        'use strict'

        $('.form-layout .form-control').on('focusin', function(){
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('.form-layout .form-control').on('focusout', function(){
          $(this).closest('.form-group').removeClass('form-group-active');
        });

        // Select2
        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });

        $('#select2-a').on('select2:opening', function (e) {
          $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#select2-a').on('select2:closing', function (e) {
          $(this).closest('.form-group').removeClass('form-group-active');
        });

      });
    </script>
  </body>

<!-- Mirrored from themepixels.me/bracket/app/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jan 2018 06:07:23 GMT -->
</html>
