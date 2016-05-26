<?php

require_once('classes/connection.class.php');
require_once('classes/message.class.php');


$viewobj=new Message();

$views=$viewobj->viewMessage();




/*echo '<pre>';
print_r($views);
echo '</pre>';*/

?>




<table width="698" border="1">
  <tbody>
    <tr>
      <th width="71" scope="row"><strong>messageID</strong></th>
      <td width="47"><strong>Visitor Name</strong></td>
      <td width="69"><strong>Visitor Email</strong></td>
      <td width="69"><strong>Visitor Message</strong></td>
      
      <td width="69"><strong>Action</strong></td>
    </tr>
   
    <?php
	if(sizeof($views>0)){
		foreach($views as $value){
			
	
	?>
    <tr>
      <th scope="row">&nbsp; <?php echo $value['visitor_id']; ?></th>
      <td>&nbsp;<?php echo $value['visitor_name'];?></td>
      <td>&nbsp;<?php echo $value['visitor_email'];?></td>
      <td>&nbsp;<?php echo $value['visitor_message'];?></td>
      
      <td><a onClick="return confirm('Are you sure you want to delete')"
      			 href="index.php?page=message&action=delete&visitor_id=<?php echo $value['visitor_id'];?>"><button class="btn btn-danger">Delete</a></button></td>
      
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
