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
$query_Recordset1 = "SELECT * FROM category_master";
$Recordset1 = mysqli_query($con,$query_Recordset1) or die(mysqli_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

if (!isset($_SESSION))
{
  session_start();

}
?>

<?php include 'top.php'; ?>

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{

$(".country").change(function()
{
var dataString = 'StateName='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_state.php",
data: dataString,
cache: false,
success: function(html)
{
$(".state").html(html);
}
});

});

$('.state').live("change",function(){
var dataString = 'CityName='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_city.php",
data: dataString,
cache: false,
success: function(html)
{
$(".city").html(html);
}
});

});



});
</script>

  <?php
  include "Headermenu.php"
  ?>

        <div class="bradcam_area bradcam_bg_1">

          <div class="container col-lg-4">
                <form class="form" action="InsertProperty.php" method="post" enctype="multipart/form-data" name="form1" id="form1">

                <div class="form-group">
                  <select class="form-control" name="cmbCat" id="cmbCat">
                    <?php
                    do {
                      ?>
                    <option value="<?php echo $row_Recordset1['CategoryId']?>"><?php echo $row_Recordset1['CategoryName']?></option>
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

                <div class="form-group">
                  <select name="country" class="country form-control">
                  <option selected="selected">Select State</option>
                  <?php
                  // Establish Connection with mysqli
                  $con = mysqli_connect ("localhost","root");
                  // Select Database
                  mysqli_select_db($con,"pms");
                  $sql=mysqli_query($con,"select * from State_Master order by StateId ASC");
                  while($row=mysqli_fetch_array($sql))
                  {
                  echo '<option value="'.$row['StateName'].'">'.$row['StateName'].'</option>';
                  } ?>
                  </select>
                </div>

                <div class="form-group">
                  <select name="state" class="state form-control">
                  <option selected="selected">Select City</option>
                  </select>
                </div>

                <div class="form-group">
                  <select name="city" class="city form-control">
                  <option selected="selected">Select Area</option>
                  </select>
                </div>

                <div id="sprytextfield3" class="form-group">
                  <input type="text" class="form-control" name="txtName" id="txtName" placeholder="Property Name" required="required" />
                </div>

                <div id="sprytextarea1" class="form-group">
                  <textarea class="form-control" name="txtDesc" id="txtDesc" cols="35" rows="3" placeholder="Description" required="required"></textarea>
                </div>

                    <div class="form-group">
                      <input type="file" class="form-control" name="txtFile" id="txtFile" placeholder="Upload Image" required="required" />
                    </div>

                    <div id="sprytextfield4" class="form-group">
                      <input type="text" class="form-control" name="txtArea" id="txtArea" placeholder="Total Area" required="required" />
                    </div>

                    <div class="form-group">
                      <select class="form-control" name="cmbAge" id="cmbAge">
                        <option>Property Age</option>
                        <option>1 Year</option>
                        <option>2 Year</option>
                        <option>3 Year</option>
                        <option>4 Year</option>
                        <option>5 Year</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <select class="form-control" name="cmbRoom" id="cmbRoom">
                        <option>Total Rooms</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <select class="form-control" name="cmbFur" id="cmbFur">
                        <option>Is Furnished?</option>
                        <option>Yes</option>
                        <option>No</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <select class="form-control" name="cmbPark" id="cmbPark">
                        <option>Parking Available?</option>
                        <option>Yes</option>
                        <option>No</option>
                      </select>
                    </div>

                    <div id="sprytextfield2" class="form-group">
                      <input class="form-control" type="text" name="txtDist" id="txtDist" placeholder="Distance From Railway (Km)" required="required" />
                    </div>

                    <div id="sprytextfield5" class="form-group">
                      <input class="form-control" type="text" name="txtCost" id="txtCost" placeholder="Property Cost" required="required" />
                    </div>

                    <div class="form-group">
                      <button type="submit" name="button" id="button" value="Upload" class="btn btn-primary btn-lg btn-block">Upload</button>
                    </div>

                </form>
                </div>
      </div>


   <?php
   include "footer.php"
   ?>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
</script>

<?php
mysqli_free_result($Recordset1);
?>
