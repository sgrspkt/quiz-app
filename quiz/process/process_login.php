<?php
session_start();
require_once('../admin/classes/connection.class.php');
require_once('../classes/user.class.php');

$conObj = new Connection();
/*echo '<pre>';
print_r($conObj);
echo '</pre>';
die();*/
$objValidate=new user();	
$username=mysqli_real_escape_string($objValidate->conxn,$_POST['user_name']);
$password=mysqli_real_escape_string($objValidate->conxn,$_POST['password']);
$password=md5($password);
$objValidate->setUsername($username);
$objValidate->setPassword($password);
$flag= $objValidate->validateUser();
/*echo '<pre>';
print_r($objValidate);
echo '</pre>';
die();*/
if($flag){
	
	$_SESSION['uname'] = true;
		$_SESSION['username']=$username;
		header('location:../index.php?homepage');
}
else{
	//echo "sorrry"; die();
	header('location:../login.php?err=.base64_decode("invalid username and password")') ;
	$_SESSION['msg']=$adduserobj->msg="Sorry incorrect username and password";
	
}



?>