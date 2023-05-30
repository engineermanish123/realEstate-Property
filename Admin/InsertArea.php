
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$CityName=$_POST['cmbCity'];
	$AreaName=$_POST['txtAreaName'];
	// Establish Connection with mysqli
	$con = mysqli_connect ("localhost","root");
	// Select Database
	mysqli_select_db($con,"pms");
	// Specify the query to Insert Record
	$sql = "insert into Area_Master	(CityName,AreaName) values('".$CityName."','".$AreaName."')";
	// execute query
	mysqli_query($con,$sql);
	// Close The Connection
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Area Inserted Succesfully");window.location=\'Area.php\';</script>';

?>
</body>
</html>
