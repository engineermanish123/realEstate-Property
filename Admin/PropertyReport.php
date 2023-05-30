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

mysqli_select_db($con,"pms");
$query_Recordset1 = "SELECT * FROM category_master";
$Recordset1 = mysqli_query($con,$query_Recordset1) or die(mysqli_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>

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

<?php include 'top.php'; ?>

<?php include 'Headermenu.php'; ?>

<div class="bradcam_area">
<div class="container col-lg-4">
  <h2 class="text-center">News Report</h2>
  <form id="form1" name="form1" method="post" action="">

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
      <select class="form-control" name="cmbCost" id="cmbCost">
        <option>Approximate Cost</option>
        <option>2000000</option>
        <option>200000</option>
        <option>3000000</option>
        <option>30000</option>
      </select>
    </div>

    <div class="form-group">
      <select class="form-control" name="cmbAge" id="cmbAge">
        <option>Property Age</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
      </select>
    </div>


    <div class="form-group">
      <button type="submit" name="button" id="button" value="Display Report" class="btn btn-primary btn-lg btn-block">Display Report</button>
    </div>
  </from>
</div>

<?php
if(isset($_POST['country']) and isset($_POST['state']) and isset($_POST['city']) and isset($_POST['cmbCat']) and isset($_POST['cmbCost']) and isset($_POST['cmbAge']))
{
$a=$_POST['country'];
$b=$_POST['state'];
$c=$_POST['city'];
$d=$_POST['cmbCat'];
$e=$_POST['cmbCost'];
$f=$_POST['cmbAge'];

// Establish Connection with Database
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to execute
$sql = "SELECT category_master.CategoryName, property_master.PropertyId, property_master.StateName, property_master.CityName, property_master.AreaName, property_master.PropertyName, property_master.PropertyImage, property_master.PropertyDesc, property_master.TotalArea, property_master.PropertyAge, property_master.TotalRoom, property_master.PropertyCost, property_master.Status, property_master.CustomerId
FROM  category_master, property_master
WHERE category_master.CategoryId=property_master.CategoryId AND property_master.StateName='".$a."' AND property_master.CityName='".$b."' AND property_master.AreaName='".$c."' AND property_master.CategoryId='".$d."' AND property_master.PropertyCost <='".$e."' AND property_master.PropertyAge<='".$f."'";
// Execute query
$result = mysqli_query($con,$sql);
$records = mysqli_num_rows($result);
echo $records." Property Found";


// Loop through each records
while($row = mysqli_fetch_array($result))
{
$PId=$row['PropertyId'];
$CategoryName=$row['CityName'];
$StateName=$row['StateName'];
$CityName=$row['CityName'];
$AreaName=$row['AreaName'];
$PropertyName=$row['PropertyName'];
$Area=$row['TotalArea'];
$Room=$row['TotalRoom'];
$Age=$row['PropertyAge'];
$Cost=$row['PropertyCost'];
$Status=$row['Status'];
$Description=$row['PropertyDesc'];
$Image1=$row['PropertyImage'];
$CID=$row['CustomerId'];

?>

<table class="table">

<tr>
<td colspan="4">
<span>
<?php
			  // Retrieve Number of records returned
$records = mysqli_num_rows($result);

?>
</span></td>
</tr>


                <tr>
                  <td width="18%" valign="middle"><div align="left"><img src="../upload/<?php echo $Image1;?>" alt="" width="200" height="200" border="3" /></div></td>
                  <td width="82%" colspan="3" valign="top">
                    <table width="100%" height="251" border="3" cellpadding="3" cellspacing="3" bordercolor="#000000">
                    <tr>
                      <td width="18%"><span><strong>Property Code:</strong></span></td>
                      <td width="82%"><span><?php echo $PId ;?></span></td>
                    </tr>
                    <tr>
                      <td><span><strong>Property Name:</strong></span></td>
                      <td><span><?php echo $PropertyName ;?></span></td>
                    </tr>
                    <tr>
                      <td><span><strong>Area:</strong></span></td>
                      <td><span><?php echo $Area ;?></span></td>
                    </tr>
                    <tr>
                      <td><span><strong>Cost:</strong></span></td>
                      <td><span><?php echo $Cost ;?></span></td>
                    </tr>
                    <tr>
                      <td><span><strong>Total Rooms:</strong></span></td>
                      <td><span><?php echo $Room ;?></span></td>
                    </tr>
                    <tr>
                      <td><span><strong>Property Age:</strong></span></td>
                      <td><span><?php echo $Age ;?></span></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
            </div>
<?php
}
mysqli_close($con);
}
?>
<?php include 'footer.php'; ?>
<?php
mysqli_free_result($Recordset1);
?>
