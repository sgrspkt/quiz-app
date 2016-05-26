<?php
session_start();

require_once('../classes/connection.class.php');
require_once('../classes/message.class.php');

$addmessageobj=new Message();
/*echo '<pre>';
print_r($addmessageobj);
echo '</pre>';
exit;
*/
 $visitor_id=mysqli_real_escape_string($addmessageobj->conxn,$_POST['visitor_id']);
$visitor_name=mysqli_real_escape_string($addmessageobj->conxn,$_POST['visitor_name']);
$visitor_email=mysqli_real_escape_string($addmessageobj->conxn,$_POST['visitor_email']);
$visitor_message=mysqli_real_escape_string($addmessageobj->conxn,$_POST['visitor_message']);


$addmessageobj->setVisitorID($visitor_id);
$addmessageobj->setVisitorName($visitor_name);
$addmessageobj->setVisitorEmail($visitor_email);
$addmessageobj->setVisitorMessage($visitor_message);


//$adduserobj->setError($er);
//$adduserobj->setMessage($msg);


$addmessageobj->addMessage();
/*echo '<pre>';
print_r ($addmessageobj);
echo '</pre>';
exit;*/

if($addmessageobj){
     header('location:../../rms/contact.php');
	 $_SESSION['msg']=$addmessageobj->msg="Thanks, you have successfully sent your message";
}
else{
	echo $_SESSION['msg']=$addmessageobj->msg="Sorry the message has not been  added, please try again later";
}

?>