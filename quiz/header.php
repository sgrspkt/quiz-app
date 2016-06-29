<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>QuizApp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Quiz App</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
       <li><a href="about.php">About Us</a></li>
      <li><a href="profile.php">Profile</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li>
      <?php if($_SESSION['username'] != NULL){?>
      <a href="profile.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username'];?></a>
      <a href="logout.php"><span class="glyphicon glyphicon-user"></span>Logout</a>
      <?php }else{?>
      <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
      <?php }?>
      </li>
    </ul>
  </div>
</nav>
