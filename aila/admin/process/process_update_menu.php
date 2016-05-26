<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/menu.class.php');
require_once('../classes/locate.class.php');
?>
<?php
if(isset($_POST['submit'])){
$menu_id=$_POST['menu_id'];
$menu_category=$_POST['menu_category'];
$menu_title=$_POST['menu_title'];
$menu_price=$_POST['menu_price'];
//$category_title=$_POST['category_title'];
}
$updateMenuObj=new Menu();


$updateMenuObj->setMenuID($menu_id);
$updateMenuObj->setMenuCategory($menu_category);
$updateMenuObj->setMenuTitle($menu_title);
$updateMenuObj->setMenuPrice($menu_price);

//$updateMenuObj->setCategoryTitle($category_title);
$flag=$updateMenuObj->updateMenu();

/*echo '<pre>';
print_r($flag);
echo '</pre>';
exit;*/


if($flag){
	$_SESSION['update_menu']="The menu successfully updated";
new Locate('../index.php?page=menu&action=view');	
	
}else
{
	$_SESSION['update_not_menu']="The menu couldn't be updated";
	new Locate('../index.php?page=menu&action=view');
	}

?>