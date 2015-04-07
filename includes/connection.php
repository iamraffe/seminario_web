<?php
require("constants.php");

	$connection = mysqli_connect(DBHOST, DBUSER, DBPASS);
	if(!$connection){
		die("Database connection failed:  " . mysqli_error($connection));
	}
	
	$db_select = mysqli_select_db($connection, DBNAME);
	if(!$db_select){
		die("Database connection failed:  " . mysqli_error($connection));
	}
	mysqli_set_charset($connection,'utf8');
?>