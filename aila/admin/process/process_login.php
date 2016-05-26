<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/admin.class.php');
$objValidate=new admin();

$username=mysqli_real_escape_string($objValidate->conxn,$_POST['username']);
$password=mysqli_real_escape_string($objValidate->conxn,$_POST['password']);


//$password=crypt($password);
$objValidate->setUsername($username);
$objValidate->setPassword($password);

$flag= $objValidate->validateAdmin();
/*echo $objValidate->sql;
exit;*/
// echo '<pre>';
// print_r ($objValidate);
// echo '</pre>';
// exit;

if($flag){
		$_SESSION['username']=$username;
		//$_SESSION['adminid']=$user_id;
		header('location:../index.php?homepage');
}
else{
	header('location:../login.php?err=.base64_decode("invalid username and password")') ;
	$_SESSION['msg']=$adduserobj->msg="Sorry incorrect username and password";
	
}



?>