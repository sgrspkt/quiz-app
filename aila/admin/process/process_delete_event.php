<?php
//require_once('../bootstrap.php');
//session_start();
require_once('classes/connection.class.php');
require_once('classes/event.class.php');
require_once('classes/locate.class.php');

$event_id=isset($_GET['event_id'])?$_GET['event_id']:'';
$objdelete=new event();
$objdelete->setEventID($event_id);
$flag=$objdelete->deleteEvent();
/*echo $objdelete->sql;
exit;*/
/*echo '<pre>';
print_r($flag);
echo'</pre>';
exit;*/
if($flag){
	//echo "post already deleted";
	
	new Locate('index.php?page=event&action=view');
	$_SESSION['msg']=$objdelete->msg="Event deleted sucessfully";
}
else{
	header('location:../index.php?page=event&action=view&err=eventnotdeleted');
	
}
?>