<?php
	
	require_once("../includes/database.php");
		//echo "Checking outside..";
		$i=1;
		while($_POST[$i]!== NULL)
		{
			
			$str="booknum".$i;
			$bnum=$_POST[$i];
			$sql_bookno="SELECT *
						 FROM Recommendation
						 WHERE Slno=$bnum";
			$queryStatus=mysqli_query($con,$sql_bookno);
			$var=mysqli_fetch_row($queryStatus);
			$approved=$_POST[$str];
			$num=$var[3]-$approved;
			$sql_query="UPDATE Recommendation
						SET Approved=$approved,No_of_Books=$num
						WHERE Slno='$_POST[$i]'";
			$queryStatus=mysqli_query($con,$sql_query);	
			$i=$i+1;
		}	
		
?>