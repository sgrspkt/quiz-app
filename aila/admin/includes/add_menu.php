<?php
require_once('classes/connection.class.php');
require_once('classes/category.class.php');

$CategoryObj= new Category();

$view=$CategoryObj->viewCategory();

?>
<?php 
 
/*echo '<pre>';
print_r($view);
echo '<pre>';
*/
?>

<form action="process/process_add_menu.php" method="post" enctype="multipart/form-data" name="add_menu">
  <table  border="1">
    <tr>
      <th colspan="2" scope="row">Add Menu</th>
    </tr>
    <tr>
      <th  scope="row">Title</th>
      <td ><label for="menu_title"></label>
      <input type="text" name="menu_title" id="menu_title" placeholder="enter the title"></td>
    </tr>
    <tr>
      <th scope="row">Category</th>
      <td><label for="menu_category"></label>
        
        <select name="menu_category" id="menu_category" value ="" >
        <?php foreach($view as $value){ ?>
        <?php if($value['category_title'] == 'choila'){ ?>
			          <option value="<?php echo $value['category_id']; ?>" selected class="options">
          <?php 
			  echo $value['category_title'];
			  	
			   ?></option>
          <?php
          continue;     
          }?>
          <option value="<?php echo $value['category_id']; ?>" class="options" >
          <?php 
			  echo $value['category_title'];
			  	
			   ?></option>
               <?php }?>
      </select>
      
      </td>
    </tr>
    <tr>
      <th scope="row">Price</th>
      <td><label for="price"></label>
      <input type="text" name="menu_price" id="menu_price" placeholder="enter the price">
      <input type="hidden" name="menu_id">
      <input type="hidden" name="category_title">
      </td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="add_menu" id="add_menu" value="Add Menu"></th>
    </tr>
  </table>
</form>

<script>
$(function(){
	
	
	
$('#menu_category').on('change',function(e){
		$('#menu_category').attr('value',$(this).val());
});	
});


</script>