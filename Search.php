<?php include 'top.php'; ?>

  <?php
  include "Headermenu.php"
  ?>

      <div class="bradcam_area">

<?php
$a=$_GET['StateName'];
$b=$_GET['CityName'];
$c=$_GET['AreaName'];
$d=$_GET['CatId'];
// Establish Connection with Database
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to execute
$sql = "SELECT category_master.CategoryName, property_master.PropertyId, property_master.StateName, property_master.CityName, property_master.AreaName, property_master.PropertyName, property_master.PropertyImage, property_master.PropertyDesc, property_master.TotalArea, property_master.PropertyAge, property_master.TotalRoom, property_master.PropertyCost, property_master.Status, property_master.CustomerId
FROM  category_master, property_master
WHERE category_master.CategoryId=property_master.CategoryId AND property_master.StateName='".$a."' AND property_master.CityName='".$b."' AND property_master.AreaName='".$c."' AND property_master.CategoryId='".$d."'";
// Execute query
$result = mysqli_query($con,$sql);
$records = mysqli_num_rows($result);
?>
<div class="container">
  <h4><?php echo $records." Property Found"; ?></h4>
</div>
<?php
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


              <table width="100%" height="344" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td colspan="4" bgcolor="white">&nbsp;</td>
                </tr>
                <tr>
                  <td>
                    <?php
			  // Retrieve Number of records returned
$records = mysqli_num_rows($result);

			  ?>
                  </td>
                  </tr>


                <tr>
                  <td valign="middle"><div align="center"><img src="upload/<?php echo $Image1;?>" alt="" width="250" height="250" border="3" /></div></td>

                  <td colspan="3" valign="top">
                    <table class="table" width="100%" height="251" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>Property Code:</td>
                      <td><?php echo $PId ;?></td>
                    </tr>
                    <tr>
                      <td>Property Name:</td>
                      <td><?php echo $PropertyName ;?></td>
                    </tr>
                    <tr>
                      <td>Area:</td>
                      <td><?php echo $Area ;?></td>
                    </tr>
                    <tr>
                      <td>Cost:</td>
                      <td><?php echo $Cost ;?></td>
                    </tr>
                    <tr>
                      <td>Total Rooms:</td>
                      <td><?php echo $Room ;?></td>
                    </tr>
                    <tr>
                      <td>Property Age:</td>
                      <td><?php echo $Age ;?></td>
                    </tr>

                    <tr>
                      <td>
                        <div class="form-group">
                          <a href="register.php?CustId=<?php echo $CID;?>">
                          <button type="submit" name="button" id="button" value="Owner Detail" class="btn btn-primary btn-lg btn-block">Owner Detail</button>
                          </a>
                        </div>
                        </td>

                        <td>
                        <div class="form-group">
                        <a href="register.php">
                        <button type="submit" name="button" id="button" value="View Documents" class="btn btn-primary btn-lg btn-block">View Documents</button>
                        </a>
                      </div>
                      </td>
                    </tr>

                  </table>
                </td>
                </tr>
              </table>

<?php
}
mysqli_close($con);
?>

</div>

   <?php
   include "footer.php"
   ?>
