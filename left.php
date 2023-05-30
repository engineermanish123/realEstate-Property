<?php include 'top.php'; ?>
<?php include 'HeaderMenu.php'; ?>

<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>


<!-- bradcam_area  -->
       <div class="bradcam_area bradcam_bg_1">
              <div class="container col-lg-4">

              <!-- <div class="login-form"> -->
                <form action="login.php" method="post">
                		<div class="avatar text-center">
                      <a><i class="fa fa-5x fa-user"></i></a>
                			<!-- <img src="images/user.jpg" alt="Avatar"> -->
                		</div>
                        <h2 class="text-center">Member Login</h2>

                        <div id="sprytextfield1" class="form-group">
                        	<input type="text" class="form-control" name="txtUserName" id="txtUserName" placeholder="Username" required="required">
                        </div>

                		      <div id="sprytextfield2" class="form-group">
                            <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Password" required="required">
                        </div>

                        <div id="sprytextfield3" class="form-group">
                          <select class="form-control" name="cmbUserType" id="cmbUserType">

                            <option>Customer</option>
                            <option>Admin</option>

                          </select>
                           <br>
                        </div>
                        <br>
                        <div class="form-group">

                            <button type="submit" name="button" id="button" value="Submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                        </div>
                		<div class="clearfix">
                            <label class=" text-light pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
                            <a href="#" class="pull-right">Forgot Password?</a>
                        </div>
                    </form>
                    <p class="text-warning text-center small">Don't have an account? <a href="register.php">Sign up here!</a></p>
                <!-- </div> -->

              </div>

          </div>
          <!--/ bradcam_area  -->

<?php include 'footer.php'; ?>

<script type="text/javascript">

var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");

</script>
