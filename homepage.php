<?php
	require_once("../includes/database.php");
	function uservalidate($User)
	{
		$sql_query="SELECT *
					FROM User 
					WHERE UserID={$User['userid']},Email={$User['email']}";
		$queryStatus=mysqli_query($con,$sql_query);
		if(mysqli_fetch_array($queryStatus)==false)
		{
			$sql_insert="INSERT INTO User
						 VALUES(1,{$User['userid']},{$User['email']},0) ";
			$queryStatus=mysqli_query($con,$sql_query);
			if($queryStatus==false)
				echo "Some error has occured...\n";
			else
				echo "User inserted successfully....\n";
		}			
	}
?>