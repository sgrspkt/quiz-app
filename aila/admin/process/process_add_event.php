<?php
session_start();

require_once('../classes/connection.class.php');
require_once('../classes/event.class.php');

$addeventobj=new Event();
/*echo '<pre>';
print_r($addeventobj);
echo '</pre>';
exit;
*/
 $event_id=mysqli_real_escape_string($addeventobj->conxn,$_POST['event_id']);
$event_title=mysqli_real_escape_string($addeventobj->conxn,$_POST['title']);
$event_desc=mysqli_real_escape_string($addeventobj->conxn,$_POST['desc']);
 $event_date=mysqli_real_escape_string($addeventobj->conxn,$_POST['date']);

$addeventobj->setEventID($event_id);
$addeventobj->setEventTitle($event_title);
$addeventobj->setEventDesc($event_desc);
$addeventobj->setEventDate($event_date);


//$adduserobj->setError($er);
//$adduserobj->setMessage($msg);


$addeventobj->addEvent();
/*echo '<pre>';
print_r ($adduserobj);
echo '</pre>';
exit;*/

if($addeventobj){
     header('location:../index.php?page=event&action=view');
	 $_SESSION['msg']=$addeventobj->msg="The event has been added sucessfully";
}
else{
	echo $_SESSION['msg']=$addeventobj->msg="Sorry the event has not been  added, please try again later";
}

?>