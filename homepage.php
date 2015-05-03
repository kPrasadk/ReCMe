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
			$sql_num="SELECT *
				       FROM User";
			$numrows=mysqli_num_rows(mysqli_query($con,$sql_num))+1;
			$sql_insert="INSERT INTO User
						 VALUES($numrows,{$User['userid']},{$User['email']},0) ";
			$queryStatus=mysqli_query($con,$sql_query);
			if($queryStatus==false)
				echo "Some error has occured...\n";
			else
				echo "User inserted successfully....\n";
		}
		else
		{
			$var=mysqli_fetch_row($queryStatus);
			if($var[3]==1)
			{
				//todo
			}	

		}			
	}
?>