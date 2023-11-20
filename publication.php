<?php

include "admin/connection/connect.php";
    $sqlQry = "Select * from event";             
    $result = mysqli_query($mysqli,$sqlQry);
        
    $string=""; 
    $title="";
    while($row = mysqli_fetch_array($result))
    {
        $title = $row['event_title'];
        $date = $row['event_date'];
        $newDate = date("Y-m-d", strtotime($date));
        
        $sqldatQry = "SELECT COUNT(event_id) as cnt FROM event where event_date LIKE '%$newDate%'";

        $resultdat = mysqli_query($mysqli,$sqldatQry);
        $arrdat=mysqli_fetch_array($resultdat);
        
        $cntr=$arrdat['cnt'];
        
        //$x=$newDate;
        
         $string.="'$newDate':{'title':'$title','number':'$cntr','url':'','date':'$date'},";
    }


?>

<!DOCTYPE html>


<html>


<head>


 <?php include "includes/header.php"; ?>
  
  <style type="text/css">
      .modal-dialog {
  padding-top:20%;
}

.modal-content {
  height: 100% !important;
  overflow:visible;
}

.modal-body {
  height: 80%;
  overflow: auto;
}
  </style>

  <link href="csse/responsive-calendar.css" rel="stylesheet">

</head>





<body class="hidden-bar-wrapper">





<div class="page-wrapper">


 	


    <!-- Preloader -->


    <div class="preloader"></div>


 	


 	<!-- Main Header-->


    <?php include "includes/menu.php"; ?>


    <!--End Main Header -->


	


	<!--Page Title-->


    <section class="page-title" style="background-image:url(images/background/12.jpg);">


    	<div class="auto-container">


        	<div class="row clearfix">


            	<!--Title -->


            	<div class="title-column col-lg-6 col-md-12 col-sm-12">


                	<h1>Publications</h1>


                </div>


                <!--Bread Crumb -->


                <div class="breadcrumb-column col-lg-6 col-md-12 col-sm-12">


                    <ul class="bread-crumb clearfix">


                        <li><a href="index.php"><span class="icon fas fa-home"></span> Home</a></li>

                        <li><a href="#"><span class="icon fas fa-home"></span> Information</a></li>

                        <li class="active"><span class="icon fas fa-arrow-alt-circle-right"></span>Publications</li>


                    </ul>


                </div>


            </div>


        </div>


    </section>


    <!--End Page Title-->


	


	<!-- Welcome Section -->


	<section class="welcome-section">




			

	<section class="goal-section">

        <div class="auto-container">

            <!-- Sec Title -->

            <div class="sec-title centered">

                <h2><span class="theme_color">Publications</span></h2>
                <br/>

            </div>


                               <div class="row clearfix text-center">
                           <iframe src="pdf/NCVET.pdf" width="100%" height="750px">
                              </iframe>


            </div>



    

        </div>

    </section>

				

<!-- Modal -->

<!-- Modal -->




	</section>


    <!--Newsleter Section-->


    <?php include "includes/newsletter.php"; ?>

	<?php include "includes/footer.php"; ?>

<script src="jse/responsive-calendar.js"></script>
     <script type="text/javascript">
      $(document).ready(function () {
      
    
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        
        if(dd<10) {
            dd = '0'+dd
        } 

        if(mm<10) {
            mm = '0'+mm
        } 

        today = yyyy + '-' + mm + '-' + dd;
        //alert(today);
    function addLeadingZero(num) {
        if (num < 10) {
          return "0" + num;
        } else {
          return "" + num;
        }
      }


    $(".responsive-calendar").responsiveCalendar
        ({
        time: today,
        events: {<?php echo $string; ?>},
        onDayClick: function(events) {
                
          var thisDayEvent, key;
          key = $(this).data('year')+'-'+addLeadingZero( $(this).data('month') )+'-'+addLeadingZero( $(this).data('day') );
          thisDayEvent = events[key];
          //alert(thisDayEvent.title);
          $("#title").html(thisDayEvent.title);
          $("#date").html(thisDayEvent.date);
          $("#basicExampleModal").modal('show');

        }



    
 });

        });
    </script>


</body>


</html>