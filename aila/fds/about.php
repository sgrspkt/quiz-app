<?php 
require_once('../admin/classes/connection.class.php');
require_once('../admin/classes/event.class.php');

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Aila Lounge.Restaurant</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?php include('includes/header.php');?>
   <div class="container">
   <div class="col-md-8">
   <h2>Restaurant Information</h2>
   <p ><img width="33.3%" vspace="10" hspace="10" height="139" align="right" alt="" src="image/img2.jpg" /></p>
   <p style="text-align:justify">Ai-La Restaurant in Kumaripati is a multi-cuisine restaurant best known for its Ai-La signature dishes. The items on the menu are Ai-La Pizza, Ai-La Platter, Tangry Kebab, Tiger Chicken, Satay Kai, Jhol Momo, Mini Momo etc.</p><br>
 
 <p style="text-align:justify">
Ai-La can accommodate a reasonably sized crowd of 120 pax, indoors, outdoors, and in the terrace. The wooden furniture, false ceiling, formal circular seating arranemgent, nice lightings, all add to the ambience. The restaurant is recommended for casual family gatherings, banquets, conferences, events, parties etc. The space is divided into fine dining and casual seatings. Vibrant colours in the decor bring about a youthful energy to the place. A lot of bamboo has been used to add to the interior texture of this lovely restaurant.</p><br> 
  <p style="text-align:justify">
For those who want to sing their hearts out and have fun, there's a Karaoke Lounge too! Aditionally, there's a stage for live musical performances, wide screen to watch live games, billiard tables to shoot a few balls, a rooftop garden restaurant, coffee shop, flavored Sheesha and a 360 degree view of Kathmandu & the Himalayan Range. The bar has a selection of imported and local liquor, also made available in happy hours from 3pm to 6pm. There is WiFi,  AC/Heating and TV facilities.</p> <br>
  
<h2>Our Services</h2>
            	<p ><img width="33.3%" vspace="10" hspace="10" height="139" align="right" alt="" src="image/img2.jpg" /></p>
<p align="justify">
<strong>Cuisine</strong>&nbsp; Barbeque, Burgers, Himalayan/Nepalese, Indian/Pakistani, Italian, Pizza, Sandwiches, Seafood, Thai and Vegetarian<br />
&nbsp;</p>
<p align="justify">
<strong>Parking</strong>&nbsp;Street and Parking lot
</p><br>
<p align="justify">
<strong>Paymnet</strong> &nbsp; Cash, Visa</p><br>
<p align="justify">
<strong>Specialities</strong>&nbsp;Lunch, Dinner, Coffee and Drinks</p><br>

    <!--first end-->
    
    

	<!--second end-->
   
   </div>
   <div class="col-md-4">
     <h2>Meetings & Events</h2>
      <?php 
 $eventObj = new Event();
 $view= $eventObj->viewevent();

/*echo '<pre>';
 print_r($view);
 echo '<pre>';*/
 
 ?>       
        <?php
		foreach($view as $value){
		?>
                      <div class="newsfeedmain"> <span class="title"><a href="news/show/12.html" style="font-size:14px;color:#000;font-weight:bold;"><?php echo $value['event_title'];?></a></span><br />

       
<p><?php echo $value['event_desc'];?></p>
         <span class="postdate"><?php echo $value['event_date'];?></span>

        <hr />
       
         </div>
         <?php
		}
		 ?>
          </div>
   </div>
   </div>
   <div class="wrapper" style=" background-color:#3a3a3a; padding-top:10px; color:#bababa; margin-top:10px;" >
  <div class="container">

  <?php include('includes/footer.php');?>
  </div>
</div>
</div>
<?php include('includes/lowerfooter.php');?>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>