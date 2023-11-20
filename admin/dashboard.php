<?php   
session_start();
include "connection/connect.php";



$adminRole = isset($_SESSION['admin_name'])?$_SESSION['admin_name']:"";





  if($adminRole !=""){

?>

<html lang="en">

  <head>

<?php include("include/header.php");?>

	 <title>Dashboard | IPSSC Admin</title>

  </head>



  <body class="nav-md">

    <div class="container body">

      <div class="main_container">

        

	<?php include("include/left-menu.php");?>



        <!-- top navigation -->

        

	<?php include("include/top_nav.php");?>	

        <!-- /top navigation -->



        <!-- page content -->

        <div class="right_col" role="main">

          <!-- top tiles -->

        

        </div>

        <!-- /page content -->



        <!-- footer content -->

      <?php include("include/footer.php");?>

        <!-- /footer content -->

      </div>

    </div>



  </body>

</html>

<?php }else{ header('Location:index.php');}?>