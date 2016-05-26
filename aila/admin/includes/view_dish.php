<?php

require_once('classes/connection.class.php');
require_once('classes/dish.class.php');


$viewobj=new Dish();

$views=$viewobj->viewdish();




/*echo '<pre>';
print_r($views);
echo '</pre>';*/

?>



<table class="table" width="698" border="1">
  <tbody>
    <tr>
      <th width="71" scope="row"><strong>dishID</strong></th>
      <td width="47"><strong>dish Title</strong></td>
      <td width="69"><strong>dish Price</strong></td>
      
      
      <td colspan="2"><strong>Action</strong></td>
    </tr>
   
    <?php
	if(sizeof($views>0)){
		foreach($views as $value){
			
	
	?>
    <tr>
      <th scope="row">&nbsp; <?php echo $value['dish_id']; ?></th>
      <td>&nbsp;<?php echo $value['dish_title'];?></td>
      <td>&nbsp;<?php echo $value['dish_price'];?></td>
      
      
      <td width="112"><a onClick="return confirm('Are you sure you want to delete')"
      			 href="index.php?page=dish&action=delete&dish_id=<?php echo $value['dish_id'];?>"><button class="btn btn-danger "> Delete</a></button></td>
      <td width="107">
                 <a href="index.php?page=dish&action=update&dish_id=<?php echo $value['dish_id'];?>"><button class="btn btn-info "> Edit</a></button></td>
    </tr>
    <?php
		}//loop ends
	}//if ends
	else{
	?>
    
    <tr>
      <th colspan="9" scope="row">No data found</th>
    </tr>
    <?php
	}
	?>
  </tbody>
</table>
