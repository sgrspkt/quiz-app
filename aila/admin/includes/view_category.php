
<?php
require_once('bootstrap.php');

require_once('classes/connection.class.php');
require_once('classes/category.class.php');

$viewObj=new Category();
$views=$viewObj->viewCategory();
//$username=$_SESSION['username'];

/*echo '<pre>';
print_r($views);
echo '</pre>';
*/

?>
<table class="table" width="200" border="1">
  <tr>
    <th scope="row">Category id</th>
    <td>Title</td>
    <td>Image</td>
    <td>Action</td>
  </tr>
  <?php
  if(sizeof($views>0)){
	  foreach($views as $value){
  ?>
  <tr>
    <th scope="row">&nbsp;<?php echo $value['category_id'];?></th>
    <td>&nbsp;<?php echo $value['category_title'];?></td>
    <td>&nbsp;<img src="../phpThumb/phpThumb.php?src=../admin/uploads/<?php echo $value['category_thumb_image'];?>&h=100&w=100"/></td>
    <td> <a href="process/process_delete_category.php?category_id=<?php echo $value['category_id'];
    ?>"><button class="btn btn-danger"> Delete </a></button> &nbsp; <a href="index.php?page=category&action=update&category_id=<?php echo $value['category_id'];?>"><button class="btn btn-info">Edit</a></button></td>
  </tr>
  <?php
	  }
  }else{
  ?>
  <tr>
    <th colspan="7" scope="row">No category found</th>
  </tr>
<?php
  }
  ?>
</table>