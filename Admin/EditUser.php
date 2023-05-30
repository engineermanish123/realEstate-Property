<?php include 'top.php'; ?>

  <?php
  include "Headermenu.php"
  ?>

  <div class="bradcam_area">

    <?php
$Id=$_GET['UserId'];
// Establish Connection with Database
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to execute
$sql = "select * from Login_Master where UserId=".$Id."";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records
while($row = mysqli_fetch_array($result))
{
$Id=$row['UserId'];
$Name=$row['UserName'];
$Password=$row['Password'];
}
?>
  <div class="container col-lg-4">
    <form Method="POST" Action="UpdateUser.php">

      <div id="sprytextfield1" class="form-group">
        <input class="form-control" type="text" name="txtUserId" id="txtUserId" value="<?php echo $Id;?>" required="required"/>
      </div>

      <div id="sprytextfield2" class="form-group">
        <input class="form-control" type="text" name="txtUserName" id="txtUserName" value="<?php echo $Name;?>" required="required"/>
      </div>

      <div id="sprytextfield3" class="form-group">
        <input class="form-control" type="password" name="txtPass" id="txtPass" value="<?php echo $Password;?>" required="required"/>
      </div>

      <div class="form-group">
        <button type="submit" Name="submit" value="Update Record" class="btn btn-primary btn-lg btn-block">Update Record</button>
      </div>

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
