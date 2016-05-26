<?php
session_start();
require_once('../classes/connection.class.php');
require_once('../classes/category.class.php');
require_once('../classes/locate.class.php');
?>
<?php
if(isset($_POST['update_category'])){
$category_id=$_POST['category_id'];
$category_title=$_POST['category_title'];
$category_thumb_image=$_POST['category_thumb_image'];
}
$updateCategoryObj=new Category();


$updateCategoryObj->setCategoryID($category_id);
$updateCategoryObj->setCategoryTitle($category_title);
$updateCategoryObj->setCategoryThumbImage($category_thumb_image);
$flag=$updateCategoryObj->updateCategory();

/*echo '<pre>';
print_r($flag);
echo '</pre>';
exit;
*/

if($flag){
	$_SESSION['update_category']="The category successfully updated";
new Locate('../index.php?page=category&action=view');	
	
}else
{
	$_SESSION['update_not_category']="The category couldn't be updated";
	new Locate('../index.php?page=category&action=view');
	}

?>