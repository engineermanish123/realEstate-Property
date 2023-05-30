<<?php include 'top.php'; ?>

  <?php
  include "Headermenu.php"
  ?>



    <?php
$Id=$_GET['StateId'];
// Establish Connection with Database
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to execute
$sql = "select * from State_Master where Stateid=".$Id."";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records
while($row = mysqli_fetch_array($result))
{
$Id=$row['StateId'];
$Name=$row['StateName'];
}
?>
<div class="bradcam_area">

<div class="container col-lg-4">
  <h2 class="text-center">Edit Record</h2>
  <form Method="POST" Action="UpdateState.php">

    <div id="sprytextfield1" class="form-group">
      <input type="text" class="form-control" name="txtStateId" id="txtStateId" value="<?php echo $Id;?>" required="required" />
    </div>

    <div id="sprytextfield2" class="form-group">
      <input type="text" class="form-control" name="txtStateName" id="txtStateName" value="<?php echo $Name;?>" required="required" />
    </div>

    <div class="form-group">
      <button type="submit" name="button" id="button" value="Update Record" class="btn btn-primary btn-lg btn-block">Update Record</button>
    </div>
  </from>
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
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
