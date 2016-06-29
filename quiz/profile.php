 <?php
session_start();
require_once('admin/classes/connection.class.php');
require_once('classes/user.class.php');


$viewobj=new User();
$user_id = $_SESSION['user_id'];
$viewobj->setUserId($user_id);
$views=$viewobj->viewUser();





/*echo '<pre>';
print_r($viewobj);
echo '</pre>';
die();*/

?>
 
                
               
<link rel="stylesheet" type="text/css" href="css/style.css">
<?php 
include('header.php');
?>
<div class="container">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<div class="box-body box-profile">
<div class="photo">
  <?php
  if(sizeof($views>0)){
    /*echo '<pre>';
    print_r($views);*/
  foreach($views as $value){

 
  ?>
                  <img class="profile-user-img img-responsive img-circle" src="admin/dist/img/user4-128x128.jpg" alt="User profile picture"></div>
                  <h3 class="profile-username text-center"><?php echo $value['first_name'].' '.$value['middle_name'].' '.$value['last_name'];?></h3>
               
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Username</b> <a class="pull-right"><?php echo $value['username'];?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right"><?php echo $value['email'];?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Address</b> <a class="pull-right"><?php echo $value['address'];?></a>
                    </li>
                     <li class="list-group-item">
                      <b>Date Of Birth</b> <a class="pull-right"><?php echo $value['dob'];?></a>
                    </li>
                     <li class="list-group-item">
                      <b>Highest Score</b> <a class="pull-right"></a>
                    </li>
                    
                  </ul>
                  <?php
              }
}


                ?>

                  <a href="index.php" class="btn btn-primary btn-block"><b>Play Quiz</b></a>
                </div>
                </div>
                <div class="col-md-4"></div>
                </div>
                </div>
<style type="text/css">
	.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}
.img-circle{
	margin-top:-30px;
	margin-left: 100px;
}
h3{
	color:white;
}
