<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/service.class.php');

$addserviceObj=new Service();

if(isset($_POST['add_service'])){
$service_id=$_POST['service_id'];
$service_title=$_POST['service_title'];
$service_thumb_image=$_POST['service_thumb_image'];
$service_desc=$_POST['service_desc'];
}
$addserviceObj->setserviceID($service_id);
$addserviceObj->setserviceTitle($service_title);
$addserviceObj->setserviceThumbImage($service_thumb_image);
$addserviceObj->setserviceDesc($service_desc);

/*echo '<pre>';
print_r($addserviceObj);
echo '</pre>';
exit;*/

$flag=$addserviceObj->addservice();

if($flag){
		$_SESSION['error']=$addserviceObj->er="The service successfully added";
		header('location:../index.php?page=service&action=view');
	}
else{
	$_SESSION['error']=$addserviceObj->er="The service couldn't be added";
	header('location:../index.php?page=service&action=add');
	}
?>