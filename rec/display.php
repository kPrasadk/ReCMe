<?php
	require_once("../includes/database.php");
		$var=$_GET['bookname'];
		$query1="SELECT * 
				 FROM Books
				 WHERE Name='$var'";
		$select=mysqli_query($con,$query1);
		$i=0;
		echo "<style type=\"text/css\">
			.tg  {border-collapse:collapse;border-spacing:0;}
			.tg .tg-031b{padding:10px 70px;}
			.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
			.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
			.tg .tg-031b{padding:10px 150px;}
			.tg .tg-031a{padding:10px 20px;}
			</style>
			<table class=\"tg\">
			  <tr>
			    <th class=\"tg-031a\">Sl no</th>
			    <th class=\"tg-031b\">Name of the book</th>
    			<th class=\"tg-031b\">Author</th>
  			</tr>";
		while($row=mysqli_fetch_array($select))
		{
			if($i>10)
				break;

			$i = $i + 1;
			echo "<tr>
    				<td class=\"tg-031a\">$i</td>
   					<td class=\"tg-031b\">$row[0]</td>
   					<td class=\"tg-031b\">$row[1]</td>
  				</tr>";
		}

		echo "</table>";  
 ?>	