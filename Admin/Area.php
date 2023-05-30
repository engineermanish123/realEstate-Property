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
$query_Recordset1 = "SELECT * FROM city_master";
$Recordset1 = mysqli_query($con,$query_Recordset1) or die(mysqli_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>

<?php include 'top.php'; ?>
  <?php
  include "Headermenu.php"
  ?>

<div class="bradcam_area">

  <div class="container col-lg-4">
		<h2 class="text-center">Create New Area</h2>

		<form id="form1" name="form1" method="post" action="InsertArea.php">
			<div class="form-group">
        <select class="form-control" name="cmbCity" id="cmbCity">
          <?php
        do {
        ?>
        <option value="<?php echo $row_Recordset1['CityName']?>"><?php echo $row_Recordset1['CityName']?></option>
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

			<div id="sprytextfield1" class="form-group">
				<input type="text" class="form-control" name="txtAreaName" id="txtAreaName" placeholder="Area Name" required="required" />
			</div>

			<div class="form-group">
				<button type="submit" name="button" id="button" value="Submit" class="btn btn-primary btn-lg btn-block">Submit</button>
			</div>
    </form>

	</div>

<table class="table">
<tr>
<th><div>Id</div></th>
<th><div>City</div></th>
<th><div>Area</div></th>
<th><div>Edit</div></th>
<th><div>Delete</div></th>
</tr>
<?php
// Establish Connection with Database
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to execute
$sql = "select * from Area_Master";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records
while($row = mysqli_fetch_array($result))
{
$Id=$row['AreaId'];
$CityName=$row['CityName'];
$AreaName=$row['AreaName'];
?>
<tr>
<td><div><?php echo $Id;?></div></td>
<td><div><?php echo $CityName;?></div></td>
<td><div><?php echo $AreaName;?></div></td>
<td><div><a href="EditArea.php?AreaId=<?php echo $Id;?>">Edit</a></div></td>
<td><div><a href="DeleteArea.php?AreaId=<?php echo $Id;?>">Delete</a></div></td>
</tr>
<?php
}
// Retrieve Number of records returned
$records = mysqli_num_rows($result);
?>
<tr>
<td colspan="5"><div><?php echo "Total ".$records." Records"; ?> </div></td>
</tr>
<?php
// Close the connection
mysqli_close($con);
?>
</table>
</div>
   <?php
   include "footer.php"
   ?>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
<?php
mysqli_free_result($Recordset1);
?>
