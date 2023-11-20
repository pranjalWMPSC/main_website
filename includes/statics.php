

	<div class="row clearfix">

					<!--Column-->


					<?php
						  $qry_sts = "SELECT * FROM statics";
                          $ex_sts = mysqli_query($mysqli,$qry_sts); 
                       	  while($arr_sts = mysqli_fetch_array($ex_sts))
                          {

                          	echo "<div class='column counter-column col-lg-2 col-md-6 col-sm-12' style='border-right: solid 1px #fff;'>

							<div class='inner wow fadeInLeft' data-wow-delay='300ms' data-wow-duration='1500ms'>

								<div class='content'>

									<div class='icon flaticon-startup-1'></div>

									<div class='count-outer count-box alternate'>

										<span class='count-text' data-speed='5000' data-stop='{$arr_sts['statics_number']}'>0</span>+

									</div>

									<h4 class='counter-title'>{$arr_sts['statics_title']}</h4>

								</div>

							</div>

						</div>";
                          }

					?>

					