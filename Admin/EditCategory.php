<?php include 'top.php'; ?>

  <?php
  include "Headermenu.php"
  ?>

    <?php
$Id=$_GET['CategoryId'];
// Establish Connection with Database
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to execute
$sql = "select * from Category_Master where Categoryid=".$Id."";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records
while($row = mysqli_fetch_array($result))
{
$Id=$row['CategoryId'];
$Name=$row['CategoryName'];
$Description=$row['Category_Desc'];
}
?>

<div class="bradcam_area">
<div class="container col-lg-4">
<h2 class="text-center">Edit Record</h2>

<form id="form1" name="form1" method="post" action="UpdateCategory.php">
  <div id="sprytextfield1" class="form-group">
    <input type="text" class="form-control" name="txtCategoryId" id="txtCategoryId" value="<?php echo $Id;?>" required="required" />
  </div>

  <div id="sprytextfield2" class="form-group">
    <input type="text" class="form-control" name="txtCategoryName" id="txtCategoryName" value="<?php echo $Name;?>" required="required" />
  </div>

  <div id="sprytextfield3" class="form-group">
    <input type="textarea" class="form-control" name="txtCategoryDesc" id="txtCategoryDesc" value="<?php echo $Description;?>" required="required" />
  </div>

  <div class="form-group">
    <button type="submit" name="submit" id="button" value="Update Record" class="btn btn-primary btn-lg btn-block">Update Record</button>
  </div>
</form>
</div>
</div>

<?php
// Close the connection
mysqli_close($con);
?>

   <?php
   include "footer.php"
   ?>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
