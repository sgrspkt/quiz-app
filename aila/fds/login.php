<?php //session_start();?>
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
<p style="color:#FD0B0F"><?php //if(isset($_POST['sign_up'])){echo $_SESSION['msg']; session_unset('msg');}?></p>
<p style="color:#FD0B0F"><?php // echo $_SESSION['username'];?></p>
	<div class="panel panel-default">
    <div class="panel-body">
    <div class="page-header">
    <h3>login Area</h3>
    </div>
<form role="form" method="post" action="../admin/process/process_validate.php">
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
<input type="password" class="form-control" id="un" placeholder="Enter Password" name="password" required>
<input type="hidden" class="form-control" name="user_id">
</div>
</div>
<hr/>
<!--<button type="submit" class="btn btn-success">Back</button>-->
<button type="submit" class="btn btn-primary" name="login">Login</button>
<p><br/></p>
<?php
if(isset($_SESSION['msg'])){
?>
  <b style="color:red"><?php echo $_SESSION['msg']; ?></b>
  <?php
unset($_SESSION['msg']);
}
?>

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
</body>
</html>
