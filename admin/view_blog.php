<?php 
session_start();
include "connection/connect.php";

$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";

$viewSecQry = "SELECT * FROM blogs ORDER by blog_id DESC";  
$exeSecQry = mysqli_query($mysqli,$viewSecQry);

 $table=""; $count=0;
   while($row = mysqli_fetch_array($exeSecQry)) 
   {
	   $count+=1;
	   $blog_id= $row['blog_id'];
	   $blog_title= $row['blog_title'];
	   $blog_description= $row['blog_description'];
	   $blog_image= $row['blog_image'];
	   $uploaded_date = $row['post_date'];
	   $newDate = date("d-m-Y",strtotime($uploaded_date));
	   $table.="<tr>
                  <td>$count </td>
                  <td>$blog_title</td>
                  <td>$blog_description</td>
				          <td><img src='uploads/blogs/$blog_image' width='80px;'></td>
                  <td>$newDate</td>
                  <td><a class='btn btn-info' href='update_blog.php?updid=$blog_id'><i class='fa fa-pencil'></i> Update</a> 
				           <a class='btn btn-danger delete' data-id='$blog_id'><i class='fa fa-trash'></i> Delete</a></td>
              </tr>";
	}


  //Delete
if(isset($_REQUEST['get'])){
    switch($_REQUEST['get']){
      case 'deleteRow':
        $Id = $_POST['ID'];
        $sql="DELETE FROM blogs WHERE blog_id='".$Id."'";
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
              <?php

              		
              		if(isset($_GET['upd']))
              		{
              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>Banner has been Updated successfully</strong>
                                </div>";
              		}
              		
              		
              		
              		if(isset($_GET['ins']))
              		{
              			echo " <div class='alert alert-success alert-dismissible fade in' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                  </button>
                                  <strong>Banner has been inserted Successfully</strong>
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
                                  <strong>Banner has been Deleted Successfully</strong>
                                </div>";
                    }
              		
              		
                   	
              	
              ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>View Blogs <small>View Front Page Blogs Images</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 
                  <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped jambo_table bulk_action table-bordered">
                      <thead>
                        <tr>
                        <th>Sr.</th>
                        <th>Blog Title</th>
                        <th>Blog Description</th>
                        <th>Blog Image</th>
                        <th>Date</th>
                        <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php echo $table;?>
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
        <!-- /footer content -->
      </div>
    </div>
	
  <script type="text/javascript">
    $(".delete").click(function(){
    if(confirm("Are you sure you want to delete this?")){
      var ID = $(this).attr("data-id");
      $.post('view_blog.php',{get:"deleteRow",ID:ID},function(data){
        alert(data);
        window.location.reload();
      });
    }
    else{
        return false;
    }
  });
  </script>
  </body>
</html>
<?php }else{ header('Location:index.php');}?>