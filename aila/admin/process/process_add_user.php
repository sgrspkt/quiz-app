<?php
session_start();

require_once('../classes/connection.class.php');
require_once('../classes/user.class.php');

$adduserobj=new User();
/*echo '<pre>';
print_r($adduserobj);
echo '</pre>';
exit;*/

//$user_id=mysqli_real_escape_string($adduserobj->conxn,$_POST['user_id']);
$fullname=mysqli_real_escape_string($adduserobj->conxn,$_POST['fullname']);
$username=mysqli_real_escape_string($adduserobj->conxn,$_POST['username']);
$password=mysqli_real_escape_string($adduserobj->conxn,$_POST['password']);
$password=md5($password);
$confirm_password=mysqli_real_escape_string($adduserobj->conxn,$_POST['confirm_password']);
$confirm_password=md5($confirm_password);
$address=mysqli_real_escape_string($adduserobj->conxn,$_POST['address']);
$telephone=mysqli_real_escape_string($adduserobj->conxn,$_POST['telephone']);
 $email=mysqli_real_escape_string($adduserobj->conxn,$_POST['email']);
 



//$adduserobj->setUserID($user_id);
$adduserobj->setFullname($fullname);
$adduserobj->setUsername($username);
$adduserobj->setPassword($password);
$adduserobj->setCPassword($confirm_password);
$adduserobj->setEmail($email);
$adduserobj->setAddress($address);
$adduserobj->setTelephone($telephone);



//$adduserobj->setError($er);
//$adduserobj->setMessage($msg);


$flag=$adduserobj->addUser();
/*echo '<pre>';
print_r ($adduserobj);
echo '</pre>';
exit;*/

if($flag){
     header('location:../../fds/login.php');
	
	 $_SESSION['msg']=$adduserobj->msg="Thanks, You have registered sucessfully";
}
else{
	echo $_SESSION['msg']=$adduserobj->msg="Sorry the user has not been  added, please try again later";
}

?>