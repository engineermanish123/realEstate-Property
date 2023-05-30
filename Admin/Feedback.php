<?php include 'top.php'; ?>

  <?php
  include "Headermenu.php"
  ?>

      <div class="bradcam_area">
      <h2 class="text-center text-light">Feedback From Customers</h2>
      <table class="table">
        <tr>
          <th><div><strong>Id</strong></div></th>
          <th><div><strong>Customer Name</strong></div></th>
          <th><div><strong>Email</strong></div></th>
          <th><div><strong>Mobile</strong></div></th>
          <th><div>Feedback</div></th>
        </tr>
        <?php
// Establish Connection with Database
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to execute
$sql = "select * from feedback";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records
while($row = mysqli_fetch_array($result))
{
$Id=$row['FeedbackId'];
$CustomerName=$row['CustomerName'];
$EmailId=$row['EmailId'];
$MobileNumber=$row['MobileNumber'];
$Message=$row['Message'];

?>
        <tr>
          <td ><div ><strong><?php echo $Id;?></strong></div></td>
          <td ><div ><strong><?php echo $CustomerName;?></strong></div></td>
          <td ><div ><strong><?php echo $EmailId;?></strong></div></td>
          <td ><div ><strong><?php echo $MobileNumber;?></strong></div></td>
          <td ><div ><strong><?php echo $Message;?></strong></div></td>
        </tr>
        <?php
}
// Retrieve Number of records returned
$records = mysqli_num_rows($result);
?>
        <?php
// Close the connection
mysqli_close($con);
?>
      </table>
      </div>

   <?php
   include "footer.php"
   ?>
