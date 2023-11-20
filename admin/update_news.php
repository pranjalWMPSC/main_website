<?php 
session_start();
include "connection/connect.php";
error_reporting(0);

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";

  $id = $_GET['id'];  
  $getdata="select * from news where news_id='".$id."'";
  $exedata = mysqli_query($mysqli,$getdata);
  while($data = mysqli_fetch_array($exedata))
  {
    $news_date = $data['news_date'];
    $news_title = $data['news_title'];
    $news_desc = $data['news_desc'];
    $news_location = $data['news_location'];
  }

  $sh = "select * from news_images where news_id='".$id."'";
  $shexe=mysqli_query($mysqli,$sh); 
  $img="";
  while($data=mysqli_fetch_array($shexe))
  {
  $img .= "<div class='col-sm-3 text-center'><img src='{$data['images']}' width='100%'/>
    <br/><br/>
    <button class='btn btn-danger btn-sm image' data-id='{$data['news_image_id']}'>Delete</button>
    </div>";
  }


  $photos = array();
 if(isset($_POST['submit']))
  {
   $photos = $_FILES['input-b6']['name'];
   if(count(array_filter($photos)) == count($photos)) 
   {
    $images = $_FILES['input-b6'];
    $filenames = $images['name'];
    $txtNoticeDate = empty($_POST['txtNoticeDate']) ? '' : $_POST['txtNoticeDate'];
    $txtNoticeTitle = empty($_POST['txtNoticeTitle']) ? '' : $_POST['txtNoticeTitle'];
    $textAreaDescription = empty($_POST['textAreaDescription']) ? '' : $_POST['textAreaDescription'];
    $txtNewsLocation = empty($_POST['txtNewsLocation']) ? '' : $_POST['txtNewsLocation'];
    $date = date('Y-m-d h:m:s');
    $vaild_types = array("image/jpg", "image/jpeg", "image/bmp", "image/gif","image/png");
    $updatedata = "update news set news_date='".$txtNoticeDate."',news_title='".$txtNoticeTitle."',news_desc='".$textAreaDescription."',news_location='".$txtNewsLocation."',post_date='".$date."' where news_id=$id";
    $exe = mysqli_query($mysqli,$updatedata);
  
    // loop and process files
    for($i=0; $i < count($filenames); $i++){

      if(!in_array($_FILES['input-b6']['type'][$i], $vaild_types)) 
          {
               $sucessMsg = "<div class='alert alert-danger' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>×</span>
                    </button>
                    <strong class='d-block d-sm-inline-block-force'>File Type Not valid!
                  </div>";
          }
          else
          {
            $ext = explode('.', basename($filenames[$i]));
            $target = "uploads/news/" . DIRECTORY_SEPARATOR . md5(mt_rand()) . "." . array_pop($ext);
        if(move_uploaded_file($images['tmp_name'][$i], $target)) {
          $success = true;
          $paths[] = $target;
          $sql="INSERT INTO news_images(news_id,images) VALUES ('".$id."','".$paths[$i]."')";
          $execute = mysqli_query($mysqli,$sql);
          $sucessMsg = "<div class='alert alert-success' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>×</span>
                </button>
                <strong class='d-block d-sm-inline-block-force'>Well done!</strong> Photos upload successfully!.
              </div>";
                  header('Location:update_news.php?id='.$id);
        } else {
          $sucessMsg = "<div class='alert alert-warning' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>×</span>
                </button>
                <strong class='d-block d-sm-inline-block-force'>Well done!</strong> Error while upload photos.
              </div>";
           
          }
        }

    
    }
    


   } 
   else 
   {
    
    $txtNoticeDate = empty($_POST['txtNoticeDate']) ? '' : $_POST['txtNoticeDate'];
    $txtNoticeTitle = empty($_POST['txtNoticeTitle']) ? '' : $_POST['txtNoticeTitle'];
    $textAreaDescription = empty($_POST['textAreaDescription']) ? '' : $_POST['textAreaDescription'];
    $txtNewsLocation = empty($_POST['txtNewsLocation']) ? '' : $_POST['txtNewsLocation'];
    $date = date('Y-m-d h:m:s');
    
    $updatedata = "update news set news_date='".$txtNoticeDate."',news_title='".$txtNoticeTitle."',news_desc='".$textAreaDescription."',news_location='".$txtNewsLocation."',post_date='".$date."' where news_id=$id";
    $exe = mysqli_query($mysqli,$updatedata);
    header('Location:update_news.php?id='.$id);
    $sucessMsg = "<div class='alert alert-success' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>×</span>
            </button>
            <strong class='d-block d-sm-inline-block-force'>Well done!</strong> Data upload successfully!.
          </div>";
   }

  }
  
