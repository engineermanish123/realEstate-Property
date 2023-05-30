<?php require_once('../Connections/PMS.php'); ?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysqli_select_db($con,$db);
$query_Recordset1 = "SELECT * FROM state_master";
$Recordset1 = mysqli_query($con,$query_Recordset1) or die(mysqli_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>

<?php include 'top.php'; ?>

  <?php
  include "Headermenu.php"
  ?>

    <?php
$Id=$_GET['CityId'];
// Establish Connection with Database
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to execute
$sql = "select * from City_Master where CityId=".$Id."";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records
while($row = mysqli_fetch_array($result))
{
$Id=$row['CityId'];
$Name=$row['CityName'];

}
?>
  <div class="bradcam_area">
  <h2 class="text-center">Edit Record</h2>

  <div class="container col-lg-4">
  <h2 class="text-center">Create New City</h2>

  <form id="form1" name="form1" method="post" action="UpdateCity.php">
    <div id="sprytextfield1" class="form-group">
      <input type="text" class="form-control" name="txtCityId" id="txtCityId" value="<?php echo $Id;?>" required="required" />
    </div>

    <div class="form-group">
      <select class="form-control" name="cmbState" id="cmbState">
        <?php
    do {
    ?>
        <option value="<?php echo $row_Recordset1['StateName']?>"><?php echo $row_Recordset1['StateName']?></option>
        <?php
    } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
      $rows = mysqli_num_rows($Recordset1);
      if($rows > 0) {
          mysqli_data_seek($Recordset1, 0);
    	  $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
      }
    ?>
      </select>
    </div>

    <div id="sprytextfield3" class="form-group">
      <input type="text" class="form-control" name="txtCityName" id="txtCityName" value="<?php echo $Name;?>" required="required" />
    </div>

    <div class="form-group">
      <button type="submit" name="submit" id="button" value="Update Record" class="btn btn-primary btn-lg btn-block">Update Record</button>
    </div>
</form>
</div>

<?php
// Close the connection
mysqli_close($con);
?>

</div>
   <?php
   include "footer.php"
   ?>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
</script>
<?php
mysqli_free_result($Recordset1);
?>
