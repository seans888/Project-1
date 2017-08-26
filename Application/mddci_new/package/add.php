<html>
<head>
	<title>MDDCI</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$packageType = mysqli_real_escape_string($mysqli, $_POST['packageType']);
	$packageCat  = mysqli_real_escape_string($mysqli, $_POST['packageCat']);
	$packageDesc  = mysqli_real_escape_string($mysqli, $_POST['packageDesc']);
	$packagePri  = mysqli_real_escape_string($mysqli, $_POST['packagePri']);
		
	// checking empty fields
	if(empty($packageType) || empty($packageCat) || empty($packageDesc) || empty($packagePri)) {
				
		if(empty($packageType)) {
			echo "<font color='red'>Package Name field is empty.</font><br/>";
		}
		
		if(empty($packageCat)) {
			echo "<font color='red'>Select category for the new package.</font><br/>";
		}
		
		if(empty($packageDesc)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		if(empty($packagePri)) {
			echo "<font color='red'>Enter price for the new package(in PHP).</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO package(packageType,packageCat,packageDesc,packagePri)
											VALUES('$packageType','$packageCat','$packageDesc','$packagePri')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
