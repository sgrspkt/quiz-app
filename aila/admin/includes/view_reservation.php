<?php

require_once('classes/connection.class.php');
require_once('classes/reservation.class.php');


$viewobj=new Reservation();

$views=$viewobj->viewReservation();




/*echo '<pre>';
print_r($views);
echo '</pre>';*/

?>




<table class="table" width="698" border="1">
  <tbody>
    <tr>
      <th width="71" scope="row"><strong>reservationID</strong></th>
      <td width="47"><strong>Username</strong></td>
        <td width="69"><strong>Address</strong></td>
        <td width="69"><strong>Contact Number Home</strong></td>
          <td width="69"><strong>Contact Number Business</strong></td>
          <td width="69"><strong>Number Of People</strong></td>
           <td width="69"><strong>Date Of Arrival</strong></td>
      <td width="44"><strong>Email</strong></td>
      <td width="44"><strong>Comments</strong></td>
      <td width='44'><strong>Action</strong></td>
    </tr>
   
    <?php
	if(sizeof($views>0)){
		foreach($views as $value){
			
	
	?>
    <tr>
      <th scope="row">&nbsp; <?php echo $value['reservation_id']; ?></th>
      
      <td>&nbsp;<?php echo $value['reservationname'];?></td>
      <td>&nbsp;<?php echo $value['address'];?></td>
      <td>&nbsp;<?php echo $value['telephone_home'];?></td>
      <td>&nbsp;<?php echo $value['telephone_business'];?></td>
      <td>&nbsp;<?php echo $value['no_of_people'];?></td>
      <td>&nbsp;<?php echo $value['date_of_arrival'];?></td>
      <td>&nbsp;<?php echo $value['email'];?></td>
      <td>&nbsp;<?php echo $value['comments'];?></td>
      
      <td width="112"><a onClick="return confirm('Are you sure you want to delete')"
      			 href="index.php?page=reservation&action=delete&reservation_id=<?php echo $value['reservation_id'];?>"> <button class="btn btn-danger">Delete</a></button></td>
      
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
