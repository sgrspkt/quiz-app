<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/admin.class.php');
$objValidate=new admin();

$firstname=mysqli_real_escape_string($objValidate->conxn,$_POST['firstname']);
$lastname=mysqli_real_escape_string($objValidate->conxn,$_POST['lastname']);
$username=mysqli_real_escape_string($objValidate->conxn,$_POST['username']);
$password=mysqli_real_escape_string($objValidate->conxn,$_POST['password']);
$password=md5($password);
$email=mysqli_real_escape_string($objValidate->conxn,$_POST['email']);

$objValidate->setFirstname($firstname);
$objValidate->setLastname($lastname);

$objValidate->setUsername($username);
$objValidate->setPassword($password);
$objValidate->setEmail($email);

$flag= $objValidate->addAdmin();
/*echo $objValidate->sql;
exit;*/
/*echo '<pre>';
print_r ($objValidate);
echo '</pre>';
exit;*/

if($flag){
		/*$_SESSION['username']=$username;
		$_SESSION['adminid']=$user_id;*/
		header('location:../login.php');
}
else{
	header('location:../register.php?err=.base64_decode("error")');
}



?>