<?php
#FileName=="Connection_php_mysqli.htm";
#Type=="mysqli";
#HTTP=="true";

$user = 'root';
$pass = '';
$db = 'pms';
$con = new mysqli('localhost', $user, $pass, $db) or die("Couldn't connet to SQL server");


// $db = "PMS";
// $username_PMS = "root";
// $con = mysqli_connect('localhost', 'PMS', 'pms123');
// if (!$con)
// {
//     die('could not connect: '. mysqli_error());
// }
// mysqli_select_db($con,"$db")
?>
