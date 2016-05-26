<?php

require_once('../classes/connection.class.php');

$con= new Connection();

$order_id=$_GET['order_id'];
$con->sql="select o.order_id, mo.quantity,s.fullname,m.menu_title,m.menu_price,o.user_id from tbl_order o left join tbl_menu_order mo on o.order_id=mo.order_id left join tbl_signup s on s.user_id=o.user_id left join tbl_menu m on m.menu_id=mo.menu_id where o.order_id=$order_id";

				
			

			$con->res=mysqli_query($con->conxn,$con->sql);
			$con->numRows=mysqli_num_rows($con->res);
			$con->data=array();
			
			if($con->numRows>0){
				while($con->row=mysqli_fetch_assoc($con->res)){
					array_push($con->data,$con->row);
				}
				
				}
$con->sql2="select o.order_id,SUM(m.menu_price) as totalprice, mo.quantity,s.fullname,m.menu_title,m.menu_price,o.user_id from tbl_order o left join tbl_menu_order mo on o.order_id=mo.order_id left join tbl_signup s on s.user_id=o.user_id left join tbl_menu m on m.menu_id=mo.menu_id where o.order_id=$order_id";

				
			

			$con->res=mysqli_query($con->conxn,$con->sql2);
			$con->numRows=mysqli_num_rows($con->res);
			$con->data2=array();
			
			if($con->numRows>0){
				while($con->row=mysqli_fetch_assoc($con->res)){
					array_push($con->data2,$con->row);
				}
				
				}

		?>
        
        
<table class="table"  border="1">
  <thead>
    <tr>
      <th  scope="row"><strong>OrderID</strong></th>
      <th>UserID</th>
      <th><strong>FullName</strong></th>
      <th><strong>Menu</strong></th>
      <th>Quantity</th>
      <th>Price</th>
      
    </tr>
   <?php
    foreach($con->data as $value){
			
			?>
    <tr>
      <th scope="row">&nbsp; <?php echo $value['order_id']; ?></th>
      <td>&nbsp;<?php echo $value['user_id'];?></td>
      <td>&nbsp;<?php echo $value['fullname'];?></td>
      <td>&nbsp;<?php echo $value['menu_title'];?></td>
      <td>&nbsp;<?php echo $value['quantity'];?></td>
      <td>&nbsp;<?php echo $value['menu_price'];?></td>
      
      

      
    </tr>
    <?php }?>
  </tbody>
  


<?php
    foreach($con->data2 as $value){
			
			?>
            
    <tr>
    <td colspan="5">GRAND TOTAL</td>
    
   <td><?php echo $value['totalprice'];?></td>     

      
    </tr>
    </table>
     <a href="../index.php?page=order&action=view"><img src="../../fds/image/images.jpg"></a>
    <?php }?>