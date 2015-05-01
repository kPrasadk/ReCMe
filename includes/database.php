<?php
	$con= mysqli_connect("localhost","root","root"); 
	if (!$con) { 
		die('Could not connect to MySQL: ' ); 
	} 
	else
	{
		mysqli_select_db($con,"Book_Recommendation");
	}
?>