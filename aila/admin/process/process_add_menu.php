<?php
session_start();

require_once('../classes/connection.class.php');
require_once('../classes/menu.class.php');

$addmenuobj=new Menu();
/*echo '<pre>';
print_r($addmenuobj);
echo '</pre>';
exit;
*/
 $menu_id=mysqli_real_escape_string($addmenuobj->conxn,$_POST['menu_id']);
 $menu_category=mysqli_real_escape_string($addmenuobj->conxn,$_POST['menu_category']);
$category_title=mysqli_real_escape_string($addmenuobj->conxn,$_POST['category_title']);
$menu_title=mysqli_real_escape_string($addmenuobj->conxn,$_POST['menu_title']);
$menu_price=mysqli_real_escape_string($addmenuobj->conxn,$_POST['menu_price']);


$addmenuobj->setMenuID($menu_id);
$addmenuobj->setMenuCategory($menu_category);
$addmenuobj->setCategoryTitle($category_title);
$addmenuobj->setMenuTitle($menu_title);
$addmenuobj->setMenuPrice($menu_price);


//$adduserobj->setError($er);
//$adduserobj->setMessage($msg);


$addmenuobj->addMenu();
/*echo '<pre>';
print_r ($adduserobj);
echo '</pre>';
exit;*/

if($addmenuobj){
     header('location:../index.php?page=menu&action=view');
	 $_SESSION['msg']=$addmenuobj->msg="The menu has been added sucessfully";
}
else{
	echo $_SESSION['msg']=$addmenuobj->msg="Sorry the menu has not been  added, please try again later";
}

?>