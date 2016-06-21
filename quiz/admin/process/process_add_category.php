<?php 

session_start();
require_once('../classes/connection.class.php');
require_once('../classes/category.class.php');



if(isset($_POST['add_category'])){
$category_name = $_POST['category_name'];

$cdate = $_POST['created_at'];
$created_at = date("Y-m-d", strtotime($cdate));

$udate = $_POST['updated_at'];
$updated_at = date("Y-m-d", strtotime($udate));

}

$catObj=new category();

$catObj->setCategoryName($category_name);
$catObj->setCreatedAt($created_at);
$catObj->setUpdatedAt($updated_at);


$flag=$catObj->addCategory();

if($flag){
		$_SESSION['category_added'] = true;
		$_SESSION['category_added_msg']=$addaboutObj->success="The category successfully added";
		header('location:../index.php?page=category&action=view');
	}
else{
	$_SESSION['category_not_added'] = true;
	$_SESSION['category_not_added_msg']=$addaboutObj->error="The category couldn't be added";
	header('location:../index.php?page=category&action=add');
	}
?>

