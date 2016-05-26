<?php
session_start();

require_once('../classes/connection.class.php');
require_once('../classes/user.class.php');

$adduserobj=new User();
/*echo '<pre>';
print_r($adduserobj);
echo '</pre>';
exit;*/

$user_id=mysqli_real_escape_string($adduserobj->conxn,$_POST['user_id']);
$username=mysqli_real_escape_string($adduserobj->conxn,$_POST['username']);
$password=mysqli_real_escape_string($adduserobj->conxn,$_POST['password']);
$password=md5($password);


$adduserobj->setUserID($user_id);
$adduserobj->setUsername($username);
$adduserobj->setPassword($password);


$flag=$adduserobj->validateUser();




/*echo '<pre>';
print_r ($adduserobj);
echo '</pre>';
exit;*/

if($flag){
     header('location:../../fds/index.php');
	 $_SESSION['username']=$username;
	 
}
else{
	header('location:../../fds/login.php');
	$_SESSION['msg']=$adduserobj->msg="Sorry incorrect username and password";
}

?>