if(isset($_REQUEST['get'])){
    switch($_REQUEST['get']){
    case 'deleteImage':
      $Id = $_POST['ID'];
      
      $find = "select * from news_images where news_image_id='".$Id."'";
      $exfind = mysqli_query($mysqli,$find);
      $image=mysqli_fetch_array($exfind);
      unlink($image['images']);
      
      $sql="DELETE FROM news_images WHERE news_image_id='".$Id."'";
      $exe = mysqli_query($mysqli,$sql);
      if (mysqli_affected_rows($mysqli) > 0) {
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
  <link rel="stylesheet" href="css/froala_editor.css">
  <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">  
  <!-- Dropzone.js -->
  

  <link href="vendors/fileinput.min.css" rel="stylesheet" type="text/css">

  
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

             
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Update News <small>Add News in IPSC Website</small></h2>
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

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">News Title: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                  <input type="text" name="txtNoticeTitle" class="form-control required" value="<?php echo $news_title; ?>">
                </div>
              </div><!-- col-4 -->


			       <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">News Date: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                      <div class="input-group date" id="myDatepicker1">
                            <input type="text" name="txtNoticeDate" id="txtNoticeDate" class="form-control" readonly="readonly" value="<?php echo $news_date; ?>">
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                </div>
              </div>
	
              <div class="col-lg-3">
                <div class="form-group">
                  <label class="form-control-label">News Location: <span class="tx-danger" style="font-size: 11px; color: red;">*</span></label>
                  <input type="text" name="txtNewsLocation" class="form-control required" value="<?php echo $news_location; ?>">
                </div>
              </div><!-- col-4 -->

              

             <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">News Description: <span class="tx-danger" style="font-size: 11px; color: red;">* </span></label>
                  <textarea name="textAreaDescription" id="jobdescription" class="form-control required large">
                    <?php echo $news_desc; ?>
                  </textarea>
                </div>
              </div><!-- col-4 -->

               <div class="col-lg-12">
                  <?php echo $img; ?>
               </div>


              <div class="col-sm-12">
                <div class="file-loading"> 
                        <input id="input-b6" name="input-b6[]" value="0" type="file" multiple data-browse-on-zone-click="true">
                    </div>
                   
                  <!-- <form action="form_upload.html" class="dropzone"></form> -->
              </div>


			       <div class="col-lg-4" style="margin-top: 28px;">
                <div class="form-group">
                  
                  <button class="btn btn-primary" name="submit" >Update News</button>
                </div>
              </div><!-- col-4 -->
			  
            </div><!-- row -->

           
          </div><!-- form-layout -->
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

      
      <!-- Dropzone.js -->
      <script src="vendors/fileinput.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>
      <script type="text/javascript" src="js/froala_editor.min.js"></script>
      <script>
        (function () {
          const editorInstance = new FroalaEditor('#jobarea, #jobdescription', {
            enter: FroalaEditor.ENTER_P,
            placeholderText: null,
            events: {
             
            }
          })
        })()
      </script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
      $('#myDatepicker1,#myDatepicker2').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true,
        format: 'YYYY-MM-DD'
    });
    </script>

     <script>
      $(document).on('ready', function() {
          $("#input-b6").fileinput({
              showUpload: true,
              maxFileCount: 10,
              uploadUrl: "&nbsp;",
              allowedFileExtensions: ["jpg", "png", "gif"],
              mainClass: "input-group-lg",
          });
      });

$(document).on('click',".image",function () {
  if(confirm("Are you sure you want to delete this?")){
      var ID = $(this).attr("data-id");
      $.post('update_news.php',{get:"deleteImage",ID:ID},function(data){
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