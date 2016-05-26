<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/category.class.php');

$addCategoryObj=new Category();

if(isset($_POST['add_category'])){
$category_id=$_POST['category_id'];
$category_title=$_POST['category_title'];
$category_thumb_image=$_POST['category_thumb_image'];

}
$addCategoryObj->setCategoryID($category_id);
$addCategoryObj->setCategoryTitle($category_title);
$addCategoryObj->setCategoryThumbImage($category_thumb_image);


/*echo '<pre>';
print_r($addCategoryObj);
echo '</pre>';
exit;*/

$flag=$addCategoryObj->addCategory();

/*echo '<pre>';
print_r($addCategoryObj->addCategory());
echo '</pre>';
exit;*/
if($flag){
		$_SESSION['error']=$addCategoryObj->er="The category successfully added";
		header('location:../index.php?page=category&action=view');
	}
else{
	$_SESSION['error']=$addCategoryObj->er="The category couldn't be added";
	header('location:../index.php?page=category&action=add');
	}
?>