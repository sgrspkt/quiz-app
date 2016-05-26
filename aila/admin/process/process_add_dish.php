<?php
session_start();

require_once('../classes/connection.class.php');
require_once('../classes/dish.class.php');

$adddishobj=new Dish();
/*echo '<pre>';
print_r($adddishobj);
echo '</pre>';
exit;
*/
 $dish_id=mysqli_real_escape_string($adddishobj->conxn,$_POST['dish_id']);
$dish_title=mysqli_real_escape_string($adddishobj->conxn,$_POST['title']);
$dish_price=mysqli_real_escape_string($adddishobj->conxn,$_POST['price']);


$adddishobj->setdishID($dish_id);
$adddishobj->setdishTitle($dish_title);
$adddishobj->setdishprice($dish_price);



//$adduserobj->setError($er);
//$adduserobj->setMessage($msg);


$adddishobj->adddish();
/*echo '<pre>';
print_r ($adduserobj);
echo '</pre>';
exit;*/

if($adddishobj){
     header('location:../index.php?page=dish&action=view');
	 $_SESSION['msg']=$adddishobj->msg="The dish has been added sucessfully";
}
else{
	echo $_SESSION['msg']=$adddishobj->msg="Sorry the dish has not been  added, please try again later";
}

?>