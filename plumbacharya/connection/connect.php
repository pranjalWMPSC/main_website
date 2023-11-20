<?php

	$dbname = "wmpsc_admin";
	$dbuser = "wmpsc_admin";
	$dbpass = "?16Onbk9";
	$dbhost = "localhost";

	$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

	// Check connection
	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}

	date_default_timezone_set("Asia/Kolkata");


?>

