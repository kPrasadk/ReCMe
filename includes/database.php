<?php
	require_once("credentials.php");
	$con= mysqli_connect($db_serv,$db_user,$db_pass); 
	if (!$con) { 
		die('Could not connect to MySQL: ' ); 
	} 
	else
	{
		mysqli_select_db($con,$db_name);
	}
?>