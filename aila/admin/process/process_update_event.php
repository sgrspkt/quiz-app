<?php
require_once('../classes/connection.class.php');
require_once('../classes/event.class.php');
require_once('../classes/locate.class.php');


if(isset($_POST['submit'])){
$event_id=$_POST['event_id'];
$event_title=$_POST['title'];
$event_desc=$_POST['desc'];
$event_date=$_POST['event_date'];

}

$updateEventObject=new Event();
$updateEventObject->setEventID($event_id);
$updateEventObject->setEventTitle($event_title);
$updateEventObject->setEventDesc($event_desc);
$updateEventObject->setEventDate($event_date);


 $flag=$updateEventObject->updateevent();


/*echo '<pre>';
print_r($updatePostObject);
echo '</pre>';
exit;*/
if($flag){
	$_SESSION['event_updated']=$err="The event has been updated successfully";
	new Locate('../index.php?page=event&action=view');

}
else
{
	$_SESSION['event_not_updated']=$err="The event couldn't be updated";
	new Locate('../index.php?page=event&action=view');
}

?>