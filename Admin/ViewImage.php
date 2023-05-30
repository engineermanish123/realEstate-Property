<?php
if (!isset($_SESSION))
{
  session_start();

}
?>

<?php include 'top.php'; ?>

  <?php
  include "Headermenu.php"
  ?>

    <div class="bradcam_area">

          <p>
            <?php
$a=$_GET['PId'];

// Establish Connection with Database
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to execute
$sql = "SELECT * from property_image where PropertyId='".1."'";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records
while($row = mysqli_fetch_array($result))
{
$Title=$row['Title'];
$ImagePath=$row['ImagePath'];


?>
          </p>

          <!-- <table class="table" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="28" bgcolor="#669933" class="text-light"><?php echo $Title;?></td>
            </tr>
            <tr>
              <td><img src="../upload/<?php echo $ImagePath;?>" width="150" height="150" /></td>
            </tr>
          </table> -->
          <div class="row">
          <div class="container col-lg-4">
              <h4 class="text-light"><?php echo $Title;?></h4>
              <img src="../upload/<?php echo $ImagePath;?>" width="350" height="300">
            </div>
            </div>
           <?php
}

mysqli_close($con);
?>
        </div>

   <?php
   include "footer.php"
   ?>
