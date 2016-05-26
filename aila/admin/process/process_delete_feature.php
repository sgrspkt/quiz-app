<?php
//require_once('../bootstrap.php');
//session_start();
require_once('classes/connection.class.php');
require_once('classes/feature.class.php');
require_once('classes/locate.class.php');

$feature_id=isset($_GET['feature_id'])?$_GET['feature_id']:'';
$objdelete=new Feature();
$objdelete->setfeatureID($feature_id);
$flag=$objdelete->deletefeature();
/*echo $objdelete->sql;
exit;*/
/*echo '<pre>';
print_r($flag);
echo'</pre>';
exit;*/
if($flag){
	//echo "post already deleted";
	
	new Locate('index.php?page=feature&action=view');
	$_SESSION['msg']=$objdelete->msg="feature deleted sucessfully";
}
else{
	header('location:../index.php?page=feature&action=view&err=featurenotdeleted');
	
}
?>