<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/about.class.php');

$addaboutObj=new About();

if(isset($_POST['add_about'])){
$about_id=$_POST['about_id'];
$about_thumb_image=$_POST['about_thumb_image']; 
$about_desc=$_POST['about_desc'];
}
$addaboutObj->setaboutID($about_id);
$addaboutObj->setaboutThumbImage($about_thumb_image);
$addaboutObj->setaboutDesc($about_desc);

/*echo '<pre>';
print_r($addaboutObj);
echo '</pre>';
exit;*/

$flag=$addaboutObj->addabout();

if($flag){
		$_SESSION['error']=$addaboutObj->er="The about successfully added";
		header('location:../index.php?page=about&action=view');
	}
else{
	$_SESSION['error']=$addaboutObj->er="The about couldn't be added";
	header('location:../index.php?page=about&action=add');
	}
?>