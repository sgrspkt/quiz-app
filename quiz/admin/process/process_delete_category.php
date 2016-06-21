<?php
require_once('classes/connection.class.php');
require_once('classes/category.class.php');
require_once('classes/locate.class.php');

$category_id=isset($_GET['category_id'])?(int)$_GET['category_id']:'';
$deleteCatObj=new Category();
$deleteCatObj->setCategoryId($category_id);
$flag=$deleteCatObj->deleteCategory();
/*echo '<pre>';
print_r($deleteaboutObj);
echo '</pre>';
exit;*/
$locateObj = new Locate();
if($flag){
	$_SESSION['category_deleted'] = true;
$_SESSION['category_deleted_msg']=$deleteCatObj->success="The category successfully deleted";
$locateObj->getLocation('index.php?page=category&action=view');
}else{
$_SESSION['category_not_deleted'] = true;
$_SESSION['category_not_deleted_msg']=$deleteCatObj->error="The category couldn't be successfully deleted";
$locateObj->getLocation('index.php?page=category&action=view');
}

?>