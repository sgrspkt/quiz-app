<?php
require_once('classes/connection.class.php');
require_once('classes/service.class.php');
?>
<?php
$service_id=isset($_GET['service_id'])?(int)$_GET['service_id']:'';
$updateObj=new Service();
$updateObj->setserviceID($service_id);
$data=$updateObj->viewservice();
//$updateObj->setserviceID($service_id);

/*echo '<pre>';
print_r($data);
echo'</pre>';
exit;*/
foreach($data as $value){
?>
<form action="process/process_update_service.php" method="post" enctype="multipart/form-data" name="update_service">
  <table width="200" border="1">
    <tr>
      <th colspan="2" scope="row">Update service</th>
    </tr>
    <tr>
      <th width="84" scope="row">Title</th>
      <td width="100"><label for="service_title"></label>
      <input type="text" name="service_title" id="service_title" value="<?php echo $value['service_title']; ?>"></td>
    </tr>
    <tr>
      <th scope="row">Description</th>
      <td><label for="service_desc"></label>
      <textarea name="service_desc" id="service_desc" cols="45" rows="5"><?php echo $value['service_desc'];?></textarea></td>
    </tr>
    <tr>
      <th scope="row">Image</th>
      <td><label for="service_thumb_image"></label>	
      <input type="file" name="service_thumb_image">
       <input type="hidden" value="<?php echo $value['service_id']; ?>" name="service_id">
       <input type="hidden" value="<?php echo $value['service_thumb_image']; ?>" name="service_thumb_image" accept="image/*">
      </td>
      </tr>
      <tr>
      <th colspan="2" scope="row"><input type="submit" name="update_service" id="update_service" value="Update service"></th>
    </tr>
  </table>
</form>
<?php
}
?>
<script type="text/javascript">
$(document).ready(function(e) {
    

$('INPUT[type="file"]').change(function () {
	//alert('sdfdsfds');
    var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'gif':
            $('#update_service').attr('disabled', false);
            break;
        default:
            alert('This is not an allowed file type.');
			$('#update_service').attr('disabled', true);
            this.value = '';
    }
});

});
</script>
