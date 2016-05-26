<?php
include('classes/connection.class.php');
include('classes/event.class.php');
?>
<?php
$event_id=isset($_GET['event_id'])?(int)$_GET['event_id']:'';
$objevent=new event();
$objevent->setEventID($event_id);
$views=$objevent->viewEvent();

/*echo '<pre>';
print_r($views);
echo '</pre>';*/

?>
<?php 
foreach($views as $value){
?>
<form name="form1" method="post" action="process/process_update_event.php">
  <table class="table" width="669" border="1">
    <tbody>
      <tr>
        <th colspan="2" scope="row">Please Edit Event</th>
      </tr>
      <tr>
        <th scope="row">Title</th>
        <td>
		<input type="text" name="title" value="
		<?php echo $value['event_title'];?>"/>		
		
        
      </tr>
      <tr>
        <th scope="row">Event Description</th>
        <td>
		<textarea name="desc" rows="5" cols="30" >
		<?php echo $value['event_desc'];?>
</textarea>
		
		
        
      </tr>
      <tr>
        <th scope="row">event Date</th>
        <td>
        <input name="event_date" type="date" required="required" id="password" value="<?php echo $value['event_date'];?>" placeholder="event_date"></td>
      </tr>
      
      
        <th colspan="2" scope="row"><input name="submit" type="submit" id="submit" value="Submit">
		<input type="hidden" name="event_id" value="<?php echo $value['event_id'];?>" />
        </th>
      </tr>
    </tbody>
  </table>
</form>
<?php
}
?>