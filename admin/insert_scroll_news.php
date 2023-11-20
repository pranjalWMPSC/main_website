<?php 
session_start();
include "connection/connect.php";
$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";
if(isset($_POST['submit']))
{

          if($_FILES['imagefile']['name'] !='')
          {
              $date_current = date("Y-m-d");
              $current_image = $_FILES['imagefile']['name'];
              $imageFileType = strtolower(pathinfo($current_image,PATHINFO_EXTENSION));   
              $extension = substr(strrchr($current_image, '.'), 1);
              $time = date("pYhis");
              $new_image = $time . "." . $extension;
              $destination="uploads/scroll/".$new_image;  
              if($action = move_uploaded_file($_FILES['imagefile']['tmp_name'], $destination))
              {
                $sqlPhotoTitle = "insert into scroll_news (title,attachment_path,post_date) values('".$_POST['txtPhotoTitle']."','".$new_image."','$date_current')";         
                $res = mysqli_query($mysqli,$sqlPhotoTitle) or die(mysqli_error($mysqli));
                $successMessage="1";
                header("Location:insert_scroll_news.php?ins={$successMessage}"); // redirent after updating   
              }      
          }
          else
          {
                $date_current = date("Y-m-d");
                $sqlPhotoTitle = "insert into scroll_news (title,post_date) values('".$_POST['txtPhotoTitle']."','$date_current')";         
                $res = mysqli_query($mysqli,$sqlPhotoTitle) or die(mysqli_error($mysqli));
                $successMessage="1";
                header("Location:insert_scroll_news.php?ins={$successMessage}"); // redirent after updating  
          }
                
}


$sql = "SELECT * FROM scroll_news order by scroll_news_id  DESC";
$exe = mysqli_query($mysqli,$sql); $list=""; $i=1;
while($arr = mysqli_fetch_array($exe))
{
    $list .="<tr><td>$i</td><td>{$arr['title']}</td><td><a href='uploads/scroll/{$arr['attachment_path']}'>Download</a></td><td>{$arr['post_date']}</td><td><a class='btn btn-danger delete btn-xs' data-id='{$arr['scroll_news_id']}'><i class='fa fa-trash'></i> Delete</a> </td></tr>";
    $i++;
}



if(isset($_REQUEST['get'])){

    switch($_REQUEST['get']){

      case 'deleteRow':

        $Id = $_POST['id'];

        $sql="DELETE FROM scroll_news WHERE scroll_news_id='".$Id."'";

        $exe = mysqli_query($mysqli,$sql);

        if(mysqli_affected_rows($mysqli) > 0) 

        {

          echo "You have successfully Delete your data.";

        }



      die;

      break;



    }

  }



















if($adminRole !=""){

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



        <!-- page content -->

        <div class="right_col" role="main">

          <div class="">



            <div class="page-title">



              <div class="title_left">

                

              </div>

            </div>

            <div class="clearfix"></div>



             <?php if(isset($sucessMsg)) {echo $sucessMsg;}?>



              <?php



              		

              		if(isset($_GET['upd']))

              		{

              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>

                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>

                                  </button>

                                  <strong>Photo Album has been Updated successfully</strong>

                                </div>";

              		}

              		

              		

              		

              		if(isset($_GET['ins']))

              		{

              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>

                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>

                                  </button>

                                  <strong>News inserted Successfully</strong>

                                </div>";

              		}

              	  if(isset($_GET['del']))

              	  {

              		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>

                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>

                                  </button>

                                  <strong>Banner has been Deleted Successfully</strong>

                                </div>";

                    }

              		

              		

                   	

              	

              ?>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">



                  <div class="x_title">

                    <h2>Insert Scroll News<small></small></h2>

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

             <div class="col-lg-6">

                  <label class="form-control-label">Title: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>

                  <input type="text" name="txtPhotoTitle" class="form-control" required="">

              </div>

	
              <div class="col-lg-6">

                <div class="form-group">

                  <label class="form-control-label">Attachment - only pdf (if any): </label>

                  <input type="file" class="form-control required large" name="imagefile" id="imagefile" >

                </div>

              </div><!-- col-4 -->

			       <div class="col-lg-12" style="margin-top: 0px;">

                <div class="form-group">

                  <button class="btn btn-primary" name="submit" >Submit</button>

                </div>

              </div><!-- col-4 -->

			  

            </div><!-- row -->



           

          </div><!-- form-layout -->

		  </form>







                  </div>

                </div>

              </div>

            </div>

			


             <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">



                  <div class="x_title">

                    <h2>View Scroll News<small></small></h2>

                    <ul class="nav navbar-right panel_toolbox">

                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

                      </li>

                     

                      <li><a class="close-link"><i class="fa fa-close"></i></a>

                      </li>

                    </ul>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                     <table class="table table-bodered">
                      <thead>
                        <th>Sr.</th>
                        <th>Title</th>
                        <th>Attachment</th>
                        <th>Date</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php
                        echo $list;
                        ?>
                      </tbody>
                    </table>


                  </div>

                </div>

              </div>

            </div>
			
           
		

		

			

          </div>

        </div>

        <!-- /page content -->

		

	

      <!-- footer content -->

      <?php include("include/footer.php");?>



      <script type="text/javascript">

         $(".delete").click(function(){

            if(confirm("Are you sure you want to delete this?")){

             var id = $(this).attr("data-id"); 

            $.post('insert_scroll_news.php',{get:"deleteRow",id:id},function(data){

              alert(data);

              window.location.reload();

            });

          }

          else{
              return false;
          }

          });
      </script>
   

      </div>

    </div>

  </body>

</html>

<?php }else{ header('Location:index.php');}?>