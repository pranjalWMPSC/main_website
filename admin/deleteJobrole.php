<?php
ob_start();
session_start();
include "connection/connect.php";
$deleted = $_GET['delid'];

$qryDelete = "DELETE FROM jobrole WHERE jobrole_id='$deleted'"; 
$exeDelete = mysqli_query($mysqli,$qryDelete);
$msg=1;
header('Location:insert_jobrole.php?del=msg');
?>



