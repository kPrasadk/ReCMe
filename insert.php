<html>
<body>
<?php 
echo "Hello" ;
$con= mysqli_connect("localhost","root","root"); 
if (!$con) { 
	die('Could not connect to MySQL: ' ); 
} 
else
{
		echo "Hello World";
		mysqli_select_db($con,"Book_Recommendation");
		$sql_insert = " INSERT INTO Books VALUES
		('$_POST[bookName1]',
		'$_POST[author]')";
		$queryStatus=mysqli_query($con,$sql_insert);
		if($queryStatus==TRUE)
				echo "\nRecord Inserted Successfully";
		else
				echo "Record Not Inserted ";
}



mysqli_close($con); 
?>
</body>
<html>