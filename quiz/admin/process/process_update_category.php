<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/category.class.php');
require_once('../classes/locate.class.php');
?>
<?php
if(isset($_POST['update_category'])){
$category_id = $_POST['category_id'];
$category_name=$_POST['category_name'];
$cdate = $_POST['created_at'];
$created_at = date("Y-m-d", strtotime($cdate));
$udate = $_POST['updated_at'];
$updated_at = date("Y-m-d", strtotime($udate));
}

$updateCategoryObj = new Category();
/*echo '<pre>';
print_r($updateCategoryObj);
echo '</pre>';
die();*/
$updateCategoryObj->setCategoryId($category_id);
$updateCategoryObj->setcategoryName($category_name);
$updateCategoryObj->setCreatedAt($created_at);
$updateCategoryObj->setUpdatedAt($updated_at);

$flag=$updateCategoryObj->updateCategory();

/*echo '<pre>';
print_r($updateCategoryObj);
echo '</pre>';
die('i am here');*/

$locateObj = new Locate();

if($flag){
	$_SESSION['update_category'] = true;
	$_SESSION['update_category_msg']="The category successfully updated";
$locateObj->getLocation('../index.php?page=category&action=view');
	
}else
{
	$_SESSION['update_not_category'] = true;
	$_SESSION['update_not_category_msg']="The category couldn't be updated";
$locateObj->getLocation('../index.php?page=category&action=view');
	}

?>