
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$Id = $_POST['txtCityId'];
$Name=$_POST['txtCityName'];
$State=$_POST['cmbState'];
// Establish Connection with mysqli
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to Update Record
$sql = "Update City_Master set CityName='".$Name."',StateName='".$State."' where CityId=".$Id."";
// Execute query
mysqli_query($con,$sql);
// Close The Connection
mysqli_close($con);
echo '<script type="text/javascript">alert("City Updated Succesfully");window.location=\'City.php\';</script>';
?>
</body>
</html>
