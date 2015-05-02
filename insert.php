<html>
<body>
<?php 

$con= mysqli_connect("localhost","root","root"); 
if (!$con) { 
	die('Could not connect to MySQL: ' ); 
} 
else
{
		mysqli_select_db($con,"Book_Recommendation");
		$sql_search="SELECT *
					 FROM Books 
					 WHERE Name='$_POST[bookName1]'";
		$queryStatus=mysqli_query($con,$sql_search);
		if(mysqli_fetch_array($queryStatus)==false)
		{					 
			$sql_insert1 = "INSERT INTO Books VALUES
							('$_POST[bookName1]',
							'$_POST[author1]')";
			$var=-1;
			$sql_insert2 = "INSERT INTO Recommendation VALUES
						('$_POST[bookName1]',
						'$_POST[author1]','$_POST[bookno]',$var)";
			$queryStatus=mysqli_query($con,$sql_insert1);
			$queryStatus=mysqli_query($con,$sql_insert2);
		}
		else
		{
				$sql_bookno="SELECT *
							 FROM Recommendation
							 WHERE Book='$_POST[bookName1]'";
				$queryStatus=mysqli_query($con,$sql_bookno);
				$var=mysqli_fetch_row($queryStatus);
				$num=$var[2]+$_POST[bookno];
				$sql_insert2 = "UPDATE Recommendation
									SET No_of_Books='$num'
									WHERE Book='$_POST[bookName1]'";		
				$queryStatus=mysqli_query($con,$sql_insert2);					 
		}	
		if($queryStatus==TRUE)
				echo "\nRecord Inserted Successfully";
		else
				echo "Record Not Inserted ";
}



mysqli_close($con); 
?>
</body>
<html>