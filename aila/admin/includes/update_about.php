<?php
require_once('classes/connection.class.php');
require_once('classes/about.class.php');
?>
<?php
$about_id=isset($_GET['about_id'])?(int)$_GET['about_id']:'';
$updateObj=new about();
$updateObj->setaboutID($about_id);
$data=$updateObj->viewabout();
//$updateObj->setaboutID($about_id);

	/*echo '<pre>';
print_r($data);
echo'</pre>';*/

foreach($data as $value){
	
?>
<form action="process/process_update_about.php" method="post" enctype="multipart/form-data" name="update_about">
  <table width="200" border="1">
    <tr>
      <th colspan="2" scope="row">Update about</th>
    </tr>
    
    <tr>
      <th scope="row">Description</th>
      <td><label for="about_desc"></label>
      <textarea name="about_desc" id="about_desc" cols="45" rows="5"><?php echo $value['about_desc'];?></textarea></td>
    </tr>
    <tr>
      <th scope="row">Image</th>
      <td><label for="about_thumb_image"></label>
      
      <input type="file" name="about_thumb_image">
       <input type="hidden" value="<?php echo $value['about_id']; ?>" name="about_id">
       <input type="hidden" value="<?php echo $value['about_thumb_image']; ?>" name="about_thumb_image">
      </td>
      </tr>
      <tr>
      <th colspan="2" scope="row"><input type="submit" name="update_about" id="update_about" value="Update about"></th>
    </tr>
  </table>
</form>
<?php
}
?>