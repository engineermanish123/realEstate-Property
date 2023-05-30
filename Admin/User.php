<?php include 'top.php'; ?>

  <?php
  include "Headermenu.php"
  ?>
<div class="bradcam_area">

	<div class="container col-lg-4">
		<h2 class="text-center">Create New User</h2>

		<form id="form1" name="form1" method="post" action="InsertUser.php">
			<div id="sprytextfield1" class="form-group">
				<input type="text" class="form-control" name="txtUserName" id="txtUserName" placeholder="Username" required="required" />
			</div>

			<div id="sprytextfield2" class="form-group">
				<input type="text" class="form-control" name="txtPassword" id="txtPassword" placeholder="Password" required="required" />
			</div>

			<div class="form-group">
				<button type="submit" name="button" id="button" value="Submit" class="btn btn-primary btn-lg btn-block">Submit</button>
			</div>

	</div>

<div class="container">
	<table class="table">
	<tr>
	<th><div class="text-light"><strong>Id</strong></div></th>
	<th><div class="text-light"><strong>Username</strong></div></th>
	<th><div class="text-light"><strong>Edit</strong></div></th>
	<th><div class="text-light">Delete</div></th>
	</tr>
	<?php
	// Establish Connection with Database
	$con = mysqli_connect("localhost","root");
	// Select Database
	mysqli_select_db($con,"pms");
	// Specify the query to execute
	$sql = "select * from customer_reg";
	// Execute query
	$result = mysqli_query($con,$sql);
	// Loop through each records
	while($row = mysqli_fetch_array($result))
	{
	$Id=$row['CustomerId'];
	$UserName=$row['UserName'];

	?>
	<tr>
	<td><div><strong><?php echo $Id;?></strong></div></td>
	<td><div><strong><?php echo $UserName;?></strong></div></td>
	<td><div><strong><a href="EditUser.php?UserId=<?php echo $Id;?>">Edit</a></strong></div></td>
	<td><div><strong><a href="DeleteUser.php?UserId=<?php echo $Id;?>">Delete</a></strong></div></td>
	</tr>
	<?php
	}
	// Retrieve Number of records returned
	$records = mysqli_num_rows($result);
	?>
	<tr>
	<td colspan="4"><div class="text-light"><?php echo "Total ".$records." Records"; ?> </div></td>
	</tr>
	<?php
	// Close the connection
	mysqli_close($con);
	?>
	</table>
</div>
</div>

   <?php
   include "footer.php"
   ?>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
