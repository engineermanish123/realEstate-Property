<?php
// Establish Connection with mysqli
$con = mysqli_connect ("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
if($_POST['StateName'])
{
$id=$_POST['StateName'];
$sql=mysqli_query($con,"select * from City_Master where StateName='$id' ");
echo '<option selected="selected">Select City</option>';
while($row=mysqli_fetch_array($sql))
{
echo '<option value="'.$row['CityName'].'">'.$row['CityName'].'</option>';
}
}

?>
