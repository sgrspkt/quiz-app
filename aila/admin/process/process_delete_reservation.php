<?php
//require_once('../bootstrap.php');
//session_start();
require_once('classes/connection.class.php');
require_once('classes/reservation.class.php');
require_once('classes/locate.class.php');

$reservation_id=isset($_GET['reservation_id'])?$_GET['reservation_id']:'';
$objdelete=new Reservation();
$objdelete->setReservationID($reservation_id);
$flag=$objdelete->deletereservation();
/*echo $objdelete->sql;
exit;*/
/*echo '<pre>';
print_r($flag);
echo'</pre>';
exit;*/
if($flag){
	//echo "post already deleted";
	
	new Locate('index.php?page=reservation&action=view');
	$_SESSION['msg']=$objdelete->msg="reservation deleted sucessfully";
}
else{
	header('location:../index.php?page=reservation&action=view&err=reservationnotdeleted');
	
}
?>