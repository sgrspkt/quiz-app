<?php
require_once('../admin/classes/connection.class.php');
require_once('../admin/classes/event.class.php');
require_once('../admin/classes/user.class.php');
?>

<?php /*?><?php
$user_id=isset($_GET['user_id'])?(int)$_GET['user_id']:'';
$updateObj=new user();
$updateObj->setuserID($user_id);
$data=$updateObj->viewuser();
//$updateObj->setaboutID($about_id);

	echo '<pre>';
print_r($data);
echo'</pre>';

foreach($data as $value){
}
?><?php */?>

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
    	<div class=" col-md-8">
        	<h2>Reservation</h2>
            <p>Please Fill Up Form Below For Reservation</p>
            <form action="../admin/process/process_add_reservation.php" method="post">
    <div class="form-horizontal">
      <label class=" control-label col-sm-3" for=" Name">Name:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="Name" name="reservationname" placeholder="Name" required>
      </div>
    </div>
    <div class="form-horizontal">
      <label class=" control-label col-sm-3" for=" City">Address:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="city" name="address" placeholder="Address">
      </div>
    </div>
    <div class="form-horizontal">
      <label class=" control-label col-sm-3" for=" tell">Mobile Number:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="tell" name="telephone_home" placeholder="Phone">
      </div>
    </div>
    <div class="form-horizontal">
      <label class=" control-label col-sm-3" for=" Telephone">Phone(Home):</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="tell" name="telephone_business" placeholder="Telephone">
      </div>
    </div>
    <div class="form-horizontal">
      <label class=" control-label col-sm-3" for=" email">Email Address:</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="Email" name="email" placeholder="email" required>
      </div>
    </div>
    <div class="form-horizontal">
      <label class=" control-label col-sm-3" for=" date">Date of Arrival:</label>
      <div class="col-sm-9">
      <input name="date_of_arrival" class="form-control" type="date" min="<?php echo date("Y-m-d");?>" required="required" id="date" placeholder="Arrival" >
        
      </div>
    </div>
    <div class="form-horizontal">
      <label class=" control-label col-sm-3" for=" people">No. of People:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="people" name="no_of_people" placeholder="No. of people">
      </div>
    </div>
    
<div class="form-horizontal">
      <label class=" control-label col-sm-3" for=" comments">Any Other Comments:</label>
      <div class="col-sm-9">
        <textarea cols="40" rows="6" name="comments" placeholder="Comments"></textarea>
      </div>
    </div>
    <div class="form-horizontal">
      <label class=" control-label col-sm-3" for=" date"></label>
      <div class="col-sm-9">
        <input type="reset" class=" btn-danger" value="Reset" id="reset" name="reset">
         <input type="submit" class=" btn-danger" value="submit" id="submit" name="submit">
      </div>
    </div>
    	</form>
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

       
<p> <?php echo $value['event_desc'];?> </p>
         <span class="postdate"><?php echo $value['event_date'];?></span>

        <hr />
       
         </div>
       <?php
		}
	   ?>
    </div>
    
    </div>
    
    
    
    
    
    
    <?php include('includes/footer.php');?>
</div>
<?php include('includes/lowerfooter.php');?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>