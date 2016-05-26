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
			$('#add_category').attr('disabled', true);
            this.value = '';
    }
});

});
</script>



<form action="process/process_add_category.php" method="post" enctype="multipart/form-data" name="add_category" >
  <table  border="1">
    <tr>
      <th colspan="2" scope="row">Add Category</th>
    </tr>
    <tr>
      <th  scope="row">Category Title</th>
      <td ><label for="category_title"></label>
      <input type="text" name="category_title" id="category_title" placeholder="enter the title" required></td>
    </tr>
    <tr>
      <th scope="row">Image</th>
      <td><label for="category_thumb_image"></label>
      <input type="file" name="category_thumb_image"  accept="image/*"/>
     </td>
    </tr>
    
    <tr>
    <input type="hidden" name="category_id" id="category_id">
      <th colspan="2" scope="row"><input type="submit" name="add_category" id="add_category" value="Add Category"></th>
    </tr>
  </table>
</form>
