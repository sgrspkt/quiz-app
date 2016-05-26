<?php

require_once('classes/connection.class.php');
require_once('classes/event.class.php');


$viewobj=new Event();

$views=$viewobj->viewEvent();




/*echo '<pre>';
print_r($views);
echo '</pre>';*/

?>




<table class="table" width="698" border="1">
  <tbody>
    <tr>
      <th width="71" scope="row"><strong>EventID</strong></th>
      <td width="47"><strong>Event Title</strong></td>
      <td width="69"><strong>Event Desc</strong></td>
      <td width="44"><strong>Date</strong></td>
      
      <td colspan="2"><strong>Action</strong></td>
    </tr>
   
    <?php
	if(sizeof($views>0)){
    /*echo '<pre>';
    print_r($views);*/
	foreach($views as $value){
			
	
	?>
    <tr>
      <th scope="row">&nbsp; <?php echo $value['event_id']; ?></th>
      <td>&nbsp;<?php echo $value['event_title'];?></td>
      <td>&nbsp;<?php echo $value['event_desc'];?></td>
      <td>&nbsp;<?php echo $value['event_date'];?></td>
      
      <td width="112"><a onClick="return confirm('Are you sure you want to delete')"
      			 href="index.php?page=event&action=delete&event_id=<?php echo $value['event_id'];?>"><button class="btn btn-danger"> Delete</a></button></td>
      <td width="107">
                 <a href="index.php?page=event&action=update&event_id=<?php echo $value['event_id'];?>"><button class="btn btn-info"> Edit</a></button></td>
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
