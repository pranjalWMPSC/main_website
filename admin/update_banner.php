<?php
session_start();
include "connection/connect.php";
if(isset($_SESSION['admin_name'])){

//$id=$_SESSION['admin_id'];

$username=$_SESSION['admin_name'];

}else{

header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");

exit();

}



$id=$_GET['updid'];



$sqlsel="select * from banner where banner_id=$id";

$exesel=mysqli_query($mysqli,$sqlsel);

$arrsel=mysqli_fetch_array($exesel);

$banner_photo=$arrsel['banner_photo'];

$first_line=$arrsel['first_line'];

$second_line=$arrsel['second_line'];







if(isset($_POST['submit'])){

	

	$xfl=$_POST['first_line'];

	$ysl=$_POST['second_line'];



		 $current_image=$_FILES['banner_pic']['name'];

		 $imageFileType = strtolower(pathinfo($current_image,PATHINFO_EXTENSION));

		 $extension = substr(strrchr($current_image, '.'), 1);

		 $time = date("pYhis");

		 $new_image = $time . "." . $extension;

		 $destination="uploads/banner/".$new_image;

		 

		

		 

		

		 

		if($current_image!="") 

		{

			

		 if($imageFileType != "jpeg" && $imageFileType != "jpg" && $imageFileType != "png")

		 {

			 

		    echo '<script language="javascript">';

        echo 'alert("Check the File Type Before Uploading."); location.href="insert_banner.php"';

        echo '</script>';

		 }

		 

		 else

		 {

			 

			  $action = move_uploaded_file($_FILES['banner_pic']['tmp_name'], $destination);

		    $date_current   = date("d-m-Y");

			 

			 $sql= "update banner set first_line='$xfl',second_line='$ysl',banner_photo='".$new_image."' where banner_id=$id";

				

		    $res=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

		    header("location:view_banner.php?upd=msg");

			 

		 }

			

			

		

		}

		

		else

		{

		$sql= "update banner set first_line='$xfl',second_line='$ysl' where banner_id=$id";

		$res=mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));

		header("location:view_banner.php?upd=msg");

		}

		

		

	



}



?>

<!DOCTYPE html>

<html lang="en">

  

 <head>

  

  <?php include("include/header.php");?>

  

  </head>



   <body class="nav-md">

    <div class="container body">

      <div class="main_container">

    

        <?php include("include/left-menu.php");?>



        <!-- top navigation -->

        

        <?php include("include/top_nav.php");?> 

        <div class="right_col" role="main">

          <div class="">

            <div class="page-title">

              <div class="title_left">

                

              </div>

            </div>

            <div class="clearfix"></div>





            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">



                  <div class="x_title">

                    <h2>Update Banner <small>Update Front Page Banner Images</small></h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                     

                      <li><a class="close-link"><i class="fa fa-close"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                 

                  <div class="x_content">

                    <form id="basicForm" class="form-horizontal" method="post" enctype="multipart/form-data">

                      <div class="form-layout form-layout-1">

                        <div class="row mg-b-25">

                  <div class="col-lg-4">

                            <div class="form-group">

                              <label class="form-control-label">First Line:</label>

                              <input class="form-control" type="text" name="first_line" placeholder="First Line" value="<?php echo $first_line;?>">

                            </div>

                          </div>

                    <div class="col-lg-8">

                            <div class="form-group">

                              <label class="form-control-label">Second Line:</label>

                              <input class="form-control" type="text" name="second_line" placeholder="Second Line" value="<?php echo $second_line;?>">

                            </div>

                          </div>

                         

                          <div class="col-lg-12" style="margin-top: 10px;">

                            <div class="form-group">

                               <input class="form-control" type="file" name="banner_pic" placeholder="Banner Photo">

                               <br/>

                              <img src="uploads/banner/<?php echo $banner_photo;?>" width="100%" height="400">

                            </div>

                          </div><!-- col-4 -->

                        </div><!-- row -->



                        <div class="row">



                            <div class="col-lg-4" style="margin-top: 20px;">

                            <div class="form-group">

                              <button class="btn btn-primary" name="submit">Update Banner</button>

                            </div>

                          </div><!-- col-4 -->

                        </div>



                       

                      </div><!-- form-layout -->

                  </form>

                  </div>

                </div>

              </div>

            </div>



          </div>



   

      </div>

    </div>

      

<?php include("include/footer.php");?>



</div>

</div>

  </body>





</html>

