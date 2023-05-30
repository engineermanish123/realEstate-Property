<?php include 'top.php'; ?>

  <?php
  include "Headermenu.php"
  ?>
	<div class="bradcam_area">

		<div class="container col-lg-4">
			<h2 class="text-center">Create New Category</h2>

			<form id="form1" name="form1" method="post" action="InsertCategory.php">

				<div id="sprytextfield1" class="form-group">
					<input type="text" class="form-control" name="txtCategoryName" id="txtCategoryName" placeholder="Category Name" required="required" />
				</div>

				<div id="sprytextarea1" class="form-group">
					<textarea type="textarea" name="txtDesc" id="txtDesc" cols="45" rows="5" placeholder="Description" required="required"></textarea>
				</div>

				<div class="form-group">
					<button type="submit" name="button" id="button" value="Submit" class="btn btn-primary btn-lg btn-block">Submit</button>
				</div>
				</form>
		</div>

<table class="table">
<tr>
<th><div>Id</div></th>
<th><div>Category</div></th>
<th><div>Description</div></th>
<th><div>Edit</div></th>
<th>Delete</div></th>
</tr>
<?php
// Establish Connection with Database
$con = mysqli_connect("localhost","root");
// Select Database
mysqli_select_db($con,"pms");
// Specify the query to execute
$sql = "select * from Category_Master";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records
while($row = mysqli_fetch_array($result))
{
$Id=$row['CategoryId'];
$Name=$row['CategoryName'];
$Desc=$row['Category_Desc'];
?>
<tr>
<td><div><?php echo $Id;?></div></td>
<td><div><?php echo $Name;?></div></td>
<td><div><?php echo $Desc;?></div></td>
<td><div><a href="EditCategory.php?CategoryId=<?php echo $Id;?>">Edit</a></div></td>
<td><div><a href="DeleteCategory.php?CategoryId=<?php echo $Id;?>">Delete</a></div></td>
</tr>
<?php
}
// Retrieve Number of records returned
$records = mysqli_num_rows($result);
?>
<tr>
<td colspan="5"><div><?php echo "Total ".$records." Records"; ?> </div></td>
</tr>
<?php
// Close the connection
mysqli_close($con);
?>
</table>

  </div>

   <?php
   include "footer.php"
   ?>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
</script>
