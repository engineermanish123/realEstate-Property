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

            <form class="form" id="form1" name="form1" method="post" action="UpdateProfile.php?Id=<?php echo $CustomerId;?>">
                <table class="table">
                  <tr>
                    <td><strong>ID:</strong></td>
                    <td><?php echo $CustomerId;?></td>
                  </tr>
                  <tr>
                    <td><strong>Name:</strong></td>
            <td><label>
                      <input class="form-control" type="text" name="txtName" id="txtName"  value="<?php echo $CustomerName;?>"/>
                    </label></td>
                  </tr>
                  <tr>
                    <td><strong>Address:</strong></td>
                  <td>
                <label>
                      <input class="form-control" name="txtAdd" type="text" id="txtMobile" value="<?php echo $Address;?>" />
                      </label>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>City:</strong></td>
                <td>
                      <label>
                      <input class="form-control" type="text" name="txtCity" id="txtCity" value="<?php echo $City;?>" />
                      </label>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Mobile Number:</strong></td>
                <td>
                  <label>
                      <input class="form-control" type="text" name="txtMobile" id="txtMobile" value="<?php echo $MobileNo;?>" />
                      </label>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>EmailId:</strong></td>
                <td>
                      <label>
                      <input class="form-control" type="text" name="txtEmail" id="txtEmail" value="<?php echo $EmailId;?>" />
                      </label>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Gender:</strong></td>
                <td>
                  <select name="cmbGender" id="cmbGender">
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>BirthDate:</strong></td>
                <td>
                      <label>
                      <input class="form-control" type="text" name="txtDate" id="txtDate" value="<?php echo $BirthDate;?>" />
                      </label>
                    </td>
                  </tr>
                  <tr>
                    <td>User Name:</td>
                <td><label>
                      <input class="form-control" type="text" name="txtUser" id="txtUser" value="<?php echo $UserName;?>" />
                    </label></td>
                  </tr>
                  <tr>
                    <td>Password:</td>
                  <td><label>
                      <input class="form-control" type="password" name="txtPass" id="txtPass" value="<?php echo $Password;?>" />
                    </label></td>
                  </tr>
                  <tr>
                    <td>Adhar Number:</td>
                  <td><label>
                      <input class="form-control" type="text" name="txtAdhar" id="txtAdhar" value="<?php echo $Adhar;?>" />
                    </label></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><label>
                      <input class="form-control bg-warning" type="submit" name="Update Profile" id="Update Profile" value="Update Profile" />
                    </label></td>
                  </tr>
                </table>
            </form>

          </div>


<?php mysqli_close($con); ?>


        </div>
   <?php
   include "footer.php"
   ?>
