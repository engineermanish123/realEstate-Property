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
$query_Recordset1 = "SELECT DISTINCT City FROM customer_reg";
$Recordset1 = mysqli_query($con,$query_Recordset1) or die(mysqli_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>

<?php include 'top.php'; ?>

<?php include 'Headermenu.php'; ?>

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

});
</script>
<div class="bradcam_area">

<div class="container col-lg-4">
  <form id="form1" name="form1" method="post" action="">

    <div class="form-group">
      <select name="city" id="city" class="form-control">
        <?php
        do {
        ?>
                  <option value="<?php echo $row_Recordset1['City']?>"><?php echo $row_Recordset1['City']?></option>
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
      <button type="submit" name="button" id="button" value="Display Report" class="btn btn-primary btn-lg btn-block">Display Report</button>
    </div>

    </form>
</div>

<?php
if(isset($_POST['city']))
{
 $city = $_POST['city'];

?>

<table class="table">

  <tr>
    <td class="text-light">Name    </td>
    <td class="text-light">Address    </td>
    <td class="text-light">Mobile    </td>
    <td class="text-light">Email    </td>
     <td class="text-light">Gender    </td>
    <td class="text-light">BirthDate    </td>
  </tr>


 <?php
	// Establish Connection with Database
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to execute
$sql = "select * from customer_reg where City='".$city."'";
// Execute query
$result = mysqli_query($con,$sql);
//Loop through each records
while($row = mysqli_fetch_array($result))
{
$CustomerName=$row['CustomerName'];
$Address=$row['Address'];
$MobileNo=$row['Mobile'];
$EmailId=$row['Email'];
$Gender=$row['Gender'];
$BirthDate=$row['BirthDate'];

?>
<tr>
 <td><?php echo $CustomerName;?>    </td>
    <td><?php echo $Address;?>    </td>
    <td><?php echo $MobileNo;?>    </td>
    <td><?php echo $EmailId;?>    </td>
      <td><?php echo $Gender;?>    </td>
    <td><?php echo $BirthDate;?>    </td>

</tr>
<?php
}
// Retrieve Number of records returned
$records = mysqli_num_rows($result);
mysqli_close($con);
}
?>
</table>
</div>
<?php include 'footer.php'; ?>
<?php
mysqli_free_result($Recordset1);
?>
