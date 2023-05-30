<?php include 'top.php'; ?>
<?php include 'HeaderMenu.php'; ?>

<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<SCRIPT language="JavaScript1.2" src="gen_validation.js"></SCRIPT>
<SCRIPT language="JavaScript1.2">
var arrFormValidation=
             [
			 		[//Name
						  ["minlen=1",
		"Please Enter Name "
						  ]

                     ],
				   [//Mobile

						  ["num",
		"Please Enter valid Mobile "
						  ],
						  ["minlen=10",
		"Please Enter valid Mobile "
						  ]



                   ],
				   [//Email
						   ["minlen=1",
		"Please Enter Email "
						  ],
						  ["email",
		"Please Enter valid email "
						  ]

                   ],
				   [//Feedback

						  ["minlen=1",
		"Please Give Feedback "
						  ]

                   ]
            ];
</SCRIPT>


					<div class="bradcam_area bradcam_bg_1" style="padding-top:200px; padding-bottom:0px;">

					<div class="container col-lg-4">
						<form id="form2" name="form2" method="post" action="InsertFeedback.php" onSubmit="return validateForm(this,arrFormValidation);">
							<div id="sprytextfield3" class="form-group">
								<input type="text" class="form-control" name="txtName" id="txtName" placeholder="Name" required="required">
							</div>

								<div id="sprytextfield4" class="form-group">
									<input type="text" class="form-control" name="txtMobile" id="txtMobile" placeholder="Moblie Number" required="required">
								</div>

								<div id="sprytextfield5" class="form-group">
									<input type="text" class="form-control" name="txtEmail" id="txtEmail" placeholder="Email" required="required">
								</div>

								<div id="sprytextfield1" class="form-group">
									<textarea name="txtFeedback" id="txtFeedback" cols="40" rows="3" placeholder="Feedback"></textarea>
								</div>

								<div class="form-group">
									<input type="submit" class="btn btn-primary btn-lg btn-block" name="button2" id="button2" value="Submit">
								</div>
                </form>

					</div>

   <?php
   include "footer.php"
   ?>

<script type="text/javascript">

var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");

</script>
