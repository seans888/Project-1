<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$packageId = mysqli_real_escape_string($mysqli, $_POST['packageId']);
	
	$packageType = mysqli_real_escape_string($mysqli, $_POST['packageType']);
	$packageCat = mysqli_real_escape_string($mysqli, $_POST['packageCat']);
	$packageDesc = mysqli_real_escape_string($mysqli, $_POST['packageDesc']);
	$packagePri = mysqli_real_escape_string($mysqli, $_POST['packagePri']);
	
	// checking empty fields
	if(empty($packageType) || empty($packageCat) || empty($packageDesc)|| empty($packagePri)) {	
			
		if(empty($packageType)) {
			echo "<font color='red'>Update package name.</font><br/>";
		}
		
		if(empty($packageCat)) {
			echo "<font color='red'>Select new category.</font><br/>";
		}
		
		if(empty($packageDesc)) {
			echo "<font color='red'>Update package description.</font><br/>";
		}
		if(empty($packagePri)) {
			echo "<font color='red'>Update package price.</font><br/>";
		}	
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE package SET packageType='$packageType',packageCat='$packageCat',packageDesc='$packageDesc',packagePri='$packagePri' WHERE packageId=$packageId");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$packageId = $_GET['packageId'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM package WHERE packageId=$packageId")or die("Error: " .mysqli_error($mysqli));

while($res = mysqli_fetch_array($result))
{
	$packageType = $res['packageType'];
	$packageCat = $res['packageCat'];
	$packageDesc = $res['packageDesc'];
	$packagePri = $res['packagePri'];
}	
?>

<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="packageType" value="<?php echo $packageType;?>"></td>
			</tr>
			<tr> 
				<td>Category</td>
				<td><input type="text" name="packageCat" value="<?php echo $packageCat;?>"></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><textarea name="packageDesc"><?php echo $packageDesc;?></textarea></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input type="text" name="packagePri" value="<?php echo $packagePri;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="packageId" value=<?php echo $_GET['packageId'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
