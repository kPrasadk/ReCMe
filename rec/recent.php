
<?php
	require_once("../includes/database.php");
		
		$query1="SELECT * 
				 FROM Recommendation
				 WHERE Approved=-1";
				 
				 
		$select=mysqli_query($con,$query1);
		$i=0;
		echo "
			<table class=\"table\" style=\"opacity:1.0;\">
			  <tr>
			    <th class=\"tg-031a\">Sl no</th>
			    <th class=\"tg-031b\">Name of the book</th>
    			<th class=\"tg-031b\">Author</th>
    			<th class=\"tg-031b\">No of copies</th>
    			<th class=\"tg-031b\">Approved</th> 
  			</tr>";
		while($row=mysqli_fetch_array($select))
		{
			if($i>10)
				break;

			$i = $i + 1;
			$num="booknum".$i;
			echo "<tr>
    				<td class=\"tg-031a\">$i</td>
    				<input type=\"number\" id=\"none\" name=\"$i\" value=$row[0]>
   					<td class=\"tg-031b\">$row[1]</td>
   					<td class=\"tg-031b\">$row[2]</td>
   					<td class=\"tg-031b\">$row[3]</td>
   					<td class=\"tg-031c\"> <input type=\"number\" min=\"0\"  class=\"form-control\"  name=\"$num\">
   					</td>
  				</tr>";
		}

		echo "</table>";  
 ?>	