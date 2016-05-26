<?php
//require_once('../bootstrap.php');
//session_start();
require_once('classes/connection.class.php');
require_once('classes/user.class.php');
require_once('classes/locate.class.php');

$user_id=isset($_GET['user_id'])?$_GET['user_id']:'';
$objdelete=new User();
$objdelete->setUserID($user_id);
$flag=$objdelete->deleteUser();
/*echo $objdelete->sql;
exit;*/
/*echo '<pre>';
print_r($flag);
echo'</pre>';
exit;*/
if($flag){
	//echo "user already deleted";
	
	new Locate('index.php?page=user&action=view');
	$_SESSION['msg']=$objdelete->msg="User deleted sucessfully";
}
else{
	header('location:../index.php?page=user&action=view&err=usernotdeleted');
	
}
?>