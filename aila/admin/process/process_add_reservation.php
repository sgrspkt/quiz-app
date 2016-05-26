<?php
session_start();

require_once('../classes/connection.class.php');
require_once('../classes/reservation.class.php');

$adduserobj=new Reservation();
/*echo '<pre>';
print_r($adduserobj);
echo '</pre>';
exit;*/

//$user_id=mysqli_real_escape_string($adduserobj->conxn,$_POST['user_id']);
$reservationname=mysqli_real_escape_string($adduserobj->conxn,$_POST['reservationname']);
$telephone_home=mysqli_real_escape_string($adduserobj->conxn,$_POST['telephone_home']);
$address=mysqli_real_escape_string($adduserobj->conxn,$_POST['address']);
$telephone_business=mysqli_real_escape_string($adduserobj->conxn,$_POST['telephone_business']);
$no_of_people=mysqli_real_escape_string($adduserobj->conxn,$_POST['no_of_people']);
$date_of_arrival=mysqli_real_escape_string($adduserobj->conxn,$_POST['date_of_arrival']);
 $email=mysqli_real_escape_string($adduserobj->conxn,$_POST['email']);
  $comments=mysqli_real_escape_string($adduserobj->conxn,$_POST['comments']);
 



//$adduserobj->setUserID($user_id);
$adduserobj->setReservationname($reservationname);
$adduserobj->setTelephoneHome($telephone_home);
$adduserobj->setAddress($address);
$adduserobj->setTelephoneBusiness($telephone_business);
$adduserobj->setNoOfPeople($no_of_people);
$adduserobj->setDateOfArrival($date_of_arrival);
$adduserobj->setEmail($email);
$adduserobj->setComments($comments);



//$adduserobj->setError($er);
//$adduserobj->setMessage($msg);


$flag=$adduserobj->addReservation();
/*echo '<pre>';
print_r ($adduserobj);
echo '</pre>';
exit;*/

if($flag){
     header('location:../../rms/reservation.php');
	
	 $_SESSION['msg']=$adduserobj->msg="Thanks, You have reserved sucessfully";
}
else{
	echo $_SESSION['msg']=$adduserobj->msg="Sorry the user has not been  added, please try again later";
}

?>