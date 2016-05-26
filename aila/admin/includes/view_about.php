
<?php
require_once('bootstrap.php');

require_once('classes/connection.class.php');
require_once('classes/about.class.php');

$viewObj=new About();
$views=$viewObj->viewabout();
//$username=$_SESSION['username'];

/*echo '<pre>';
print_r($views);
echo '</pre>';
*/

?>
<table class="table" width="200" border="1">
  <tr>
    <th scope="row">about id</th>
    
    
    <td>Description</td>
    
    <td>Image</td>
    <td colspan="2">Action</td>
  </tr>
  <?php
  if(sizeof($views>0)){
	  foreach($views as $value){
  ?>
  <tr>
    <th scope="row">&nbsp;<?php echo $value['about_id'];?></th>
    
    
    <td>&nbsp;<?php echo $value['about_desc'];?></td>
    
    <td>&nbsp;<img src="../phpThumb/phpThumb.php?src=../admin/uploads/<?php echo $value['about_thumb_image'];?>&h=100&w=100"/></td>
    <td width="112"> <a href="process/process_delete_about.php?about_id=<?php echo $value['about_id'];
    ?>"><button class="btn btn-danger"> Delete </a></button></td><td width="112"><a href="index.php?page=about&action=update&about_id=<?php echo $value['about_id'];?>"><button class="btn btn-info">Edit</a></button></td>
  </tr>
  <?php
	  }
  }else{
  ?>
  <tr>
    <th colspan="7" scope="row">No about found</th>
  </tr>
<?php
  }
  ?>
</table>