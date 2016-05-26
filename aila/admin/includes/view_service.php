
<?php
require_once('bootstrap.php');

require_once('classes/connection.class.php');
require_once('classes/service.class.php');

$viewObj=new Service();
$views=$viewObj->viewservice();
//$username=$_SESSION['username'];

/*echo '<pre>';
print_r($views);
echo '</pre>';
*/

?>
<table class="table" width="200" border="1">
  <tr>
    <th scope="row">service id</th>
    
    <td>Title</td>
    <td>Description</td>
    
    <td>Image</td>
    <td colspan="2">Action</td>
  </tr>
  <?php
  if(sizeof($views>0)){
	  foreach($views as $value){
  ?>
  <tr>
    <th scope="row">&nbsp;<?php echo $value['service_id'];?></th>
    
    <td>&nbsp;<?php echo $value['service_title'];?></td>
    <td>&nbsp;<?php echo $value['service_desc'];?></td>
    
    <td>&nbsp;<img src="../phpThumb/phpThumb.php?src=../admin/uploads/<?php echo $value['service_thumb_image'];?>&h=100&w=100"/></td>
    <td width="112"> <a href="process/process_delete_service.php?service_id=<?php echo $value['service_id'];
    ?>"><button class="btn btn-danger"> Delete </a></button></td><td width="107"><a href="index.php?page=service&action=update&service_id=<?php echo $value['service_id'];?>"><button class="btn btn-info">Edit</a></button></td>
    
  </tr>
  <?php
	  }
  }else{
  ?>
  <tr>
    <th colspan="7" scope="row">No service found</th>
  </tr>
<?php
  }
  ?>
</table>