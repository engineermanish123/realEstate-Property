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

      <form id="form1" name="form1" method="post" action="Inter.php">
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

      <div class="form-group">
        <button type="submit" name="button" id="button" value="Search" class="btn btn-primary btn-lg btn-block">Search</button>
      </div>
    </form>
      </div>
    </div>

   <?php
   include "footer.php"
   ?>
<?php
mysqli_free_result($Recordset1);
?>
