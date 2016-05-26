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
            $('#add_category').attr('disabled', false);
            break;
        default:
            alert('This is not an allowed file type.');
			$('#add_about').attr('disabled', true);
            this.value = '';
    }
});

});
</script>



<form action="process/process_add_about.php" method="post" enctype="multipart/form-data" name="add_about">
  <table  border="1">
    <tr>
      <th colspan="2" scope="row">Add about</th>
    </tr>
    <tr>
      <th scope="row">Description</th>
      <td><label for="about_desc"></label>
      <textarea name="about_desc" class="ckeditor" id="about_desc" cols="45" rows="5" required></textarea></td>
    </tr>
    <tr>
      <th scope="row">Image</th>
      <td><label for="about_thumb_image"></label>
      <input type="file" name="about_thumb_image" id="about_thumb_image" required accept="image/*"></td>
    </tr>
    <tr>
    <input type="hidden" name="about_id" id="about_id">
      <th colspan="2" scope="row"><input type="submit" name="add_about" id="add_about" value="Add about"></th>
    </tr>
  </table>
</form>

