<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/about.class.php');
require_once('../classes/locate.class.php');

$about_id=isset($_GET['about_id'])?(int)$_GET['about_id']:'';
$deleteaboutObj=new About();
$deleteaboutObj->setaboutID($about_id);
$flag=$deleteaboutObj->deleteabout();
/*echo '<pre>';
print_r($deleteaboutObj);
echo '</pre>';
exit;*/
if($flag){
header('location:../index.php?page=about&action=view');
$_SESSION['about_deleted']=$deleteaboutObj->msg="The about successfully deleted";
}else{
header('location:../index.php?page=about&action=view');
$_SESSION['about_not_deleted']=$deleteaboutObj->msg="The about couldn't be successfully deleted";

}

?>