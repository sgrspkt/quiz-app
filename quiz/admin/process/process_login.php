<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/admin.class.php');

$conObj = new Connection();
/*echo '<pre>';
print_r($conObj);
echo '</pre>';
die();*/
$objValidate=new admin();

$username=mysqli_real_escape_string($objValidate->conxn,$_POST['username']);
$password=mysqli_real_escape_string($objValidate->conxn,$_POST['password']);
$password=md5($password);
$objValidate->setUsername($username);
$objValidate->setPassword($password);
$flag= $objValidate->validateAdmin();
if($flag){
		$_SESSION['username']=$username;
		//echo $_SESSION['username']; die('here');
		/*$admin_id = $_SESSION['admin_id']=$objValidate->admin_id;*/
		/*echo $admin_id;
		die('here');*/
		header('location:../index.php?homepage');
}
else{
	header('location:../login.php?err=.base64_decode("invalid username and password")') ;
	$_SESSION['msg']=$adduserobj->msg="Sorry incorrect username and password";
	
}



?>