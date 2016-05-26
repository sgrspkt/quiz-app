<?php
require_once('../classes/connection.class.php');
require_once('../classes/feature.class.php');
require_once('../classes/locate.class.php');


if(isset($_POST['submit'])){
$feature_id=$_POST['feature_id'];
$feature_title=$_POST['title'];
$feature_desc=$_POST['desc'];

}

$updatefeatureObject=new Feature();
$updatefeatureObject->setfeatureID($feature_id);
$updatefeatureObject->setfeatureTitle($feature_title);
$updatefeatureObject->setfeatureDesc($feature_desc);



$flag=$updatefeatureObject->updatefeature();
// echo '<pre>';
// print_r($flag);
// echo '</pre>';
// exit;
if($flag){
	$_SESSION['feature_updated']=$err="The feature has been updated successfully";
	new Locate('../index.php?page=feature&action=view');

}
else
{
	$_SESSION['feature_not_updated']=$err="The feature couldn't be updated";
	new Locate('../index.php?page=feature&action=view');
}

?>