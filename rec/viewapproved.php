<?php
	require_once("../includes/database.php");
		
		$query1="SELECT * 
				 FROM Recommendation
				 WHERE Approved>0";
			 
				 
		$select=mysqli_query($con,$query1);
		$i=0;
		echo "
			<table class=\"table\" style=\"opacity:1.0;\">
			  <tr>
			    <th class=\"tg-031a\">Sl no</th>
			    <th class=\"tg-031b\">Name of the book</th>
    			<th class=\"tg-031b\">Author</th>
    			<th class=\"tg-031b\">No of copies approved</th>
    		</tr>";
		while($row=mysqli_fetch_array($select))
		{
			if($i>10)
				break;

			$i = $i + 1;
				echo "<tr>
    				<td class=\"tg-031a\">$i</td>
    				<td class=\"tg-031b\">$row[1]</td>
   					<td class=\"tg-031b\">$row[2]</td>
   					<td class=\"tg-031b\">$row[4]</td>
   					</td>
  				</tr>";
		}
		echo "</table>";  
 ?>	