<?php
include('classes/connection.class.php');
include('classes/feature.class.php');
?>
<?php
$feature_id=isset($_GET['feature_id'])?(int)$_GET['feature_id']:'';
$objfeature=new Feature();
$objfeature->setfeatureID($feature_id);
$views=$objfeature->viewfeature();

/*echo '<pre>';
print_r($views);
echo '</pre>';*/

?>
<?php 
foreach($views as $value){
?>
<form name="form1" method="post" action="process/process_update_feature.php">
  <table class="table" width="669" border="1">
    <tbody>
      <tr>
        <th colspan="2" scope="row">Please Edit feature</th>
      </tr>
      <tr>
        <th scope="row">Title</th>
        <td>
		<input  name="title" value="
		<?php echo $value['feature_title'];?>"/>		
		
        
      </tr>
      <tr>
        <th scope="row">feature Description</th>
        <td>
		<textarea name="desc" rows="5" cols="30">
		<?php echo $value['feature_desc'];?>
</textarea>
		
		
        
      </tr>
      
      
      
        <th colspan="2" scope="row"><input name="submit" type="submit" id="submit" value="Submit">
		<input type="hidden" name="feature_id" value="<?php echo $value['feature_id'];?>" />
        </th>
      </tr>
    </tbody>
  </table>
</form>
<?php
}
?>