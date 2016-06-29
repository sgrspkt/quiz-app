

<!DOCTYPE html>
<html>
<head>
<title>Quiz APP</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<link rel="stylesheet" href="css/creditly.css">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<?php require_once('header.php');?>
<div class="container">
<div class="col-md-4"></div>
<div class="col-md-4">
<!-- <div class="alert alert-success">
  <strong><?php 
  
  if($_SESSION['user_added'] && $_SESSION['user_added_msg'] == true){
  	echo $_SESSION['user_added_msg'];
  }
  ?></strong>

</div> -->
</div><div class="col-md-4"></div>
</div>

<div class="content">


	<h1>Quiz App Login</h1>
	

		<div class="main">
			<div class="row">
				<form action="process/process_login.php" method="post" class="creditly-card-form">
					<section class="creditly-wrapper">
						<div class="credit-card-wrapper">
							<div class="form-group">
								<div class="controls">
									<label class="control-label">Username</label>
									<input class="form-control custom" type="text" name="user_name" placeholder="Ram">
								</div>
								<div class="controls">
									<label class="control-label">Password</label>
									<input class="form-control" type="password" name="password" placeholder="******">
									<input class="form-control" type="hidden" name="user_id" value="<?php ?>">
								</div>
							</div>
							<button class="submit"><span>LOGIN</span></button>
						</div>
					</section>
					
				</form>
			</div> 
		</div>
</div>	
</body>
</html>
