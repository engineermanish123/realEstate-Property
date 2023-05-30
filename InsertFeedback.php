<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$Name=$_POST['txtName'];
	$Email=$_POST['txtEmail'];
	$Mobile=$_POST['txtMobile'];
	$Feedback=$_POST['txtFeedback'];

	// Establish Connection with mysqli
	$con = mysqli_connect ("localhost","root");
	// Select Database
	mysqli_select_db($con,"pms");
	// Specify the query to Insert Record
	$sql = "insert into feedback(CustomerName,EmailId,MobileNumber,Message) values('".$Name."','".$Email."','".$Mobile."','".$Feedback."')";
	// execute query
	mysqli_query ($con,$sql);
	// Close The Connection
	mysqli_close ($con);

	echo '<script type="text/javascript">alert("Thanks For Your Feedback");window.location=\'Contact.php\';</script>';

?>
</body>
</html>
