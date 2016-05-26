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
<div id="my-slider" class="carousel slide" data-ride="carousel" > 
  
  <!--indicators dot nav-->
  <ol class="carousel-indicators">
    <li data-target="#my-slider" data-slide-to="0" class="active" ></li>
    <li data-target="#my-slider" data-slide-to="1"></li>
    <li data-target="#my-slider" data-slide-to="2"></li>
    <li data-target="#my-slider" data-slide-to="3"></li>
    <li data-target="#my-slider" data-slide-to="4"></li>
  </ol>
  <!-- wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active"> <img src="image/img1.jpg" alt="image" class="img-responsive" style="width: 100%" >
      <div class="carousel-caption">
        <h1>Aila Lounge</h1>
      </div>
    </div>
    <div class="item"> <img src="image/img2.jpg" alt="image" class="img-responsive" style="width: 100%">
      <div class="carousel-caption">
        <h1>Aila</h1>
      </div>
    </div>
    <div class="item"> <img src="image/img3.jpg" alt="image" class="img-responsive" style="width: 100%">
      <div class="carousel-caption">
        <h1>Aila</h1>
      </div>
    </div>
    <div class="item"> <img src="image/img4.jpg" alt="image" class="img-responsive" style="width: 100%">
      <div class="carousel-caption">
        <h1>Aila</h1>
      </div>
    </div>
    <div class="item"> <img src="image/img5.jpg" alt="image" class="img-responsive" style="width: 100%">
      <div class="carousel-caption">
        <h1>Aila</h1>
      </div>
    </div>
    
    <!-- controls or next and previous buttons --> 
    
    <a class="left carousel-control" href="#my-slider" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" > </span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#my-slider" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" > </span> <span class="sr-only">Next</span> </a> </div>
</div>
</div>
</div>
<?php include('includes/features.php');?>
<!--block end-->

<div class="container">
<?php include('includes/introduction.php');?>
<?php include('includes/services.php');?>
<?php include('includes/dishes.php');?>
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
