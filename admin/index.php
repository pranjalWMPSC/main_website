<?php
ob_start();

include "connection/connect.php";
include "class/class.login.php";
session_start();

$msg="";
if(isset($_POST['login']))
{
  $resultLogin = login::adminlogin($_POST['username'],$_POST['password']);
  if($resultLogin['status'] == 1)
  {
    $_SESSION['admin_id'] = $resultLogin['admin_id'];
    $_SESSION['admin_name'] = $resultLogin['admin_name'];
    header('Location:dashboard.php');
  }
  else
  {
	  $msg="Wrong Credentials!! Contact Your Administrator";
  }
}
    


?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IPSSC Admin Login</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body style="background-image: url('images/Background.jpg');">
    <div>
      
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post">
             <img src="images/logo.png" class="img-responsive">
			        <br>
			         <p class="errorp"><?php echo $msg;?> 
               <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <input type="submit" name='login' value="Login" class="btn btn-danger submit" style="margin-left: 0px;">
              </div>
            </form>
          </section>
		  		 
        </div>
      </div>
	    <div class="footer_text">
                  <p> Designed and Developed by <br><a href="https://ebiztechnocrats.com" target="_blank" style="color:red;"> e-Biz Technocrats Pvt.Ltd </a> © <script>document.write(new Date().getFullYear())</script> All Rights Reserved.</p>
        </div>
    </div>
  </body>
</html>
