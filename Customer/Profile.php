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
          <?php
// Establish Connection with Database
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to execute
$sql = "select * from customer_reg where CustomerId='".$_SESSION['CustomerId']."' ";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records
while($row = mysqli_fetch_array($result))
{
$CustomerId=$row['CustomerId'];
$CustomerName=$row['CustomerName'];
$Address=$row['Address'];
$City =$row['City'];
$MobileNo=$row['Mobile'];
$EmailId=$row['Email'];
$Gender =$row['Gender'];
$BirthDate=$row['BirthDate'];
$UserName  =$row['UserName'];
$Password =$row['Password'];
$Adhar =$row['Adhar'];
}
			?>
      <div class="container">
        <table class="table text-light">
                  <tr>
                    <td >ID:</td>
                    <td ><?php echo $CustomerId;?></td>
                  </tr>
                  <tr>
                    <td >Name:</td>
                    <td><?php echo $CustomerName;?></td>
                  </tr>
                  <tr>
                    <td >Mobile:</td>
                    <td ><?php echo $Address;?></td>
                  </tr>
                   <tr>
                    <td >City:</td>
                    <td><?php echo $City;?></td>
                  </tr>
                   <tr>
                    <td >Mobile Number:</td>
                    <td ><?php echo $MobileNo;?></td>
                  </tr>
                   <tr>
                    <td >EmailId:</td>
                    <td><?php echo $EmailId;?></td>
                  </tr>
                    <tr>
                    <td >Gender:</td>
                    <td ><?php echo $Gender;?></td>
                  </tr>
                  <tr>
                    <td >BirthDate:</td>
                    <td><?php echo $BirthDate;?></td>
                  </tr>
                    <tr>
                      <td >Adhar Number</td>
                      <td><?php echo $Adhar;?></td>
                    </tr>
                  <tr>
                    <td></td>
                    <td><a href="EditProfile.php?Id=<?php echo $CustomerId;?>" class="btn bg-warning">Edit Profile</a></td>
                  </tr>
                </table>
      </div>

<?php
// Close the connection
mysqli_close($con);
?>
        </div>

   <?php
   include "footer.php"
   ?>
