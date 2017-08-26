<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM package ORDER BY packageCat DESC") or die("Error: " .mysqli_error($mysqli)); // using mysqli_query instead

?>

<html>
<head>	
	<title>MDDCI</title>
</head>

<body>
<a href="add.html">Add New Package</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>Category</td>
		<td>Description</td>
		<td>Price</td>
	</tr>	
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['packageType']."</td>";
		echo "<td>".$res['packageCat']."</td>";	
		echo "<td>".$res['packageDesc']."</td>";
		echo "<td>Php ".$res['packagePri']."</td>";

		echo "<td><a href=\"edit.php?packageId=$res[packageId]\">Edit</a> | <a href=\"delete.php?packageId=$res[packageId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		echo "</tr>";
	}
	?>
	</table>
</body>
</html>
