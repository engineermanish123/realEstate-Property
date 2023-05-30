<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$PId=$_POST['cmbProperty'];
	$Title=$_POST['txtTitle'];
	$Path1=$_FILES["txtFile"]["name"];

	move_uploaded_file($_FILES["txtFile"]["tmp_name"],"../upload/"  .$_FILES["txtFile"]["name"]);
	// Establish Connection with mysqli
	$con = mysqli_connect ("localhost","root");
	// Select Database
	mysqli_select_db($con,"pms");
	// Specify the query to Insert Record
	$sql = "insert into property_image(PropertyId,Title,ImagePath) values('".$PId."','".$Title."','".$Path1."')";
	// execute query
	mysqli_query ($con,$sql);
	// Close The Connection
	mysqli_close ($con);

	echo '<script type="text/javascript">alert("Image Uploaded Succesfully");window.location=\'Image.php\';</script>';

?>
</body>
</html>
