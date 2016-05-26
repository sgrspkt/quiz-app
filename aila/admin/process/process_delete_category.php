<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/category.class.php');
require_once('../classes/locate.class.php');

$category_id=isset($_GET['category_id'])?(int)$_GET['category_id']:'';
$deleteCategoryObj=new Category();
$deleteCategoryObj->setCategoryID($category_id);
$flag=$deleteCategoryObj->deleteCategory();
/*echo '<pre>';
print_r($deleteBlogObj);
echo '</pre>';
exit;*/
if($flag){
header('location:../index.php?page=category&action=view');
$_SESSION['category_deleted']=$deleteCategoryObj->msg="The category successfully deleted";
}else{
header('location:../index.php?page=category&action=view');
$_SESSION['category_not_deleted']=$deleteCategoryObj->msg="The category couldn't be successfully deleted";

}

?>