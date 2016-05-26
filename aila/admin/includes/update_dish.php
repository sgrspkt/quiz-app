<?php
include('classes/connection.class.php');
include('classes/dish.class.php');
?>
<?php
$dish_id=isset($_GET['dish_id'])?(int)$_GET['dish_id']:'';
$objdish=new Dish();
$objdish->setdishID($dish_id);
$views=$objdish->viewdish();

/*echo '<pre>';
print_r($views);
echo '</pre>';*/

?>
<?php 
foreach($views as $value){
?>
<form name="form1" method="post" action="process/process_update_dish.php">
  <table width="669" border="1">
    <tbody>
      <tr>
        <th colspan="2" scope="row">Please Edit dish</th>
      </tr>
      <tr>
        <th scope="row">Title</th>
        <td>
		<input type="text" name="title" value="
		<?php echo $value['dish_title'];?>"/>		
		
        
      </tr>
      <tr>
        <th scope="row">dish Price</th>
        <td>
		<input type="text" name="price" value="
    <?php echo $value['dish_price'];?>"/>
		
		
        
      </tr>
      
      
      
        <th colspan="2" scope="row"><input name="submit" type="submit" id="submit" value="Submit">
		<input type="hidden" name="dish_id" value="<?php echo $value['dish_id'];?>" />
        </th>
      </tr>
    </tbody>
  </table>
</form>
<?php
}
?>