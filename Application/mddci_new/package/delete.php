<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$packageId = $_GET['packageId'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM package WHERE packageId=$packageId");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

