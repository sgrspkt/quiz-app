<?php

require_once('classes/connection.class.php');
require_once('classes/user.class.php');


$viewobj=new User();

$views=$viewobj->viewUser();




/*echo '<pre>';
print_r($views);
echo '</pre>';*/

?>




<table class="table"  border="1">
  <tbody>
    <tr>
      <th  scope="row"><strong>userID</strong></th>
      <th> <strong>Full Name</strong></th>
      <th ><strong>Username</strong></th>
      <th ><strong>Password</strong></th>
       <th ><strong>Check Password</strong></th>
        <th><strong>Address</strong></th>
        <th ><strong>Contact Number</strong></th>
      <th ><strong>Email</strong></th>
      
      <th><strong>Action</strong></th>
    </tr>
   
    <?php
	if(sizeof($views>0)){
		foreach($views as $value){
			
	
	?>
    <tr>
      <th scope="row">&nbsp; <?php echo $value['user_id']; ?></th>
      <td>&nbsp;<?php echo $value['fullname'];?></td>
      <td>&nbsp;<?php echo $value['username'];?></td>
      <td>&nbsp;<?php echo $value['password'];?></td>
      <td>&nbsp;<?php echo $value['password_check'];?></td>
      <td>&nbsp;<?php echo $value['address'];?></td>
      <td>&nbsp;<?php echo $value['telephone'];?></td>
      <td>&nbsp;<?php echo $value['email'];?></td>
      <td width="112"><a onClick="return confirm('Are you sure you want to delete')"
      			 href="index.php?page=user&action=delete&user_id=<?php echo $value['user_id'];?>"><button class="btn btn-danger">Delete</a></button></td>
      
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
