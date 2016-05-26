<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aila Lounge.Restaurant</title>
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<?php include('includes/header.php');?>
<div class="container">
<p><br/></p>
<div class="col-md-8"></div>
<div class="col-md-4">
	<div class="panel panel-default">
    <div class="panel-body">
    <div class="page-header">
    <h3>Be Our Member</h3>
    </div>
<form role="form" action="../admin/process/process_add_user.php" method="post" id="signup">

<div class="form-group">
<label for="username">Full NAme</label>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" class="form-control" id="fn" placeholder="Enter Your Full Name" name="fullname" required>

</div>
</div>

<div class="form-group">
<label for="username">Username</label>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" class="form-control" id="un" placeholder="Enter Username" name="username" required>
</div>
</div>
<div class="form-group">

<label for="username">Password</label>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
</div>
</div>
<hr/>
<div class="form-group">
<label for="repassword">Confirm Password</label>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
<input type="password" class="form-control" id="confirmpassword" placeholder="Again Enter Password" name="confirm_password" required/>
</div>
<hr/>
<label for="address">Address</label>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" class="form-control" id="un" placeholder="Enter Address" name="address" required>
</div>
<hr/>
<label for="phone">Phone Number</label>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="number"  class="form-control" id="un" placeholder="Enter Phone Number" name="telephone" required>
</div>
<hr/>
<label for="email">Email</label>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="email" class="form-control" id="un" placeholder="Enter Email" name="email" required>
</div>
<hr/>
<!--<button type="submit" class="btn btn-success">Back</button>-->
<button type="submit" class="btn btn-primary" name="sign_up">Signup</button>
<p><br/></p>
</form>
</div>
</div></div></div>
</div>
</div>





<!--footer start-->
<?php include('includes/footer.php');?>

</div>
<?php include('includes/lowerfooter.php');?>

</body>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jrms.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
 $(document).ready(function() {
	 
	 jQuery.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^[a-zA-Z ]*$/
.test(value);
}, "Letters only please");


	$("#signup").validate({
  rules: {
    fullname: {
      required: true,
     alphanumeric:true,
	  minlength: 6
    },password: {
            required: true,
            minlength: 5
        },
        confirm_password: {
            required: true,
            minlength: 5,
            equalTo: "#password"
        },telephone:{
			minlength: 10
			}
  },
  messages: {
    fullname: {
      required: "We need your full name.",
      minlength: "at least 6 character required "
    }, password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        confirm_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
        },
		telephone:{
			minlength:"Your number  must be at least 10 characters long"
			}
  }
});
});
</script>
</body>
</html>
