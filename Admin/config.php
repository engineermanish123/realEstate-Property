<?php
$con = mysqli_connect("localhost", "root", "") or die("Failed to connect to mysqli.");
mysqli_select_db($con,"pms") or die("Failed to connect to database");
?>
