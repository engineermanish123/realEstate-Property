<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$Id=$_GET['Id'];
	$txtName=$_POST['txtName'];
	$txtAdd=$_POST['txtAdd'];
	$txtCity=$_POST['txtCity'];
	$txtMobile=$_POST['txtMobile'];
	$txtEmail=$_POST['txtEmail'];
	$cmbGender=$_POST['cmbGender'];
	$txtDate=$_POST['txtDate'];
	$txtUser=$_POST['txtUser'];
	$txtPass=$_POST['txtPass'];
	$txtAdhar=$_POST['txtAdhar'];

// Establish Connection with mysqli
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to Update Record
$sql = "Update customer_reg set CustomerName='".$txtName."',Address='".$txtAdd."',City ='".$txtCity."',Mobile='".$txtMobile."',Email='".$txtEmail."',Gender='".$cmbGender."',BirthDate='".$txtDate."',UserName ='".$txtUser."',Password   ='".$txtPass."',Adhar   ='".$txtAdhar."' where CustomerId=".$Id."";
// Execute query
mysqli_query($con,$sql);
// Close The Connection
mysqli_close($con);
echo '<script type="text/javascript">alert("Profile Updated Succesfully");window.location=\'Profile.php\';</script>';
?>
</body>
</html>
