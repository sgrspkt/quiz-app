<?php
//require_once('../bootstrap.php');
//session_start();
require_once('classes/connection.class.php');
require_once('classes/message.class.php');
require_once('classes/locate.class.php');

$visitor_id=isset($_GET['visitor_id'])?$_GET['visitor_id']:'';
$objdelete=new Message();
$objdelete->setVisitorID($visitor_id);
$flag=$objdelete->deleteMessage();
/*echo $objdelete->sql;
exit;*/
/*echo '<pre>';
print_r($flag);
echo'</pre>';
exit;*/
if($flag){
	//echo "post already deleted";
	
	new Locate('index.php?page=message&action=view');
	$_SESSION['msg']=$objdelete->msg="message deleted sucessfully";
}
else{
	header('location:../index.php?page=message&action=view&err=messagenotdeleted');
	
}
?>