<?php
if (!isset($_SESSION))
{
  session_start();

}
?>
<?php include "top.php"; ?>

  <?php
  include "Headermenu.php";
  ?>

  <div class="slider_area">
	            <div class="single_slider  d-flex align-items-center slider_bg_1">
	                    <div class="container">
                          <div class="alert alert-success animated bounceInRight">
                            <h1> Hello <?php echo $_SESSION['CustomerName'];?></h1>
                            <strong>Success!</strong> log in Success
                          </div>
	                    </div>
	                </div>

	    </div>
	    <!-- slider_area_end -->



<?php
include "footer.php";
?>
