<?php
require_once('../classes/connection.class.php');
require_once('../classes/dish.class.php');
require_once('../classes/locate.class.php');


if(isset($_POST['submit'])){
$dish_id=$_POST['dish_id'];
$dish_title=$_POST['title'];
$dish_price=$_POST['price'];

}

$updatedishObject=new Dish();
$updatedishObject->setdishID($dish_id);
$updatedishObject->setdishTitle($dish_title);
$updatedishObject->setdishprice($dish_price);



$flag=$updatedishObject->updatedish();
// echo '<pre>';
// print_r($flag);
// echo '</pre>';
// exit;
if($flag){
	$_SESSION['dish_updated']=$err="The dish has been updated successfully";
	new Locate('../index.php?page=dish&action=view');

}
else
{
	$_SESSION['dish_not_updated']=$err="The dish couldn't be updated";
	new Locate('../index.php?page=dish&action=view');
}

?>