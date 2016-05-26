<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/service.class.php');
require_once('../classes/locate.class.php');

$service_id=isset($_GET['service_id'])?(int)$_GET['service_id']:'';
$deleteserviceObj=new Service();
$deleteserviceObj->setserviceID($service_id);
$flag=$deleteserviceObj->deleteservice();
/*echo '<pre>';
print_r($deleteserviceObj);
echo '</pre>';
exit;*/
if($flag){
header('location:../index.php?page=service&action=view');
$_SESSION['service_deleted']=$deleteserviceObj->msg="The service successfully deleted";
}else{
header('location:../index.php?page=service&action=view');
$_SESSION['service_not_deleted']=$deleteserviceObj->msg="The service couldn't be successfully deleted";

}

?>