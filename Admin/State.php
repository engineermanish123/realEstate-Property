<?php include 'top.php'; ?>

  <?php
  include "Headermenu.php"
  ?>

      <div class="bradcam_area">
      <div class="container col-lg-4">
				<h2 class="text-center">Create New State</h2>
				<form id="form1" name="form1" method="post" action="InsertState.php">

					<div id="sprytextfield1" class="form-group">
						<input type="text" class="form-control" name="txtStateName" id="txtStateName" placeholder="State Name" required="required" />
					</div>

					<div class="form-group">
						<button type="submit" name="button" id="button" value="Submit" class="btn btn-primary btn-lg btn-block">Submit</button>
					</div>
				</from>
      </div>

			<div class="container">
				<table class="table">
				<tr>
				<th><div class="text-light">State Id</div></th>
				<th><div class="text-light">State Name</div></th>
				<th><div class="text-light">Edit</div></th>
				<th><div class="text-light">Delete</div></th>
				</tr>
				<?php
				// Establish Connection with Database
				$con = mysqli_connect("localhost","root");
				// Select Database
				mysqli_select_db($con,"pms");
				// Specify the query to execute
				$sql = "select * from State_Master";
				// Execute query
				$result = mysqli_query($con,$sql);
				// Loop through each records
				while($row = mysqli_fetch_array($result))
				{
				$Id=$row['StateId'];
				$Name=$row['StateName'];
				?>
				<tr>
				<td><div><?php echo $Id;?></div></td>
				<td><div><?php echo $Name;?></div></td>
				<td><div><a href="EditState.php?StateId=<?php echo $Id;?>">Edit</a></div></td>
				<td><div><a href="DeleteState.php?StateId=<?php echo $Id;?>">Delete</a></div></td>
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
</script>
</body>
</html>
