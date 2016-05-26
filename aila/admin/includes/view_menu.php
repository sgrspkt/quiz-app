<?php

require_once('classes/connection.class.php');
require_once('classes/menu.class.php');
require_once('classes/category.class.php');

$addcategoyobj=new Category();

$viewMenuobj=new Menu();

$views=$viewMenuobj->viewmenu();



/*echo '<pre>';
print_r($views);
echo '</pre>';
*/
?>


 <script sr src="../rms/js/jquery.js"></script>
 <script src="../media/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
	
		$('#menu').DataTable(
		{
				
				"bLengthChange": true,
				"bFilter": true,
				"bPaginate": true,
				"bInfo": false,	
				"bAutoWidth": false,
				"bRetrieve":true,
				"bDestory":true
				});
	} );
</script>             
<table class="table" border="1" id="menu">

	<thead>
    	<tr>
          <th><strong>MenuID</strong></th>
          <th><strong>Menu Title</strong></th>
          <th><strong>Category Title</strong></th>
          <th><strong>Menu Price</strong></th>
          <th><strong>Action</strong></th>
    	</tr>
    </thead>
	<tbody>
    <?php
	if(sizeof($views>0)){
		foreach($views as $value){
			
	
	?>
    <tr>
      <th scope="row">&nbsp; <?php echo $value['menu_id']; ?></th>
      <td>&nbsp;<?php echo $value['menu_title'];?></td>
      <td>&nbsp;<?php 
	  $menu_category = $value['menu_category'];
	  $addcategoyobj -> setCategoryID($menu_category);
	  $category_values = $addcategoyobj -> viewCategory();
	  foreach($category_values as $cate_value){
		  echo $cate_value['category_title'];
		  }
	  ?></td>
      <td>&nbsp;<?php echo $value['menu_price'];?></td>
      
      
      <td ><a onClick="return confirm('Are you sure you want to delete')"
      			 href="index.php?page=menu&action=delete&menu_id=<?php echo $value['menu_id'];?>"><button class="btn btn-danger"> Delete</a></button>
                 <a href="index.php?page=menu&action=update&menu_id=<?php echo $value['menu_id'];?>"><button class="btn btn-info">Edit</a></button></td>
    </tr>
    <?php
		}//loop ends
	}//if ends
	else{
	?>
    
    <?php
	}
	?>
  </tbody>
</table>
