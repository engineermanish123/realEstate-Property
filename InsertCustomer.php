<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$Name=$_POST['txtName'];
$Address=$_POST['txtAddress'];
$City=$_POST['cmbCity'];
$Mobile=$_POST['txtMobile'];
$Email=$_POST['txtEmail'];
$Gender=$_POST['cmbGender'];
$Birthdate=$_POST['txtBirthDate'];
$UserName=$_POST['txtUserName2'];
$Password=$_POST['txtPassword2'];
$Adhar=$_POST['txtAdhar'];
	// Establish Connection with mysqli
	$user = 'root';
	$pass = '';
	$db = 'pms';
	$con = new mysqli('localhost', $user, $pass, $db) or die("Couldn't connet to SQL server");
	// $con = mysqli_connect("localhost","root");
	// // Select Database
	// mysqli_select_db($con,$db);
	// // Specify the query to Insert Record
	$sql = "insert into customer_Reg (CustomerName,Address,City,Mobile,Email,Gender,BirthDate,UserName,Password,Adhar) 	values('".$Name."','".$Address."','".$City."','".$Mobile."','".$Email."','".$Gender."','".$Birthdate."','".$UserName."','".$Password."','".$Adhar."')";
	// execute query
	mysqli_query($con,$sql);
	// Close The Connection
	mysqli_close($con);
	echo '<script type="text/javascript">alert("Thanks For Registration");window.location=\'index.php\';</script>';
?>
</body>
</html>
