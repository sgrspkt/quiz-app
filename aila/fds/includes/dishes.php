<?php 
require_once('../admin/classes/connection.class.php');
require_once('../admin/classes/dish.class.php');

?>



<div class="col-md-4">
<h2>Ai-La Special Dishes</h2>
<table class="table table-bordered">
 <?php 
 $featureObj = new Dish();
 $view= $featureObj->viewdish();

// echo '<pre>';
//  print_r($view);
//  echo '<pre>';
 
 ?>       
        <?php
        foreach($view as $value){
        ?>
<tr>
	<td><?php echo $value['dish_title'];?></td>
    <td><?php echo $value['dish_price'];?></td>
</tr>
<?php
}
?>

</table>
<p>The above rates are subject to 10% Service Charge and 13% Govt.Taxes.</p><br />
<p>Opening Time:07:00AM</p><br />
<p>Closing Time:10:00PM</p>
</div>