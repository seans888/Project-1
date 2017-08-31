<html>
<head>
</head>
<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$uname  = mysqli_real_escape_string($mysqli, $_POST['uname']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$password  = mysqli_real_escape_string($mysqli, $_POST['password']);
		
	// checking empty fields
	if(empty($name) || empty($uname) || empty($email) || empty($password)) {
				
		if(empty($name)) {
			echo "<font color='red'>Enter Name.</font><br/>";
		}
		
		if(empty($uname)) {
			echo "<font color='red'>Enter Username.</font><br/>";
		}
		if(empty($email)) {
			echo "<font color='red'>Enter Email.</font><br/>";
		}
		if(empty($password)) {
			echo "<font color='red'>Enter password.</font><br/>";
		}
				
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO test(id,username,email,password,role)
											VALUES('$name','$uname','$email','$password','admin')");
		
		//display success message
		echo "<font color='green'>Register Successful.";
		echo "<br/><a href='login_form.php'>Back</a>";
	}
}

?>
</body>
</html>