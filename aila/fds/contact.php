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
    <h2>Contact &amp; Address Details</h2>
    <div class="col-md-8">
    <p><strong>Kumaripati, Kathmandu<br></strong>
    Cell no. 984113140136, 9813140136<br>
    Tell no. 014910882<br>
    Fax: +977-3984399248<br>
    Email:<a href="mailto:infofsl@lksdjf.com" target="_blank" >info@ai-la.com</a></br>
    <a href="">www.aila.com</a><br>
   
    <h2>Location</h2>
<div class="embed-responsive embed-responsive-16by9">
      	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.5342306514817!2d85.31899321487428!3d27.669878733744913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19d1d3a28fc7%3A0x2623b6a0c0e0609d!2sAI-LA+Resturant.Lodge!5e0!3m2!1sen!2snp!4v1448701313793" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <form name="message" method="post" action="../admin/process/process_add_message.php">
      <input type="text" class="form-control" placeholder="Name" name="visitor_name" required />
      <input type="email" class="form-control" placeholder="Email" name="visitor_email" value="" required />
      <textarea rows="10" cols="70" class="form-control" placeholder="Message" name="visitor_message" required></textarea>
      <button type="submit" class="btn btn-danger" name="message_send">send</button>
      
      </form>
      <div><?php if(isset($_POST['message_send'])){echo "Thanks for your message";}?></div>
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

       

      <p> <?php echo $value['event_desc'];?></p>
         <span class="postdate"><?php echo $value['event_date'];?></span>

        <hr />
       
         </div>
     <?php
		}
	 ?>
    </div>
    </div>
    </div>
    <!--footer start-->
    <?php include('includes/footer.php');?>

</div>

<?php include('includes/lowerfooter.php');?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>