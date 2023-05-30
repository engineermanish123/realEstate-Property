<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$a=$_POST['country'];
$b=$_POST['state'];
$c=$_POST['city'];
$d=$_POST['cmbCat'];
header("location:Search.php?StateName=".$a."&CityName=".$b."&AreaName=".$c."&CatId=".$d."")
?>
</body>
</html>
