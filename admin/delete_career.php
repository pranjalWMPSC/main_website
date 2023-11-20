<?php

session_start();

include "connection/connect.php";



$deleted = $_GET['delid'];



$qryDelete = "DELETE FROM career WHERE career_id='$deleted'"; 



$exeDelete = mysqli_query($mysqli,$qryDelete);



$msg=1;



header('Location:view_career.php?del=msg');





?>



