<?php
session_start();


/*require_once('../admin/classes/connection.class.php');
require_once('../admin/classes/user.class.php');

$adduserobj=new User();
$flag=$adduserobj->viewUser($this->user_id);*/
?>
<!doctype html><head>
<meta charset="utf-8">
<noscript>
    <p>This site is best viewed with Javascript. If you are unable to turn on Javascript, please use this <a href="http://sitewithoutjavascript.com">site</a>.</p>
</noscript>

</head>


<html5>
<div class="container">
  <div id="logo" class="col-sm-9" > <img  class="img-responsive" src="image/logo.png" height="100px" alt="logo" /> 
  
  </div>
  
</div>
<nav class="navbar navbar-inverse" style="margin-bottom:0px; background:-webkit-linear-gradient(Black,red);">
  <div class="container-fluid" style="background:-webkit-linear-gradient(Black,red)">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" style="background:-webkit-linear-gradient(Black,red); height:58px">
      <ul class="nav navbar-nav" style=" ">
      
        <li class=""><a href="index.php">Home</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="event.php">Events</a></li>
        <li><a href="reservation.php">Reservation </a></li>
        <li><a href="about.php">About Us </a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right col-sm-4">
      <?php 
	  if(isset($_SESSION['username'])){
		  echo "<span style='color:white'> Welcome  "  .$_SESSION['username']."</span>";
		  ?>
          <a href="logout.php" style="text-decoration:none;"><span class="glyphicon glyphicon-log-out"></span>Logout</a>
          <?php
		  }
	  else {
	  ?>
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <li><a href=""><?php //echo $_SESSION['username'];?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>