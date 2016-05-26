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
            $('#add_service').attr('disabled', false);
            break;
        default:
            alert('This is not an allowed file type.');
			$('#add_service').attr('disabled', true);
            this.value = '';
    }
});

});
</script>

<form action="process/process_add_service.php" method="post" enctype="multipart/form-data" name="add_service">
  <table  border="1">
    <tr>
      <th colspan="2" scope="row">Add service</th>
    </tr>
    <tr>
      <th  scope="row">Title</th>
      <td width="100"><label for="service_title"></label>
      <input type="text" name="service_title" id="service_title" placeholder="enter the title" required></td>
    </tr>
    <tr>
      <th scope="row">Description</th>
      <td><label for="service_desc"></label>
      <textarea name="service_desc" id="service_desc" class="ckeditor" cols="45" rows="5" required></textarea></td>
    </tr>
    <tr>
      <th scope="row">Image</th>
      <td><label for="service_thumb_image"></label>
      <input type="file" name="service_thumb_image" id="service_thumb_image" required accept="image/*"></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="add_service" id="add_service" value="Add service"></th>
    </tr>
  </table>
</form>
