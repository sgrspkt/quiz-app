<?php
require_once('classes/connection.class.php');
require_once('classes/category.class.php');
?>
<?php
$category_id=isset($_GET['category_id'])?(int)$_GET['category_id']:'';
$updateObj=new Category();
$updateObj->setcategoryID($category_id);
$data=$updateObj->viewcategory();
//$updateObj->setcategoryID($category_id);

/*echo '<pre>';
print_r($data);
echo'</pre>';
exit;*/
foreach($data as $value){
?>
<?php //echo $value['category_thumb_image'];?>
<form action="process/process_update_category.php" method="post" enctype="multipart/form-data" name="update_category">
  <table width="200" border="1">
    <tr>
      <th colspan="2" scope="row">Update category</th>
    </tr>
    <tr>
      <th width="84" scope="row">Title</th>
      <td width="100"><label for="category_title"></label>
      <input type="text" name="category_title" id="category_title" value="<?php echo $value['category_title']; ?>"></td>
    </tr>
    
    <tr>
      <th scope="row">Image</th>
      <td><label for="category_thumb_image"></label>
      <input type="file" name="category_thumb_image">
       <input type="hidden" value="<?php echo $value['category_id']; ?>" name="category_id">
        <input type="hidden" value="<?php echo $value['category_thumb_image']; ?>" name="category_thumb_image">
      </td> 
      </tr>
      <tr>
      <th colspan="2" scope="row"><input type="submit" name="update_category" id="update_category" value="Update category"></th>
    </tr>
  </table>
</form>
<?php
}
?>