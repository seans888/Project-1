<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM patient ORDER BY lname DESC") or die("Error: " .mysqli_error($mysqli)); // using mysqli_query instead

?>

<html>
<head>	
	<title>MDDCI</title>
</head>

<body>
<a href="add.html">Add New Patient Record</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Last Name</td>
		<td>First Name</td>
		<td>Contact Info</td>
	</tr>	
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['lname']."</td>";
		echo "<td>".$res['fname']."</td>";	
		echo "<td>".$res['contact']."</td>";

		echo "<td><a href=\"edit.php?patientId =$res[patientId]\">Edit</a> | <a href=\"delete.php?patientId =$res[patientId]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		echo "</tr>";
	}
	?>
	</table>
</body>
</html>
