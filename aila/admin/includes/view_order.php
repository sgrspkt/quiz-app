<?php

require_once('classes/connection.class.php');

$con= new Connection();

/*$con->sql="select o.order_id, mo.quantity,s.fullname,m.menu_title,o.user_id from tbl_order o left join tbl_menu_order mo on o.order_id=mo.order_id left join tbl_signup s on s.user_id=o.user_id left join tbl_menu m on m.menu_id=mo.menu_id";*/

$con->sql="select o.order_id, mo.quantity,s.fullname,o.user_id from tbl_order o left join tbl_menu_order mo on o.order_id=mo.order_id left join tbl_signup s on s.user_id=o.user_id ";
				
			
			//echo $this->sql;exit;
			$con->res=mysqli_query($con->conxn,$con->sql);// or trigger_error($this->err=mysqli_error($this->conxn));
			$con->numRows=mysqli_num_rows($con->res);// or trigger_error($this->err=mysqli_error($this->conxn));
			$con->data=array();
			
			if($con->numRows>0){
				while($con->row=mysqli_fetch_assoc($con->res)){
					array_push($con->data,$con->row);
				}
				
				}
		//return $con->data;
		
/*echo '<pre>';
print_r($con->data['order_id']);
echo '</pre>';
exit;*/?>
    

<script>
function viewDetail(item){
	$.post("includes/view_order_detail.php",{
		"order_id": $(item).attr('orderId')
		},function(data){
			$('#ss').modal('show');
			$('#anilModal').html(data);
			});
	}
</script>

<table class="table" width="698" border="1">
  <tbody>
    <tr>
      <th width="71" scope="row"><strong>OrderID</strong></th>
      <td width="47">UserID</td>
      
    </tr>
   <?php
    foreach($con->data as $value){
			
			?>
    <tr>
      <th scope="row">&nbsp; <?php echo $value['order_id']; ?></th>
      <td>&nbsp;<?php echo $value['user_id'];?></td>
    <?php /*?>  <td>&nbsp;<?php echo $value['fullname'];?></td>
      <td>&nbsp;<?php echo $value['quantity'];?></td><?php */?>
      <td>&nbsp;</td>
      
      <td width="112"><a onClick="return confirm('Are you sure you want to delete')"
      			 href="index.php?page=order&action=delete&event_id=<?php echo $value['order_id'];?>"><!--<button class="btn btn-danger"> Delete</button></a>-->  <a href="includes/view_order_detail.php?order_id=<?php echo $value['order_id']; ?>"><button orderId="<?php echo $value['order_id']; ?>" >View</button></a></td>
      
    </tr>
    <?php }?>
  </tbody>
</table>