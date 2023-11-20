<?php
ob_start();
session_start();
include "connection/connect.php";
$deleted = $_GET['delid'];



$qryDelete = "UPDATE banner SET banner_status='1',uploaded_date=now() WHERE banner_id='$deleted'"; 



$exeDelete = mysqli_query($mysqli,$qryDelete);



$msg=1;



header('Location:insert_banner.php?del=msg');





?>



