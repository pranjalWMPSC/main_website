<?php 
session_start();
include "connection/connect.php";
$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";


if(isset($_POST['submit'])){

    $current_date = date("Y-m-d h:i:s");
    $txttitle = count($_POST["txttitle"]);
    for($i=0;$i<$txttitle;$i++) 
    {
     
      $sql = "INSERT video_gallery(video_gallery_title,video_gallery_link,post_date)VALUES('".$_POST['txttitle'][$i]."','".$_POST['txtlink'][$i]."','".$current_date."')";
      $exe = mysqli_query($mysqli,$sql);
     
    }
    
    header("Location:insert_videogallery.php?upd=1"); // redirent after updating
  }






if($adminRole !=""){
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("include/header.php");?>
  <link rel="stylesheet" href="css/froala_editor.css">
  
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
                                  <strong>Video Link has been Updated successfully</strong>
                                </div>";
              		}
              		
              		
              		
              		if(isset($_GET['ins']))
              		{
              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>Video Link has been inserted Successfully</strong>
                                </div>";
              		}
              	  
              	  if(isset($_GET['npdel']))
              	  {
              		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>It can't be deleted.This Product is linked.</strong>
                                </div>";
                    }
              	  
              	  if(isset($_GET['del']))
              	  {
              		echo " <div class='alert alert-danger alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>Video Link has been Deleted Successfully</strong>
                                </div>";
                    }
              		
              		
                   	
              	
              ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Insert Video Album <small></small></h2>
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
                   <div class="row mg-b-25" id="addSubjects">
                   <div class="col-lg-5">
                        <label class="form-control-label">Video Title: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                        <input type="text" name="txttitle[]" class="form-control" required="">
                    </div>
      	

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label">Youtube Link: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                        <input type="text" class="form-control required large" name="txtlink[]" id="link" required="" placeholder="http://youtube.com">
                      </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-1" style="padding-top: 25px;">
                      <a id="addButton" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                  </div> 

                  <div class="row">
                     <div class="col-lg-12" style="margin-top: 0px;">
                      <div class="form-group">
                        <button class="btn btn-primary" name="submit">Submit</button>
                      </div>
                    </div>
                  </div>

                </div>
		          </form>



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
 



  $(document).on('click',"#addButton",function () { 
    var counter = parseInt($("#counter").val());
  
    if(counter  ==  10){
        alert("Only 10 textboxes allow");
          return false;
    }   
    counter = counter + 1;
    $("#counter").val(counter); 
    var str = '<div class="" style="margin-top:20px; margin-bottom:20px;">';
      
      str += '<div class="col-sm-5"><input type="text" name="txttitle[]" class="form-control" data-rule-required="true" ></div>';
      str += '<div class="col-sm-6"><input type="text" name="txtlink[]" class="form-control" data-rule-required="true" ></div>';
      str += '<div class="col-sm-1"><input type="button" value="+" id="addButton" class="btn btn-primary btn-sm"><input type="button" value="-" id="removeButton" class="btn btn-danger btn-sm"></div>';
      str += '</div>';
    $("#addSubjects").append(str);  
    });
 
    $(document).on('click',"#removeButton",function () {
    $(this).parent().parent().remove();
    var counter = parseInt($("#counter").val());
    counter = counter - 1;
    $("#counter").val(counter);
    });
</script>
  
   
      </div>
    </div>
  </body>
</html>
<?php }else{ header('Location:index.php');}?>