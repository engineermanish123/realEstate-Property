<?php
if (!isset($_SESSION))
{
  session_start();

}
?>
<?php require_once('../Connections/PMS.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  // $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

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

$colname_Recordset1 = "-1";
if (isset($_SESSION['CustomerId'])) {
  $colname_Recordset1 = $_SESSION['CustomerId'];
}
mysqli_select_db($con,$db);
$query_Recordset1 = sprintf("SELECT PropertyId, PropertyName FROM property_master WHERE CustomerId = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($con,$query_Recordset1) or die(mysqli_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

if (!isset($_SESSION))
{
  session_start();

}
?>

<?php include 'top.php'; ?>

<?php
include "Headermenu.php"
?>

  <div class="bradcam_area bradcam_bg_1">

    <div class="container col-lg-4">
      <form id="form1" name="form1" method="post" action="InsertImage.php" enctype="multipart/form-data">

        <div class="form-group">
          <select class="form-control" name="cmbProperty" id="cmbProperty">
            <?php
          do {
          ?>
          <option value="<?php echo $row_Recordset1['PropertyId']?>"><?php echo $row_Recordset1['PropertyName']?></option>
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
          <input type="text" class="form-control" name="txtTitle" id="txtTitle" placeholder="Image Title" required="required" />
        </div>

        <div class="form-group">
          <input type="file" class="form-control" name="txtFile" id="txtFile" placeholder="Upload Image" required="required" />
        </div>

        <div class="form-group">
          <button type="submit" name="button" id="button" value="Submit" class="btn btn-primary btn-lg btn-block">Submit</button>
        </div>

       </form>
        </div>

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
