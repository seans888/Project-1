<html>
<head>
	<title>MDDCI</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$lname = mysqli_real_escape_string($mysqli, $_POST['lname']);
	$fname  = mysqli_real_escape_string($mysqli, $_POST['fname']);
	$mname  = mysqli_real_escape_string($mysqli, $_POST['mname']);
	$age  = mysqli_real_escape_string($mysqli, $_POST['age']);
	$contact = mysqli_real_escape_string($mysqli, $_POST['contact']);
	$address  = mysqli_real_escape_string($mysqli, $_POST['address']);
	$physicianId  = mysqli_real_escape_string($mysqli, $_POST['physicianId']);
		
	// checking empty fields
	if(empty($lname) || empty($fname) || empty($age) || empty($contact)|| empty($address) || empty($physicianId)) {
				
		if(empty($lname)) {
			echo "<font color='red'>Package Name field is empty.</font><br/>";
		}
		
		if(empty($fname)) {
			echo "<font color='red'>Select category for the new package.</font><br/>";
		}
		if(empty($age)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		if(empty($contact)) {
			echo "<font color='red'>Enter price for the new package(in PHP).</font><br/>";
		}
		if(empty($address)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		if(empty($physicianId)) {
			echo "<font color='red'>Enter price for the new package(in PHP).</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO patient(lname,fname,mname,age,contact,address,physicianId)
											VALUES('$lname','$fname','$mname','$age','$contact','$address','$physicianId')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}

?>
</body>
</html>
