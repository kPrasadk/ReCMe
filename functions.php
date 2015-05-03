<?php
	function userIsAdmin($User)
	{
		return false;
		require_once "includes/database.php";
		$User['user_id']=htmlspecialchars($User['user_id']);
		$User['email']=htmlspecialchars($User['email']);
		$sql_query="SELECT *
					FROM User 
					WHERE UserID={$User['user_id']}";
		$queryStatus=mysqli_query($con,$sql_query);
		echo $sql_query	;
		echo $db_serv;
		if(mysqli_fetch_array($queryStatus)==false)
		{
			$sql_num="SELECT *
				       FROM User";
			$numrows=mysqli_num_rows(mysqli_query($con,$sql_num))+1;
			$sql_insert="INSERT INTO User
						 VALUES($numrows,{$User['user_id']},{$User['email']},0) ";
			$queryStatus=mysqli_query($con,$sql_query);
			if($queryStatus==false)
				echo "Some error has occured...\n";
			else
				echo "User inserted successfully....\n";
			return false;
		}
		else
		{
			$var=mysqli_fetch_row($queryStatus);
			if($var[3]==1)
			{
				return true;
			}	
			else
			{
				return false;
			}

		}			
	}
?>