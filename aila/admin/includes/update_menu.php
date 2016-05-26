

<?php
include('classes/connection.class.php');
include('classes/menu.class.php');
require_once('classes/category.class.php');
?>
<?php
$menu_id=isset($_GET['menu_id'])?(int)$_GET['menu_id']:'';
$MenuObj= new Category();

$view=$MenuObj->viewCategory();


$objmenu=new Menu();
$objmenu->setmenuID($menu_id);
$views=$objmenu->viewmenu();

/*echo '<pre>';
print_r($view);
echo '</pre>';*/

?>

<form name="form1" method="post" action="process/process_update_menu.php">
  <table width="669" border="1">
    <tbody>
      <tr>
        <th colspan="2" scope="row">Please Edit menu</th>
      </tr>
      <tr>
        <th scope="row">Menu Title</th>
        <td>
        <?php 
foreach($views as $values){
?>
		<input type="text" name="menu_title" value="
		<?php echo $values['menu_title'];?>"/>		
		<?php }?>
        
      </tr>
      <tr>
      <th scope="row">Category</th>
      <td><label for="menu_category"></label>
        
        <select name="menu_category" id="menu_category">
        <?php foreach($view as $value){ ?>
          <option value="text">
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
      <?php 
foreach($views as $values){
?>
      <input type="text" name="menu_price" id="menu_price" placeholder="enter the price" value="
    <?php echo $values['menu_price'];?>"/>
    <?php }?>
      <input type="hidden" name="menu_id">
      <input type="hidden" name="category_id">
      </td>
    </tr>
      <?php 
foreach($views as $value){
?>
		<input type="hidden" name="menu_id" value="<?php echo $value['menu_id'];?>" />
        <?php }?>
        <th colspan="2" scope="row"><input name="submit" type="submit" id="submit" value="Submit">
        
        </th>
      </tr>
    </tbody>
  </table>
</form>


