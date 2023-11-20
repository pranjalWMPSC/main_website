<?php
	$dbname = "wmpsc_admin";
	$dbuser = "i9650346_wp1";
	$dbpass = "F3_ab&,Ri7}J";
	$dbhost = "localhost:3306";

	$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

	// Check connection
	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}
	date_default_timezone_set("Asia/Kolkata");
?>

