<?php
// Establish Connection with mysqli
$con = mysqli_connect ("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
if($_POST['CityName'])
{
$id=$_POST['CityName'];
$sql=mysqli_query($con,"select * from Area_Master where CityName='$id' ");
echo '<option selected="selected">Select Area</option>';
while($row=mysqli_fetch_array($sql))
{
echo '<option value="'.$row['AreaName'].'">'.$row['AreaName'].'</option>';
}
}

?>
