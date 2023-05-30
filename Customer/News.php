<?php include 'top.php'; ?>
<?php include 'HeaderMenu.php'; ?>

<div class="bradcam_area bradcam_bg_1">


<?php
$user = 'root';
$pass = '';
$db = 'pms';
$con = new mysqli('localhost', $user, $pass, $db) or die("Couldn't connet to SQL server");


// Specify the query to execute
$sql = "SELECT * FROM news_master";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records
while($row = mysqli_fetch_array($result))
{
$News=$row['News'];
?>

<div class="animated bounceInRight container text-light">
  <?php echo $News;?>
</div>

<?php } ?>

<?php mysqli_close($con); ?>

</div>
<?php include 'footer.php'; ?>
