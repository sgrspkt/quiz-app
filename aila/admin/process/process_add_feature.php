<?php
session_start();

require_once('../classes/connection.class.php');
require_once('../classes/feature.class.php');

$addfeatureobj=new Feature();
/*echo '<pre>';
print_r($addfeatureobj);
echo '</pre>';
exit;
*/
 $feature_id=mysqli_real_escape_string($addfeatureobj->conxn,$_POST['feature_id']);
$feature_title=mysqli_real_escape_string($addfeatureobj->conxn,$_POST['title']);
$feature_desc=mysqli_real_escape_string($addfeatureobj->conxn,$_POST['desc']);


$addfeatureobj->setfeatureID($feature_id);
$addfeatureobj->setfeatureTitle($feature_title);
$addfeatureobj->setfeatureDesc($feature_desc);



//$adduserobj->setError($er);
//$adduserobj->setMessage($msg);


$addfeatureobj->addfeature();
/*echo '<pre>';
print_r ($adduserobj);
echo '</pre>';
exit;*/

if($addfeatureobj){
     header('location:../index.php?page=feature&action=view');
	 $_SESSION['msg']=$addfeatureobj->msg="The feature has been added sucessfully";
}
else{
	echo $_SESSION['msg']=$addfeatureobj->msg="Sorry the feature has not been  added, please try again later";
}

?>