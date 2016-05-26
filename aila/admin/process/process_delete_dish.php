<?php
//require_once('../bootstrap.php');
//session_start();
require_once('classes/connection.class.php');
require_once('classes/dish.class.php');
require_once('classes/locate.class.php');

$dish_id=isset($_GET['dish_id'])?$_GET['dish_id']:'';
$objdelete=new Dish();
$objdelete->setdishID($dish_id);
$flag=$objdelete->deletedish();
/*echo $objdelete->sql;
exit;*/
/*echo '<pre>';
print_r($flag);
echo'</pre>';
exit;*/
if($flag){
	//echo "post already deleted";
	
	new Locate('index.php?page=dish&action=view');
	$_SESSION['msg']=$objdelete->msg="dish deleted sucessfully";
}
else{
	header('location:../index.php?page=dish&action=view&err=dishnotdeleted');
	
}
?>